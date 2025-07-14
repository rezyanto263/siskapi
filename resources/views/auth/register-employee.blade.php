<x-auth-layout title="Registrasi Akun">
    <div class="mt-9 flex gap-10 justify-center">
        <a href="/register?type=student">
            <x-tabler-school class="h-14 w-14 text-slate-400" />
        </a>
        <div class="w-[1.5px] h-12 bg-gray-300"></div>
        <a href="/register?type=employee">
            <x-tabler-briefcase class="h-14 w-14 text-blue-600" />
        </a>
    </div>
    <div class="mb-5 mt-4">
        <h3 class="text-center text-lg font-semibold">Registrasi Akun Pegawai</h3>
        <small class="block text-center text-slate-600">Masukkan email Anda dan token registrasi yang diberikan oleh admin. <strong class="text-blue-600">Pastikan email Anda masih aktif.</strong></small>
    </div>
    @error ('status')
        <small class="text-red-600 text-center block mb-5">{{ $message }}</small>
    @enderror
    <form action="/register" method="POST">
        @csrf
        <input type="hidden" name="type" value="employee">
        <x-form.input name="token" label="Token Registrasi" />
        <x-form.input type="email" name="email" label="Email" />
        <x-button.solid type="submit" text="Kirim Permintaan" class="w-full mt-4 mb-5" />
    </form>
    <a href="/login" class="block text-center underline text-blue-600 active:text-blue-800">Kembali Masuk</a>
</x-auth-layout>
