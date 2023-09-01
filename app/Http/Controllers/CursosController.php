<?php

namespace App\Http\Controllers;

use App\Forms\CursoForm;
use App\Models\UserCourse;
use App\Tables\BaseTable;

class CursosController extends BaseController
{
    public function __construct()
    {
       

        $model = new UserCourse;
        $table = new BaseTable($model);

        parent::__construct($model, new CursoForm($model), $table, 'resume.base.create', 'resume.base.index', 'cursos.index');
    }
}
