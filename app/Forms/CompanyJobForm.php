<?php

namespace App\Forms;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use App\Models\States;
use Illuminate\Database\Eloquent\Model;
use ProtoneMedia\Splade\FormBuilder\Date;
use ProtoneMedia\Splade\FormBuilder\File;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Number;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\FormBuilder\Textarea;
use ProtoneMedia\Splade\FormBuilder\Wysiwyg;
use ProtoneMedia\Splade\SpladeForm;

class CompanyJobForm extends Controller
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create($data){

        //dd($data);
        
        isset($data->logo) ? $data->logo = env('APP_URL') . '/' . $data->logo : "";
        isset($data->banner) ? $data->banner = env('APP_URL') . '/' . $data->banner : "";
        isset($data->post_img) ? $data->post_img = asset($data->post_img) : "";

        $data == [] ? $submit = 'Criar' : $submit = 'Salvar';
        $data == [] ? $viagem = 1 : $viagem = $data->viagem;
        $data == [] ? $mudanca = 1 : $mudanca = $data->mudanca;
        $data == [] ? $data['company_id'] = (request()->input('country')) : $data->company;

        $tipo = [
            "Estágio" => "Estágio",
            "Trainee" => "Trainee",
            "Efetivo" => "Efetivo"
        ];

        //dd($viagem);
        $states = States::orderBy('title')->select('title', 'id')->get();

        $cidades = City::orderBy('title')->select('title', 'id')->where('state_id', isset($data->state_id) ? $data->state_id : '')->get();

        $form = SpladeForm::make()
            ->fields([
            File::make('post_img')->label('Insira uma imagem')
            ->filepond() // Enables filepond
            ->accept(['image/png', 'image/jpeg', 'image/jpg', 'image/webp'])
            ->maxSize("2mb")
            ->preview(),
            Input::make('company_id')->hidden(),
            Input::make('nome')->required()->label('Título do Post'),
            Textarea::make('descricao')->required()->label('Descrição'),
            Wysiwyg::make('sobre')->label('Sobre'),
            Input::make('status')->label('Status'),

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
