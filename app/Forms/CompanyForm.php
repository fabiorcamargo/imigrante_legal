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

class CompanyForm extends Controller
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create($data){

        //dd($data);
        isset($data->logo) ? $data->logo = asset($data->logo) : '';
        isset($data->banner) ? $data->banner = asset($data->banner) : '';

        //dd($data->logo);

        $data == [] ? $submit = 'Criar' : $submit = 'Salvar';
        $data == [] ? $viagem = 1 : $viagem = $data->viagem;
        $data == [] ? $mudanca = 1 : $mudanca = $data->mudanca;

        //dd($viagem);
        $states = States::orderBy('title')->select('title', 'id')->get();
        $cidades = City::orderBy('title')->select('title', 'id')->where('state_id', isset($data->state_id) ? $data->state_id : '')->get();

        

        $form = SpladeForm::make()
            ->fields([
            File::make('logo')->label('Insira a Logo')
            ->filepond() // Enables filepond
            ->accept(['image/png', 'image/jpeg', 'image/jpg'])
            ->maxSize("1mb")
            ->preview(),
            File::make('banner')->label('Insira um Banner')
                ->filepond() // Enables filepond
                ->accept(['image/png', 'image/jpeg', 'image/jpg'])
                ->maxSize("1mb")
                ->preview(),
            Input::make('nome')->required()->label('Nome da Empresa')->help('Nome do Curso (Pode ser Cursos Profissionalizantes, Informática, Idiomas, Técnicos, entre outros).')->placeholder('Ex. Informática Básica'),
            Textarea::make('sobre')->label('Sobre')->autosize(),
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
