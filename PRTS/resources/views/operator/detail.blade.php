@extends('layouts.main')

@section('content')
    {{-- Memastikan ada data operator sebelum render --}}
    @if(isset($operator))
        {{-- Wrapper dengan transisi untuk efek hover --}}
        <div class="group transition-all duration-300 ease-in-out">
            {{-- Kartu Utama --}}
            <div class="bg-ark-panel border border-ark-border rounded-xl shadow-lg overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-12">
                    
                    <!-- Kolom Kiri: Gambar Karakter -->
                    <div class="md:col-span-8 lg:col-span-9 relative p-4 md:p-0">
                        {{-- UPDATED: Menggunakan ID fallback yang benar --}}
                        <img src="{{ asset('images/operators/' . ($operator['id'] ?? 'char_4082_muels2') . '.png') }}" 
                             alt="{{ $operator['name'] ?? 'Operator' }}" 
                             class="w-full h-full object-cover object-center">
                        <div class="absolute inset-0 bg-gradient-to-t from-ark-panel via-ark-panel/50 to-transparent md:bg-gradient-to-r"></div>
                    </div>

                    <!-- Kolom Kanan: Detail & Statistik -->
                    <div class="md:col-span-4 lg:col-span-3 p-6 space-y-8 relative z-10">
                        <!-- Header: Nama & Tag -->
                        <div>
                            <div class="flex justify-between items-center">
                                <p class="text-sm font-medium text-ark-accent uppercase tracking-widest">{{ $operator['profession'] ?? 'N/A' }}</p>
                                <div class="flex space-x-1">
                                    @for ($i = 0; $i < ($operator['rarity'] ?? 0); $i++)
                                        <svg class="w-4 h-4 text-ark-accent" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21 12 17.27z"/></svg>
                                    @endfor
                                </div>
                            </div>
                            <h1 class="text-4xl lg:text-5xl font-extrabold text-ark-title mt-1">{{ $operator['name'] ?? 'Unknown Operator' }}</h1>
                        </div>

                        <!-- Info Tambahan -->
                        <div class="space-y-4 text-sm">
                            <div class="flex justify-between border-b border-ark-border/50 pb-2">
                                <span class="text-ark-text">File no.</span>
                                <span class="font-semibold text-ark-title">{{ $operator['displayNumber'] ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between border-b border-ark-border/50 pb-2">
                                <span class="text-ark-text">Birthdate</span>
                                <span class="font-semibold text-ark-title">{{ $operator['display']['birthdate'] ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-ark-text">Illustrator</span>
                                <span class="font-semibold text-ark-title">{{ $operator['display']['illustrator'] ?? 'N/A' }}</span>
                            </div>
                        </div>

                        <!-- Statistik Bar -->
                        <div class="space-y-4">
                            <h3 class="text-ark-title font-bold tracking-wider">STATS</h3>
                            <div class="space-y-3">
                                <!-- Strength -->
                                <div class="stat-item">
                                    <p>Strength</p>
                                    <div class="stat-bar-wrapper">
                                        <div class="stat-bar" style="width: 50%;"></div>
                                    </div>
                                    <span>Normal</span>
                                </div>
                                <!-- Mobility -->
                                <div class="stat-item">
                                    <p>Mobility</p>
                                    <div class="stat-bar-wrapper">
                                        <div class="stat-bar" style="width: 90%;"></div>
                                    </div>
                                    <span>Excellent</span>
                                </div>
                                <!-- Endurance -->
                                <div class="stat-item">
                                    <p>Endurance</p>
                                    <div class="stat-bar-wrapper">
                                        <div class="stat-bar" style="width: 50%;"></div>
                                    </div>
                                    <span>Normal</span>
                                </div>
                                <!-- Tactical Acumen -->
                                <div class="stat-item">
                                    <p>Tactical Acumen</p>
                                    <div class="stat-bar-wrapper">
                                        <div class="stat-bar" style="width: 90%;"></div>
                                    </div>
                                    <span>Excellent</span>
                                </div>
                                <!-- Combat Skill -->
                                <div class="stat-item">
                                    <p>Combat Skill</p>
                                    <div class="stat-bar-wrapper">
                                        <div class="stat-bar" style="width: 90%;"></div>
                                    </div>
                                    <span>{{ $operator['display']['combat_skill'] ?? 'N/A' }}</span>
                                </div>
                                <!-- Arts Adaptability -->
                                <div class="stat-item">
                                    <p>Arts Adaptability</p>
                                    <div class="stat-bar-wrapper">
                                        <div class="stat-bar" style="width: 25%;"></div>
                                    </div>
                                    <span>{{ $operator['display']['arts_adaptability'] ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center p-10">
            <h1 class="text-2xl text-ark-title">Operator Not Found</h1>
            <p class="text-ark-text mt-2">The requested operator could not be loaded or does not exist.</p>
        </div>
    @endif
@endsection
