@seoTitle(__('Criar Currículo'))

<x-app-layout>
    <x-slot:header>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Currículo') }}
        </h2>
        </x-slot>


        <x-panel>
            @isset($form->getData()->id)
            <x-nav-resume resume="{{$form->getData()->id}}"></x-nav-resume>
        @endisset
            @php
                $textos = array( 
            "Busco uma posição desafiadora na área de [sua área de interesse], onde posso aplicar minhas habilidades [habilidades relevantes] para contribuir com o sucesso da equipe.",
            "Almejo desenvolver uma carreira sólida na [setor desejado], aproveitando minha experiência em [suas experiências relevantes] para impulsionar o crescimento da empresa.",
            "Procuro oportunidades de crescimento profissional como [cargo desejado], utilizando minha formação em [sua formação] para atingir metas e entregar resultados excepcionais.",
            "Desejo fazer parte de uma equipe dinâmica na indústria [indústria desejada], aplicando minha paixão por [um aspecto relevante da indústria] para criar impacto positivo."
        );
            @endphp
            <x-splade-modal id="objetivos_modal" name="objetivos_modal">
                <div class="space-y-4 py-8">
                    @foreach ($textos as $texto)
                        <List_copy title="{{ $texto }}"/>
                    @endforeach
                </div>
            </x-splade-modal>

            <h3 class="font-bold" size="1" text="Criar Currículo"></h3>
            
           
            
            <x-splade-form :for="$form" />

            <div class="pt-6">
                <Link class="text-purple-600" href="#objetivos_modal">
                Exemplo de objetivos.
                </Link >
            </div>

            <div class="text-2xl">
                    <!-- Passando a variável para o componente Vue -->
                        
            </div>

        </x-panel>

        
        <x-splade-script>
            document.getElementById('state_id').addEventListener('change', function() {
            var stateId = this.value;

            fetch('/api/cities/' + stateId)
                .then(response => response.json())
                .then(data => {
                if (data) { // Verifique se a propriedade cities está presente
                    var citySelect = document.getElementById('city_id');
                    citySelect.innerHTML = '';

                    var option = document.createElement('option');
                    option.value = '';
                    option.textContent = 'Selecione uma cidade';
                    citySelect.appendChild(option);

                    data.forEach(city => {
                    var option = document.createElement('option');
                    option.value = city.id;
                    option.textContent = city.title;
                    citySelect.appendChild(option);
                });
                } else {
                    console.error('A resposta da API não contém a propriedade cities:', data);
                }
            })
                .catch(error => console.error('Erro na requisição:', error));
            });

        </x-splade-script>

</x-app-layout>