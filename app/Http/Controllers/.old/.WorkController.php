<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\States;
use App\Models\User;
use App\Models\UserCourse;
use App\Models\UserWork;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FormBuilder\Date;
use ProtoneMedia\Splade\FormBuilder\Email;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Number;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Textarea;
use ProtoneMedia\Splade\SpladeForm;
use ProtoneMedia\Splade\SpladeTable;

class dfWorkController extends Controller
{

    public static function rules(): array
    {
        return [
            'empresa' => ['required', 'string', 'max:150'],
            'cargo' => ['required', 'string', 'max:150'],
            'inicio' => ['required', 'date'],
            'fim' => ['date'],
            'state_id' => ['required', 'string', 'max:150'],
            'city_id' => ['required', 'string', 'max:150'],
            'responsabiliade' => ['required', 'string', 'max:150'],
            'conquista' => ['string', 'max:150'],
        ];
    }
    public function store(Request $request)
    {
        $data = $request->validate($this::rules());

        $user = auth()->user();
        $user->trabalhos()->create($data);

        Toast::title('Curso criado com sucesso!')
        ->autoDismiss(5);
        

        return redirect()->back();
    }

    public function update(Request $request, UserWork $work)
    {

        dd($request->all());
        $data = $request->validate($this::rules());
        

        $work->update($data);

        Toast::title('Curso atualizado com sucesso!')
        ->autoDismiss(5);;
        

        return redirect()->route('empregos.create');
    }

    public function delete(UserWork $work){
        
        $work->delete();

        Toast::danger('Curso deletado com sucesso!')
        ->autoDismiss(5);
        

        return redirect()->back();
    }

    public function create()
    {

        $states = States::orderBy('title')->select('title', 'id')->get();
        
        $form = SpladeForm::make()
            ->id('form')
            ->action(route('empregos.store'))
            ->class('space-y-4')
            ->fields([
                Input::make('empresa')->required()->label('Empresa')->help('Nome comercial da empresa onde você teve vínculo empregatício.'),
                Input::make('cargo')->required()->label('Cargo')->help('Qual o nome da função dentro da empresa.'),
                Date::make('inicio')->label('Início')->help('Data inicial do seu contrato.'),
                Date::make('fim')->label('Fim')->help('Data final do seu contrato, caso ainda esteja na empresa deixar em branco'),
                Select::make('state_id')->label('Estado')->options($states->toArray())->optionLabel('title')->optionValue('id')->remoteRoot('data.uf')->id('state_id')->choices(false)->placeholder('Selecione um Estado'), 
                Select::make('city_id')->label('Cidade')->id('city_id')->choices(false),
                Textarea::make('responsabiliade')->label('Responsabiliade')->autosize()->help('Nesse campo coloque as principais tarefas atribuídas a sua função'),
                Textarea::make('conquista')->required()->label('Conquistas')->autosize()->help('Nesse campo você deve colocar referências de ganhos conquistados pela empresa com a sua atuação, se preferir pode deixar em branco.'),
                Submit::make()->label('Salvar'),
            ]);

            
            return view('resume.cursos.create_table', [  
                'users' => SpladeTable::for(UserWork::where('user_id', auth()->user()->id))
                ->column('empresa', sortable: true)
                ->column('cargo', sortable: true)
                
                ->column('inicio', sortable: true)
                ->column('fim', sortable: true)
                ->column('actions', label: 'Ação', alignment: 'right')
                ->paginate(15),    

            ], [
                'form' => $form,
                
            ]);

            //dd($form);
        return view('resume.cursos.create_table', [
            'form' => $form,
            
        ]);
    } 
    

    public function edit(UserWork $work)
    {

        $states = States::orderBy('title')->select('title', 'id')->get();
        $cidades = City::orderBy('title')->select('title', 'id')->where('state_id', $work->state_id)->get();

        $form = SpladeForm::make()
        ->id('form')
        ->action(route('empregos.update', ['work' => $work]))
        ->class('space-y-4')
        ->fields([
            Input::make('empresa')->required()->label('Empresa')->help('Nome comercial da empresa onde você teve vínculo empregatício.'),
            Input::make('cargo')->required()->label('Cargo')->help('Qual o nome da função dentro da empresa.'),
            Date::make('inicio')->label('Início')->help('Data inicial do seu contrato.'),
            Date::make('fim')->label('Fim')->help('Data final do seu contrato, caso ainda esteja na empresa deixar em branco'),
            Select::make('state_id')->label('Estado')->options($states->toArray())->optionLabel('title')->optionValue('id')->remoteRoot('data.uf')->id('state_id')->choices(false)->placeholder('Selecione um Estado'), 
            Select::make('city_id')->label('Cidade')->options($cidades->toArray())->optionLabel('title')->optionValue('id')->id('city_id')->placeholder('Selecione uma Cidade')->choices(false),
            Textarea::make('responsabiliade')->label('Responsabiliade')->autosize()->help('Nesse campo coloque as principais tarefas atribuídas a sua função'),
            Textarea::make('conquista')->required()->label('Conquistas')->autosize()->help('Nesse campo você deve colocar referências de ganhos conquistados pela empresa com a sua atuação, se preferir pode deixar em branco.'),
            Submit::make()->label('Salvar'),
        ])->fill($work);

        return view('resume.cursos.cursos', [ 
            'form' => $form,
        ]);
    } 
}
