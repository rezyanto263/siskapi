<x-auth-layout title="Lupa Kata Sandi">
    <div class="mb-5 mt-9">
        <h3 class="text-center text-lg font-semibold">Lupa Kata Sandi?</h3>
        <small class="block text-center text-slate-600">Masukkan email yang terdaftar untuk mengatur ulang kata sandi Anda.</small>
    </div>
    @if (session('status'))
        <div class="mb-5 text-center text-green-600">
            {{ session('status') }}
        </div>
    @endif
    @error ('status')
        <small class="text-red-600 text-center block mb-5">{{ $message }}</small>
    @enderror
    <form action="/forgot-password" method="POST">
        @csrf
        <x-form.input type="email" name="email" label="Email" />
        <x-button.solid type="submit" text="Kirim Permintaan" class="w-full mb-5 mt-4" />
    </form>
    <a href="/login" class="block text-center underline text-blue-600 active:text-blue-800">Kembali Masuk</a>
</x-auth-layout>
