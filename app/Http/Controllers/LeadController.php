<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Tables\LeadTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        
        $data = $request->validate($this->model->rules());

        //dd($data);

        $response = $this->model->create($data);

        $fb = new FacebookApi();
        $event = $fb->lead($request, $data['email'], $data['telefone']);
    
        //dd($event);
        Toast::title('Criado com sucesso!')->autoDismiss(5);

        return redirect()->route('welcome', compact('event'));
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
