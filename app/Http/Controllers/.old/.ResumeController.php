<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\States;
use App\Models\User;
use App\Models\UserResume;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\Splade\Components\Defer;
use ProtoneMedia\Splade\Components\Link;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;
use ProtoneMedia\Splade\FormBuilder\Button;
use ProtoneMedia\Splade\FormBuilder\Date;
use ProtoneMedia\Splade\FormBuilder\Email;
use ProtoneMedia\Splade\FormBuilder\File;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Number;
use ProtoneMedia\Splade\FormBuilder\Password;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\FormBuilder\Textarea;
use ProtoneMedia\Splade\SpladeForm;


class sdfResumeController extends Controller
{

    public static function rules(): array
    {
        return [
            'photo' => ['required', 'file'],
            'nome' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150'],
            'objetivo' => ['required', 'string', 'max:350'],
            'telefone' => ['required', 'string', 'min:10'],
            'skills' => ['required', 'array'],
            'nascimento' => ['required', 'date'],
            'state_id' => ['required', 'string', 'max:150'],
            'city_id' => ['required', 'string', 'max:150'],
        ];
    }

    public function show(UserResume $resume)
    {

        //dd($resume->skills);
        return view('resume.show.index', [
            'resume' => $resume,
        ]);
    }

    public function edit(UserResume $resume)
    {
        
        //dd($resume);
        $resume->photo = env('APP_URL') . '/' . $resume->photo;
        
        $resume->nascimento = Carbon::parse($resume->nascimento)->format('d-m-Y');
        //dd($resume);
        $states = States::orderBy('title')->select('title', 'id')->get();
        $cidades = City::orderBy('title')->select('title', 'id')->where('state_id', $resume->state_id)->get();

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

        $form = SpladeForm::make()
            ->id('form')

            ->confirm(
                confirm: 'Confirmação',
                text: 'Você realmente deseja atualizar as informações?',
                confirmButton: 'Sim',
                cancelButton: 'Não',
                danger: false,
            )

            ->action(route('resume.update', ['resume' => $resume]))
            ->class('space-y-4')
            ->fields([
                File::make('photo')->label('Insira uma Foto')
                    ->filepond() // Enables filepond
                    ->accept(['image/png', 'image/jpeg'])
                    ->preview(),
                Input::make('nome')->required()->label('Name Completo'),
                Date::make('nascimento')->label('Data de Nascimento'),
                Number::make('telefone')->label('Celular (insira o DDD e o número)')->prepend('+55'),
                Email::make('email')->required()->label('Email'),
                Select::make('state_id')->label('Estado')->options($states->toArray())->optionLabel('title')->optionValue('id')->remoteRoot('data.uf')->id('state_id')->placeholder('Selecione um Estado')->choices(false),
                Select::make('city_id')->label('Cidade')->options($cidades->toArray())->optionLabel('title')->optionValue('id')->id('city_id')->placeholder('Selecione uma Cidade')->choices(false),
                Select::make('skills')->label('Soft Skills (Escolha apenas 3)')->options($soft)->multiple()->choices(['searchEnabled' => false])->help('As habilidades interpessoais, também conhecidas como soft skills, são competências pessoais e sociais que são igualmente importantes, senão mais, do que as habilidades técnicas em muitos contextos. Escolha três Soft Skills que você mais se identifica para traçarmos o seu perfil:'),
                Textarea::make('objetivo')->label('Objetivo')->id('objetivo')->autosize()->help('Se precisar de ajuda com esse campo, clique em Exemplo de Objetivos abaixo para ver sugestões de como preencher esse campo, não esqueça de trocar as informações destacadas.'),
                Submit::make()->label('Salvar'),
            ])
            ->fill($resume);


        return view('resume.create', [
            'form' => $form
        ]);
    }

    public function update(Request $request, UserResume $resume)
    {

        $data = $request->validate(ResumeController::rules());

        HandleSpladeFileUploads::forRequest($request, 'photo');
        $path = $request->file('photo')->store('avatar/' . auth()->user()->id);

        $data = $request->all();
        $data['nascimento'] = Carbon::parse($data['nascimento']);
        $data['photo'] = $path;
        $request->replace($data);


        $resume->update($data);

        Toast::title('Currículo atualizado com sucesso!');

        return redirect()->back();
    }

    public function store(Request $request)
    {

        $data = $request->validate(ResumeController::rules());

        HandleSpladeFileUploads::forRequest($request, 'photo');

        $path = $request->file('photo')->store('avatar/' . auth()->user()->id);
        $data = $request->all();
        $data['nascimento'] = Carbon::parse($data['nascimento']);
        $data['photo'] = $path;
        $request->replace($data);

        $user = auth()->user();
        $user->resume()->create($data);

        Toast::title('Currículo criado com sucesso!');
        

        return redirect()->back();
        
    }


    public function create(Request $request)
    {
        if($resume = auth()->user()->resume()->first()){
            return redirect()->route('resume.dados', ['resume' => $resume]);
        }else{

        
        $states = States::orderBy('title')->select('title', 'id')->get();
        //  dd(($states->toArray())[0]['name']);
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

        $form = SpladeForm::make()
            ->id('form')
            ->action(route('resume.store'))
            ->class('space-y-4')
            ->fields([
                File::make('photo')->label('Insira uma Foto')
                    ->filepond() // Enables filepond
                    ->accept(['image/png', 'image/jpeg'])
                    ->preview(),
                Input::make('nome')->required()->label('Name Completo'),
                Date::make('nascimento')->label('Data de Nascimento'),
                Number::make('telefone')->label('Celular (insira o DDD e o número)')->prepend('+55'),
                Email::make('email')->required()->label('Email'),
                Select::make('state_id')->label('Estado')->options($states->toArray())->optionLabel('title')->optionValue('id')->remoteRoot('data.uf')->id('state_id')->choices(false)->placeholder('Selecione um Estado'), 
                Select::make('city_id')->label('Cidade')->id('city_id')->choices(false),
                Select::make('skills')->label('Soft Skills (Escolha apenas 3)')->options($soft)->multiple()->choices(['searchEnabled' => false])->help('As habilidades interpessoais, também conhecidas como soft skills, são competências pessoais e sociais que são igualmente importantes, senão mais, do que as habilidades técnicas em muitos contextos. Escolha três Soft Skills que você mais se identifica para traçarmos o seu perfil:'),
                Textarea::make('objetivo')->label('Objetivo')->id('objetivo')->autosize()->help('Se precisar de ajuda com esse campo, clique em Exemplo de Objetivos abaixo para ver sugestões de como preencher esse campo, não esqueça de trocar as informações destacadas.'),
                Submit::make()->label('Create'),
            ]);


        //dd($form);
        return view('resume.create', [
            'form' => $form,
        ]);
    }
    }

    public function create1(Request $request)
    {
        //dd($request->all());
        $skills = (json_encode($request->skills, true));

        $de = array('(', ')', ' ', '-');
        $para = array('', '', '', '');
        $telefone = '55' . str_replace($de, $para, $request->tel);
        //dd($telefone);

        Auth::user()->resume()->create([
            "nome" => $request->name,
            "nascimento" => $request->nascimento,
            "telefone" => $telefone,
            "email" => $request->email,
            "uf" => $request->state,
            "cidade" => $request->city,
            "skills" => $skills,
            "objetivo" => $request->objetivo,
        ]);

        $status = "Currículo criado com sucesso";
        return back()->with('status', __($status));
    }
    
}
