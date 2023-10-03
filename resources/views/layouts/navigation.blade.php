<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-14">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home_page') }}">
                        <x-application-logo class="block h-7 w-auto fill-current text-gray-800" />
                    </a>
                </div>
            </div>
            @auth
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="flex gap-3 items-center mx-2">
                    <div>
                        <a href="{{route('home_page')}}">
                            {!! url()->current() == route('home_page') ?  '<i class="bx bxs-home text-xl"></i>' :  '<i class="bx bx-home text-xl" ></i>' !!}
                        </a>
                    </div>

                    <div>
                        <a href="{{route('explore_posts')}}">
                            {!! url()->current() == route('explore_posts') ?  "<i class='bx bxs-compass text-xl'></i>" :  "<i class='bx bx-compass text-xl'></i>" !!}
                        </a>
                    </div>

                    <div>
                        <a href="{{route('create_post')}}">
                            {!! url()->current() == route('create_post') ?  "<i class='bx bxs-message-square-add  text-xl' ></i>" :  "<i class='bx bx-message-square-add  text-xl'></i>" !!}
                        </a>
                    </div>

                    <div class="mx-2">
                        <x-dropdown align="right" width="96">
                            <x-slot name="trigger">
                                <button wire:click="$emit('notification_clicked')">
                                    <i class='bx bx-bell text-xl'></i>
                                </button>
                                @livewire('pending-list-count', ["userId" => auth()->user()->id ])
                            </x-slot>

                            <x-slot name="content">
                                @livewire('pending-list', ["userId" => auth()->user()->id ])
                            </x-slot>
                        </x-dropdown>
                    </div>

                </div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div><img class="w-8 h-8 rounded-full  object-cover" src="{{ auth()->user()->image }}" alt=""></div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('my_profile' , auth()->user()->username)">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Setting') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>


                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            @endauth
            @guest
            <div>
                <a class="mx-2 nice-btn" href="/login">
                    {{ __("Login")}}
                </a>
                <a class="mx-2 nice-btn  " href="/register">
                    {{ __("Register")}}
                </a>
            </div>
            @endguest
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home_page')" :active="request()->routeIs('home_page')">
                {{ __('home_page') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                {{-- <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div> --}}
            </div>

            <div class="mt-3 space-y-1">
                {{-- <x-responsive-nav-link :href="route('my_profile' , auth()->user()->username)">
                    {{ __('Profile') }}
                </x-responsive-nav-link> --}}

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
