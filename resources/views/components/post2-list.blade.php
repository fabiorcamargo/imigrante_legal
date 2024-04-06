<div id="search" class="relative pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8 bg-slate-50">
    <div class="relative max-w-7xl mx-auto">
        <div class="text-center pb-10">
            <div class="inline-flex items-center">
                <h2 class="text-3xl leading-9 tracking-tight font-extrabold text-gray-900 sm:text-4xl sm:leading-10">
                    Posts em Destaque
                </h2>
            </div>
            <p class="mt-3 max-w-2xl mx-auto text-xl leading-7 text-gray-500 sm:mt-4">
                {{env('POST_DESC')}}
            </p>
        </div>

        <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->



        <div class="bg-slate-50 rounded-lg">
            <div class="mx-auto max-w-2xl px-4 pt-10 pb-5 sm:px-6 sm:pt-24 sm:pb-12 lg:max-w-7xl lg:px-8">
                <div class="grid grid-cols-1 gap-x-6 gap-y-20 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    <x-splade-lazy>
                    @foreach (Splade::onLazy(App\Models\CompanyJob::orderBy('created_at', 'desc')->get()) as $jobs)
                    <div class="group relative">
                        <a href="/post/{{$jobs->id}}">
                            <div aria-hidden="true"
                                class="absolute top-0 w-full h-full rounded-2xl bg-white drop-shadow-lg border-2 border-gray-100/75  transition duration-500 group-hover:scale-105">
                            </div>
                            <div
                                class="relative p-4 md:rounded-r-2xl transition duration-500 group-hover:scale-105 text-gray-800 hover:text-indigo-600 ">
                                <!-- component -->
                                <div class="flex justify-center -mt-16">
                                    <x-img-responsive img="{{$jobs->post_img}}" alt="{{$jobs->nome}}" class="w-100 h-100 object-cover rounded-md"/>
                                </div>
                                
                                
                                <div class="text-sm leading-5 pt-2 font-medium text-right ">
                                    <div class="">
                                        <div class="badge badge-secondary mt-4">{{$jobs->status}}</div>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="text-gray-800 pt-4 text-xl font-semibold text-center">
                                        {{($jobs->nome)}}</h2>
                                    <p class="mt-2 text-gray-600 text-center">{{($jobs->descricao)}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    </x-splade-lazy>
                </div>
            </div>
            {{--<div class="text-center">
                <button
                    class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-indigo-500 to-pink-500 group-hover:from-indigo-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-indigo-800"
                    aria-label="{{env('POST_BUTTON')}}">
                    <span
                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        {{env('POST_BUTTON')}}
                    </span>
                </button>
            </div>--}}
        </div>






        {{--}}
        <div class="mt-12 grid gap-5 max-w-lg mx-auto lg:grid-cols-3 lg:max-w-none">
            <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                <div class="flex-shrink-0 relative">
                    <img src="{{asset('job/jovem-aprendiz-americanas-2023.jpg')}}" class="h-48 w-full object-cover" />

                    <button
                        class="absolute top-0 right-0 mt-2 mr-2 p-2 rounded-md text-gray-400 bg-gray-100 bg-opacity-50 hover:text-red-500 hover:bg-gray-100 hover:bg-opacity-100 focus:outline-none focus:bg-gray-100 focus:text-red-500 transition duration-150 ease-in-out">
                        <x-heroicon-s-heart class="h-6 w-6" />
                    </button>
                </div>

                <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                    <div class="flex-1">
                        <div class="text-sm leading-5 font-medium text-indigo-600">
                            <a href="#" class="hover:underline">
                                Região Sul
                            </a>
                        </div>
                        <a href="#" class="block">
                            <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900">
                                Cianorte - PR
                            </h3>
                            <h5 class="mt-2 text-x leading-7 font-semibold text-gray-900">
                                Vaga Jovem Aprendiz Americanas - Cianorte PR
                            </h5>

                            <p class="mt-3 text-base leading-6 text-gray-500">
                                Americanas está com vaga de emprego aberta para Jovem Aprendiz em Cianorte, PR.<br>Os
                                interessados na oportunidade poderão se cadastrar caso cumpram os requisitos
                                solicitados.<br>Veja os detalhes e faça sua inscrição.<br>
                                Confira as vagas para Menor Aprendiz 2023.
                            </p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                <div class="flex-shrink-0 relative">
                    <img src="{{asset('job/Jovem-Aprendiz-SICOOB-1.jpg')}}" class="h-48 w-full object-cover" />
                    <button
                        class="absolute top-0 right-0 mt-2 mr-2 p-2 rounded-md text-gray-400 bg-gray-100 bg-opacity-50 hover:text-red-500 hover:bg-gray-100 hover:bg-opacity-100 focus:outline-none focus:bg-gray-100 focus:text-red-500 transition duration-150 ease-in-out">
                        <x-heroicon-s-heart class="h-6 w-6" />
                    </button>
                </div>
                <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                    <div class="flex-1">
                        <div class="text-sm leading-5 font-medium text-indigo-600">
                            <a href="#" class="hover:underline">
                                Região Sul
                            </a>
                        </div>
                        <a href="#" class="block">
                            <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900">
                                Umuarama - PR
                            </h3>
                            <h5 class="mt-2 text-x leading-7 font-semibold text-gray-900">
                                Vaga Jovem Aprendiz Sicoob Arenito Umuarama PR
                            </h5>

                            <p class="mt-3 text-base leading-6 text-gray-500">
                                A empresa Sicoob Arenito está com inscrições abertas para vagas de primeiro emprego
                                destinadas a jovem aprendiz em Umuarama - PR.<br>
                                Para concorrer às vagas para aprendiz, é necessário enviar o currículo destacando
                                habilidades e experiências relevantes.<br>
                                Não perca a oportunidade de se inscrever para as vagas abertas de jovem aprendiz.
                            </p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                <div class="flex-shrink-0 relative">
                    <img src="{{asset('job/Trabalhe-Conosco-Aprendiz-Bradesco.png')}}"
                        class="h-48 w-full object-cover" />
                    <button
                        class="absolute top-0 right-0 mt-2 mr-2 p-2 rounded-md text-gray-400 bg-gray-100 bg-opacity-50 hover:text-red-500 hover:bg-gray-100 hover:bg-opacity-100 focus:outline-none focus:bg-gray-100 focus:text-red-500 transition duration-150 ease-in-out">
                        <x-heroicon-s-heart class="h-6 w-6" />
                    </button>
                </div>
                <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                    <div class="flex-1">


                        <div class="text-sm leading-5 font-medium text-indigo-600">
                            <a href="#" class="hover:underline">
                                Região Sul
                            </a>
                        </div>
                        <a href="#" class="block">
                            <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900">
                                Maringá - PR
                            </h3>
                            <h5 class="mt-2 text-x leading-7 font-semibold text-gray-900">
                                Vaga Jovem Aprendiz Bradesco - Maringá / PR
                            </h5>

                            <p class="mt-3 text-base leading-6 text-gray-500">
                                O Programa Aprendiz Bradesco oferece uma oportunidade para que os jovens tenham sua
                                primeira experiência no mercado de trabalho em uma Organização comprometida em
                                proporcionar oportunidades contínuas de desenvolvimento pessoal e profissional e que já
                                contribuiu para formação de milhares de aprendizes em todo o Brasil.
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>--}}


    </div>
</div>