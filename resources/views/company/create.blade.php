@seoTitle('Criar Currículo Grátis')
@seoDescription('Venha cadastrar o seu currículo no melhor portal de empregos do Brasil!')
@seoKeywords('currículo, trabalho, emprego')


<x-app-layout>
    <x-slot:header>
        <div class="text-sm breadcrumbs pb-8">
            <ul>
                <li><a href="{{route('dashboard')}}">Painel</a></li>
                <li>{!! ucfirst(Request::segment(1)) !!}</li>
            </ul>
        </div>
        
        </x-slot>

        <x-panel>
            
            
            <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-4">
                {{ __('Empresas') }}
            </h2>

            @isset(auth()->user()->resume()->first()->id)
                @if(request()->routeIs('resume.*'))
                    <x-nav-resume resume="{{auth()->user()->resume()->first()->id}}"></x-nav-resume>
                @endif
            @endisset

            <x-splade-form :for="$form" />



            @if(str_contains(url()->current(), 'resume'))
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
                    <List_copy title="{{ $texto }}" />
                    @endforeach
                </div>
            </x-splade-modal>

            <div class="pt-6">
                <Link class="text-purple-600" href="#objetivos_modal">
                Exemplo de objetivos.
                </Link>
            </div>
            @endif
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