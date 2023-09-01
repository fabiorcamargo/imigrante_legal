<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\SpladeForm;

class FormController extends Controller
{
    public function __construct(Model $model, string $action, array $campos) {
        $this->model = $model;
        $this->action = $action;
        $this->campos = $campos;
    }

    public function create()
    {

        foreach ($this->campos as $campo) {
            
        }

        $modelName = (class_basename($this->model));

        $form = SpladeForm::make();
        $form->action(route($modelName . '.' . $this->action));

        return $form;
    }
}
