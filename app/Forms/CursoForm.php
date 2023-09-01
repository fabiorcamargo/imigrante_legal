<?php

namespace App\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Date;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Number;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\FormBuilder\Textarea;
use ProtoneMedia\Splade\SpladeForm;

class CursoForm extends Controller
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create($data){

        //dd($data);
        $data == [] ? $submit = 'Criar' : $submit = 'Salvar';
 
        $form = SpladeForm::make()
            ->fields([
            Input::make('nome')->required()->label('Nome do Curso')->help('Nome do Curso (Pode ser Cursos Profissionalizantes, Informática, Idiomas, Técnicos, entre outros).')->placeholder('Ex. Informática Básica'),
            Input::make('instituicao')->required()->label('Instituição')->help('Nome da Instituição onde o curso foi concluído, importante colocar a Cidade e Estado da mesma.')->placeholder('Ex. Escola Profissionalizante ....'),
            Number::make('horas')->required()->label('Carga horária')->help('Quantidade de horas totais do curso.'),
            Number::make('ano')->required()->label('Ano')->help('Ano em que o curso foi concluído.')->minLength(1960),
            Textarea::make('descricao')->label('Descrição do Curso')->autosize()->help('Coloque as principais atividades ou objevos do curso.'),
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
