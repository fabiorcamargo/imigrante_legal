<div class="hero min-h-screen bg-base-200">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <div class="text-center lg:text-left">
      <h1 class="text-5xl font-bold">Cadastre-se Agora!</h1>
      <p class="py-6">Cadastre-se para participar do Programa Imigrante Legal, conheça todos os processos envolvidos
        para realizar o sonho de morar em outro País.</p>
    </div>


    <head>
      <title>Validação de Número de Celular Brasileiro</title>
      
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
        $(document).ready(function() {
          // Desabilitar o botão de envio inicialmente
          $('#mauticform_input_imigrante1_submit').prop('disabled', true);
      
          $('#mauticform_input_imigrante1_telefone1').on('input', function() {
            var telInput = $(this);
            var formattedTel = formatPhoneNumber(telInput.val());
            telInput.val(formattedTel);
            checkPhoneNumberValidity();
          });
      
          function formatPhoneNumber(phoneNumber) {
            // Remove all non-digit characters
            var cleaned = phoneNumber.replace(/\D/g, '');
            // Apply Brazilian phone number format
            var formatted = cleaned.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
            return formatted;
          }
      
          function checkPhoneNumberValidity() {
            var telInput = $('#mauticform_input_imigrante1_telefone1');
            var telValue = telInput.val().replace(/\D/g, ''); // Remove non-digit characters
            // Habilitar ou desabilitar o botão de envio com base na validade do número de telefone
            if (telValue.length === 11) {
              $('#mauticform_input_imigrante1_submit').prop('disabled', false);
            } else {
              $('#mauticform_input_imigrante1_submit').prop('disabled', true);
            }
          }
        });
      </script>
      
    </head>

    <body>
      <form>
        <label for="numeroCelular">Número de Celular Brasileiro:</label><br>
        <input type="text" id="numeroCelular" name="numeroCelular" placeholder="Digite o número"><br><br>
        <input type="button" id="validarBotao" value="Validar">
      </form>
    </body>


    <div class="card flex-shrink-0 w-full max-w-sm shadow-md  bg-base-100">
      <div class="card-body">
        <x-authentication-card-logo />

        <style type="text/css" scoped>
          .mauticform-field-hidden {
            display: none
          }
        </style>
        <div id="mauticform_wrapper_imigrante1" class="mauticform_wrapper">
          <form autocomplete="false" role="form" method="post"
            action="https://imi.meusestudosead.com.br/form/submit?formId=1" id="mauticform_imigrante1"
            data-mautic-form="imigrante1" enctype="multipart/form-data">
            <div class="mauticform-error" id="mauticform_imigrante1_error"></div>
            <div class="mauticform-message" id="mauticform_imigrante1_message"></div>
            <div class="mauticform-innerform">
              <div class="mauticform-page-wrapper mauticform-page-1" data-mautic-form-page="1">
                <div id="mauticform_imigrante1_nome"
                  class="mauticform-row mauticform-text mauticform-field-1 mauticform-required" data-validate="nome"
                  data-validation-type="text">
                  <label id="mauticform_label_imigrante1_nome" for="mauticform_input_imigrante1_nome"
                    class="mauticform-label">Nome</label>
                  <input type="text" name="mauticform[nome]" value="" id="mauticform_input_imigrante1_nome"
                    class="input input-bordered w-full max-w-xs">
                  <span class="mauticform-errormsg" style="display:none;">Isso é obrigatório.</span>
                </div>
                <div id="mauticform_imigrante1_sobrenome"
                  class="mauticform-row mauticform-text mauticform-field-2 mauticform-required"
                  data-validate="sobrenome" data-validation-type="text">
                  <label id="mauticform_label_imigrante1_sobrenome" for="mauticform_input_imigrante1_sobrenome"
                    class="mauticform-label">Sobrenome</label>
                  <input type="text" name="mauticform[sobrenome]" value="" id="mauticform_input_imigrante1_sobrenome"
                    class="input input-bordered w-full max-w-xs">

                  <span class="mauticform-errormsg" style="display:none;">Isso é obrigatório.</span>
                </div>
                <div id="mauticform_imigrante1_email"
                  class="mauticform-row mauticform-email mauticform-field-3 mauticform-required" data-validate="email"
                  data-validation-type="email">
                  <label id="mauticform_label_imigrante1_email" for="mauticform_input_imigrante1_email"
                    class="mauticform-label">Email</label>
                  <input type="email" name="mauticform[email]" value="" id="mauticform_input_imigrante1_email"
                    class="input input-bordered w-full max-w-xs">
                  <span class="mauticform-errormsg" style="display:none;">Isso é obrigatório.</span>
                </div>
                <div id="mauticform_imigrante1_telefone1"
                  class="mauticform-row mauticform-text mauticform-field-4 mauticform-required"
                  data-validate="telefone1" data-validation-type="text">
                  <label id="mauticform_label_imigrante1_telefone1" for="mauticform_input_imigrante1_telefone1"
                    class="mauticform-label">Telefone</label>
                  <input type="text" name="mauticform[telefone1]" value="" id="mauticform_input_imigrante1_telefone1"
                    class="input input-bordered w-full max-w-xs" minlength="12" maxlength="15" prepend="+55" required>
                  <span class="mauticform-errormsg" style="display:none;">Isso é obrigatório.</span>
                </div>
                <div id="mauticform_imigrante1_submit"
                  class="mauticform-row mauticform-button-wrapper mauticform-field-5">
                  <br>
                  <button class="border rounded-md shadow-sm font-bold py-2 px-4 focus:outline-none focus:ring focus:ring-opacity-50 bg-indigo-500 hover:bg-indigo-700 text-white border-transparent focus:border-indigo-300 focus:ring-indigo-200 btn btn-block btn-primary" name="mauticform[submit]" value="1"
                    id="mauticform_input_imigrante1_submit" type="submit">Cadastrar</button>
                </div>
              </div>
            </div><input type="hidden" name="mauticform[formId]" id="mauticform_imigrante1_id" value="1">
            <input type="hidden" name="mauticform[return]" id="mauticform_imigrante1_return" value="">
            <input type="hidden" name="mauticform[formName]" id="mauticform_imigrante1_name" value="imigrante1">

          </form>
        </div>


        <x-splade-form action="{{route('lead.store')}}">

          <x-splade-input name="nome" label="Nome Completo" placeholder="Ex. Renato Oliveira" autocomplete="name" />

          <x-splade-input name="mauticform[telefone1]" value="" id="mauticform_input_imigrante1_telefone1"
            label="Telefone (Digite apenas os números)" minlength="12" maxlength="15" prepend="+55"
            placeholder="Ex. (11) 99865-4321" autocomplete="tel" />

          <x-splade-input name="email" label="Email" placeholder="exemplo@gmail.com" type="email"
            autocomplete="email" />

          <x-splade-select name="state_id" :options="json_decode($states)" label="Estado" choices />

          <x-splade-select name="city_id" remote-url="`/api/cities/${form.state_id}`" option-label="title"
            option-value="id" choices label="Cidade" />

          <x-splade-input name="pais_interesse" label="País de Interesse"
            placeholder="Ex. Estados Unidos, Inglaterra, etc..." />

          <div class="form-control mt-6">
            <x-splade-submit class="btn btn-block btn-primary">Cadastrar </x-splade-submit>
          </div>

        </x-splade-form>


        <script>

        </script>

        {{-- <x-splade-script>
          const inputTelefone = document.getElementById('mauticform_input_imigrante1_telefone1');

          inputTelefone.addEventListener('input', function() {
          const value = this.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
          if (value.length <= 10) { this.value=value.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3' ); } else {
            this.value=value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3' ); } }); </x-splade-script> --}}

      </div>
    </div>
  </div>
</div>