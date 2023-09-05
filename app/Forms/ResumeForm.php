<?php

namespace App\Forms;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\States;
use Illuminate\Database\Eloquent\Model;
use ProtoneMedia\Splade\FormBuilder\Checkbox;
use ProtoneMedia\Splade\FormBuilder\Checkboxes;
use ProtoneMedia\Splade\FormBuilder\Date;
use ProtoneMedia\Splade\FormBuilder\Email;
use ProtoneMedia\Splade\FormBuilder\File;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Number;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\FormBuilder\Textarea;
use ProtoneMedia\Splade\SpladeForm;

class ResumeForm extends Controller
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create($data){

        //dd($data);
        $soft = [
            "Comunicação" => "Comunicação",
            "Trabalho em Equipe" => "Trabalho em Equipe",
            "Pensamento Crítico" => "Pensamento Crítico",
            "Criatividade" => "Criatividade",
            "Adaptabilidade" => "Adaptabilidade",
            "Resolução de Conflitos" => "Resolução de Conflitos",
            "Empatia" => "Empatia",
            "Inteligência Emocional" => "Inteligência Emocional",
            "Liderança" => "Liderança",
            "Habilidade de Resolução de Problemas" => "Habilidade de Resolução de Problemas",
            "Gerenciamento do Tempo" => "Gerenciamento do Tempo",
            "Adaptabilidade" => "Adaptabilidade",
            "Resiliência" => "Resiliência",
            "Habilidade de Networking" => "Habilidade de Networking",
            "Comunicação Digital" => "Comunicação Digital",
        ];

        isset($data->photo) ? $data->photo = env('APP_URL') . '/' . $data->photo : "";

        $data == [] ? $submit = 'Criar' : $submit = 'Salvar';
        $data == [] ? $viagem = 1 : $viagem = $data->viagem;
        $data == [] ? $mudanca = 1 : $mudanca = $data->mudanca;

        //dd($viagem);
        $states = States::orderBy('title')->select('title', 'id')->get();
        $cidades = City::orderBy('title')->select('title', 'id')->where('state_id', isset($data->state_id) ? $data->state_id : '')->get();
 
        $form = SpladeForm::make()
            ->fields([
                File::make('photo')->label('Insira uma Foto')
                    ->filepond((['imageCropAspectRatio' => '1:1'])) // Enables filepond
                    ->accept(['image/png', 'image/jpeg', 'image/webp'])
                    ->preview()
                    
                
                    ,
                Checkbox::make('viagem')->label("Disponibilidade para Viagens")->value($viagem),
                Checkbox::make('mudanca')->label("Disponibilidade para Mudança")->value($mudanca),
                Input::make('username')->required()->label('Usuário')->help('Username é como seu currículo será apresentado, será o nome exclusivo do seu currículo.'),
                Input::make('nome')->required()->label('Name Completo'),
                Date::make('nascimento')->label('Data de Nascimento'),
                Number::make('telefone')->label('Celular (insira o DDD e o número)')->prepend('+55'),
                Email::make('email')->required()->label('Email'),
                Select::make('state_id')->label('Estado')->options($states->toArray())->optionLabel('title')->optionValue('id')->remoteRoot('data.uf')->id('state_id')->placeholder('Selecione um Estado')->choices(false),
                Select::make('city_id')->label('Cidade')->options($cidades->toArray())->optionLabel('title')->optionValue('id')->id('city_id')->placeholder('Selecione uma Cidade')->choices(false),
                Select::make('skills')->label('Soft Skills (Escolha apenas 3)')->options($soft)->multiple()->choices(['searchEnabled' => false])->help('As habilidades interpessoais, também conhecidas como soft skills, são competências pessoais e sociais que são igualmente importantes, senão mais, do que as habilidades técnicas em muitos contextos. Escolha três Soft Skills que você mais se identifica para traçarmos o seu perfil:'),
                Textarea::make('objetivo')->label('Objetivo')->id('objetivo')->autosize()->help('Se precisar de ajuda com esse campo, clique em Exemplo de Objetivos abaixo para ver sugestões de como preencher esse campo, não esqueça de trocar as informações destacadas.'),
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
