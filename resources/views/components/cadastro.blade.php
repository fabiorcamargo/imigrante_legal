<div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="text-center lg:text-left">
        <h1 class="text-5xl font-bold">Cadastre-se Agora!</h1>
        <p class="py-6">Cadastre-se para participar do Programa Imigrante Legal, conheça todos os processos envolvidos para realizar o sonho de morar em outro País.</p>
      </div>
      <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <div class="card-body">
          <x-authentication-card-logo />
            <x-splade-form action="{{route('lead.store')}}">
                
                <x-splade-input name="nome" label="Nome Completo" />
                
                <x-splade-input name="telefone" id="telefone" label="Telefone" maxlength="15" />

                <x-splade-input name="email" label="Email address" type="email"  />
             
                <x-splade-select name="state_id" :options="json_decode($states)" label="Estado" choices  />

                <x-splade-select name="city_id" remote-url="`/api/cities/${form.state_id}`" option-label="title" option-value="id" choices label="Cidade"/>

                <x-splade-input name="pais_interesse" label="País de Interesse" />
             
                <div class="form-control mt-6">
                    <x-splade-submit class="btn btn-block btn-primary">Cadastrar </x-splade-submit>
                </div>
                
            </x-splade-form>


            <x-splade-script>
              const inputTelefone = document.getElementById('telefone');
      
              inputTelefone.addEventListener('input', function() {
                  const value = this.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
                  if (value.length <= 10) {
                      this.value = value.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
                  } else {
                      this.value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
                  }
              });
            </x-splade-script>
           
        </div>
      </div>
    </div>
  </div>

  