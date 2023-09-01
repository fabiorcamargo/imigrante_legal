
 <!-- component -->
 <div class="mx-auto flex w-full max-w-md flex-col space-y-16">
    <div class="flex flex-col items-center justify-center text-center space-y-2">
      <div class="font-semibold text-3xl">
        <p>Código de Ativação</p>
      </div>
      <div class="flex flex-row text-sm font-medium text-gray-400">
        <p>Insira abaixo o código de ativação recebido, para ter acesso Premium!</p>
      </div>
    </div>

    <div>
      <form action="/code/verify" method="post">
        @csrf
        <div class="flex flex-col space-y-16">
          <div class="form-wrap flex flex-row items-center justify-between mx-auto w-full max-w-xs">
              <input class="w-full h-16 me-2 flex flex-col items-center justify-center text-center  outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="text" maxlength="1" size="1" name="code[]" id="code[]">
              <input class="w-full h-16 me-2 flex flex-col items-center justify-center text-center  outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="text" maxlength="1" size="1" name="code[]" id="code[]">
              <input class="w-full h-16 me-2 flex flex-col items-center justify-center text-center outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="text" maxlength="1" size="1" name="code[]" id="code[]">
              <input class="w-full h-16 me-2 flex flex-col items-center justify-center text-center outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="text" maxlength="1" size="1" name="code[]" id="code[]">
              <input class="w-full h-16 me-2 flex flex-col items-center justify-center text-center  outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="text" maxlength="1" size="1" name="code[]" id="code[]">
          </div>

          <div class="flex flex-col space-y-5">
            <div>
              <button type="send" class="block w-full py-3 px-6 text-center rounded-xl transition bg-purple-600 hover:bg-purple-700 active:bg-purple-800 focus:bg-indigo-600">
                <span class="text-white font-semibold">
                    Verificar
                </span>
              </button>
            </div>

            <div class="flex flex-row items-center justify-center text-center text-sm font-medium space-x-1 text-gray-500">
              <p>Não possuí um código?</p> <a class="flex flex-row items-center text-blue-600" href="http://" target="_blank" rel="noopener noreferrer">Resend</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <x-splade-script>
    var container = document.getElementsByClassName("form-wrap")[0];
    container.onkeyup = function(e) {
    var target = e.srcElement;
    var maxLength = parseInt(target.attributes["maxlength"].value, 10);
    var myLength = target.value.length;
    if (myLength >= maxLength) {
        var next = target;
        while (next = next.nextElementSibling) {
            if (next == null)
                break;
            if (next.tagName.toLowerCase() == "input") {
                next.focus();
                break;
            }
        }
    }
}
</x-splade-script>