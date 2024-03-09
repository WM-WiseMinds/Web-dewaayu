<div class="flex h-screen bg-gray-50 dark:bg-gray-900">
    <!-- Primary Navigation Menu -->
    <aside
    class="z-10 hidden w-64 overflow-y-auto bg-gradient-to-t from-purple-800 to-violet-600 md:block flex-shrink-0">
        <div class=" text-center py-4 text-gray-500 dark:text-gray-400">
            <a href="{{ route('dashboard') }}" class=" mx-4 my-auto text-lg font-bold text-white dark:text-gray-200">
                SEKRETARIAT TAPM
            </a>
            <ul class="mt-6">
                {{-- Dashboard --}}
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('dashboard') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('dashboard') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span class="ml-4">{{ __('Dashboard') }}</span>
                    </x-nav-link>
                </li>
                @if (auth()->user()->hasRole('Operator'))
                    {{-- Permissions --}}
                    <li
                        class="relative px-6 py-3 {{ request()->routeIs('permissions') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <x-nav-link href="{{ route('permissions') }}" :active="request()->routeIs('permissions')"
                            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('permissions') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                            </svg>
                            <span class="ml-4">Permissions</span>
                        </x-nav-link>
                    </li>
                    {{-- Roles --}}
                    <li
                        class="relative px-6 py-3 {{ request()->routeIs('roles') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <x-nav-link href="{{ route('roles') }}" :active="request()->routeIs('roles')"
                            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('roles') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                            </svg>
                            <span class="ml-4">Roles</span>
                        </x-nav-link>
                    </li>
                    {{-- User --}}
                    <li
                        class="relative px-6 py-3 {{ request()->routeIs('user') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <x-nav-link href="{{ route('user') }}" :active="request()->routeIs('user')"
                            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('user') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            <span span class="ml-4">User</span>
                        </x-nav-link>
                    </li>
                    {{-- Desa --}}
                    <li
                        class="relative px-6 py-3 {{ request()->routeIs('desa') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <x-nav-link href="{{ route('desa') }}" :active="request()->routeIs('desa')"
                            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('desa') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                            </svg>
                            <span span class="ml-4">Desa</span>
                        </x-nav-link>
                    </li>
                @endif
                @if (auth()->user()->hasRole('Operator') ||
                        auth()->user()->hasRole('Sekretaris Desa') ||
                        auth()->user()->hasRole('Koor TAPM'))
                    {{-- Surat --}}
                    <li
                        class="relative px-6 py-3 {{ request()->routeIs('surat') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <x-nav-link href="{{ route('surat') }}" :active="request()->routeIs('surat')"
                            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('surat') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            <span span class="ml-4">Surat</span>
                        </x-nav-link>
                    </li>
                @endif
                @if (auth()->user()->hasRole('Koor TAPM') ||
                        auth()->user()->hasRole('Anggota TAPM') ||
                        auth()->user()->hasRole('Operator'))
                    {{-- Penugasan --}}
                    <li
                        class="relative px-6 py-3 {{ request()->routeIs('penugasan') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <x-nav-link href="{{ route('penugasan') }}" :active="request()->routeIs('penugasan')"
                            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('penugasan') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                            </svg>

                            <span span class="ml-4">Penugasan</span>
                        </x-nav-link>
                    </li>
                @endif
                {{-- Penjadwalan --}}
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('penjadwalan') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('penjadwalan') }}" :active="request()->routeIs('penjadwalan')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('penjadwalan') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                        <span span class="ml-4">Penjadwalan</span>
                    </x-nav-link>
                </li>
                @if (auth()->user()->hasRole('Operator'))
                    {{-- Berita --}}
                    <li
                        class="relative px-6 py-3 {{ request()->routeIs('berita') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <x-nav-link href="{{ route('berita') }}" :active="request()->routeIs('berita')"
                            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('berita') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                            </svg>
                            <span span class="ml-4">Berita</span>
                        </x-nav-link>
                    </li>
                @endif
            </ul>
        </div>
    </aside>

    <div x-show="open" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>

    <!-- Responsive Navigation Menu -->
    <aside :class="{ 'block': open, 'hidden': !open }"
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-gradient-to-t from-purple-800 to-violet-600 dark:bg-gray-800 md:hidden"
        x-show="open" x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20">

        <div class="text-center py-4 text-gray-500">
            <a href="{{ route('dashboard') }}" class=" mx-4 my-auto text-lg font-bold text-white dark:text-gray-200">
                SEKRETARIAT TAPM
            </a>
            <ul class="mt-6">
                {{-- Dashboard --}}
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('dashboard') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('dashboard') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span class="ml-4">{{ __('Dashboard') }}</span>
                    </x-nav-link>
                </li>
                {{-- Permissions --}}
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('permissions') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('permissions') }}" :active="request()->routeIs('permissions')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('permissions') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                        </svg>
                        <span class="ml-4">Permissions</span>
                    </x-nav-link>
                </li>
                {{-- Roles --}}
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('roles') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('roles') }}" :active="request()->routeIs('roles')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('roles') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                        </svg>
                        <span class="ml-4">Roles</span>
                    </x-nav-link>
                </li>
                {{-- User --}}
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('user') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('user') }}" :active="request()->routeIs('user')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('user') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        <span span class="ml-4">User</span>
                    </x-nav-link>
                </li>
                {{-- Desa --}}
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('desa') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('desa') }}" :active="request()->routeIs('desa')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('desa') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                        </svg>
                        <span span class="ml-4">Desa</span>
                    </x-nav-link>
                </li>
                {{-- Surat --}}
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('surat') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('surat') }}" :active="request()->routeIs('surat')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('surat') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        <span span class="ml-4">Surat</span>
                    </x-nav-link>
                </li>
                {{-- Penugasan --}}
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('penugasan') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('penugasan') }}" :active="request()->routeIs('penugasan')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('penugasan') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>

                        <span span class="ml-4">Penugasan</span>
                    </x-nav-link>
                </li>
                {{-- Penjadwalan --}}
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('penjadwalan') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('penjadwalan') }}" :active="request()->routeIs('penjadwalan')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('penjadwalan') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                        <span span class="ml-4">Penjadwalan</span>
                    </x-nav-link>
                </li>
                {{-- Berita --}}
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('berita') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('berita') }}" :active="request()->routeIs('berita')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('berita') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                        </svg>
                        <span span class="ml-4">Berita</span>
                    </x-nav-link>
                </li>
            </ul>
        </div>
    </aside>
</div>
