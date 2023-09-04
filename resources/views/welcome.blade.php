@seoTitle('Imigrante Legal')
@seoDescription('O portal para quem sonha em morar no exterior!')
@seoKeywords('exterior, morar fora, imigrante legal')

<x-app-layout>


    <x-splade-lazy>
        <x-slot:placeholder> 
          
          <div class="py-8">
            <div class="border border-blue-300 shadow rounded-md p-4 max-w-2xl w-full mx-auto">
              <div class="animate-pulse flex space-x-4">
                <div class="rounded-full bg-slate-700 h-10 w-10"></div>
                <div class="flex-1 space-y-6 py-1">
                  <div class="h-2 bg-slate-700 rounded"></div>
                  <div class="space-y-3">
                    <div class="grid grid-cols-3 gap-4">
                      <div class="h-2 bg-slate-700 rounded col-span-2"></div>
                      <div class="h-2 bg-slate-700 rounded col-span-1"></div>
                    </div>
                    <div class="h-2 bg-slate-700 rounded"></div>
                  </div>
                </div>
              </div>
            </div>
        </div>
           </x-slot:placeholder>
           
    <x-banner1 />
    <x-post-list />
    <section id="cadastro">
    <x-cadastro states="{!!$states!!}"/>
    </section>
    <x-post2-list />


  </x-splade-lazy>
  

  @if((request()->input('event')) !== null)
  
  <dialog id="my_modal_1" class="modal" open >
    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    <form method="dialog" class="modal-box">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
      <h3 class="font-bold text-lg">Parabéns!</h3>
      <p class="py-4">Cadastro realizado com sucesso, em breve um dos nossos representantes entrará em contato, enquanto isso explore o site e compartilhe com seus amigos.</p>
      <div class="modal-action">
        <!-- if there is a button in form, it will close the modal -->
        <button class="btn">Fechar</button>
      </div>
    </form>
  </dialog>
  
  <x-splade-script>
    {!!(request()->input('event'))!!}
  </x-splade-script>

  @endif
 
</x-app-layout>

