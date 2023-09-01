<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{--
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />--}}
    <link href="/css/app.css" rel="stylesheet">

    <title>Certificado</title>

</head>




<div class=" container">

    <div class="card-body">

        <div class="flex flex-wrap justify-center">


            <div class=""
                style=" margin: 0 auto; width: 200px; height: 200px; background-repeat: no-repeat; background-size: contain; background-image: url({{'data:image/png;base64,'.base64_encode(file_get_contents(public_path($resume->photo)))}})">
            </div>


        </div>
        <div class="text-center mt-2">
            <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">{{$resume->nome}}</h3>
            <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                <i class="fas fa-map-marker-alt mr-2 text-slate-400 opacity-75"></i>{{
                App\Models\City::find($resume->city_id)->title }} - {{
                App\Models\States::find($resume->state_id)->letter
                }}
            </div>
        </div>
        <div class="mt-6 py-6 text-center">
            <div class="flex flex-wrap justify-center">
                <div class="w-full">
                    {{--<a href="javascript:;" class="font-normal text-slate-700 hover:text-slate-400">Ver
                        Currículo</a>--}}
                </div>

                <div class="pt-4">
                    @if($resume->viagem == "1")
                    <div class="badge badge-accent mx-1">Disponível para Viagem</div>
                    @endif
                    @if($resume->mudanca == "1")
                    <div class="badge badge-accent mx-1">Disponível para Mudança</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="w-auto h-auto  bg-base-100 shadow-sm ">
    <div class="">

        <section id="about" class="about">
            <div class="">

                <div class="w-full p-4">
                    <div>
                        <h3 class="text-lg  font-bold">Objetivo</h3>
                        <p class="py-6">{{$resume->objetivo}}</p>

                    </div>
                </div>

                <div class="w-full p-4">
                    <div>
                        <h3 class="text-2xl font-bold">Soft Skills</h3>
                        <p class="py-6">Minhas principais Skills no ambiente profissional:</p>

                        @foreach ($resume->skills as $skill)
                        <p>{{$skill}}</p>
                        @endforeach

                    </div>
                </div>

                <div class="w-full p-4">
                    <div>
                        <h3 class="text-2xl font-bold">Formação</h3>
                        <ol class="relative  ">
                            @foreach ($user->training()->get() as $training)
                            <li class="mb-10 ml-4">
                                <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5   ">
                                </div>
                                <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">{{$training->ano}}
                                </time>
                                <h3 class="text-lg font-semibold text-gray-900 ">{{$training->nome}} -
                                    {{$training->instituicao}}</h3>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>

                <div class="w-full p-4">
                    <div>
                        <h3 class="text-2xl font-bold">Cursos Complementares</h3>
                        <ol class="relative  ">
                            @foreach ($user->training()->get() as $training)
                            <li class="mb-10 ml-4">
                                <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5  ">
                                </div>
                                <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">{{$training->ano}}
                                </time>
                                <h3 class="text-lg font-semibold text-gray-900 ">{{$training->nome}} -
                                    {{$training->instituicao}}</h3>
                                <p class="mb-4 text-base font-normal text-gray-500">Get access to over 20+
                                    pages including a dashboard layout, charts, kanban board, calendar, and pre-order
                                    E-commerce &
                                    Marketing pages.</p>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>

                <div class="w-full p-4">
                    <div>
                        <h3 class="text-2xl font-bold">Experiência Profissional</h3>
                        <ol class="relative  ">
                            @foreach ($user->training()->get() as $training)
                            <li class="mb-10 ml-4">
                                <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5   ">
                                </div>
                                <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">{{$training->ano}}
                                </time>
                                <h3 class="text-lg font-semibold text-gray-900 ">{{$training->nome}} -
                                    {{$training->instituicao}}</h3>
                                <p class="mb-4 text-base font-normal text-gray-500">Get access to over 20+
                                    pages including a dashboard layout, charts, kanban board, calendar, and pre-order
                                    E-commerce &
                                    Marketing pages.</p>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>





</html>