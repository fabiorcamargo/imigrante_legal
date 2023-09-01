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

class LeadTable  extends AbstractTable
{

 

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
                        ->where('title', 'like', "%{$value}%");
                        //->orWhere('nome', 'LIKE', "%{$value}%")
                        //->orWhere('email', 'LIKE', "%{$value}%")
                        //->orWhere('state_id', 'LIKE', "%{$value}%");
                        
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

        $colunas = new Lead();
        foreach($colunas->getCampos() as $coluna){
            $label = $coluna;
           
            if($coluna == "user_id" || $coluna == "state_id" || $coluna == "city_id"){

            }else{
                $table->column(
                    key: $coluna, 
                    sortable: true, 
                    label: $label,
                );
            }

            $state = new States();
            $city = new City();
    
            $table->column(
                key: 'city_id',
                as: fn ($reference) => "{$city->find($reference)->title}",
                label: 'Cidade'
            );
            $table->column(
                key: 'state_id',
                as: fn ($reference) => "{$state->find($reference)->title}",
                label: 'Estado'
            );

            
        }
        //$table->column('actions', label: 'Ação', alignment: 'center');
        $table->withGlobalSearch();
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

    $table->export();

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}