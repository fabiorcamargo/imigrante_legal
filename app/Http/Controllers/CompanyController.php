<?php

namespace App\Http\Controllers;

use App\Forms\CompanyForm;
use App\Models\Company;
use App\Tables\BaseTable;

class CompanyController extends BaseController
{
    public function __construct()
    {
       

        $model = new Company();
        $table = new BaseTable($model);

        parent::__construct($model, new CompanyForm($model), $table, 'company.create', 'company.index', 'company.index');
    }

    public function show(string $id)
    {
        $data = $this->model::find($id);
        return view('company.show', [
            'data' => $data ]);
    }

    
}