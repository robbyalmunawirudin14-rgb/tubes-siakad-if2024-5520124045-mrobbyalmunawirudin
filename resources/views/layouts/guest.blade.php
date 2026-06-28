<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SIAKAD') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            * { font-family: 'Inter', sans-serif; }
            body { background: #0a0a0a; }

            .left-panel {
                background: linear-gradient(145deg, #0d1f0f 0%, #0f2d13 40%, #112b16 100%);
                position: relative;
                overflow: hidden;
            }
            .left-panel::before {
                content: '';
                position: absolute;
                top: -120px; left: -120px;
                width: 500px; height: 500px;
                background: radial-gradient(circle, rgba(34,197,94,0.18) 0%, transparent 70%);
                pointer-events: none;
            }
            .left-panel::after {
                content: '';
                position: absolute;
                bottom: -80px; right: -80px;
                width: 380px; height: 380px;
                background: radial-gradient(circle, rgba(16,185,129,0.12) 0%, transparent 70%);
                pointer-events: none;
            }
            .grid-overlay {
                position: absolute;
                inset: 0;
                background-image:
                    linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
                background-size: 48px 48px;
            }
            .badge-pill {
                background: rgba(34,197,94,0.12);
                border: 1px solid rgba(34,197,94,0.25);
                color: #4ade80;
            }
            .stat-card {
                background: rgba(255,255,255,0.04);
                border: 1px solid rgba(255,255,255,0.08);
            }
            .right-panel { background: #111111; }
            .form-card {
                background: #1a1a1a;
                border: 1px solid rgba(255,255,255,0.07);
            }
            .sk-input {
                background: #222222 !important;
                border: 1px solid rgba(255,255,255,0.1) !important;
                color: #e5e7eb !important;
                transition: border-color 0.2s, box-shadow 0.2s;
            }
            .sk-input::placeholder { color: #4b5563; }
            .sk-input:focus {
                border-color: #22c55e !important;
                box-shadow: 0 0 0 3px rgba(34,197,94,0.12) !important;
                outline: none !important;
            }
            .sk-input option { background: #222222; color: #e5e7eb; }
            .sk-label { color: #9ca3af; font-size: 0.8rem; font-weight: 500; letter-spacing: 0.02em; }
            .sk-btn {
                background: linear-gradient(135deg, #16a34a, #15803d);
                color: white;
                font-weight: 600;
                letter-spacing: 0.02em;
                transition: opacity 0.2s, transform 0.1s;
                border: none;
            }
            .sk-btn:hover { opacity: 0.9; transform: translateY(-1px); }
            .sk-btn:active { transform: translateY(0); }
            .sk-link { color: #4ade80; }
            .sk-link:hover { color: #86efac; }
            .glow-dot {
                width: 8px; height: 8px;
                background: #22c55e;
                border-radius: 50%;
                box-shadow: 0 0 8px #22c55e;
                animation: pulse-dot 2s infinite;
            }
            @keyframes pulse-dot {
                0%, 100% { opacity: 1; }
                50% { opacity: 0.4; }
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen flex">

            {{-- LEFT PANEL --}}
            <div class="left-panel hidden lg:flex lg:w-1/2 flex-col justify-between p-14 relative">
                <div class="grid-overlay"></div>

                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="glow-dot"></div>
                        <span class="text-green-400 text-xs font-semibold tracking-widest uppercase">Sistem Aktif</span>
                    </div>
                    <div class="flex items-center gap-3 mt-6">
                        <div class="w-11 h-11 rounded-2xl bg-green-500/10 border border-green-500/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m0-6l-3.5-1.944M12 20l-3.5-1.944m0 0L5 16.5V11m3.5 6.556L12 20m0 0l3.5-1.944M12 20v-6"/>
                            </svg>
                        </div>
                        <span class="text-white text-2xl font-bold tracking-tight">SIAKAD</span>
                    </div>
                </div>

                <div class="relative z-10">
                    <div class="badge-pill inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-medium mb-8">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Platform Akademik Terpadu
                    </div>

                    <h1 class="text-5xl font-bold text-white leading-[1.15] mb-5">
                        Kelola<br>
                        <span class="text-green-400">Akademik</span><br>
                        Kamu
                    </h1>

                    <p class="text-gray-400 text-base leading-relaxed max-w-sm">
                        Ambil KRS, lihat jadwal kuliah, dan pantau progres studi kamu — semuanya dalam satu tempat.
                    </p>
                </div>

                <div class="relative z-10 grid grid-cols-2 gap-4">
                    <div class="stat-card rounded-2xl p-5">
                        <p class="text-green-400 text-2xl font-bold mb-1">KRS</p>
                        <p class="text-gray-500 text-xs">Ambil mata kuliah</p>
                    </div>
                    <div class="stat-card rounded-2xl p-5">
                        <p class="text-green-400 text-2xl font-bold mb-1">Jadwal</p>
                        <p class="text-gray-500 text-xs">Lihat jadwal kuliah</p>
                    </div>
                </div>
            </div>

            {{-- RIGHT PANEL --}}
            <div class="right-panel flex-1 flex flex-col justify-center items-center p-6 sm:p-10">
                <div class="flex items-center gap-2 mb-8 lg:hidden">
                    <div class="w-8 h-8 rounded-xl bg-green-500/10 border border-green-500/20 flex items-center justify-center">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        </svg>
                    </div>
                    <span class="text-white font-bold text-lg">SIAKAD</span>
                </div>

                <div class="form-card w-full max-w-md rounded-2xl px-8 py-8">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
