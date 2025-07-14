<x-dashboard-layout backgroundColor="bg-white" title="Detail Kegiatan" :breadcrumb="[
    ['label' => 'Kegiatan', 'url' => route('mahasiswa.kegiatan')],
    ['label' => 'Detail Kegiatan', 'active' => true],
]">
    <section class="from-blue-900 via-blue-600 to-blue-900 bg-gradient-to-br py-10 shadow">
        <button class="flex mx-auto" data-fancybox
            data-src="https://fird0s.files.wordpress.com/2017/12/yudisium-certificate.png">
            <img src="https://fird0s.files.wordpress.com/2017/12/yudisium-certificate.png" alt="Sertifikat"
                class="w-72 md:w-96 shadow-2xl">
        </button>
    </section>
    <section class="p-6 md:p-10 space-y-10">
        {{-- Activity Detail --}}
        <section>
            <div class="flex items-center text-3xl mb-6 gap-2">
                <x-tabler-certificate class="w-9 h-9 text-blue-600" />
                <h1 class="font-bold text-slate-700">Detail Kegiatan</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-6 gap-2 md:gap-4">
                <div class="md:col-span-2">
                    <label class="mb-1 block" for="status">Status Verifikasi</label>
                    <span
                        class="block mb-3 border-2 border-yellow-700 rounded py-2.5 px-2 bg-yellow-200 text-yellow-700 text-center text-lg text font-medium">
                        Menunggu
                    </span>
                </div>
                <x-form.input name="nama" label="Nama Kegiatan" wrapClass="md:col-span-3"
                    value="Bangkit Academy 2024 Batch 2" disabled />
                <x-form.input name="poin" label="Poin SKKM" wrapClass="col-span-1" value="5 Poin" disabled />
                <x-form.input name="posisi" label="Posisi Kegiatan" wrapClass="col-span-1 md:col-span-2"
                    value="Peserta" disabled />
                <x-form.input name="jenis" label="Jenis Kegiatan" wrapClass="md:col-span-2" value="Studi Independen"
                    disabled />
                <x-form.input name="tingkat" label="Tingkat Kegiatan" wrapClass="col-span-1 md:col-span-2"
                    value="Nasional" disabled />
            </div>
        </section>

        {{-- Action Buttons --}}
        <section class="flex items-center flex-col justify-center md:flex-row md:justify-normal gap-4">
            <x-button.solid class="flex items-center gap-2" x-data @click="$store.modals.open('correctResubmit')">
                <x-slot name="text">
                    <x-tabler-refresh-dot />
                    <span class="block font-medium">Koreksi & Ajukan Ulang</span>
                </x-slot>
            </x-button.solid>
            <x-button.solid color="danger" class="flex items-center gap-2" x-data
                @click="$store.modals.open('cancelSubmission')">
                <x-slot name="text">
                    <x-tabler-trash />
                    <span class="block font-medium">Batalkan Pengajuan</span>
                </x-slot>
            </x-button.solid>
        </section>

        {{-- Notification History --}}
        <section>
            <div class="flex items-center text-3xl mb-6 gap-2">
                <x-tabler-bell class="w-9 h-9 text-blue-600" />
                <h1 class="font-bold text-slate-700">Riwayat Notifikasi</h1>
            </div>
            <div class="space-y-4">
                <div
                    class="bg-white rounded p-4 border-2 flex gap-4">
                    <img src="https://picsum.photos/1000/1000" class="rounded-full aspect-square border size-10 md:size-14">
                    <div>
                        <h1 class="md:text-lg text-slate-700">
                            <strong>Ayu Lestari</strong>
                            memberikan komentar pada pengajuan kegiatan
                            <strong>Bangkit Academy 2024 Batch 2</strong>
                        </h1>
                        <span class="text-slate-400 block mb-2">
                            1 Jam yang lalu
                        </span>
                        <p class="text-sm md:text-base text-slate-700">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, at? Ab ipsum eaque,
                            commodi dignissimos delectus similique dolorem saepe autem praesentium expedita aliquid error
                            cum quos minima ullam natus officiis sunt ea! At incidunt unde molestiae ad aut praesentium.
                            Molestias quo iure explicabo autem eaque dicta at! Ipsum, voluptate enim.
                        </p>
                    </div>
                </div>
                <div
                    class="bg-white rounded p-4 border-2 flex gap-4">
                    <img src="https://picsum.photos/1000/1000" class="rounded-full aspect-square border size-10 md:size-14">
                    <div>
                        <h1 class="md:text-lg text-slate-700">
                            <strong>Ayu Lestari</strong>
                            memberikan komentar pada pengajuan kegiatan
                            <strong>Bangkit Academy 2024 Batch 2</strong>
                        </h1>
                        <span class="text-slate-400 block mb-2">
                            1 Jam yang lalu
                        </span>
                        <p class="text-sm md:text-base text-slate-700">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, at? Ab ipsum eaque,
                            commodi dignissimos delectus similique dolorem saepe autem praesentium expedita aliquid error
                            cum quos minima ullam natus officiis sunt ea! At incidunt unde molestiae ad aut praesentium.
                            Molestias quo iure explicabo autem eaque dicta at! Ipsum, voluptate enim.
                        </p>
                    </div>
                </div>
                <div
                    class="bg-white rounded p-4 border-2 flex gap-4">
                    <img src="https://picsum.photos/1000/1000" class="rounded-full aspect-square border size-10 md:size-14">
                    <div>
                        <h1 class="md:text-lg text-slate-700">
                            <strong>Ayu Lestari</strong>
                            memberikan komentar pada pengajuan kegiatan
                            <strong>Bangkit Academy 2024 Batch 2</strong>
                        </h1>
                        <span class="text-slate-400 block mb-2">
                            1 Jam yang lalu
                        </span>
                        <p class="text-sm md:text-base text-slate-700">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, at? Ab ipsum eaque,
                            commodi dignissimos delectus similique dolorem saepe autem praesentium expedita aliquid error
                            cum quos minima ullam natus officiis sunt ea! At incidunt unde molestiae ad aut praesentium.
                            Molestias quo iure explicabo autem eaque dicta at! Ipsum, voluptate enim.
                        </p>
                    </div>
                </d>
            </div>
        </section>
    </section>

    @push('modals')
    {{-- Modal Pembatalan Pengajuan --}}
    <div x-cloak x-transition.duration.300ms x-init="if (@js(session('openModal')) === 'cancelSubmission') $store.modals.open('cancelSubmission')" x-data="{ confirmationText: '', confirmed: false }"
        x-show="$store.modals.isOpen('cancelSubmission')"
        @keyup.escape.window="!confirmed && $store.modals.close('cancelSubmission')"
        class="fixed inset-0 bg-black/30 z-50 flex items-center justify-center p-4 max-h-screen">
        <div @click.outside="!confirmed && $store.modals.close('cancelSubmission')"
            class="bg-white shadow-xl rounded w-[32rem] h-full max-h-fit flex flex-col">
            {{-- Header --}}
            <div class="flex items-center justify-between p-4 border-b">
                <div class="text-2xl font-bold text-red-600 flex items-center gap-2">
                    <x-tabler-trash />
                    <h1>Pembatalan Pengajuan</h1>
                </div>
                <x-button.icon color="secondary" icon="x"
                    @click="!confirmed && $store.modals.close('cancelSubmission')" iconClass="size-8" />
            </div>

            {{-- Body --}}
            <div class="p-4 space-y-4">
                <p>Apakah kamu yakin ingin membatalkan pengajuan kegiatan ini?
                    Tindakan ini akan <strong class="text-red-600">menghapus</strong> kegiatan yang telah diajukan. <i
                        class="text-red-600">Tindakan ini bersifat permanen dan tidak dapat dibatalkan.</i> </p>
                <form action="#" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <x-form.input name="deleteConfirm" label='Ketik "HAPUS" (tanpa tanda kutip) sebagai konfirmasi.'
                        autocomplete="off" x-model="confirmationText"
                        x-effect="if (!$store.modals.isOpen('cancelSubmission')) confirmationText = ''"
                        x-init="$watch('confirmationText', value => {
                            confirmed = value.trim() === 'HAPUS';
                            $el.disabled = confirmed;
                            if (confirmed) $el.closest('form').submit();
                        })" />
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Koreksi & Ajukan Ulang --}}
    <div x-cloak x-transition.duration.300ms x-init="if (@js(session('openModal')) === 'correctResubmit') $store.modals.open('correctResubmit')" x-data="{ submitted: false, data: @js(['posisi' => 'ketua', 'jenis' => 'studi independen', 'tingkat' => 'nasional']) }"
        x-show="$store.modals.isOpen('correctResubmit')"
        @keyup.escape.window="if (!submitted) $store.modals.close('correctResubmit')"
        class="fixed inset-0 bg-black/30 z-50 flex items-center justify-center p-4 max-h-screen">
        <div @click.outside="if (!submitted) $store.modals.close('correctResubmit')"
            class="bg-white shadow-xl rounded w-[42rem] h-full max-h-fit flex flex-col">
            {{-- Header --}}
            <div class="flex items-center justify-between p-4 border-b shadow-sm">
                <div class="text-xl md:text-2xl font-bold text-blue-600 flex items-center gap-2">
                    <x-tabler-refresh-dot />
                    <h1>Koreksi & Ajukan Ulang</h1>
                </div>
                <x-button.icon color="secondary" icon="x"
                    @click="if (!submitted) $store.modals.close('correctResubmit')" iconClass="size-8" />
            </div>

            {{-- Body --}}
            <div class="px-4 py-6 space-y-4 overflow-y-auto">
                <form action="#" method="POST" x-ref="correctResubmitForm">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <div class="mb-4">
                        <button class="flex mx-auto" id="certificateContainer" data-fancybox
                            data-original-src="https://fird0s.files.wordpress.com/2017/12/yudisium-certificate.png"
                            data-src="https://fird0s.files.wordpress.com/2017/12/yudisium-certificate.png"
                            x-effect="if (!$store.modals.isOpen('correctResubmit')) {
                                const originalSrc = $el.dataset.originalSrc;
                                $el.dataset.src = originalSrc;
                                $el.querySelector('img').setAttribute('src', originalSrc);
                                document.querySelector('#changeCertificate').value = '';
                            }">
                            <img src="https://fird0s.files.wordpress.com/2017/12/yudisium-certificate.png"
                                alt="Sertifikat" class="w-72 md:w-96 shadow">
                        </button>

                        <label for="changeCertificate"
                            class="w-fit flex items-center gap-2 text-center font-medium p-2 bg-yellow-400 hover:bg-yellow-500 active:bg-yellow-600 transition-colors duration-300 text-white mx-auto mt-3 rounded cursor-pointer">
                            <x-tabler-file-upload />
                            Ganti Sertifikat
                        </label>
                        <input type="file" accept="image/jpg, image/jpeg, image/png" name="certificate"
                            id="changeCertificate" hidden>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <x-form.input name="nama" label="Nama Kegiatan" value="" autocomplete="off"
                            wrapClass="col-span-1 md:col-span-2" />
                        <div class="col-span-1 mb-3">
                            <label for="posisi" class="block mb-1">Posisi Kegiatan</label>
                            <x-select name="posisi"
                                x-effect="if (!$store.modals.isOpen('correctResubmit')) selected = data.posisi"
                                width="w-full" :options="[
                                    'peserta' => 'Peserta',
                                    'panitia' => 'Panitia',
                                    'ketua' => 'Ketua',
                                ]" />
                        </div>
                        <div class="col-span-1 mb-3">
                            <label for="jenis" class="block mb-1">Jenis Kegiatan</label>
                            <x-select name="jenis"
                                x-effect="if (!$store.modals.isOpen('correctResubmit')) selected = data.jenis"
                                width="w-full" :options="[
                                    'wajib' => 'Wajib',
                                    'studi independen' => 'Studi Independen',
                                    'seminar' => 'Seminar',
                                    'workshop' => 'Workshop',
                                ]" />
                        </div>
                        <div class="col-span-1 mb-3">
                            <label for="tingkat" class="block mb-1">Tingkat Kegiatan</label>
                            <x-select name="tingkat"
                                x-effect="if (!$store.modals.isOpen('correctResubmit')) selected = data.tingkat"
                                width="w-full" :options="[
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
                <x-button.solid @click="$refs.correctResubmitForm.submit(); submitted = true">
                    Simpan & Ajukan Ulang
                </x-button.solid>
            </div>
        </div>
    </div>
    @endpush

    @push('scripts')
        @vite('resources/js/pages/mahasiswa/detail-kegiatan.js')
    @endpush
</x-dashboard-layout>
