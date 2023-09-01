<?php

namespace App\Tables;

use App\Models\User;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Kirschbaum\PowerJoins\PowerJoins;

class Users extends AbstractTable
{
    use PowerJoins;
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return User::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        
        $table
            ->withGlobalSearch(columns: ['name', 'email'])
            ->column('id', sortable: true)
            ->column('name', sortable: true)
            ->column(
                key: 'resume.state.id',
                label: 'Currículo'
            );

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
