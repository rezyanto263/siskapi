<x-auth-layout title="Masuk">
    <h3 class="text-center text-lg font-semibold mb-6 mt-9">Masuk ke Dashboard</h3>
    @if (session('status'))
        <div class="mb-5 text-center text-green-600">
            {{ session('status') }}
        </div>
    @endif
    @error ('status')
        <small class="text-red-600 text-center block mb-5">{{ $message }}</small>
    @enderror
    <form action="/login" method="POST">
        @csrf
        <x-form.input name="username" label="Nama Pengguna" />
        <x-form.input type="password" name="password" label="Kata Sandi" />
        <div class="flex justify-between mb-7">
            <label for="remember" class="flex items-center gap-1.5">
                <input type="checkbox" name="remember" id="remember" value="1" {{ old('remember', false) ? 'checked' : '' }}
                    class="w-[18px] h-[18px] checked:accent-blue-600">
                Ingat saya
            </label>
            <a href="/forgot-password" class="text-blue-600 underline active:text-blue-800">
                Lupa kata sandi?
            </a>
        </div>
        <x-button.solid type="submit" text="Masuk" color="primary" class="w-full" />
    </form>
    <p class="text-center mt-6">
        Belum memiliki akun?
        <a href="/register" class="text-blue-600 underline active:text-blue-800"> Registrasi sekarang</a>
    </p>
</x-auth-layout>
