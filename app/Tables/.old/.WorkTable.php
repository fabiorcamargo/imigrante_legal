<?php

namespace App\Tables;

use App\Models\UserWork;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class WorkTable extends AbstractTable
{

    public function __construct()
    {
        
    }

    public function authorize(Request $request)
    {
        return true;
    }

    public function for()
    {
        return UserWork::query()->where('user_id', auth()->user()->id);
    }

    public function configure(SpladeTable $table)
    {

        $colunas = new UserWork();
        //$table->withGlobalSearch(columns: ['id']);
        foreach($colunas->getCampos() as $coluna){
            $table->column($coluna, sortable: true);
        }
        $table->column('actions', label: 'Ação', alignment: 'right');
        

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
