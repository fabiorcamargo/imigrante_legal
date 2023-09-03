<x-splade-data store="mobileNavigation" default="{ open: false }" />

<x-splade-rehydrate on="refresh-navigation-menu, profile-information-updated">
    <nav class="text-sm relative left-0 min-w-full w-56 z-30 ">
        <!-- Primary Navigation Menu -->
        <div class="max-full mx-auto px-4 ">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <x-application-logo />
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                            {{ __('Início') }}
                        </x-nav-link>
                    </div>

                    @auth

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    </div>

                    @can('admin')

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('lead.index')" :active="request()->routeIs('lead.*')">
                            {{ __('Leads') }}
                        </x-nav-link>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('country.index')" :active="request()->routeIs('country.*')">
                            {{ __('Países') }}
                        </x-nav-link>
                    </div>

                    @endcan


                    @php $resume = auth()->user()->resume()->first() @endphp
                    <!-- Navigation Links -->
                    {{--<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('curriculo', ['resume' => $resume])"
                            :active="request()->routeIs('resume.*')">
                            {{ __('Currículo') }}
                        </x-nav-link>
                    </div>--}}




                    @endauth

                </div>

                @auth

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="ml-3 relative">
                        @if(\Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <x-splade-dropdown>
                            <x-slot:trigger>
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ auth()->user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                                </x-slot>

                                <div
                                    class="w-60 mt-2 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 py-1 bg-white">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link :href="route('teams.show', auth()->user()->currentTeam)">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-dropdown-link :href="route('teams.create')">
                                        {{ __('Create New Team') }}
                                    </x-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-200" />

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach(auth()->user()->allTeams() as $team)
                                    <x-splade-form method="PUT" :action="route('current-team.update')"
                                        :default="['team_id' => $team->getKey()]">
                                        <x-dropdown-link as="button">
                                            <div class="flex items-center">
                                                @if($team->is(auth()->user()->currentTeam))
                                                <svg class="mr-2 h-5 w-5 text-green-400"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                @endif

                                                <div>{{ $team->name }}</div>
                                            </div>
                                        </x-dropdown-link>
                                    </x-splade-form>
                                    @endforeach
                                </div>
                        </x-splade-dropdown>
                        @endif
                    </div>

                    <!-- Settings Dropdown -->
                    <div class="ml-3 relative">
                        <x-splade-dropdown>
                            <x-slot:trigger>
                                @if(\Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}">
                                </button>
                                @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ auth()->user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </button>
                                </span>
                                @endif
                                </x-slot>

                                <div
                                    class="w-48 mt-2 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 py-1 bg-white">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-dropdown-link :href="route('profile.show')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    @if(\Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link :href="route('api-tokens.index')">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                    @endif

                                    <div class="border-t border-gray-200" />

                                    <!-- Authentication -->
                                    <x-splade-form :action="route('logout')">
                                        <x-dropdown-link as="button">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </x-splade-form>
                                </div>
                        </x-splade-dropdown>
                    </div>
                </div>
                @endauth

                @auth
                    
                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                        @click="mobileNavigation.open = ! mobileNavigation.open">
                        <p class="px-2" aria-label="Menu">Menu</p>
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': mobileNavigation.open, 'inline-flex': ! mobileNavigation.open }"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! mobileNavigation.open, 'inline-flex': mobileNavigation.open }"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>

                    </button>
                </div>
                @endauth

            </div>
        </div>



        <!-- Responsive Navigation Menu -->
        <div :class="{'block': mobileNavigation.open, 'hidden': ! mobileNavigation.open}" class="sm:hidden">

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                    {{ __('Início') }}
                </x-responsive-nav-link>
            </div>



            @auth

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('lead.index')" :active="request()->routeIs('lead.*')">
                    {{ __('Lead') }}
                </x-responsive-nav-link>
            </div>

            @if(auth()->user()->resume() == null)

            @php $resume = auth()->user()->resume()->first() @endphp

            <!-- Navigation Links -->
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('resume.edit', ['resume' => $resume])"
                    :active="request()->routeIs('resume.edit')">
                    {{ __('Currículo') }}
                </x-responsive-nav-link>
            </div>
            @else
            <!-- Navigation Links -->
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('resume.create')" :active="request()->routeIs('resume.create')">
                    {{ __('Currículo') }}
                </x-responsive-nav-link>
            </div>

            @endif





            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if(\Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ auth()->user()->profile_photo_url }}"
                            alt="{{ auth()->user()->name }}">
                    </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">
                            {{ auth()->user()->name }}
                        </div>
                        <div class="font-medium text-sm text-gray-500">
                            {{ auth()->user()->email }}
                        </div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.show')" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    @if(\Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link :href="route('api-tokens.index')"
                        :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <x-splade-form method="POST" :action="route('logout')">
                        <x-responsive-nav-link as="button">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </x-splade-form>

                    <!-- Team Management -->
                    @if(\Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200" />

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link :href="route('teams.show', auth()->user()->currentTeam)"
                        :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                    <x-responsive-nav-link :href="route('teams.create')" :active="request()->routeIs('teams.create')">
                        {{ __('Create New Team') }}
                    </x-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200" />

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach(auth()->user()->allTeams() as $team)
                    <x-splade-form method="PUT" :action="route('current-team.update')"
                        :default="['team_id' => $team->getKey()]">
                        <x-responsive-nav-link as="button">
                            <div class="flex items-center">
                                @if($team->is(auth()->user()->currentTeam))
                                <svg class="mr-2 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                @endif

                                <div>{{ $team->name }}</div>
                            </div>
                        </x-responsive-nav-link>
                    </x-splade-form>
                    @endforeach
                    @endif
                </div>
            </div>
            @endauth

        </div>
    </nav>
</x-splade-rehydrate>