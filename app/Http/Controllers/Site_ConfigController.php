<?php

namespace App\Http\Controllers;

use App\Forms\ConfigForm;
use App\Models\ConfigSite;
use App\Tables\BaseTable;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;

class Site_ConfigController extends BaseController
{
    public function __construct()
    {
        $model = new ConfigSite();
        $table = new BaseTable($model);
        parent::__construct($model, new ConfigForm($model), $table, 'company.create', 'company.index', 'site_config.index');
    }

    public function store(Request $request)
    {
        
        $data = $request->validate($this->model->rules());

        $data['user_id'] = auth()->user()->id;

        if (isset($data['banner1'])) {
        HandleSpladeFileUploads::forRequest($request, 'banner1');
        $path = (parent::imgV($request->file('banner1'), 'storage/assets/img/banners', "banner1"));
        $data['body'] = json_encode(['banner1' => $path]);
        $this->model->create($data);
        
        Toast::title('Criado com sucesso!')->autoDismiss(5);

        return redirect()->route($this->index, ['table' => $this->table]);
        }
    }

    public function update(Request $request,    $id)
    {
        $data = $request->validate($this->model->rules($id));
        $up = $this->model->find($id);
        //dd(json_decode($up->body)->banner1);

        if (isset($data['banner1'])) {
            HandleSpladeFileUploads::forRequest($request, 'banner1');
            $up->banner !== null ? parent::del_imgV(json_decode($up->body)->banner1) : '';
            //storage/app/public/assets/img
            $path = (parent::imgV($request->file('banner1'), 'public/assets/img/banners', "banner1"));
            
            $data['body'] = json_encode(['banner1' => str_replace('public', 'storage', $path)]);
        }

        $up->update($data);

        Toast::title('Salvo com sucesso!')->autoDismiss(5);

        return redirect()->route($this->index, ['table' => $this->table]);
       
    }
}