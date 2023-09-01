<?php

namespace App\Http\Controllers;

use App\Forms\CompanyJobForm;
use App\Models\CompanyJob;
use App\Tables\BaseTable;
use Illuminate\Http\Request;

class CompanyJobController extends BaseController
{
    public function __construct()
    {
       

        $model = new CompanyJob();
        $this->model = $model;
        $table = new BaseTable($model);

        parent::__construct($model, new CompanyJobForm($model), $table, 'company.create', 'company.index', 'vagas.index');
    }

    public function show(string $id)
    {
        $data = $this->model::find($id);
        return view('company.job.show', [
            'data' => $data ]);
    }
}
