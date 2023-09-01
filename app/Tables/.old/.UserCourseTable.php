<?php

namespace App\Tables;

use App\Models\UserCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class UserCourseTable extends AbstractTable
{

    public function __construct(Model $model)
    {
        $this->model = $model;

    }

    public function authorize(Request $request)
    {
        return true;
    }

    public function for()
    {
        return $this->model->query()->where('user_id', auth()->user()->id);
    }

    public function configure(SpladeTable $table)
    {

        $colunas = $this->model;
        //$table->withGlobalSearch(columns: ['id']);
        foreach($colunas->getCampos() as $coluna){
            if($coluna == 'user_id'){

            }else{
                $table->column($coluna, sortable: true);
            }
        }
        $table->column('actions', label: 'Ação', alignment: 'right');
        

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
