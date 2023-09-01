<?php

namespace App\Forms;

use Illuminate\Database\Eloquent\Model;
use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Password;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\SpladeForm;

class BaseForm extends AbstractForm
{
    public function configure(SpladeForm $form)
    {
        $form->action(route('UserCourse.store'));
    }
 
    public function fields(): array
    {
        return [
            Input::make('name')->label('User Name'),
            Password::make('password')->label('Password'),
            Submit::make()->label('Create'),
        ];
    }
}