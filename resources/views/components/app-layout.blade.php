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

    <script>
        (function(w,d,t,u,n,a,m){w['MauticTrackingObject']=n;
            w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments)},a=d.createElement(t),
            m=d.getElementsByTagName(t)[0];a.async=1;a.src=u;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://mautic.imigrantelegal.com.br/mtc.js','mt');
    
        mt('send', 'pageview');
    </script>
    
    <x-footer class="z-0"></x-footer>
</div>