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

class TrainingForm extends Controller
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
            Input::make('nome')->required()->label('Nome')->help('Nome da Formação (Pode ser Ensino Fundamental, Médio, Graduação, Pós ...)')->placeholder('Ex. Ensino Médio'),
            Input::make('instituicao')->required()->label('Instituição')->help('Nome da Instituição onde a Formação foi concluída.')->placeholder('Ex. Colégio Estadual ....'),
            Number::make('ano')->required()->label('Ano de Conclusão')->help('Ano em que a Formação foi Concluída')->minLength(1960) ,
            Textarea::make('descricao')->label('Descrição da Formação')->autosize()->help('Coloque as principais atividades ou objevos da formação'),
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
