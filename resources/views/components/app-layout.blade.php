<x-banner />

{{--<div class="min-h-screen bg-gray-100">--}}
<div class="min-h-screen bg-gray-50">
    <x-navigation />

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-gray-50 shadow">
            <div class="max-full mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main class="bg-gray-50" >
        {{ $slot }}
    </main>
    
    <x-footer class="z-0"></x-footer>
</div>