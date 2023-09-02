<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<html lang="pt-BR" data-theme="winter">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:description" content="O portal para quem sonha em morar no exterior! Aqui você vai encontrar dicas dos melhores países e indicações de progamas para quem deseja morar fora.">


    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Organization",
          "name": "Imigrante Legal",
          "description": "O portal para quem sonha em morar no exterior! Aqui você vai encontrar dicas dos melhores países e indicações de progamas para quem deseja morar fora.",
          "url": "https://imigrantelegal.com.br",
          "logo": "https://imigrantelegal.com.br/storage/assets/img/logo.svg",
          "sameAs": [
                "https://www.facebook.com/imigrantelegaloficial"
            ]
        }
    </script>
    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '167867373000120');
            fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=167867373000120&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->

    @spladeHead
    @vite('resources/js/app.js')
</head>

<body class="font-sans antialiased">
    @splade
</body>

</html>