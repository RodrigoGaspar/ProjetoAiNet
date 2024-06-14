        <nav class="bg-white dark:bg-gray-900 border-b border-gray-100 dark:border-gray-800">
            <!-- Navigation Menu Full Container -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Logo + Menu Items + Hamburger -->
                <div class="relative flex flex-col sm:flex-row px-6 sm:px-0 grow justify-between">
                    <!-- Logo -->
                    <div class="shrink-0 -ms-4">
                        <a href="{{ route('home') }}">
                            <div
                                class="h-16 w-40 bg-cover bg-[url('../img/politecnico_h.svg')] dark:bg-[url('../img/politecnico_h_white.svg')]">
                            </div>
                        </a>
                    </div>

                    <!-- Menu Items -->
                    <div id="menu-container"
                        class="grow flex flex-col sm:flex-row items-stretch
                    invisible h-0 sm:visible sm:h-auto">
                <!-- Menu Item: Courses -->
                @can('viewMovies', App\Models\Movie::class)
                    <x-menus.menu-item content="Movies" href="{{ route('movies') }}"
                        selected="{{ Route::currentRouteName() == 'index' }}" />
                @endcan

                
                <!-- Menu Item: Cart -->
                @if (session('cart'))
                    @can('use-cart')
                        <x-menus.cart :href="route('cart.show')" selectable="1"
                            selected="{{ Route::currentRouteName() == 'cart.show' }}" :total="session('cart')->count()" />
                    @endcan
                @endif

                @auth
                        <x-menus.submenu selectable="0" uniqueName="submenu_user">
                            <x-slot:content>
                                <div class="pe-1">
                                    <img src="{{ Auth::user()->photoFullUrl }}"
                                        class="w-11 h-11 min-w-11 min-h-11 rounded-full">
                                </div>
                                {{-- ATENÇÃO - ALTERAR FORMULA DE CALCULO DAS LARGURAS MÁXIMAS QUANDO O MENU FOR ALTERADO --}}
                                <div
                                    class="ps-1 sm:max-w-[calc(100vw-39rem)] md:max-w-[calc(100vw-41rem)] lg:max-w-[calc(100vw-46rem)] xl:max-w-[34rem] truncate">
                                    {{ Auth::user()->name }}
                                </div>
                                </x-slot>
                                <x-menus.submenu-item content="Área de administração" selectable="0" href="{{ route('dashboard') }}" />
                                @can('viewMy', App\Models\Movie::class)
                                    <x-menus.submenu-item content="My Movies" selectable="0"
                                        href="{{ route('movies') }}" />
                                @endcan
                                {{--
                                @can('viewMy', App\Models\::class)
                                    <x-menus.submenu-item content="My Teachers" selectable="0"
                                        href="{{ route('teachers.my') }}" />
                                @endcan
                                 --}}
                                @can('viewMy', App\Models\User::class)
                                    <x-menus.submenu-item content="My Users" selectable="0"
                                        href="{{ route('Users.my') }}" />
                                @can('viewMy', App\Models\Student::class)
                                    <x-menus.submenu-item content="My Students" selectable="0" href="{{ route('students.my') }}" />
                                    <hr>
                                @endcan
                                @auth
                                    <hr>
                                    <x-menus.submenu-item content="Profile" selectable="0" :href="match (Auth::user()->type) {
                                        'A' => route('administratives.edit', ['administrative' => Auth::user()]),
                                        'T' => route('teachers.edit', ['teacher' => Auth::user()->teacher]),
                                        'U' => route('Users.edit', ['user' => Auth::user()->user]),
                                    }" />
                                    <x-menus.submenu-item content="Change Password" selectable="0"
                                        href="{{ route('profile.edit.password') }}" />
                                @endauth
                                <hr>
                                <form id="form_to_login_from_menu" method="POST" action="{{ route('login') }}"
                                    class="hidden">
                                    @csrf
                                </form>
                                <x-menus.submenu-item content="Log Out" selectable="0" form="form_to_login_from_menu" />

                        </x-menus.submenu>
                @else
                    <!-- Menu Item: Login -->
                    <x-menus.menu-item content="Login" selectable="1" href="{{ route('login') }}"
                        selected="{{ Route::currentRouteName() == 'login' }}" />
                @endif
                @endauth
            </div>
            <!-- Hamburger -->
            <div class="absolute right-0 top-0 flex sm:hidden pt-3 pe-3 text-black dark:text-gray-50">
                <button id="hamburger_btn">
                    <svg class="h-8 w-8" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path id="hamburger_btn_open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                        <path class="invisible" id="hamburger_btn_close" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>