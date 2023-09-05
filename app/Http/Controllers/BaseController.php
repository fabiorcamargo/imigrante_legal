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
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

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
        $this->rules = $this->model->rules();

        return $this->rules;
    }

    public function imgV($imagemOriginal, $path, $name)
        {
            // Crie uma versão pequena da imagem (por exemplo, 300x200 pixels)
            
            $imagemPequena = Image::make($imagemOriginal)->resize(480, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            //dd($path);
            $pathPequena = $path ."/x300". $name. ".webp";
            
            Storage::put($pathPequena, (string)$imagemPequena->encode('webp'));

            // Crie uma versão média da imagem (por exemplo, 600x400 pixels)
            $imagemMedia = Image::make($imagemOriginal)->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $pathMedia = $path ."/x600". $name.".webp";
            Storage::put($pathMedia, (string)$imagemMedia->encode('webp'));

            // Crie uma versão grande da imagem (por exemplo, 1200x800 pixels)
            $imagemGrande = Image::make($imagemOriginal)->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $pathGrande = $path ."/x1200". $name.".webp";
            Storage::put($pathGrande, (string)$imagemGrande->encode('webp'));

            // Crie uma versão original da imagem (por exemplo, 1200x800 pixels)
            $original = Image::make($imagemOriginal);
            $pathoriginal = $path ."/". $name.".webp";
            Storage::put($pathoriginal, (string)$original->encode('webp'));

            return $pathoriginal;
        }

        public function del_imgV($img)
        {
            $directory = pathinfo($img, PATHINFO_DIRNAME);
            $nomeDoArquivo = basename($img);

            Storage::delete("$directory/x300$nomeDoArquivo");
            Storage::delete("$directory/x600$nomeDoArquivo");
            Storage::delete("$directory/x1200$nomeDoArquivo");
            
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
            $logo = ($this->imgV($request->file('logo'), 'company_img/' . $response->id, str_replace(" ","",$data['nome']."logo")));
            $response->logo = $logo;
            $response->save();
        }

        if (isset($data['banner'])) {
            HandleSpladeFileUploads::forRequest($request, 'banner');
            $banner = ($this->imgV($request->file('logo'), 'company_img/' . $response->id, str_replace(" ","",$data['nome']."banner")));
            $response->banner = $banner;
            $response->save();
        }

        if (isset($data['post_img'])) {
            HandleSpladeFileUploads::forRequest($request, 'post_img');

            $post_img = ($this->imgV($request->file('post_img'), 'company_img/' . $response->id, str_replace(" ","",$data['nome']."post_img")));
            $response->post_img = $post_img;
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

            $up->logo !== null ? $this->del_imgV($up->logo) : '';
            $path = ($this->imgV($request->file('logo'), 'company_img/' . $up->id, str_replace(" ", "", $data['nome']."logo")));
            $data['logo'] = $path;
        }

        if (isset($data['banner'])) {
            HandleSpladeFileUploads::forRequest($request, 'banner');

            $up->banner !== null ? $this->del_imgV($up->banner) : '';
            $path = ($this->imgV($request->file('banner'), 'company_img/' . $up->id, str_replace(" ", "", $data['nome']."banner")));

            $data['banner'] = $path;
        }

        if (isset($data['post_img'])) {
            HandleSpladeFileUploads::forRequest($request, 'post_img');

            $up->post_img !== null ? $this->del_imgV($up->post_img) : '';
            $path = ($this->imgV($request->file('post_img'), 'company_img/' . $up->id, str_replace(" ", "", $data['nome']."post_img")));

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
