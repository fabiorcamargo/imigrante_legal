@seoTitle(__('Dashboard'))

<x-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Currículo') }}
        </h2>
        </x-slot>

        <x-panel>
            <x-splade-form :default="$user" :action="route('user.update')">
                <x-splade-input nome="nome" :label="__('Nome')" />
                <p v-text="form.errors.nome" />
                <x-splade-submit />
            </x-splade-form>
        </x-panel>



</x-layout>