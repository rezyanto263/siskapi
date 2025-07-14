<x-auth-layout title="Atur Ulang Kata Sandi">
    <div class="mb-5 mt-9">
        <h3 class="text-center text-lg font-semibold">Atur Ulang Kata Sandi</h3>
        <small class="block text-center text-slate-600">Masukkan kata sandi baru Anda di bawah ini.</small>
    </div>
    @error ('status')
        <small class="text-red-600 text-center block mb-5">{{ $message }}</small>
    @enderror
    <form action="/reset-password" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">
        <x-form.input type="password" name="password" label="Kata Sandi" />
        <x-form.input type="password" name="password_confirmation" label="Konfirmasi Kata Sandi" />
        <x-button.solid type="submit" text="Simpan & Masuk" class="w-full" />
    </form>
</x-auth-layout>
