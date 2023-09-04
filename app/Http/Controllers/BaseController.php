<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Can;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Number;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\SpladeForm;
use ProtoneMedia\Splade\SpladeTable;

class BaseController extends Controller
{

    protected $model;

    public function __construct(Model $model, Controller $form, AbstractTable $table, string $create_view, string $index_view, string $index)
    {
        $this->model = $model;
        $this->form = $form;
        $this->table = $table;
        $this->create_view = $create_view;
        $this->index_view = $index_view;
        $this->index = $index;
    }


    public function rules()
    {

        return ($this->rules);
    }


    public function index()
    {
        return view($this->index_view, ['table' => $this->table]);
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
        //dd($request->all());
        $data = $request->validate($this->model->rules());

        $data['user_id'] = auth()->user()->id;

        if (isset($data['photo'])) {
            HandleSpladeFileUploads::forRequest($request, 'photo');

            $path = $request->file('photo')->store('avatar/' . auth()->user()->id);
            $data['photo'] = $path;
        }

        if (isset($data['nascimento'])) {
            $data['nascimento'] = Carbon::parse($data['nascimento']);
        }

        if (isset($data['validade'])) {
            $data['validade'] = Carbon::parse($data['validade']);
        }

        //dd($data);

        $response = $this->model->create($data);

        if (isset($data['logo'])) {
            HandleSpladeFileUploads::forRequest($request, 'logo');
            $path = $request->file('logo')->storeAs('company_img/' . $response->id, $data['nome'] . '-logo.jpg');

            $response->logo = $path;
            $response->save();
        }

        if (isset($data['banner'])) {
            HandleSpladeFileUploads::forRequest($request, 'banner');
            $path = $request->file('banner')->storeAs('company_img/' . $response->id, $data['nome'] . '-banner.jpg');

            $response->banner = $path;
            $response->save();
        }

        if (isset($data['post_img'])) {
            HandleSpladeFileUploads::forRequest($request, 'post_img');
            $path = $request->file('post_img')->storeAs('post_img/' . $response->id, $data['nome'] . '-post_img.jpg');

            $response->post_img = $path;
            $response->save();
        }



        Toast::title('Criado com sucesso!')->autoDismiss(5);

        return redirect()->route($this->index, ['table' => $this->table]);
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


        if (isset($data['logo'])) {
            HandleSpladeFileUploads::forRequest($request, 'logo');

            $up->logo !== null ? Storage::delete($up->logo) : '';

            $path = $request->file('logo')->storeAs('company_img/' . $id, $data['nome'] . '-logo.jpg');
            $data['logo'] = $path;
        }

        if (isset($data['banner'])) {
            HandleSpladeFileUploads::forRequest($request, 'banner');

            $up->banner !== null ? Storage::delete($up->banner) : '';

            $path = $request->file('banner')->storeAs('company_img/' . $id, $data['nome'] . '-banner.jpg');
            $data['banner'] = $path;
        }

        if (isset($data['post_img'])) {
            HandleSpladeFileUploads::forRequest($request, 'post_img');

            $up->post_img !== null ? Storage::delete($up->post_img) : '';
            $path = $request->file('post_img')->storeAs('post_img/' . $id, $data['nome'] . '-post_img.jpg');

            $data['post_img'] = $path;
        }

        //dd($data);

        if (isset($data['photo'])) {

            HandleSpladeFileUploads::forRequest($request, 'photo');
            Storage::delete($up->photo);


            $path = $request->file('photo')->store('avatar/' . auth()->user()->id);
            $data['photo'] = $path;
        }

        /*if (isset($data['logo'])) {
            HandleSpladeFileUploads::forRequest($request, 'logo');
            Storage::deleteDirectory('empresas/' . $id);

            //dd('d');
            $path = $request->file('logo')->store('empresas/' . $id);
            $data['logo'] = $path;
        }*/

        if (isset($data['nascimento'])) {
            $data['nascimento'] = Carbon::parse($data['nascimento']);
        }

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
