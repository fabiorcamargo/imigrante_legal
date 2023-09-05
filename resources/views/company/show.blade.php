<x-app-layout>
    <x-slot:header>
        <div class="text-sm breadcrumbs pb-8">
            <ul>
                <li><a href="{{route('welcome')}}">Início </a></li>
                <li>{{ $data->nome }}</li>
            </ul>
        </div>
        </x-slot>


        <x-panel>



            <div class="col-span-1 p-2">
                <div class="card w-auto h-auto border bg-base-100 shadow-sm">
                    <div class="card-body">
                        <div class="lg:px-28">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full flex justify-center">
                                    <div class="relative">
                                        
                                        <x-img-responsive img="{{$data->logo}}" alt="{{$data->nome}}" class="object-cover rounded-md h-full w-full  md:h-80 md:w-auto"/>
                                       
                                    </div>
                                </div>
                                <div class="w-full text-center mt-10">
                                </div>
                            </div>
                            <div class="text-center mt-2">
                                <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-4">{{$data->nome}}
                                </h3>
                                <p>{!!$data->sobre!!}</p>
                                <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                                    <i class="fas fa-map-marker-alt mr-2 text-slate-400 opacity-75"></i>
                                </div>
                            </div>
                            <div class="mt-6 py-6 border-t border-slate-200 text-center">
                                <div class="flex flex-wrap justify-center">
                                    <div class="w-full">
                                        {{--<p class="font-light leading-relaxed text-slate-600 mb-4">{{$data->nome}}
                                        </p>--}}
                                        {{--<a href="javascript:;"
                                            class="font-normal text-slate-700 hover:text-slate-400">Ver
                                            Currículo</a>--}}
                                            
                                            <x-img-responsive img="{{$data->banner}}" alt="{{$data->nome}}" class="object-cover rounded-md sm:h-80 w-full"/>
                                        {{--<img class="object-cover rounded-md h-80 w-full"
                                            src="{{$data->banner !== null ? asset($data->banner) : 'https://brangels.global/wp-content/uploads/2022/11/depositphotos_27064101-stock-photo-modern-architecture-in-la-defense.webp'}}"
                                            alt="{{$data->nome}}">--}}


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-span-1 p-2">
                <div class="card w-auto h-auto border bg-white shadow-sm ">
                    <div class="text-center mt-10">
                        <h2 class="text-2xl text-slate-700 font-bold leading-normal mb-1">Posts sobre {{$data->nome}}</h2>
                    </div>
                    <div class="">
                        

                        <div class="mx-auto  px-4 py-20 sm:px-6 sm:pt-24 sm:pb-12  lg:px-8">
                            <div class="grid grid-cols-1 gap-x-6 gap-y-20 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">
                                @foreach ($data->jobs()->get() as $jobs)

                                <a href="/post/{{$jobs->id}}" class="rounded-lg">
                                    <div class="group relative">
                                        <div aria-hidden="true"
                                            class="absolute top-0 w-full h-full rounded-2xl bg-white drop-shadow-lg border-2 border-gray-100/75  transition duration-500 group-hover:scale-105">
                                        </div>
                                        <div
                                            class="relative p-4 md:rounded-r-2xl transition duration-500 group-hover:scale-105 text-gray-800 hover:text-indigo-600 ">
                                            <!-- component -->
                                            <div class="flex justify-center -mt-16">
                                                <x-img-responsive img="{{$jobs->post_img}}" alt="{{$jobs->nome}}" class="w-100 h-100 object-cover rounded-md"/>
                                                
                                            </div>
                                            <div class="text-sm leading-5 pt-2 font-medium text-center">
                                                <div class="">
                                                   
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="text-gray-800 pt-4 text-xl font-semibold text-center">
                                                    {{($jobs->nome)}}</h2>
                                                <p class="mt-2 text-gray-600 text-center">{{$jobs->descricao}}</p>
                                            </div>

                                        </div>

                                    </div>
                                </a>

                               
                                @endforeach

                                

                                <!-- More products... -->
                            </div>
                        </div>


                        @can('admin')
                        <div class="text-center pb-10">
                            <a href="{{route('post.create', ['country' => $data->id])}}" class="btn btn-primary">Criar
                                Post</a>
                        </div>
                        @endcan
                    </div>

                </div>

            </div>


        </x-panel>
</x-app-layout>