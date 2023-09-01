<?php

namespace App\Http\Controllers;

use App\Models\CodePremium;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Testing\Fakes\Fake;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Textarea;
use ProtoneMedia\Splade\SpladeForm;
use Illuminate\Support\Str;

class CodePremiumController extends Controller
{
    public static function rules(): array
    {
        return [
            'token' => ['required', 'array'],
            'token' => ['unique:code_premia'],
            'seller.*' => ['required', 'string', 'max:150'],
        ];
    }

    public function verify(Request $request)
    {
        
        //dd($request->all());
        //$code = ($request->code);
        $code = (implode("", $request->code));
        //dd($code);
        if ($code = CodePremium::where('code', $code)->first()) {
            
            if ($code->active == null) {
                Toast::title('Seu código é válido!')
                    ->autoDismiss(5);
                    //dd('s');
                return redirect()->route('register', ['token' => $code->token, 'code' => $code->id]);
            } else {
                Toast::warning('Este código não é mais válido, em caso de dúvidas consulte a central de ajuda')
                    ->autoDismiss(5);
                    //dd('n');
                return back();
            }
        } else {
            Toast::warning('Código não encontado, por favor verifique o código e insira novamente')
                ->autoDismiss(5);
            return back();
        }
    }

    public function store(Request $request)
    {
        //dd($request->all());

        //$request->token = (explode(",", $request->token));

        $novosDados['seller'] = $request->seller; // Alterar o valor do campo 'nome'
        $novosDados['token'] = explode(",", $request->token); // Alterar o valor do campo 'nome'

        $request->replace($novosDados);

        //dd($request->all());
        $data = $request->validate(CodePremiumController::rules());
        //dd($request->all());

        foreach ($request->token as $token) {
            CodePremium::create([
                'seller' => $request->seller,
                'code' => $token,
                'token' => (string)Str::uuid()
            ]);
        }

        Toast::title('Códigos criados com sucesso!');

        return back();
    }


    public function create(Request $request)
    {

        $form = SpladeForm::make()
            ->id('form')
            ->action(route('code.store'))
            ->class('space-y-4')
            ->fields([

                Input::make('seller')->required()->label('Divulgador'),
                Textarea::make('token')->label('Código')->id('token')->autosize(),
                Submit::make()->label('Create'),
            ]);

        //dd($form);
        return view('code.create', [
            'form' => $form,
        ]);
    }
}
