@seoTitle(__('Dashboard'))

<x-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Currículo') }}
        </h2>
        </x-slot>

        <x-panel>
            <x-splade-form >
                <x-splade-file name="avatar" :show-filename="false" />
             
                <img v-if="form.avatar" :src="form.$fileAsUrl('avatar')" />
             </x-splade-form>

             <x-splade-form :for="$form" />
        </x-panel>



</x-layout>