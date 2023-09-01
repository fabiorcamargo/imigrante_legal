

<div id="search" class="relative pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8 bg-slate-50">
    <div class="relative max-w-7xl mx-auto">
        <div class="text-center pb-10">
            <div class="inline-flex items-center">
                <h2 class="text-3xl leading-9 tracking-tight font-extrabold text-gray-900 sm:text-4xl sm:leading-10">
                    {{env('POST_SLOGAN')}}
                </h2>
            </div>
            <p class="mt-3 max-w-2xl mx-auto text-xl leading-7 text-gray-500 sm:mt-4">
                {{env('POST_DESC')}}
            </p>
        </div>
        
        
        <div class="bg-slate-50 rounded-lg">
            <div class="mx-auto max-w-2xl px-4 pt-10 pb-5 sm:px-6 sm:pt-24 sm:pb-12 lg:max-w-7xl lg:px-8">
                <div class="grid grid-cols-1 gap-x-6 gap-y-20 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    <div class="group relative">
                        <div aria-hidden="true"
                            class="absolute top-0 w-full h-full rounded-2xl bg-white drop-shadow-lg border-2 border-gray-100/75  transition duration-500 group-hover:scale-105">
                        </div>
                        <div
                            class="relative p-4 md:rounded-r-2xl transition duration-500 group-hover:scale-105 text-gray-800 hover:text-indigo-600 ">
                            <!-- component -->
                            <div class="flex justify-center -mt-16">
                                <img class="w-20 h-20 object-cover rounded-md  "
                                    src="{{asset('job/sicoob.jpeg')}}" alt="americanas logo">
                            </div>
                            <div class="text-sm leading-5 pt-2 font-medium text-center">
                                <div class="">
                                    Região Sul | Cianorte - PR
                                </div>
                            </div>
                            <div>
                                <h2 class="text-gray-800 pt-4 text-xl font-semibold text-center">Banco Sicoob</h2>
                                <p class="mt-2 text-gray-600 text-center">Vaga Jovem Aprendiz</p>
                            </div>

                        </div>
                        
                    </div>          
                    <!-- More products... -->
                </div>
            </div>
            <div class="text-center">
                <button
                    class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-indigo-500 to-pink-500 group-hover:from-indigo-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-indigo-800" aria-label="{{env('POST_BUTTON')}}">
                    <span
                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        {{env('POST_BUTTON')}}
                    </span>
                </button>
            </div>
        </div>


        

    </div>
</div>