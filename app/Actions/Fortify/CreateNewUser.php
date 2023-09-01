<?php

namespace App\Actions\Fortify;

use App\Mail\welcome_mail;
use App\Models\CodePremium;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $this->code = CodePremium::find($input['code']);

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'phone' => '55'.$input['phone'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) {

                $this->code->active = $user->id;
                $this->code->save();

                $user->givePermissionTo('user');

                Mail::to($user->email)->send(new welcome_mail($user));
                //$user->sendEmailVerificationNotification();

                $this->createTeam($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
