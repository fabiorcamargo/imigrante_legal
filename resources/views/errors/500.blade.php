<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')
</head>
<body>

<main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
    <div class=" justify-center ">
        <img src="{{asset('storage/assets/img/500.svg')}}" class="w-80 text-center" alt="logo">
        </div>
    <div class="text-center">
        
      <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">¿ERRO?</h1>
      <p class="mt-6 text-base leading-7 text-gray-600">Desculpe, essa página está com algum erro, nossa equipe já está resolvendo.</p>
      <div class="mt-10 flex items-center justify-center gap-x-6">
        <a href="/" class="rounded-md bg-sky-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Início</a>
        <a href="#" class="text-sm font-semibold text-gray-900">Suporte <span aria-hidden="true">&rarr;</span></a>
      </div>
    </div>
  </main>
  
</body>
</html>