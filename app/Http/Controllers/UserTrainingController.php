<?php

namespace App\Http\Controllers;

use App\Forms\TrainingForm;
use App\Models\UserTraining;
use App\Tables\BaseTable;

class UserTrainingController extends BaseController
{
    public function __construct()
    {
        
        

        $model = new UserTraining();
        $table = new BaseTable($model);

        parent::__construct($model, new TrainingForm($model), $table, 'resume.base.create', 'resume.base.index', 'formacao.index');
    }
}
