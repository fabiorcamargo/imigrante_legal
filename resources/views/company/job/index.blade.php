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
                {{ __( "Empresas" ) }}
            </h2>

            @if(request()->routeIs('resume.*'))
                <x-nav-resume resume="{{auth()->user()->resume()->first()->id}}"></x-nav-resume>
            @endif



            <x-splade-table :for="$users" />
               
                
           

            <div class="flex flex-row justify-end mt-8 px-3 -mr-2 sm:-mr-3">
                <Link class="btn btn-primary btn-outline animate-shake animate-delay-[3000ms] animate-duration-[2s]"
                    href="{{url()->current()}}/create">
                Novo
                </Link>
            </div>


        </x-panel>



</x-app-layout>