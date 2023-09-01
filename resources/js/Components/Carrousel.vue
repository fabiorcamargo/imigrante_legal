<template>
    <Carousel :items-to-show="2.5" :wrap-around="true">
      <Slide v-for="slide in 10" :key="slide">
        <div class="carousel__item"><div class="p-4">

<div class="relative group w-7/12">
    <div aria-hidden="true"
        class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-lg transition duration-500 group-hover:scale-105">
    </div>
    <div
        class="relative p-4 md:rounded-r-2xl transition duration-500 group-hover:scale-105 text-gray-800 hover:text-indigo-600 ">
        <!-- component -->
        <div class="flex justify-center md:justify-end -mt-16">
            <img class="w-20 h-20 object-cover rounded-md  "
                src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80">
        </div>
        <div class="text-sm leading-5 pt-2 font-medium text-center">
            <div class="">
                Região Sul | Cianorte - PR
            </div>
        </div>
        <div>
            <h2 class="text-gray-800 pt-4 text-xl font-semibold text-center">Americanas</h2>
            <p class="mt-2 text-gray-600 text-center">Vaga Jovem Aprendiz</p>
        </div>

    </div>
</div>
</div></div>
      </Slide>
  
      <template #addons>
        <Navigation />
      </template>
    </Carousel>
  </template>
  
  <script>
  import { defineComponent } from 'vue'
  import { Carousel, Navigation, Slide } from 'vue3-carousel'
  
  import 'vue3-carousel/dist/carousel.css'
  
  export default defineComponent({
    name: 'WrapAround',
    components: {
      Carousel,
      Slide,
      Navigation,
    },
  })
  </script>