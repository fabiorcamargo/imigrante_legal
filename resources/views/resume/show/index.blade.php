@seoTitle(__('Dashboard'))

<x-app-layout>

  <x-panel>


    <div class="grid grid-cols-1 md:grid-cols-3 md:gap-2 lg:grid-cols-4 lg:gap-4 pt-10">

      <div class="col-span-1 p-2">
        <div class="card w-auto h-auto border bg-base-100 shadow-sm ">
          <div class="card-body">

            <div class="px-4">
              <div class="flex flex-wrap justify-center">
                <div class="w-full flex justify-center">
                  <div class="relative">
                    <img src="{{asset($resume->photo)}}"
                      class="shadow-lg rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-[150px]" />
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
                  <div class="w-full">
                    <p class="font-light leading-relaxed text-slate-600 mb-4">{{$resume->objetivo}}</p>
                    {{--<a href="javascript:;" class="font-normal text-slate-700 hover:text-slate-400">Ver
                      Currículo</a>--}}
                  </div>
                  <div>
                    @foreach ($resume->skills as $skill)
                    <div class="badge badge-primary mx-1">{{$skill}}</div>
                    @endforeach
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
        </div>
      </div>

      <div class="col-span-2 lg:col-span-3 p-2">
        <div class="card w-auto h-auto border bg-base-100 shadow-sm ">
          <div class="card-body">

            <section id="about" class="about">
              <div class="container">

                <div class="w-full p-4">
                  <div>
                    <h1 class="text-2xl font-bold">Objetivo</h1>
                    <p class="py-6">{{$resume->objetivo}}</p>

                  </div>
                </div>

                <div class="w-full p-4">
                  <div>
                    <h1 class="text-2xl font-bold">Soft Skills</h1>
                    <p class="py-6">Minhas principais Skills no ambiente profissional:</p>

                    @foreach ($resume->skills as $skill)
                    <p>{{$skill}}</p>
                    <progress class="progress progress-primary w-full" value="100" max="100"></progress>
                    @endforeach

                  </div>
                </div>

                <div class="w-full p-4">
                  <div>
                    <h1 class="text-2xl font-bold">Formação</h1>
                    <ol class="relative border-l border-gray-200">
                      @foreach ($user->training()->get() as $training)
                      <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white ">
                        </div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">{{$training->ano}}
                        </time>
                        <h3 class="text-lg font-semibold text-gray-900 ">{{$training->nome}} -
                          {{$training->instituicao}}</h3>
                        <p class="mb-4 text-base font-normal text-gray-500">Get access to over 20+
                          pages including a dashboard layout, charts, kanban board, calendar, and pre-order E-commerce &
                          Marketing pages.</p>
                      </li>
                      @endforeach
                    </ol>
                  </div>
                </div>

                <div class="w-full p-4">
                  <div>
                    <h1 class="text-2xl font-bold">Cursos Complementares</h1>
                    <ol class="relative border-l border-gray-200">
                      @foreach ($user->training()->get() as $training)
                      <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white ">
                        </div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">{{$training->ano}}
                        </time>
                        <h3 class="text-lg font-semibold text-gray-900 ">{{$training->nome}} -
                          {{$training->instituicao}}</h3>
                        <p class="mb-4 text-base font-normal text-gray-500">Get access to over 20+
                          pages including a dashboard layout, charts, kanban board, calendar, and pre-order E-commerce &
                          Marketing pages.</p>
                      </li>
                      @endforeach
                    </ol>
                  </div>
                </div>

                <div class="w-full p-4">
                  <div>
                    <h1 class="text-2xl font-bold">Experiência Profissional</h1>
                    <ol class="relative border-l border-gray-200">
                      @foreach ($user->training()->get() as $training)
                      <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white ">
                        </div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">{{$training->ano}}
                        </time>
                        <h3 class="text-lg font-semibold text-gray-900 ">{{$training->nome}} -
                          {{$training->instituicao}}</h3>
                        <p class="mb-4 text-base font-normal text-gray-500">Get access to over 20+
                          pages including a dashboard layout, charts, kanban board, calendar, and pre-order E-commerce &
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
      </div>

      <div></div>
      <div class="col-span-2 lg:col-span-3 p-2">
        <div class="card w-auto h-auto border bg-base-100 shadow-sm ">
          <div class="card-body">
            <div class="w-full p-4">
              <div>



                <!-- ====== Contact Section Start -->
                <section class="relative z-10 overflow-hidden bg-white">
                  <div class="container mx-auto">
                    <span class="text-primary mb-4 block text-base font-semibold">
                      Fale comigo
                    </span>
                    <h1 class="text-2xl font-bold">
                      Fale com esse candidato
                    </h1>
                    <p class="text-body-color mb-9 text-base leading-relaxed">
                      Somente empresas cadastradas podem ver todas as informações, Cadastre-se é simples e rápido, sem
                      cadastro é possível entrar em contato com o candidato através do formulário.
                    </p>
                    <div class="-mx-4 flex flex-wrap lg:justify-between">
                      <div class="w-full px-4 lg:w-1/2 xl:w-6/12">
                        <div class="mb-12 max-w-[570px] lg:mb-0">

                          <div class="mb-2 flex w-full max-w-[370px]">
                            <div
                              class="bg-primary text-primary mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded bg-opacity-5 sm:h-[70px] sm:max-w-[70px]">
                              <x-heroicon-s-home class="h-10" />
                            </div>
                            <div class="w-full">
                              <h4 class="text-dark mb-1 text-xl font-bold">Residência</h4>
                              <p class="text-body-color text-base">
                                {{
                                App\Models\City::find($resume->city_id)->title }} - {{
                                App\Models\States::find($resume->state_id)->letter
                                }}
                              </p>

                            </div>

                          </div>
                          <div class="mb-8">
                            <iframe
                              src="https://maps.google.com/maps?q={{App\Models\City::find($resume->city_id)->lat }},{{App\Models\City::find($resume->city_id)->long }}&hl=es;z=14&amp;output=embed"
                              frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                          </div>
                          <div class="mb-8 flex w-full max-w-[370px]">
                            <div
                              class="bg-primary text-primary mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded bg-opacity-5 sm:h-[70px] sm:max-w-[70px]">
                              <x-heroicon-s-phone-arrow-down-left class="h-10" />
                            </div>
                            <div class="w-full">
                              <h4 class="text-dark mb-1 text-xl font-bold">Telefone</h4>
                              <p class="text-body-color text-base">Somente para empresas cadastradas</p>
                            </div>
                          </div>
                          <div class="mb-8 flex w-full max-w-[370px]">
                            <div
                              class="bg-primary text-primary mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded bg-opacity-5 sm:h-[70px] sm:max-w-[70px]">
                              <x-heroicon-s-envelope class="h-10" />
                            </div>
                            <div class="w-full">
                              <h4 class="text-dark mb-1 text-xl font-bold">Email</h4>
                              <p class="text-body-color text-base">Somente para empresas cadastradas </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="w-full px-4 lg:w-1/2 xl:w-5/12">
                        <div class="relative rounded-lg bg-white border p-4 shadow-lg sm:p-4">
                          <h1 class="text-2xl font-bold">
                            Contato
                          </h1>
                          <x-splade-form>
                            <x-splade-input class="my-6" name="nome" placeholder='Nome' />

                            <x-splade-input class="my-6" name="empresa" placeholder='Nome da Empresa' />

                            <x-splade-input class="my-6" name="email" placeholder='Email' />

                            <x-splade-input class="my-6" name="telefone" placeholder='Telefone' />

                            <x-splade-textarea class="my-6" name="mensagem" placeholder='Mensagem...' autosize />

                            <x-splade-submit
                              class="bg-primary border-primary w-full rounded border p-3 text-white transition hover:bg-opacity-90">
                              Enviar</x-splade-submit>
                          </x-splade-form>

                        </div>
                      </div>

                    </div>
                  </div>
                </section>
                <!-- ====== Contact Section End -->

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </x-panel>
</x-app-layout>