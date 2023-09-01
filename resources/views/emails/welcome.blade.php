@component('mail::message')
{{__("Parabéns $user->name agora você é Premium!") }}

{{ __('Estaremos enviando algumas informações para impulsionar a sua Carreira!') }}

{{ __('Fique sempre atento, a maioria das empresas gostam de se comunicar via email, sempre prefira cadastrar o email que você mais usa.') }}

{{ __('Abaixo segue o link de acesso ao portal!') }}

@component('mail::button', ['url' => route('welcome')])
{{ __('Acessar') }}
@endcomponent

{{ __('Se você não faz parte do Potal de Carreiras pode descartar esse email.') }}

{{ __('Atenciosamente ') . env('APP_NAME') }}
@endcomponent
