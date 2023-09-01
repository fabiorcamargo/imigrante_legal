<?php

namespace App\Tables;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class BaseTable extends AbstractTable
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
            $label = $coluna;
            $coluna == 'state_id' ? $label = 'Estado' : '';
            $coluna == 'city_id' ? $label = 'Cidade' : '';
            
            if($coluna == "user_id"){

            }else{
                $table->column(
                    key: $coluna, 
                    sortable: true, 
                    label: $label,
                );
            }
            
            
        }
        $table->column('actions', label: 'Ação', alignment: 'center');
        

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
