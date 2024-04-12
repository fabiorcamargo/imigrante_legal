<?php

namespace App\Http\Controllers;

use App\Jobs\MauticForm;
use App\Models\City;
use App\Models\Lead;
use App\Models\States;
use App\Tables\LeadTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Normalizer;
use ProtoneMedia\Splade\Facades\Toast;

class LeadController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new Lead();
        $this->table = new LeadTable();
        $this->index_view = 'company.job.index';
    }

    public function rules()
    {

        return ($this->rules);
    }


    public function index()
    {
        if (Auth::check()) {
        return view($this->index_view, ['users' => $this->table]);

        } else {
            return redirect()->route('welcome');
        }
    }


    public function create()
    {

        if (Auth::check()) {

            if (auth()->user()->hasPermissionTo('admin')) {
                return view($this->create_view, [
                    'form' => $this->form->create([]),
                ]);
            }
        } else {
            return redirect()->route('welcome');
        }
    }


    public function store(Request $request)
    {
       
        $customMessages = [
            'telefone.min' => 'Por favor insira o telefone com DDD e o 9 adicional conforme o exemplo (11) 9 98765-4321.'
        ];

        //dd($request->validate($this->model->rules(), $customMessages));

        $data = $request->validate($this->model->rules(), $customMessages);

        $data['telefone'] = "55" .   preg_replace('/[^A-Za-z0-9]/', '', $data['telefone']);

        $state = (States::find($data['state_id'])->title);

        $normalizedString = Normalizer::normalize($state, Normalizer::FORM_D);

        $estado = preg_replace('/[^a-zA-Z0-9]/', '', $normalizedString); 
        
        $response = $this->model->create($data);

        // $mauticForm = [
        //     "mauticform" => 
        //     [
        //     "nome" => $data['nome'],
        //     "sobrenome" => $data['nome'],
        //     "email" => $data['email'],
        //     "telefone1" => $data['telefone'],
        //     "submit" => "1",
        //     "formId" => "2",
        //     "return" => null,
        //     "formName" => "imigrante1"
        //     ]
        // ];

        // dd(Http::post('https://imi.meusestudosead.com.br/form/submit?formId=1', $mauticForm));

        // dispatch(new MauticForm($mauticForm, $response));

        //$fb = new FacebookApi();

        $modalsuccess = 'teste';

        Toast::title('Cadastro realizado com sucesso!')->autoDismiss(5);
//dd(route('welcome', compact('event')));
        return redirect()->route('welcome', compact('modalsuccess'));
    }





    public function edit(string $id)
    {
        if (Auth::check()) {
            if (auth()->user()->hasPermissionTo('admin')) {
                $data = $this->model::find($id);

                return view($this->create_view, [
                    'form' => $this->form->create($data)
                ]);
            }
        } else {
            return redirect()->route('welcome');
        }
    }


    public function update(Request $request, string $id)
    {

        //dd($request->all());
        $data = $request->validate($this->model->rules($id));

        $up = $this->model->find($id);

        //dd($up->logo);
      

        $up->update($data);

        Toast::title('Salvo com sucesso!')->autoDismiss(5);

        return redirect()->route($this->index, ['table' => $this->table]);
    }


    public function destroy(string $id)
    {
        if (Auth::check()) {


            if (auth()->user()->hasPermissionTo('admin')) {
                $data = $this->model->find($id);

                $data->delete();

                Toast::title('Excluído com sucesso!')->autoDismiss(5);

                return back();
            }
        } else {
            return redirect()->route('welcome');
        }
    }
}
