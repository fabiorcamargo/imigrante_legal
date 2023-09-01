@seoTitle(__('Dashboard'))

<x-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Currículo') }}
        </h2>
        </x-slot>

        <x-panel>
            {{ $resume->nome }}
        </x-panel>



</x-layout>