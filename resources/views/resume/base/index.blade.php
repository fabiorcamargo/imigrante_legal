@seoTitle(__('Criar Currículo'))

<x-app-layout>
    <x-slot:header>
        <div class="text-sm breadcrumbs pb-8">
            <ul>
                <li><a href="{{route('dashboard')}}">Painel</a></li>
                <li>{!! ucfirst(Request::segment(1)) !!}</li>
            </ul>
        </div>

        </x-slot>


        <x-panel>
            

            <h2 class="font-semibold text-xl text-gray-800 leading-tight  pb-4">
                {{ __('Criar Currículo') }}
            </h2>

        
            @isset(auth()->user()->resume()->first()->id)

            <x-nav-resume resume="{{auth()->user()->resume()->first()->id}}"></x-nav-resume>

    @endisset
   



            <x-splade-table :for="$table">

                <x-splade-cell state_id>
                    <p>{{App\Models\States::find($item->state_id)->title}}</p>
                </x-splade-cell>

                <x-splade-cell city_id>
                    <p>{{App\Models\City::find($item->city_id)->title}}</p>
                </x-splade-cell>

                <x-splade-cell actions>
                    <Link href="{{url()->current()}}/{{$item->id}}/edit">
                    <x-heroicon-o-pencil-square class="w-5 text-blue-500" />
                    </Link>
                    <x-splade-form action="{{url()->current()}}/{{$item->id}}" confirm="Excluir?"
                        confirm-text="Você realmente deseja excluir?" confirm-button="Sim, quero excluir!"
                        cancel-button="Não, cancelar!" method="delete">
                        <button class="text-red-500 px-4" type="submit">
                            <x-heroicon-o-trash class="w-5 text-red-500" />
                        </button>
                    </x-splade-form>
                </x-splade-cell>

            </x-splade-table>

            <div class="flex flex-row justify-end mt-8 px-3 -mr-2 sm:-mr-3">
                <Link class="btn btn-primary btn-outline animate-shake animate-delay-[3000ms] animate-duration-[2s]"
                    href="{{url()->current()}}/create">
                Novo
                </Link>
            </div>


        </x-panel>



</x-app-layout>