<div x-data="{
    copyText: '{{$item}}',
    copyNotification: false,
    copyToClipboard() {
        navigator.clipboard.writeText(this.copyText);
        this.copyNotification = true;
        let that = this;
        setTimeout(function(){
            that.copyNotification = false;
        }, 3000);
    }
    }" class="relative z-20 flex items-center">

    <button value="copy" data-copy="{{$item}}"
        class="copy block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
        <div id="copia{{$id}}">
            <span>{{$item}}</span>
            <x-heroicon-o-clipboard-document-list class="h-8 ml-1.5 stroke-current" />
        </div>
        <div id="copiado{{$id}}" hidden>
            <span class="tracking-tight text-green-500">Copiado!</span>
            <x-heroicon-o-clipboard-document-check class="h-8 ml-1.5 text-green-500 stroke-current" />
        </div>
    </button>
</div>
<button class="copy" data-value="Texto a ser copiado 1">Copiar 1</button>
        <button class="copy" data-value="Texto a ser copiado 2">Copiar 2</button>

