<x-auth-layout title="Registrasi Akun">
    <div class="mt-9 flex gap-10 justify-center">
        <a href="/register?type=student">
            <x-tabler-school class="h-14 w-14 text-blue-600" />
        </a>
        <div class="w-[1.5px] h-12 bg-gray-300"></div>
        <a href="/register?type=employee">
            <x-tabler-briefcase class="h-14 w-14 text-slate-400" />
        </a>
    </div>
    <div class="mb-5 mt-4">
        <h3 class="text-center text-lg font-semibold">Registrasi Akun Mahasiswa</h3>
        <small class="block text-center text-slate-600">Masukkan NIM dan email yang terdaftar di SION. <strong class="text-blue-600">Pastikan email tersebut masih aktif atau ubah email pada akun SION Anda terlebih dahulu.</strong></small>
    </div>
    @error ('status')
        <small class="text-red-600 text-center block mb-5">{{ $message }}</small>
    @enderror
    <form action="/register" method="POST">
        @csrf
        <input type="hidden" name="type" value="student">
        <x-form.input type="text" name="nim" label="Nomor Induk Mahasiswa (NIM)" />
        <x-form.input type="email" name="email" label="Email" />
        <x-button.solid type="submit" text="Kirim Permintaan" class="w-full mt-4 mb-5" />
    </form>
    <a href="/login" class="block text-center underline text-blue-600 active:text-blue-800">Kembali Masuk</a>
</x-auth-layout>
