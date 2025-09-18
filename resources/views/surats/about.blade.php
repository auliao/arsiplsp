@extends('layouts.app')

@section('title', 'About')

@section('content')
    <div class="space-y-8">
        <!-- Page Title -->
        <div class="text-center">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-army-green-600 to-sage-green-600 bg-clip-text text-transparent mb-4">
                About
            </h1>
            <div class="w-24 h-1 bg-gradient-to-r from-army-green-400 to-sage-green-400 mx-auto rounded-full"></div>
        </div>

        <!-- Main Content Card -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-army-green-200/50 p-8 max-w-4xl mx-auto">
            <div class="flex flex-col lg:flex-row items-center gap-8">
                
                <!-- Profile Image Section -->
                <div class="flex-shrink-0">
                    <div class="relative">
                        <!-- Decorative background -->
                        <div class="absolute inset-0 bg-gradient-to-br from-army-green-300 to-sage-green-300 rounded-2xl transform rotate-3"></div>
                        <div class="relative">
                            <img src="{{ asset('images/FOTO FORMAL AULIA.jpeg') }}" 
                                 alt="Foto Profil Aulia Oktavia" 
                                 class="w-60 h-60 object-cover rounded-2xl border-4 border-white shadow-2xl transform hover:scale-105 transition-transform duration-300">
                        </div>
                        <!-- Floating decoration -->
                        <div class="absolute -top-4 -right-4 w-12 h-12 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-full shadow-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Information Section -->
                <div class="flex-1 space-y-6">
                    
                    <!-- Header -->
                    <div class="text-center lg:text-left">
                        <h2 class="text-2xl font-bold text-army-green-800 mb-2">
                            Aplikasi ini dibuat oleh:
                        </h2>
                        <div class="w-20 h-1 bg-gradient-to-r from-army-green-400 to-sage-green-400 mx-auto lg:mx-0 rounded-full"></div>
                    </div>

                    <!-- Information Cards -->
                    <div class="grid gap-4">
                        <!-- Nama -->
                        <div class="bg-gradient-to-r from-army-green-50 to-sage-green-50 rounded-xl p-4 border border-army-green-200/50">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-lg flex items-center justify-center shadow-md">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-army-green-600">Nama</p>
                                    <p class="text-lg font-semibold text-army-green-800">Aulia Oktavia</p>
                                </div>
                            </div>
                        </div>

                        <!-- NIM -->
                        <div class="bg-gradient-to-r from-army-green-50 to-sage-green-50 rounded-xl p-4 border border-army-green-200/50">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-lg flex items-center justify-center shadow-md">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1zm1-4a1 1 0 100 2h.01a1 1 0 100-2H7zm2 0a1 1 0 100 2h.01a1 1 0 100-2H9zm2 0a1 1 0 100 2h.01a1 1 0 100-2H11z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-army-green-600">NIM</p>
                                    <p class="text-lg font-semibold text-army-green-800">2331730133</p>
                                </div>
                            </div>
                        </div>

                        <!-- Prodi -->
                        <div class="bg-gradient-to-r from-army-green-50 to-sage-green-50 rounded-xl p-4 border border-army-green-200/50">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-lg flex items-center justify-center shadow-md">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-army-green-600">Program Studi</p>
                                    <p class="text-lg font-semibold text-army-green-800">D3 Manajemen Informatika PSDKU Kediri</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="bg-gradient-to-r from-army-green-50 to-sage-green-50 rounded-xl p-4 border border-army-green-200/50">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-army-green-400 to-sage-green-400 rounded-lg flex items-center justify-center shadow-md">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-army-green-600">Tanggal Pembuatan</p>
                                    <p class="text-lg font-semibold text-army-green-800">4 September 2025</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Description -->
                    <div class="bg-gradient-to-r from-army-green-100 to-sage-green-100 rounded-xl p-6 border border-army-green-200/50 mt-6">
                        <div class="text-center">
                            <h3 class="text-xl font-bold text-army-green-800 mb-3">Sistem Arsip Surat</h3>
                            <p class="text-army-green-700 leading-relaxed">
                                Aplikasi ini merupakan sistem manajemen arsip surat yang dirancang untuk memudahkan 
                                pengelolaan dan pencarian dokumen surat secara digital. Dikembangkan dengan teknologi 
                                modern untuk memberikan pengalaman pengguna yang optimal.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating Decorative Elements -->
        <div class="fixed top-20 right-10 w-20 h-20 bg-gradient-to-br from-army-green-300/20 to-sage-green-300/20 rounded-full blur-xl -z-10"></div>
        <div class="fixed bottom-32 left-10 w-32 h-32 bg-gradient-to-br from-sage-green-300/20 to-army-green-300/20 rounded-full blur-xl -z-10"></div>
    </div>
@endsection