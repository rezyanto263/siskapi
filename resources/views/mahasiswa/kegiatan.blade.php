<x-dashboard-layout title="Kegiatan" :breadcrumb="[['label' => 'Kegiatan', 'active' => true]]" class="p-4">
    <form action="{{ route('mahasiswa.kegiatan') }}" method="GET" class="grid grid-cols-6 gap-4 mb-10" x-init="
        ['status', 'posisi', 'tingkat', 'jenis'].forEach(name => {
            const el = $el.querySelector(`[name='${name}']`);
            if (el) el.addEventListener('change', () => $el.submit());
        });
      ">
        <div class="bg-white flex items-center gap-2 rounded p-2 shadow w-full col-span-6 md:col-span-3 xl:col-span-2">
            <x-button.icon icon="search" class="p-2" iconClass="w-6 h-6" type="submit" color="secondary" />
            <input type="text" name="search" placeholder="Cari kegiatan kamu..." value="{{ request('search') }}" class="outline-none border-0 text-lg w-full">
        </div>
        <div class="col-span-6 flex flex-wrap justify-start md:order-3 gap-2 md:gap-4">
            <x-select name="status" defaultValue="{{ request('status') }}" :options="[
                'null' => 'Semua Status',
                'terverifikasi' => 'Terverifikasi',
                'ditolak' => 'Ditolak',
                'menunggu' => 'Menunggu',
                'revisi' => 'Revisi',
            ]" />
            <x-select name="posisi" defaultValue="{{ request('posisi') }}" :options="[
                'null' => 'Semua Posisi',
                'peserta' => 'Peserta',
                'panitia' => 'Panitia',
                'Ketua' => 'Ketua',
            ]" />
            <x-select name="tingkat" defaultValue="{{ request('tingkat') }}" :options="[
                'null' => 'Semua Tingkat',
                'prodi' => 'Program Studi',
                'jurusan' => 'Jurusan',
                'kampus' => 'Kampus',
            ]" />
            <x-select name="jenis" defaultValue="{{ request('jenis') }}" :options="[
                'null' => 'Semua Jenis',
                'wajib' => 'Wajib',
                'seminar' => 'Seminar',
                'workshop' => 'Workshop',
            ]" />
        </div>
        <div class="col-span-6 md:col-span-3 xl:col-start-4 md:order-2">
            <x-button.solid class="ml-auto flex gap-3 items-center p-4" @click="$store.modals.open('addActivity')">
                <x-tabler-certificate />
                <span class="font-medium">Tambah Kegiatan</span>
            </x-button.solid>
        </div>
    </form>

    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <a href="{{ route('mahasiswa.kegiatan.detail', ['id' => 1]) }}" class="w-full bg-white border rounded p-4 space-y-2 shadow cursor-pointer hover:bg-slate-50 active:bg-slate-200 hover:scale-[1.005] transition duration-300" title="MBKM Studi Independen Kampus Merdeka">
            <img src="https://th.bing.com/th/id/OIP.Q8DVzSs7slvWNj7u8C1XsAHaFP?w=274&h=194&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3" alt="Sertifikat" class="rounded w-full max-w-full aspect-video object-cover object-center">
            <div>
                <h1 class="truncate font-bold text-slate-700 text-lg">MBKM Studi Independen Kampus Merdeka</h1>
                <h2 class="font-medium text-slate-600">Peserta</h2>
                <div class="flex items-center w-24 mt-4">
                    <img src="https://picsum.photos/800/800"
                        class="rounded-full w-8 h-8 object-cover object-center border">
                    <img src="https://picsum.photos/1000/1000"
                        class="rounded-full w-8 h-8 object-cover object-center -ml-3 border">
                    <img src="https://picsum.photos/700/700"
                        class="rounded-full w-8 h-8 object-cover object-center -ml-3 border">
                    <div class="rounded-full w-8 h-8 bg-slate-400 text-white -ml-3 border text-center content-center text-sm">+1</div>
                </div>
                <div class="w-full space-x-5 flex items-center justify-between mt-4">
                    <span class="text-slate-700">
                        11 Juni 2025
                    </span>
                    <span class="bg-yellow-200 px-2 py-1 rounded text-yellow-700 text-center text-sm font-medium">
                        Menunggu
                    </span>
                </div>
            </div>
        </a>
        <a href="{{ route('mahasiswa.kegiatan.detail', ['id' => 1]) }}" class="w-full bg-white border rounded p-4 space-y-2 shadow cursor-pointer hover:bg-slate-50 active:bg-slate-200 hover:scale-[1.005] transition duration-300" title="MBKM Studi Independen Kampus Merdeka">
            <img src="https://th.bing.com/th/id/OIP.Q8DVzSs7slvWNj7u8C1XsAHaFP?w=274&h=194&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3" alt="Sertifikat" class="rounded w-full max-w-full aspect-video object-cover object-center">
            <div>
                <h1 class="truncate font-bold text-slate-700 text-lg">MBKM Studi Independen Kampus Merdeka</h1>
                <h2 class="font-medium text-slate-600">Peserta</h2>
                <div class="flex items-center w-24 mt-4">
                    <img src="https://picsum.photos/800/800"
                        class="rounded-full w-8 h-8 object-cover object-center border">
                    <img src="https://picsum.photos/1000/1000"
                        class="rounded-full w-8 h-8 object-cover object-center -ml-3 border">
                    <img src="https://picsum.photos/700/700"
                        class="rounded-full w-8 h-8 object-cover object-center -ml-3 border">
                    <div class="rounded-full w-8 h-8 bg-slate-400 text-white -ml-3 border text-center content-center text-sm">+1</div>
                </div>
                <div class="w-full space-x-5 flex items-center justify-between mt-4">
                    <span class="text-slate-700">
                        11 Juni 2025
                    </span>
                    <span class="bg-yellow-200 px-2 py-1 rounded text-yellow-700 text-center text-sm font-medium">
                        Menunggu
                    </span>
                </div>
            </div>
        </a>
        <a href="{{ route('mahasiswa.kegiatan.detail', ['id' => 1]) }}" class="w-full bg-white border rounded p-4 space-y-2 shadow cursor-pointer hover:bg-slate-50 active:bg-slate-200 hover:scale-[1.005] transition duration-300" title="MBKM Studi Independen Kampus Merdeka">
            <img src="https://th.bing.com/th/id/OIP.Q8DVzSs7slvWNj7u8C1XsAHaFP?w=274&h=194&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3" alt="Sertifikat" class="rounded w-full max-w-full aspect-video object-cover object-center">
            <div>
                <h1 class="truncate font-bold text-slate-700 text-lg">MBKM Studi Independen Kampus Merdeka</h1>
                <h2 class="font-medium text-slate-600">Peserta</h2>
                <div class="flex items-center w-24 mt-4">
                    <img src="https://picsum.photos/800/800"
                        class="rounded-full w-8 h-8 object-cover object-center border">
                    <img src="https://picsum.photos/1000/1000"
                        class="rounded-full w-8 h-8 object-cover object-center -ml-3 border">
                    <img src="https://picsum.photos/700/700"
                        class="rounded-full w-8 h-8 object-cover object-center -ml-3 border">
                    <div class="rounded-full w-8 h-8 bg-slate-400 text-white -ml-3 border text-center content-center text-sm">+1</div>
                </div>
                <div class="w-full space-x-5 flex items-center justify-between mt-4">
                    <span class="text-slate-700">
                        11 Juni 2025
                    </span>
                    <span class="bg-yellow-200 px-2 py-1 rounded text-yellow-700 text-center text-sm font-medium">
                        Menunggu
                    </span>
                </div>
            </div>
        </a>
        <a href="{{ route('mahasiswa.kegiatan.detail', ['id' => 1]) }}" class="w-full bg-white border rounded p-4 space-y-2 shadow cursor-pointer hover:bg-slate-50 active:bg-slate-200 hover:scale-[1.005] transition duration-300" title="MBKM Studi Independen Kampus Merdeka">
            <img src="https://th.bing.com/th/id/OIP.Q8DVzSs7slvWNj7u8C1XsAHaFP?w=274&h=194&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3" alt="Sertifikat" class="rounded w-full max-w-full aspect-video object-cover object-center">
            <div>
                <h1 class="truncate font-bold text-slate-700 text-lg">MBKM Studi Independen Kampus Merdeka</h1>
                <h2 class="font-medium text-slate-600">Peserta</h2>
                <div class="flex items-center w-24 mt-4">
                    <img src="https://picsum.photos/800/800"
                        class="rounded-full w-8 h-8 object-cover object-center border">
                    <img src="https://picsum.photos/1000/1000"
                        class="rounded-full w-8 h-8 object-cover object-center -ml-3 border">
                    <img src="https://picsum.photos/700/700"
                        class="rounded-full w-8 h-8 object-cover object-center -ml-3 border">
                    <div class="rounded-full w-8 h-8 bg-slate-400 text-white -ml-3 border text-center content-center text-sm">+1</div>
                </div>
                <div class="w-full space-x-5 flex items-center justify-between mt-4">
                    <span class="text-slate-700">
                        11 Juni 2025
                    </span>
                    <span class="bg-yellow-200 px-2 py-1 rounded text-yellow-700 text-center text-sm font-medium">
                        Menunggu
                    </span>
                </div>
            </div>
        </a>
        <a href="{{ route('mahasiswa.kegiatan.detail', ['id' => 1]) }}" class="w-full bg-white border rounded p-4 space-y-2 shadow cursor-pointer hover:bg-slate-50 active:bg-slate-200 hover:scale-[1.005] transition duration-300" title="MBKM Studi Independen Kampus Merdeka">
            <img src="https://th.bing.com/th/id/OIP.Q8DVzSs7slvWNj7u8C1XsAHaFP?w=274&h=194&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3" alt="Sertifikat" class="rounded w-full max-w-full aspect-video object-cover object-center">
            <div>
                <h1 class="truncate font-bold text-slate-700 text-lg">MBKM Studi Independen Kampus Merdeka</h1>
                <h2 class="font-medium text-slate-600">Peserta</h2>
                <div class="flex items-center w-24 mt-4">
                    <img src="https://picsum.photos/800/800"
                        class="rounded-full w-8 h-8 object-cover object-center border">
                    <img src="https://picsum.photos/1000/1000"
                        class="rounded-full w-8 h-8 object-cover object-center -ml-3 border">
                    <img src="https://picsum.photos/700/700"
                        class="rounded-full w-8 h-8 object-cover object-center -ml-3 border">
                    <div class="rounded-full w-8 h-8 bg-slate-400 text-white -ml-3 border text-center content-center text-sm">+1</div>
                </div>
                <div class="w-full space-x-5 flex items-center justify-between mt-4">
                    <span class="text-slate-700">
                        11 Juni 2025
                    </span>
                    <span class="bg-yellow-200 px-2 py-1 rounded text-yellow-700 text-center text-sm font-medium">
                        Menunggu
                    </span>
                </div>
            </div>
        </a>
        <a href="{{ route('mahasiswa.kegiatan.detail', ['id' => 1]) }}" class="w-full bg-white border rounded p-4 space-y-2 shadow cursor-pointer hover:bg-slate-50 active:bg-slate-200 hover:scale-[1.005] transition duration-300" title="MBKM Studi Independen Kampus Merdeka">
            <img src="https://th.bing.com/th/id/OIP.Q8DVzSs7slvWNj7u8C1XsAHaFP?w=274&h=194&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3" alt="Sertifikat" class="rounded w-full max-w-full aspect-video object-cover object-center">
            <div>
                <h1 class="truncate font-bold text-slate-700 text-lg">MBKM Studi Independen Kampus Merdeka</h1>
                <h2 class="font-medium text-slate-600">Peserta</h2>
                <div class="flex items-center w-24 mt-4">
                    <img src="https://picsum.photos/800/800"
                        class="rounded-full w-8 h-8 object-cover object-center border">
                    <img src="https://picsum.photos/1000/1000"
                        class="rounded-full w-8 h-8 object-cover object-center -ml-3 border">
                    <img src="https://picsum.photos/700/700"
                        class="rounded-full w-8 h-8 object-cover object-center -ml-3 border">
                    <div class="rounded-full w-8 h-8 bg-slate-400 text-white -ml-3 border text-center content-center text-sm">+1</div>
                </div>
                <div class="w-full space-x-5 flex items-center justify-between mt-4">
                    <span class="text-slate-700">
                        11 Juni 2025
                    </span>
                    <span class="bg-yellow-200 px-2 py-1 rounded text-yellow-700 text-center text-sm font-medium">
                        Menunggu
                    </span>
                </div>
            </div>
        </a>
    </section>


    @push('modals')
    {{-- Modal Tambah Kegiatan --}}
    <div x-cloak x-transition.duration.300ms x-init="if (@js(session('openModal')) === 'addActivity') $store.modals.open('addActivity')" x-data="{ submitted: false }"
        x-show="$store.modals.isOpen('addActivity')"
        @keyup.escape.window="if (!submitted) $store.modals.close('addActivity')"
        class="fixed inset-0 bg-black/30 z-50 flex items-center justify-center p-4 max-h-screen">
        <div @click.outside="if (!submitted) $store.modals.close('addActivity')"
            class="bg-white shadow-xl rounded w-[42rem] h-full max-h-fit flex flex-col">
            {{-- Header --}}
            <div class="flex items-center justify-between p-4 border-b shadow-sm">
                <div class="text-xl md:text-2xl font-bold text-blue-600 flex items-center gap-2">
                    <x-tabler-certificate class="w-8 h-8" />
                    <h1>Tambah & Ajukan Kegiatan</h1>
                </div>
                <x-button.icon color="secondary" icon="x"
                    @click="if (!submitted) $store.modals.close('addActivity')" iconClass="size-8" />
            </div>

            {{-- Body --}}
            <div class="px-4 py-6 space-y-4 overflow-y-auto">
                <form action="#" method="POST" x-ref="addActivityForm">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <div class="mb-4">
                        <button class="flex mx-auto" id="certificateContainer" data-fancybox
                            data-original-src="https://placehold.co/600x400/EEE/31343C?font=source-sans-pro&text=Sertifikat"
                            data-src="https://placehold.co/600x400/EEE/31343C?font=source-sans-pro&text=Sertifikat"
                            x-effect="if (!$store.modals.isOpen('addActivity')) {
                                const originalSrc = $el.dataset.originalSrc;
                                $el.dataset.src = originalSrc;
                                $el.querySelector('img').setAttribute('src', originalSrc);
                            }">
                            <img src="https://placehold.co/600x400/EEE/31343C?font=source-sans-pro&text=Sertifikat"
                                alt="Sertifikat" class="w-72 md:w-96 shadow">
                        </button>

                        <label for="addCertificate"
                            class="w-fit flex items-center gap-2 text-center font-medium p-2 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 transition-colors duration-300 text-white mx-auto mt-3 rounded cursor-pointer">
                            <x-tabler-file-upload />
                            Upload Sertifikat
                        </label>
                        <input type="file" accept="image/jpg, image/jpeg, image/png" name="certificate"
                            id="addCertificate" hidden>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <x-form.input name="nama" label="Nama Kegiatan" value="" autocomplete="off"
                            wrapClass="col-span-1 md:col-span-2" />
                        <div class="col-span-1 mb-3">
                            <label for="posisi" class="block mb-1">Posisi Kegiatan</label>
                            <x-select name="posisi" placeholder="Pilih Posisi" width="w-full" :options="[
                                    'peserta' => 'Peserta',
                                    'panitia' => 'Panitia',
                                    'ketua' => 'Ketua',
                                ]" />
                        </div>
                        <div class="col-span-1 mb-3">
                            <label for="jenis" class="block mb-1">Jenis Kegiatan</label>
                            <x-select name="jenis" placeholder="Pilih Jenis" width="w-full" :options="[
                                    'wajib' => 'Wajib',
                                    'studi independen' => 'Studi Independen',
                                    'seminar' => 'Seminar',
                                    'workshop' => 'Workshop',
                                ]" />
                        </div>
                        <div class="col-span-1 mb-3">
                            <label for="tingkat" class="block mb-1">Tingkat Kegiatan</label>
                            <x-select name="tingkat" placeholder="Pilih Tingkat" width="w-full" :options="[
                                    'prodi' => 'Program Studi',
                                    'jurusan' => 'Jurusan',
                                    'kampus' => 'Kampus',
                                    'nasional' => 'Nasional',
                                ]" />
                        </div>
                    </div>
                </form>
            </div>

            {{-- Footer --}}
            <div class="px-4 py-2 border-t flex items-center justify-end gap-2 shadow-[-1px_0_3px_0_rgba(0,0,0,0.1)]">
                <x-button.solid @click="$refs.addActivityForm.submit(); submitted = true">
                    Tambah & Ajukan Kegiatan
                </x-button.solid>
            </div>
        </div>
    </div>
    @endpush

    @push('scripts')
    @vite('resources/js/pages/mahasiswa/kegiatan.js')
    @endpush
</x-dashboard-layout>
