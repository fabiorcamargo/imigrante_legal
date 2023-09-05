<?php

namespace App\Forms;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\States;
use Illuminate\Database\Eloquent\Model;
use ProtoneMedia\Splade\FormBuilder\File;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Number;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\FormBuilder\Textarea;
use ProtoneMedia\Splade\FormBuilder\Wysiwyg;
use ProtoneMedia\Splade\SpladeForm;

class ConfigForm extends Controller
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create($data){


        $data == [] ? $submit = 'Criar' : $submit = 'Salvar';

        

        $form = SpladeForm::make()
            ->fields([
                File::make('banner1')->label('Insira a imagem para o Banner 1')
                ->filepond() // Enables filepond
                ->accept(['image/png', 'image/jpeg', 'image/jpg', 'image/webp'])
                ->maxSize("2mb")
                ->preview(),
            Submit::make()->label($submit),
            
            ])
            ->fill($data);

        str_contains(url()->current(), 'create') ? $route = str_replace('create', '', url()->current()) : $route = str_replace('edit', '', url()->current());
        str_contains(url()->current(), 'create') ? $method = 'POST' : $method = 'PUT';

        $form->action($route);
        $form->method($method);
        $form->class('space-y-4');
    
        return $form;
    
    }
}
