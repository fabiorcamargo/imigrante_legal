@php
$directory = pathinfo($img, PATHINFO_DIRNAME);
$nomeDoArquivo = basename($img);
@endphp
<picture>
    <source srcset="{{ asset("$directory/x300$nomeDoArquivo") }}" media="(max-width: 480px)">
    <source srcset="{{ asset("$directory/x600$nomeDoArquivo") }}" media="(max-width: 720px)">
    <source srcset="{{ asset("$directory/x1200$nomeDoArquivo") }}" media="(min-width: 1025px)">
    <img src="{{ asset($img) }}" alt="{{$alt}}" class="{{$class ?? ''}}">
</picture>