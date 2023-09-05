<x-app-layout>
    <x-slot:header>
        <div class="text-sm breadcrumbs pb-8">
            <ul>
                <li><a href="{{route('welcome')}}">Início</a></li>
                <li><a href="{{route('country.show', ['country' => $data->getcompany()->first()->id])}}">{{$data->getcompany()->first()->nome}}</a></li>
                <li>{{ $data->nome }}</li>
            </ul>
        </div>
        </x-slot>


        <x-panel>

          <div class="col-span-1 p-2">
            <div class="card w-auto h-auto border bg-base-100 shadow-sm ">
              <div class="card-body">
    
                <div class="">
                  <div class="flex flex-wrap justify-center">
                      <div class="w-full flex justify-center">
                          <div class="relative">
                            <a href="{{route('country.show', ['country' => $data->getcompany()->first()->id])}}">
                            <x-img-responsive img="{{asset($data->getcompany()->first()->logo)}}" alt="{{asset($data->getcompany()->first()->nome)}}" class="object-cover rounded-md h-full w-full  md:h-80 md:w-auto"/>
                            
                                                  </a>
                          </div>
                      </div>
                      <div class="w-full text-center mt-8">
                      
                      </div>
                  </div>
                  <div class="text-center mt-2">
                      <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">{{$data->getcompany()->first()->nome}}</h3>
                      <p class="font-light leading-relaxed text-slate-600 mb-4">{{$data->getcompany()->first()->telefone}}</p>
                          <i class="fas fa-map-marker-alt mr-2 text-slate-400 opacity-75"></i>
                  </div>
                  <div class="mt-6 py-6 border-t border-slate-200 text-center">
                      <div class="flex flex-wrap justify-center">
                          <div class="w-full px-4">
                              <p class="">{!! $data->getcompany()->first()->sobre !!}</p>
                              {{--<a href="javascript:;" class="font-normal text-slate-700 hover:text-slate-400">Ver Currículo</a>--}}
                          </div>
                      </div>
                  </div>
              </div>
                
    
                <a href="/country/{{$data->getcompany()->first()->id}}" class="btn btn-sm ">
                  Detalhes do País
                </a>
    
              </div>
            </div>
          </div>

            <div class="col-span-1 p-2">
                <div class="card w-auto h-auto border bg-base-100 shadow-sm ">
                  <div class="card-body">
                    <h2 class="text-2xl text-center text-slate-700 font-bold leading-normal mb-1">{{ $data->nome }}</h2>
                    <div class="py-10">
                      <p >{!!$data->sobre!!}</p>
                      </div>
                  </div>
                </div>
            </div>
            
            
        </x-panel>
</x-app-layout>