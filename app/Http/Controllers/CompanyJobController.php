<?php

namespace App\Http\Controllers;

use App\Forms\CompanyJobForm;
use App\Models\CompanyJob;
use App\Tables\BaseTable;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\SEO;

class CompanyJobController extends BaseController
{
    public function __construct()
    {
       

        $model = new CompanyJob();
        $this->model = $model;
        $table = new BaseTable($model);

        parent::__construct($model, new CompanyJobForm($model), $table, 'company.create', 'country.index', 'post.index');
    }

    public function show(string $id)
    {
        $data = $this->model::find($id);

        //dd($data);
        SEO::openGraphType('WebPage');
        SEO::openGraphSiteName(env('APP_NAME'));
        SEO::openGraphTitle(env('APP_NAME') . " | $data->nome" );
        SEO::description($data->descricao);
        SEO::openGraphUrl(request()->url());
        SEO::openGraphImage(asset($data->post_img));

        return view('company.job.show', [
            'data' => $data ]);
    }
}
