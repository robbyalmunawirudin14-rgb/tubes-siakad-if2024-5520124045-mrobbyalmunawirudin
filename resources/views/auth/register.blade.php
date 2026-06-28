<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-white">Buat akun baru</h2>
        <p class="text-gray-500 text-sm mt-1">Daftarkan diri kamu sebagai mahasiswa</p>
    </div>

    @if ($errors->any())
        <div class="mb-4 p-3 rounded-xl bg-red-500/10 border border-red-500/20">
            <p class="text-red-400 text-xs">{{ $errors->first() }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nama -->
        <div class="mb-4">
            <label for="name" class="sk-label block mb-1.5">NAMA LENGKAP</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}"
                required autofocus autocomplete="name"
                placeholder="Nama lengkap kamu"
                class="sk-input w-full px-4 py-2.5 rounded-xl text-sm" />
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-red-400" />
        </div>

        <!-- NPM -->
        <div class="mb-4">
            <label for="npm" class="sk-label block mb-1.5">NPM</label>
            <input id="npm" type="text" name="npm" value="{{ old('npm') }}"
                required placeholder="Nomor Pokok Mahasiswa"
                class="sk-input w-full px-4 py-2.5 rounded-xl text-sm" />
            <x-input-error :messages="$errors->get('npm')" class="mt-1 text-xs text-red-400" />
        </div>

        <!-- Prodi -->
        <div class="mb-4">
            <label for="prodi" class="sk-label block mb-1.5">PROGRAM STUDI</label>
            <select id="prodi" name="prodi" required
                class="sk-input w-full px-4 py-2.5 rounded-xl text-sm">
                <option value="">-- Pilih Program Studi --</option>
                <option value="Informatika" {{ old('prodi') == 'Informatika' ? 'selected' : '' }}>Informatika</option>
                <option value="Sistem Informasi" {{ old('prodi') == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                <option value="Teknik Elektro" {{ old('prodi') == 'Teknik Elektro' ? 'selected' : '' }}>Teknik Elektro</option>
                <option value="Teknik Sipil" {{ old('prodi') == 'Teknik Sipil' ? 'selected' : '' }}>Teknik Sipil</option>
            </select>
            <x-input-error :messages="$errors->get('prodi')" class="mt-1 text-xs text-red-400" />
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="sk-label block mb-1.5">EMAIL</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                required autocomplete="username"
                placeholder="email@contoh.com"
                class="sk-input w-full px-4 py-2.5 rounded-xl text-sm" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-400" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="sk-label block mb-1.5">PASSWORD</label>
            <input id="password" type="password" name="password"
                required autocomplete="new-password"
                placeholder="Minimal 8 karakter"
                class="sk-input w-full px-4 py-2.5 rounded-xl text-sm" />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-400" />
        </div>

        <!-- Konfirmasi Password -->
        <div class="mb-6">
            <label for="password_confirmation" class="sk-label block mb-1.5">KONFIRMASI PASSWORD</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                required autocomplete="new-password"
                placeholder="Ulangi password kamu"
                class="sk-input w-full px-4 py-2.5 rounded-xl text-sm" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-red-400" />
        </div>

        <button type="submit" class="sk-btn w-full py-2.5 rounded-xl text-sm">
            Daftar Sekarang
        </button>

        <p class="text-center text-gray-500 text-sm mt-5">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="sk-link font-medium">Masuk di sini</a>
        </p>
    </form>
</x-guest-layout>
