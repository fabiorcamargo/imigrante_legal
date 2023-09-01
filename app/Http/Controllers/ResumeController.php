<?php

namespace App\Http\Controllers;

use App\Forms\ResumeForm;
use App\Models\UserResume;
use App\Tables\BaseTable;

class ResumeController extends BaseController
{
    public function __construct($id = null)
    {
        

        $model = new UserResume();
        $table = new BaseTable($model);
       

        parent::__construct($model, new ResumeForm($model), $table, 'resume.base.create', 'resume.base.index', 'curriculo');
    }

    public function first(){

      if(isset(auth()->user()->resume()->first()->id)){
        return redirect(route('resume.edit', ['resume' => (auth()->user()->resume()->first()->id)]));
        
      }else{
        return redirect(route('resume.create'));
      }
        
    }
}
