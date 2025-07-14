<x-base-layout :title="$title">
    <main class="bg-cover bg-center min-h-screen min-w-full"
        style="background-image: url({{ asset('storage/pictures/authbg.png') }})">
        <div class="container flex flex-col min-h-screen w-full py-8 max-w-full mx-auto backdrop-blur-sm bg-black/70">
            <div class="my-auto mx-6">
                <h1 class="text-5xl text-center font-bold text-blue-600 tracking-[0.8rem] drop-shadow-2xl mb-3">
                    SISKAPI
                </h1>
                <h2 class="text-xl text-center font-semibold text-white drop-shadow-2xl mb-16">
                    Politeknik Negeri Bali
                </h2>
                <div
                    class="w-full max-w-sm mx-auto bg-white p-7 rounded-lg shadow-2xl border-blue-600 border-[3px] relative">
                    <img src="{{ asset('storage/pictures/logo.png') }}" alt="Logo PNB"
                        class="w-24 h-24 absolute -top-12 left-1/2 -translate-x-1/2">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </main>
</x-base-layout>
