<x-dashboard-layout title="Dashboard" :breadcrumb="[['label' => 'Dashboard', 'active' => true]]" class="grid grid-cols-1 md:grid-cols-12 gap-4 p-4">
    {{-- Banner --}}
    <section class="order-1 col-span-12 md:col-span-8 lg:col-span-9 w-full relative from-blue-600 to-blue-900 bg-gradient-to-br rounded shadow p-5">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <img src="{{ asset('/storage/pictures/graduation-cap.png') }}" alt="Graduation Cap"
                class="absolute right-0 -top-5 h-44 opacity-50 lg:opacity-80 animate-shake [animation-delay:1s]">
        </div>
        <div class="lg:w-3/4 relative">
            <h1 class="text-xl md:text-2xl lg:text-3xl xl:text-4xl text-white font-bold mb-3 drop-shadow-md">
                Persiapkan Dirimu Menuju
                Kelulusan!</h1>
            <p class="text-xs md:text-base text-slate-300 drop-shadow">Gunakan SISKAPI untuk mencatat dan mengelola
                semua data kegiatanmu, serta pastikan poin SKKM kamu mencukupi untuk mendapatkan SKPI.</p>
        </div>
    </section>

    {{-- Side Content --}}
    <div class="order-2 md:order-3 col-span-12 row-start-2 md:row-start-1 md:row-span-2 md:col-span-4 lg:col-span-3 space-y-4">
        <section class="w-full bg-white rounded shadow p-4" x-data="{ current: 18, target: 28 }">
            <h2 class="text-lg text-slate-700 font-bold drop-shadow-sm">Progress Poin SKKM</h2>
            <div class="relative">
                <div id="poinSKKMProgressChart" x-bind:data-current="current" x-bind:data-target="target"
                    class="pointer-events-none"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <span class="text-blue-600 text-6xl md:text-4xl lg:text-5xl font-bold drop-shadow"
                        x-text="current"></span>
                    <span class="text-slate-500 text-lg font-normal">/ <span x-text="target"></span></span>
                </div>
            </div>
        </section>

        <section class="w-full from-blue-600 to-blue-900 bg-gradient-to-tr rounded p-4 shadow">
            <h2 class="text-xl font-bold text-white drop-shadow mb-4">Status SKPI</h2>
            <span class="bg-red-200 rounded p-2 font-medium text-red-700 block mx-auto text-center shadow">
                Tidak Terpenuhi
            </span>
        </section>
    </div>

    {{-- Main Content --}}
    <div class="order-4 md:order-2 col-span-12 md:row-start-2 md:col-span-8 lg:col-span-9 space-y-4">
        <section class="grid grid-cols-2 sm:grid-cols-2 xl:grid-cols-4 gap-4">
            <x-counter-card title="Terverifikasi" :count="5" icon="circle-check" class="bg-green-500"
            iconClass="text-green-600 w-24 h-24" />
            <x-counter-card title="Ditolak" :count="1" icon="circle-x" class="bg-red-500"
            iconClass="text-red-600 w-24 h-24" />
            <x-counter-card title="Menunggu" :count="2" icon="hourglass" class="bg-yellow-500"
            iconClass="text-yellow-600 w-24 h-24" />
            <x-counter-card title="Revisi" :count="8" icon="edit-circle" class="bg-orange-500"
                iconClass="text-orange-600 w-24 h-24" />
        </section>

        <section class="bg-white rounded p-4 shadow">
            <h1 class="text-xl md:text-3xl font-bold text-slate-700 mb-5 drop-shadow">Kegiatan Terbaru Kamu 🔥</h1>
            <div class="space-y-2">
                <a href="{{ route('mahasiswa.kegiatan') }}" class="rounded bg-white border-2 border-slate-100 p-3 flex flex-col items-start md:flex-row md:items-center gap-5 hover:shadow-sm hover:scale-[1.0025] hover:bg-slate-50 transition-all duration-300">
                    <span class="text-lg font-medium truncate order-1 md:order-2 w-full">MBKM Studi Independen Kampus Merdeka</span>
                    <div class="flex items-center w-24 shrink-0 order-2 md:order-1">
                        <img src="https://picsum.photos/800/800"
                            class="rounded-full w-8 h-8 object-cover object-center border">
                        <img src="https://picsum.photos/1000/1000"
                            class="rounded-full w-8 h-8 object-cover object-center -ml-3 border">
                        <img src="https://picsum.photos/700/700"
                            class="rounded-full w-8 h-8 object-cover object-center -ml-3 border">
                        <div class="rounded-full w-8 h-8 bg-slate-400 text-white -ml-3 border text-center content-center text-sm">+1</div>
                    </div>
                    <div class="w-full space-x-5 flex items-center justify-between shrink-0 order-3 md:w-auto md:ml-auto md:justify-normal">
                        <span class="text-slate-700">
                            11 Juni 2025
                        </span>
                        <span class="bg-yellow-200 px-2 py-1 rounded text-yellow-700 text-center font-medium">
                            Menunggu
                        </span>
                    </div>
                </a>
                <a href="{{ route('mahasiswa.kegiatan') }}" class="rounded bg-white border-2 border-slate-100 p-3 flex flex-col items-start md:flex-row md:items-center gap-5 hover:shadow-sm hover:scale-[1.0025] hover:bg-slate-50 transition-all duration-300">
                    <span class="text-lg font-medium truncate order-1 md:order-2 w-full">Bangkit Academy 2024 Batch 2</span>
                    <div class="flex items-center w-24 shrink-0 order-2 md:order-1">
                        <img src="https://picsum.photos/800/800"
                            class="rounded-full w-8 h-8 object-cover object-center border">
                        <img src="https://picsum.photos/1000/1000"
                            class="rounded-full w-8 h-8 object-cover object-center -ml-3 border">
                    </div>
                    <div class="w-full space-x-5 flex items-center justify-between shrink-0 order-3 md:w-auto md:ml-auto md:justify-normal">
                        <span class="text-slate-700">
                            11 Juni 2025
                        </span>
                        <span class="bg-yellow-200 px-2 py-1 rounded text-yellow-700 text-center font-medium">
                            Menunggu
                        </span>
                    </div>
                </a>
                <a href="{{ route('mahasiswa.kegiatan') }}" class="rounded bg-white border-2 border-slate-100 p-3 flex flex-col items-start md:flex-row md:items-center gap-5 hover:shadow-sm hover:scale-[1.0025] hover:bg-slate-50 transition-all duration-300">
                    <span class="text-lg font-medium truncate order-1 md:order-2 w-full">Teknospace 2023</span>
                    <div class="flex items-center w-24 shrink-0 order-2 md:order-1">
                        <img src="https://picsum.photos/800/800"
                            class="rounded-full w-8 h-8 object-cover object-center border">
                        <img src="https://picsum.photos/1000/1000"
                            class="rounded-full w-8 h-8 object-cover object-center -ml-3 border">
                        <img src="https://picsum.photos/700/700"
                            class="rounded-full w-8 h-8 object-cover object-center -ml-3 border">
                    </div>
                    <div class="w-full space-x-5 flex items-center justify-between shrink-0 order-3 md:w-auto md:ml-auto md:justify-normal">
                        <span class="text-slate-700">
                            11 Juni 2025
                        </span>
                        <span class="bg-green-200 px-2 py-1 rounded text-green-700 text-center font-medium">
                            Terverifikasi
                        </span>
                    </div>
                </a>
            </div>
        </section>
    </div>

    @push('scripts')
        @vite('resources/js/pages/mahasiswa/dashboard.js')
    @endpush
</x-dashboard-layout>
