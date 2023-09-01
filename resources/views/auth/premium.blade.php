<x-app-layout>
<x-splade-modal id="objetivos_modal" name="objetivos_modal">
    <x-code></x-code>
  </x-splade-modal>
  
<div class="bg-gradient-to-b from-gray-100 to-purple-200">
    <div class="container m-auto px-6 py-20 md:px-12 lg:px-20">
        <div class="m-auto text-center lg:w-8/12 xl:w-7/12">
            <h2 class="text-2xl text-pink-900 font-bold md:text-4xl">Seja Premium no Portal de Carreiras</h2>
        </div>
        <div class="mt-12 m-auto -space-y-4 items-center justify-center md:flex md:space-y-0 md:-space-x-4 xl:w-10/12">
            <div class="relative z-10 -mx-4 group md:w-6/12 md:mx-0 lg:w-5/12">
                <div aria-hidden="true"
                    class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-xl transition duration-500 group-hover:scale-105 lg:group-hover:scale-110">
                </div>
                <div class="relative p-6 space-y-6 lg:p-8">
                    <h3 class="text-3xl text-gray-700 font-semibold text-center">Possuí um código de ativação?</h3>
                    <div>
                        <div class="relative flex justify-around">
                            <div class="flex items-end">
                                <span class="text-8xl text-gray-800 font-bold leading-0">100</span>
                                <div class="pb-2">
                                    <span class="block text-2xl text-gray-700 font-bold">%</span>
                                    <span class="block text-xl text-purple-500 font-bold">Free</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul role="list" class="w-max space-y-4 py-6 m-auto text-gray-600">
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>Usando o código seu acesso é gratuíto.</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>O código da acesso aos recursos pagos.</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>Os códigos são válidos para uma ativação</span>
                        </li>
                    </ul>
                    <p class="flex items-center justify-center space-x-4 text-lg text-gray-600 text-center">
                        <span>Membros premiuns</span>
                        <a href="tel:+24300" class="flex space-x-2 items-center text-purple-600">

                            <x-heroicon-s-users class="w-6" />
                            <span class="font-semibold">+10k</span>
                        </a>
                    </p>
                    
                    <Link href="#objetivos_modal" class="block w-full py-3 px-6 text-center rounded-xl transition bg-purple-600 hover:bg-purple-700 active:bg-purple-800 focus:bg-indigo-600">
                        <span class="text-white font-semibold">
                            Ativar agora
                        </span>
                    </Link>
                    
                </div>
            </div>

            <div class="relative group md:w-6/12 lg:w-7/12">
                <div aria-hidden="true"
                    class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-lg transition duration-500 group-hover:scale-105">
                </div>
                <div class="relative p-6 pt-16 md:p-8 md:pl-12 md:rounded-r-2xl lg:pl-20 lg:p-16">
                    <ul role="list" class="space-y-4 py-6 text-gray-600">
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>Acesso as vagas de todos os estados</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>Página profissional pessoal com nome exclusivo</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>Criação de currículos com apoio de Inteligência Artificial</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>Cadastro automático nas vagas de interesse</span>
                        </li>
                    </ul>
                    <p class="text-gray-700">Team can be any size, and you can add or switch members as needed.
                        Companies using our platform include:</p>
                    {{--<div class="mt-6 flex justify-between gap-6">
                        <img class="w-16 lg:w-24"
                            src="https://tailus.io/sources/blocks/organization/preview/images/clients/airbnb.svg"
                            loading="lazy" alt="airbnb">
                        <img class="w-8 lg:w-16"
                            src="https://tailus.io/sources/blocks/organization/preview/images/clients/bissell.svg"
                            loading="lazy" alt="bissell">
                        <img class="w-6 lg:w-12"
                            src="https://tailus.io/sources/blocks/organization/preview/images/clients/ge.svg"
                            loading="lazy" alt="ge">
                        <img class="w-20 lg:w-28"
                            src="https://tailus.io/sources/blocks/organization/preview/images/clients/microsoft.svg"
                            loading="lazy" alt="microsoft">
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>