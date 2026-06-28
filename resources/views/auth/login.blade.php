<x-guest-layout>
    <div class="mb-7">
        <h2 class="text-2xl font-bold text-white">Selamat datang</h2>
        <p class="text-gray-500 text-sm mt-1">Masuk ke akun SIAKAD kamu</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    @if ($errors->any())
        <div class="mb-4 p-3 rounded-xl bg-red-500/10 border border-red-500/20">
            <p class="text-red-400 text-xs">{{ $errors->first() }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="sk-label block mb-1.5">EMAIL</label>
            <input
                id="email" type="email" name="email"
                value="{{ old('email') }}"
                required autofocus autocomplete="username"
                placeholder="nama@email.com"
                class="sk-input w-full px-4 py-2.5 rounded-xl text-sm"
            />
        </div>

        <!-- Password -->
        <div class="mb-5">
            <div class="flex justify-between items-center mb-1.5">
                <label for="password" class="sk-label">PASSWORD</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="sk-link text-xs">Lupa password?</a>
                @endif
            </div>
            <input
                id="password" type="password" name="password"
                required autocomplete="current-password"
                placeholder="••••••••"
                class="sk-input w-full px-4 py-2.5 rounded-xl text-sm"
            />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center gap-2 mb-6">
            <input id="remember_me" type="checkbox" name="remember"
                class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-green-500 focus:ring-green-500/30" />
            <label for="remember_me" class="text-gray-400 text-sm">Ingat saya</label>
        </div>

        <button type="submit" class="sk-btn w-full py-2.5 rounded-xl text-sm">
            Masuk
        </button>

        <p class="text-center text-gray-500 text-sm mt-6">
            Belum punya akun?
            <a href="{{ route('register') }}" class="sk-link font-medium">Daftar sekarang</a>
        </p>
    </form>
</x-guest-layout>
