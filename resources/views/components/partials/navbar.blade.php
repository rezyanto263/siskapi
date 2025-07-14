@props(['breadcrumb'])

<nav class="w-full min-h-14 h-14 border-b top-0 shadow-sm bg-white flex items-center px-2 z-[48]">
    <x-button.icon icon="menu-3" color="secondary" class="p-1" iconClass="w-8 h-8" @click="$store.sidebar.toggle()" />
    <div class="ml-4 inline-flex items-center min-w-0">
        <x-breadcrumb :items="$breadcrumb" />
    </div>
    <x-dropdown class="ml-auto" textClass="hover:bg-slate-100 rounded">
        <x-slot name="text">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->nama }}&background=2563eb&color=fff&bold=true&format=png" alt="Profile Picture"
                class="rounded-full w-8 h-8 object-cover border-2 border-slate-600 mr-1 lg:mr-0">
            <span class="font-medium text-center whitespace-nowrap text-ellipsis overflow-hidden ml-2 mr-1 hidden lg:block">
                {{ Auth::user()->nama }}
            </span>
            <x-tabler-chevron-down ::class="{'w-4 h-4 transition-all duration-300': true, 'rotate-180': open}" style="stroke-width: 2.5" />
        </x-slot>
        <x-slot name="items">
            <a href="{{ route('logout') }}" class="flex items-center px-2 py-2 text-sm text-slate-600 hover:text-slate-700 active:text-slate-800 hover:bg-slate-100">
                <x-tabler-user-square-rounded class="w-5 h-5 mr-2 text-blue-600" />
                Profil
            </a>
            <a href="{{ route('logout') }}" class="flex items-center px-2 py-2 text-sm text-slate-600 hover:text-slate-700 active:text-slate-800 hover:bg-slate-100">
                <x-tabler-info-square-rounded class="w-5 h-5 mr-2 text-blue-600" />
                Bantuan
            </a>
            <a href="{{ route('logout') }}" class="flex items-center px-2 py-2 text-sm text-slate-600 hover:text-slate-700 active:text-slate-800 hover:bg-red-50">
                <x-tabler-logout class="w-5 h-5 mr-2 text-red-600" />
                Logout
            </a>
        </x-slot>
    </x-dropdown>
</nav>
