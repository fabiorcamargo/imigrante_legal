<template>
    <div class="relative bg-white px-6 pt-5 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-full sm:rounded-lg sm:px-10">
      <div class="mx-auto max-w-md">
        <div class="space-y-2 py-2 text-base leading-7 text-gray-600">
          <p>{{ title }}</p>
        </div>
        <div class="pt-2 text-base font-semibold leading-7">
          <p>
            <button @click="copyToClipboard" 
              :class="buttonClass">{{ buttonText }} &rarr;</button>
          </p>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      title: String,
    },
    data() {
      return {
        buttonText: 'Copiar',
        copied: false,
      };
    },
    computed: {
      buttonClass() {
        return {
          'text-sky-500 hover:text-sky-600': !this.copied,
          'text-green-500': this.copied,
        };
      },
    },
    methods: {
      copyToClipboard() {
        this.buttonText = 'Copiado';
        this.copied = true;
  
        const tempInput = document.createElement('input');
        tempInput.value = this.title;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
      },
    },
  };
  </script>
  
  <style scoped>
  /* Adicione estilos conforme necessário */
  </style>
  