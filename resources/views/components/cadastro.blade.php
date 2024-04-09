<script type="text/javascript">
  /** This section is only needed once per page if manually copying **/
  if (typeof MauticSDKLoaded == 'undefined') {
      var MauticSDKLoaded = true;
      var head            = document.getElementsByTagName('head')[0];
      var script          = document.createElement('script');
      script.type         = 'text/javascript';
      script.src          = 'https://mautic.imigrantelegal.com.br/media/js/mautic-form.js?v687b45f7';
      script.onload       = function() {
          MauticSDK.onLoad();
      };
      head.appendChild(script);
      var MauticDomain = 'https://mautic.imigrantelegal.com.br';
      var MauticLang   = {
          'submittingMessage': "Por favor, aguarde..."
      }
  }else if (typeof MauticSDK != 'undefined') {
      MauticSDK.onLoad();
  }
</script>

<div class="hero min-h-screen bg-base-200">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <div class="text-center lg:text-left">
      <h1 class="text-5xl font-bold">Cadastre-se Agora!</h1>
      <p class="py-6">Cadastre-se para participar do Programa Imigrante Legal, conheça todos os processos envolvidos
        para realizar o sonho de morar em outro País.</p>
    </div>


    <div class="card flex-shrink-0 w-full max-w-sm shadow-md  bg-base-100">
      <div class="card-body">
        <x-authentication-card-logo />

        <style type="text/css" scoped>
          .mauticform-field-hidden {
            display: none
          }
        </style>
        <div id="mauticform_wrapper_imirante1" class="mauticform_wrapper">
          <form autocomplete="false" role="form" method="post"
            action="https://mautic.imigrantelegal.com.br/form/submit?formId=1" id="mauticform_imirante1"
            data-mautic-form="imirante1" enctype="multipart/form-data">
            <div class="mauticform-error" id="mauticform_imirante1_error"></div>
            <div class="mauticform-message" id="mauticform_imirante1_message"></div>
            <div class="mauticform-innerform">
              <div class="mauticform-page-wrapper mauticform-page-1" data-mautic-form-page="1">
                <div id="mauticform_imirante1_nome1"
                  class="mauticform-row mauticform-text mauticform-field-1 mauticform-required" data-validate="nome1"
                  data-validation-type="text">
                  <label id="mauticform_label_imirante1_nome1" for="mauticform_input_imirante1_nome1"
                    class="mauticform-label">Nome</label>

                  <input type="text" name="mauticform[nome1]" value="" id="mauticform_input_imirante1_nome1"
                    class="mauticform-input">

                  <span class="mauticform-errormsg" style="display:none;">Isso é obrigatório.</span>
                </div>
                <div id="mauticform_imirante1_sobrenome"
                  class="mauticform-row mauticform-text mauticform-field-2 mauticform-required"
                  data-validate="sobrenome" data-validation-type="text">
                  <label id="mauticform_label_imirante1_sobrenome" for="mauticform_input_imirante1_sobrenome"
                    class="mauticform-label">Sobrenome</label>

                  <input type="text" name="mauticform[sobrenome]" value="" id="mauticform_input_imirante1_sobrenome"
                    class="mauticform-input">

                  <span class="mauticform-errormsg" style="display:none;">Isso é obrigatório.</span>
                </div>
                <div id="mauticform_imirante1_telefone"
                  class="mauticform-row mauticform-tel mauticform-field-3 mauticform-required" data-validate="telefone"
                  data-validation-type="tel">
                  <label id="mauticform_label_imirante1_telefone" for="mauticform_input_imirante1_telefone"
                    class="mauticform-label">Telefone</label>

                  <input type="tel" name="mauticform[telefone]" value="" id="mauticform_input_imirante1_telefone"
                    class="mauticform-input">

                  <span class="mauticform-errormsg" style="display:none;">Isso é obrigatório.</span>
                </div>
                <div id="mauticform_imirante1_pais_de_interesse"
                  class="mauticform-row mauticform-text mauticform-field-4">
                  <label id="mauticform_label_imirante1_pais_de_interesse"
                    for="mauticform_input_imirante1_pais_de_interesse" class="mauticform-label">País de
                    Interesse</label>

                  <input type="text" name="mauticform[pais_de_interesse]" value=""
                    id="mauticform_input_imirante1_pais_de_interesse" class="mauticform-input">

                  <span class="mauticform-errormsg" style="display:none;"></span>
                </div>

                <div id="mauticform_imirante1_submit"
                  class="mauticform-row mauticform-button-wrapper mauticform-field-5">
                  <button class="btn btn-default mauticform-button" name="mauticform[submit]" value="1"
                    id="mauticform_input_imirante1_submit" type="submit">Enviar</button>
                </div>
              </div>
            </div><input type="hidden" name="mauticform[formId]" id="mauticform_imirante1_id" value="1">
            <input type="hidden" name="mauticform[return]" id="mauticform_imirante1_return" value="">
            <input type="hidden" name="mauticform[formName]" id="mauticform_imirante1_name" value="imirante1">

          </form>
        </div>






        <x-splade-form action="{{route('lead.store')}}">

          <x-splade-input name="nome" label="Nome Completo" placeholder="Ex. Renato Oliveira" autocomplete="name" />

          <x-splade-input name="telefone" id="telefone" label="Telefone (Digite apenas os números)" minlength="12"
            maxlength="15" prepend="+55" placeholder="Ex. (11) 99865-4321" autocomplete="tel" />

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


        <x-splade-script>
          const inputTelefone = document.getElementById('telefone');

          inputTelefone.addEventListener('input', function() {
          const value = this.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
          if (value.length <= 10) { this.value=value.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3' ); } else {
            this.value=value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3' ); } }); </x-splade-script>

      </div>
    </div>
  </div>
</div>