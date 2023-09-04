
<div class="relative bg-white overflow-hidden">
    <div class="max-w-screen mx-auto">

        <div class="relative z-10 pb-8 bg-gradient-to-r from-sky-100 from-10% to-purple-100 to-90% sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32"
            x-data="{ open: false }">
            <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2"
                fill="#f3e8ff" viewBox="0 0 100 100" preserveAspectRatio="none">
                <polygon points="50,0 100,0 50,100 0,100" />
            </svg>

            <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between sm:h-10 lg:justify-start">
                </div>
            </div>



            <div class="mt-10 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                    <h2
                        class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                        {{env('BANNER_SLOGAN1')}}
                        <br class="xl:hidden" />
                        <span class="text-indigo-600 pe-4">{{env('BANNER_SLOGAN2')}}</span>
                    </h2>
                    <p
                        class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:leading-7 sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        {{env('BANNER_DESC')}}
                    </p>

                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="#cadastro"
                                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                {{env('BANNER_BUTTON1')}}
                            </a>
                        </div>
                        {{--<div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="/login"
                                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:shadow-outline focus:border-indigo-300 transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                {{env('BANNER_BUTTON2')}}
                            </a>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-full">
        <img src='{{asset("storage/assets/img/".env('BANNER1'))}}'
            class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" alt="Imagem Jovens Trabalhando" />
    </div>
</div>


    <div class="mx-auto max-w-5xl  sm:px-6 m-[-20px] lg:px-8 ">
      <div class="transition duration-500 hover:scale-105 lg:hover:scale-110 relative isolate overflow-hidden bg-slate-800 px-6 py-16 shadow-2xl sm:rounded-3xl sm:px-16 md:py-16 lg:flex lg:gap-x-20 lg:px-24 lg:py-0 z-30">
        <svg viewBox="0 0 1024 1024" class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0" aria-hidden="true">
          <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)" fill-opacity="0.8" />
          <defs>
            <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
              <stop stop-color="#86198f" />
              <stop offset="1" stop-color="#e0e7ff" />
            </radialGradient>
          </defs>
        </svg>
        <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-10 lg:text-left">
          <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">{{env('MARKETING1')}}</h2>
          <p class="mt-6 text-lg leading-8 text-gray-300">{{env('MARKETING2')}}</p>
          {{--<div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
            <a href="#" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Get started</a>
            <a href="#" class="text-sm font-semibold leading-6 text-white">Learn more <span aria-hidden="true">→</span></a>
          </div>--}}
        </div>
      </div>
    </div>
    