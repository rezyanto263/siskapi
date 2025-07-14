<x-auth-layout title="Atur Akun">
    <div class="mb-5 mt-9">
        <h3 class="text-center text-lg font-semibold">Pengaturan Awal Akun</h3>
        <small class="block text-center text-slate-600">Lengkapi pengaturan awal akun Anda dengan menetapkan kata sandi.</small>
    </div>
    @error ('status')
        <small class="text-red-600 text-center block mb-5">{{ $message }}</small>
    @enderror
    <form action="/account-setup" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="username" value="{{ $username }}">
        <x-form.input type="password" name="password" label="Kata Sandi" />
        <x-form.input type="password" name="password_confirmation" label="Konfirmasi Kata Sandi" />
        <x-button.solid type="submit" text="Simpan & Masuk" class="w-full mt-4" />
    </form>
</x-auth-layout>
