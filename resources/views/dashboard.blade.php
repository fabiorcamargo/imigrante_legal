@seoTitle(__('Dashboard'))

<x-app-layout>

  <x-panel>   

   {{--}} @if(!isset(auth()->user()->resume()->first()->id))
    <div class="alert alert-info">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <span>Você ainda não criou um currículo.</span>
      <div>
        <a href="{{route('curriculo')}}" class="btn btn-sm btn-primary">Criar</a>
      </div>
    </div>
    @endif--}}
    

    <!-- component -->



    <div class="grid grid-cols-1 md:grid-cols-3 md:gap-2 pt-10">

      {{--<div class="col-span-1 p-2">
        <div class="card w-auto h-auto border bg-base-100 shadow-sm ">
          <div class="card-body">

            @if(auth()->user()->resume()->first())
            <div class="px-6">
              <div class="flex flex-wrap justify-center">
                  <div class="w-full flex justify-center">
                      <div class="relative">
                          <img src="{{asset(auth()->user()->resume()->first()->photo)}}" class="shadow-lg rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-[150px]"/>
                      </div>
                  </div>
                  <div class="w-full text-center mt-20">
                  
                  </div>
              </div>
              <div class="text-center mt-2">
                  <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">{{$resume->nome}}</h3>
                  <p class="font-light leading-relaxed text-slate-600 mb-4">{{'@'.$resume->username}}</p>
                  <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                      <i class="fas fa-map-marker-alt mr-2 text-slate-400 opacity-75"></i>{{
                        App\Models\City::find($resume->city_id)->title }} - {{
                        App\Models\States::find($resume->state_id)->letter
                        }}
                  </div>
              </div>
              <div class="mt-6 py-6 border-t border-slate-200 text-center">
                  <div class="flex flex-wrap justify-center">
                      <div class="w-full px-4">
                          <p class="font-light leading-relaxed text-slate-600 mb-4">{{$resume->objetivo}}</p>
                          {{--<a href="javascript:;" class="font-normal text-slate-700 hover:text-slate-400">Ver Currículo</a>
                      </div>
                  </div>
              </div>
          </div>
          @endif
            

            <a href="{{route('curriculo')}}" class="btn btn-sm ">
              Dados Pessoais
            </a>

            @if(isset(auth()->user()->resume()->first()->id))

            <a href="{{route('formacao.index')}}" class="btn btn-sm ">
              Formação
            </a>

            <a href="{{route('cursos.index')}}" class="btn btn-sm ">
              Cursos
            </a>

            <a href="{{route('empregos.index')}}" class="btn btn-sm ">
              Profissão
            </a>

            <a href="curriculo/{{$resume->username}}" class="btn btn-sm btn-outline btn-primary">
              Ver Currículo
              <x-heroicon-m-arrow-up-right class=" h-5"/>
            </a>

            <a href="pdf/{{$resume->username}}" target="_blank" class="btn btn-sm btn-outline btn-accent">
              
              <x-heroicon-m-document-arrow-down class=" h-5" />
              Baixar Currículo
              
            </a>

            @endif

          </div>
        </div>
      </div>--}}
      <div class="col-span-2 p-2">
        <div class="card w-auto h-auto border bg-base-100 shadow-sm">
          <div class="card-body">
            <x-welcome />

          </div>
        </div>
      </div>
    </div>
    <!-- component -->
    {{--<div class="pt-8 my-10 sm:hidden">
      <div class="max-w-md py-10 px-8 bg-white shadow-lg rounded-lg">
        <div>
          <h2 class="text-gray-800 text-3xl font-semibold">Criar Currículo</h2>
          <p class="mt-2 text-gray-600">Siga as orientações e crie o seu Currículo e compartilhe.</p>
        </div>
        <div class="flex justify-end mt-4">
          @php $resume = auth()->user()->resume()->first() @endphp
          <a href="{{ route('curriculo', ['resume' => $resume]) }}"
            class="text-xl font-medium text-indigo-500">Criar</a>
        </div>
      </div>
    </div>--}}


    {{--<div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <x-welcome />
        </div>
      </div>
    </div>--}}
  </x-panel>
  {{--}}
  <x-panel>
    <div class="bg-white">
      <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="sr-only">Products</h2>

        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
          <a href="#" class="group">
            <div
              class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
              <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg"
                alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                class="h-full w-full object-cover object-center group-hover:opacity-75">
            </div>
            <h3 class="mt-4 text-sm text-gray-700">Earthen Bottle</h3>
            <p class="mt-1 text-lg font-medium text-gray-900">$48</p>
          </a>
          <a href="#" class="group">
            <div
              class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
              <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg"
                alt="Olive drab green insulated bottle with flared screw lid and flat top."
                class="h-full w-full object-cover object-center group-hover:opacity-75">
            </div>
            <h3 class="mt-4 text-sm text-gray-700">Nomad Tumbler</h3>
            <p class="mt-1 text-lg font-medium text-gray-900">$35</p>
          </a>
          <a href="#" class="group">
            <div
              class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
              <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-03.jpg"
                alt="Person using a pen to cross a task off a productivity paper card."
                class="h-full w-full object-cover object-center group-hover:opacity-75">
            </div>
            <h3 class="mt-4 text-sm text-gray-700">Focus Paper Refill</h3>
            <p class="mt-1 text-lg font-medium text-gray-900">$89</p>
          </a>
          <a href="#" class="group">
            <div
              class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
              <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-04.jpg"
                alt="Hand holding black machined steel mechanical pencil with brass tip and top."
                class="h-full w-full object-cover object-center group-hover:opacity-75">
            </div>
            <h3 class="mt-4 text-sm text-gray-700">Machined Mechanical Pencil</h3>
            <p class="mt-1 text-lg font-medium text-gray-900">$35</p>
          </a>

          <!-- More products... -->
        </div>
      </div>
    </div>
  </x-panel>--}}
</x-app-layout>