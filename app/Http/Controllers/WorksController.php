<?php

namespace App\Http\Controllers;

use App\Forms\WorkForm;
use App\Models\UserWork;
use App\Tables\BaseTable;
use App\Tables\UserCourseTable;
use App\Tables\WorkTable;

class WorksController extends BaseController
{
    public function __construct()
    {
       

        $model = new UserWork();
        $table = new BaseTable($model);

        parent::__construct($model, new WorkForm($model), $table, 'resume.base.create', 'resume.base.index', 'empregos.index');
    }
}
