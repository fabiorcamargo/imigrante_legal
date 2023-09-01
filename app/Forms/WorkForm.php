<?php

namespace App\Forms;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\States;
use Illuminate\Database\Eloquent\Model;
use ProtoneMedia\Splade\FormBuilder\Date;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Number;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\FormBuilder\Textarea;
use ProtoneMedia\Splade\SpladeForm;

class WorkForm extends Controller
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create($data){

        $data == [] ? $submit = 'Criar' : $submit = 'Salvar';

        $states = States::orderBy('title')->select('title', 'id')->get();
        $cidades = City::orderBy('title')->select('title', 'id')->where('state_id', isset($data->state_id) ? $data->state_id : '')->get();
 
        $form = SpladeForm::make()
            ->fields([
                Input::make('empresa')->required()->label('Empresa')->help('Nome comercial da empresa onde você teve vínculo empregatício.'),
                Input::make('cargo')->required()->label('Cargo')->help('Qual o nome da função dentro da empresa.'),
                Date::make('inicio')->label('Início')->help('Data inicial do seu contrato.'),
                Date::make('fim')->label('Fim')->help('Data final do seu contrato, caso ainda esteja na empresa deixar em branco'),
                Select::make('state_id')->label('Estado')->options($states->toArray())->optionLabel('title')->optionValue('id')->remoteRoot('data.uf')->id('state_id')->choices(false)->placeholder('Selecione um Estado'), 
                Select::make('city_id')->label('Cidade')->options($cidades->toArray())->optionLabel('title')->optionValue('id')->id('city_id')->placeholder('Selecione uma Cidade')->choices(false),
                Textarea::make('responsabiliade')->label('Responsabiliade')->autosize()->help('Nesse campo coloque as principais tarefas atribuídas a sua função'),
                Textarea::make('conquista')->required()->label('Conquistas')->autosize()->help('Nesse campo você deve colocar referências de ganhos conquistados pela empresa com a sua atuação, se preferir pode deixar em branco.'),
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
