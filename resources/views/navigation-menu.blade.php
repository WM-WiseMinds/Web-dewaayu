<div class="flex h-screen bg-gray-50 dark:bg-gray-900">
    <!-- Primary Navigation Menu -->
    <aside class="z-10 hidden w-64 overflow-y-auto bg-violet-600 md:block flex-shrink-0">
        <div class=" text-center  py-4 text-gray-500 dark:text-gray-400">
            <a href="{{ route('dashboard') }}" class=" mx-4text-lg font-bold text-white dark:text-gray-200">
                SISTEM INFORMASI PENGARSIPAN SURAT
            </a>
            <ul class="mt-6">
                {{-- Dashboard --}}
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('dashboard') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('dashboard') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path
                                d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                            <path
                                d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                        </svg> <span class="ml-4">{{ __('Dashboard') }}</span>
                    </x-nav-link>
                </li>
                {{-- Permissions --}}
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('permissions') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('permissions') }}" :active="request()->routeIs('permissions')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('permissions') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M15.75 1.5a6.75 6.75 0 0 0-6.651 7.906c.067.39-.032.717-.221.906l-6.5 6.499a3 3 0 0 0-.878 2.121v2.818c0 .414.336.75.75.75H6a.75.75 0 0 0 .75-.75v-1.5h1.5A.75.75 0 0 0 9 19.5V18h1.5a.75.75 0 0 0 .53-.22l2.658-2.658c.19-.189.517-.288.906-.22A6.75 6.75 0 1 0 15.75 1.5Zm0 3a.75.75 0 0 0 0 1.5A2.25 2.25 0 0 1 18 8.25a.75.75 0 0 0 1.5 0 3.75 3.75 0 0 0-3.75-3.75Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ml-4">Permissions</span>
                    </x-nav-link>
                </li>
                {{-- Roles --}}
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('roles') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('roles') }}" :active="request()->routeIs('roles')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('roles') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M12.516 2.17a.75.75 0 0 0-1.032 0 11.209 11.209 0 0 1-7.877 3.08.75.75 0 0 0-.722.515A12.74 12.74 0 0 0 2.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 0 0 .374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 0 0-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08Zm3.094 8.016a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="ml-4">Roles</span>
                    </x-nav-link>
                </li>
                {{-- User --}}
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('user') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('user') }}" :active="request()->routeIs('user')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('user') ? 'text-purple-400' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                        </svg>
                        <span span class="ml-4">Berita</span>
                    </x-nav-link>
                </li>
            </ul>
        </div>
    </aside>

    <div x-show="open" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>

    <!-- Responsive Navigation Menu -->
    <aside :class="{ 'block': open, 'hidden': !open }"
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="open" x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20">

        <div class="py-4 text-gray-500">
            <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                Windmill
            </a>
            <ul class="mt-6">
                <li class="relative px-6 py-3">
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                    <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span class="ml-4">{{ __('Dashboard') }}</span>
                    </x-responsive-nav-link>
                </li>
            </ul>
        </div>
    </aside>
</div>
