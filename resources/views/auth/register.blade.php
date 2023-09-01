@isset (request()->token)
    @if(App\Models\CodePremium::where('token', request()->token)->first())

@seoTitle(__('Register'))

<x-authentication-card>
    <x-slot:logo>
        <x-authentication-card-logo />
    </x-slot>

    <x-splade-form class="space-y-4">

        <x-splade-data default="{ name: '{{ request()->input('code') }}' }">
            <input v-model="data.name" hidden/>
        </x-splade-data>

        <x-splade-input id="name" name="name" :label="__('Name')" placeholder='Ex: Maria Eduarda Gonçalves' required autofocus />
        <x-splade-input id="email" name="email" type="email" placeholder='exemplo@exemplo.com' :label="__('Email')" required />
        <x-splade-input id="phone" name="phone" placeholder='11987654321'  :label="__('Telefone (DDD + Número)')" :prepend='+55' minlength="10" maxlength="11" required autofocus />
        <x-splade-input id="password" name="password" type="password" :label="__('Password')" required autocomplete="new-password" />
        <x-splade-input id="password_confirmation" name="password_confirmation" type="password" :label="__('Confirm Password')" required autocomplete="new-password" />

        @if(\Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <x-splade-checkbox name="terms">
                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                ]) !!}
            </x-splade-checkbox>
        @endif

        <div class="flex items-center justify-end">
            <Link href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Already registered?') }}
            </Link>

            <x-splade-submit :label="__('Register')" class="ml-4" />
        </div>
    </x-splade-form>
</x-authentication-card>
@else
    @php
        header("Location: " . URL::to('/'), true, 302);
        exit();
    @endphp
@endif

@else
    @php
        header("Location: " . URL::to('/'), true, 302);
        exit();
    @endphp
@endisset