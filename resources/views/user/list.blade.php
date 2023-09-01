<x-app-layout>
    <x-slot name="header">
        {{-- __('Home') --}}
    </x-slot>

 <x-panel>

    <x-splade-table :for="$users" />
    
    </x-panel>
</x-app-layout>

