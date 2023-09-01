@seoTitle(__('Criar Currículo'))

<x-app-layout>
    <x-slot:header>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Currículo') }}
        </h2>
        </x-slot>
        

        <x-panel>
            @if( app('request')->input('resume') !== "" )
            <x-nav-resume resume="{{app('request')->input('resume')}}"></x-nav-resume>
        @endif
        
           
            <x-splade-modal id="objetivos_modal" name="objetivos_modal">
                <div class="space-y-4 py-8">
                    <div>
                        <x-splade-form :for="$form" />
                        <x-splade-script>

                            document.getElementById('state_id').addEventListener('change', function() {
                            var stateId = this.value;

                            fetch('/api/cities/' + stateId)
                            .then(response => response.json())
                            .then(data => {
                            if (data) { // Verifique se a propriedade cities está presente
                            var citySelect = document.getElementById('city_id');
                            citySelect.innerHTML = '';

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
                    </div>
                </div>
            </x-splade-modal>

            <h3 class="font-bold" size="1" text="Criar Currículo"></h3>

            <div class="flex flex-row justify-end mb-3 px-3 px-0 -mr-2 sm:-mr-3">
                <Link class="text-white bg-indigo-500 px-2 py-2 rounded-lg" href="#objetivos_modal">
                    Novo
                </Link>
            </div>
            <x-splade-table :for="$users">

                <x-splade-cell inicio>
                    {{$item->inicio->format('d/m/y')}}
                </x-splade-cell>
                <x-splade-cell fim>
                    {{$item->fim !== null ? $item->fim->format('d/m/y') : ""}}
                </x-splade-cell>
                <x-splade-cell actions>
                    <Link href="{{route('empregos.edit', ['work' => $item->id, 'resume' =>1])}}">
                        <x-heroicon-o-pencil-square class="w-5 text-blue-500" />
                    </Link>

                    <x-splade-form action="{{route('empregos.delete', $item->id)}}" confirm="Delete profile"
                        confirm-text="Você realmente deseja excluir isso?" confirm-button="Sim, quero excluir!"
                        cancel-button="Não, cancelar!" method="delete">
                        <button class="text-red-500 px-4" type="submit">
                            <x-heroicon-o-trash class="w-5 text-red-500" />
                        </button>

                    </x-splade-form>
                </x-splade-cell>
            </x-splade-table>



            <div class="pt-6">

            </div>

            <div class="text-2xl">
                <!-- Passando a variável para o componente Vue -->

            </div>

        </x-panel>



</x-app-layout>