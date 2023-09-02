<?php

namespace App\Http\Controllers;

use App\Forms\CompanyForm;
use App\Models\Company;
use App\Tables\BaseTable;
use ProtoneMedia\Splade\Facades\SEO;

class CompanyController extends BaseController
{
    public function __construct()
    {
       

        $model = new Company();
        $table = new BaseTable($model);

        parent::__construct($model, new CompanyForm($model), $table, 'company.create', 'company.index', 'country.index');
    }

    public function show(string $id)
    {
        
        

        $data = $this->model::find($id);

        //dd($data);
        SEO::openGraphType('WebPage');
        SEO::openGraphSiteName(env('APP_NAME'));
        SEO::openGraphTitle(env('APP_NAME') . " | $data->nome" );
        SEO::openGraphUrl(request()->url());
        SEO::openGraphImage(asset($data->logo));


        return view('company.show', [
            'data' => $data ]);
    }

    
}