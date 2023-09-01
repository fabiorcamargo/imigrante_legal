<?php

namespace App\Tables;

use App\Models\City;
use App\Models\Lead;
use App\Models\States;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class LeadTable3 extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct(Lead $model)
    {
        $this->model = $model;

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

    public function for()
    {

     
        
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {

            
            $query->whereHas('cities', function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->where('title', 'like', "%{$value}%")
                        ->orWhere('nome', 'LIKE', "%{$value}%")
                        ->orWhere('email', 'LIKE', "%{$value}%")
                        ->orWhere('state_id', 'LIKE', "%{$value}%");
                });
            });
        });
 
        return QueryBuilder::for(Lead::class)
            ->defaultSort('nome')
            ->allowedSorts(['nome', 'email', 'state_id'])
            ->allowedFilters(['nome', 'email', 'state_id', $globalSearch]);
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
        $table->withGlobalSearch();
        $table->column('actions', label: 'Ação', alignment: 'center');
        $table->paginate(10);
        $table->selectFilter(key: 'state_id', label: 'Estado', options: [
                '1' => 'Acre',
                '2' => 'Alagoas',
                '3' => 'Amazonas',
                '4' => 'Amapá',
                '5' => 'Bahia',
                '6' => 'Ceará',
                '7' => 'Distrito Federal',
                '8' => 'Espírito Santo',
                '9' => 'Goiás',
                '10' => 'Maranhão',
                '11' => 'Minas Gerais',
                '12' => 'Mato Grosso do Sul',
                '13' => 'Mato Grosso',
                '14' => 'Pará',
                '15' => 'Paraiba',
                '16' => 'Pernambuco',
                '17' => 'Piauí',
                '18' => 'Paraná',
                '19' => 'Rio de Janeiro',
                '20' => 'Rio Grande do Norte',
                '21' => 'Rondônia',
                '22' => 'Roraima',
                '23' => 'Rio Grande do Sul',
                '24' => 'Santa Catarina',
                '25' => 'Sergipe',
                '26' => 'São Paulo',
                '27' => 'Tocantins',
        ]);

        $state = new States();
        $city = new City();

        $table->column(
            key: 'city_id',
            as: fn ($reference) => "{$city->find($reference)->title}"
        );

        $table->column('city_id', exportAs: fn ($reference) => "{$city->find($reference)->title}");
        $table->column('state_id', exportAs: fn ($reference) => "{$state->find($reference)->title}");

        $table->export();
        
        

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
