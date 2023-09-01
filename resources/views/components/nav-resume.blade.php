<div class="pb-8 mx-0">
    <ul class="steps lg:steps-horizontal">
        <li class="step {{ isset(auth()->user()->resume()->first()->id) ? 'step-primary' : ''}}"
            data-content="{{ isset(auth()->user()->resume()->first()->id) ? '✓' : '!'}}">
            <x-nav-link :href="route('curriculo', ['resume' => $resume])" :active="request()->routeIs('resume.*')">
                {{ __('Dados') }}
            </x-nav-link>
        </li>

        <li class="step {{ isset(auth()->user()->training()->first()->id) ? 'step-primary' : 'step-warning'}} "
            data-content="{{ isset(auth()->user()->training()->first()->id) ? '✓' : '!'}}">
            <x-nav-link :href="route('formacao.index', ['resume' => $resume])"
                :active="request()->routeIs('formacao.*')" class="animate-fade-up">
                @if(isset(auth()->user()->resume()->first()->id) and !isset(auth()->user()->training()->first()->id))
                <div class="pe-1 animate-shake animate-infinite animate-duration-[1500ms] text-primary">></div>
                @endif
                {{ __('Formação') }}
               
            </x-nav-link>

        </li>
        <li class="step {{ isset(auth()->user()->courses()->first()->id) ? 'step-primary' : 'step-warning'}}"
            data-content="{{ isset(auth()->user()->courses()->first()->id) ? '✓' : '!'}}">
            <x-nav-link :href="route('cursos.index', ['resume' => $resume])" :active="request()->routeIs('cursos.*')"
                class="animate-fade-up animate-delay-300">
                @if(isset(auth()->user()->resume()->first()->id) and isset(auth()->user()->training()->first()->id) and !isset(auth()->user()->courses()->first()->id))
                <div class="pe-1 animate-shake animate-infinite animate-duration-[1500ms] text-primary"> > </div>
                @endif
                {{ __('Cursos') }}
                
            </x-nav-link>
        </li>
        <li class="step {{ isset(auth()->user()->works()->first()->id) ? 'step-primary' : 'step-warning'}}"
            data-content="{{ isset(auth()->user()->works()->first()->id) ? '✓' : '!'}}">
            <x-nav-link :href="route('empregos.index', ['resume' => $resume])"
                :active="request()->routeIs('empregos.*')" class="animate-fade-up animate-delay-[600ms]">
                @if(isset(auth()->user()->resume()->first()->id) and isset(auth()->user()->training()->first()->id) and isset(auth()->user()->courses()->first()->id) and !isset(auth()->user()->works()->first()->id))
                <div class="pe-1 animate-shake animate-infinite animate-duration-[1500ms] text-primary"> > </div>
                @endif
                {{ __('Profissão') }}
               
            </x-nav-link>
        </li>
    </ul>
</div>