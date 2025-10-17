@extends('layouts.public.page')

@section('header')
    <link rel="canonical" href="{{ route('page.contact') }}">
    <meta name="robots" content="index,follow">
    <meta name="description" content="Contacto - {{ $general_setting->institute_motto }}">
    <meta property="og:title" content="{{ $general_setting->institute_name }}">
    <meta property="og:description" content="{{ $general_setting->institute_motto }}">
    <meta property="og:url" content="{{ route('page.contact') }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $general_setting->institute_name }}">
    <meta name="twitter:description" content="{{ $general_setting->institute_motto }}">
@endsection

@section('content')
<section id="contacto" class="bg-linear-to-b from-blue-50 to-neutral-50">
    <!-- Header -->
    <header class="bg-blue-700 text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">Contacto</h1>
            <p class="mt-4 text-lg md:text-xl text-blue-100">Estamos aquí para responder todas tus consultas</p>
        </div>
    </header>

    <!-- Content -->
    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- Mapa -->
            <div class="flex flex-col justify-center order-last md:order-first">
                <div class="rounded-lg overflow-hidden shadow-md flex-1">
                    <iframe
                        class="w-full min-h-[20rem] h-full border-2 border-gray-300 rounded-lg"
                        src="{{ $general_setting->institute_maps_iframe }}"
                        allowfullscreen
                        loading="lazy">
                    </iframe>
                </div>
                <div class="mt-2 text-sm text-center">
                    <a href="{{ $general_setting->institute_maps_external_link }}" class="text-blue-600 hover:underline">Ver el mapa más grande</a>
                </div>
            </div>

            <!-- Info -->
            <div class="bg-gray-50 p-8 rounded-2xl shadow-xl order-first md:order-last">
                <h2 class="text-2xl font-bold text-blue-800 mb-6">Información de contacto</h2>
                <div class="space-y-6">
                    @if ($general_setting->institute_email)
                    <div class="flex items-start space-x-4">
                        <div class="bg-green-600 p-2.5 min-w-[3rem] flex justify-center rounded-lg text-white shadow">
                            <i class="fas fa-envelope text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-green-800">E-Mail</h4>
                            <p class="text-gray-600">{{ $general_setting->institute_email }}</p>
                        </div>
                    </div>
                    @endif
                    @if ($general_setting->institute_address)
                    <div class="flex items-start space-x-4">
                        <div class="bg-green-600 p-2.5 min-w-[3rem] flex justify-center rounded-lg text-white shadow">
                            <i class="fas fa-map-marker-alt text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-green-800">Dirección</h4>
                            <p class="text-gray-600">{{ $general_setting->institute_address }}</p>
                        </div>
                    </div>
                    @endif
                    @if ($general_setting->institute_address)
                        <div class="flex items-start space-x-4">
                        <div class="bg-green-600 p-2.5 min-w-[3rem] flex justify-center rounded-lg text-white shadow">
                            <i class="fas fa-clock text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-green-800">Horario de atención</h4>
                            <p class="text-gray-600">{{ $general_setting->institute_business_hours }}</p>
                        </div>
                    </div>
                    @endif
                    @if ($general_setting->institute_phone)
                    <div class="flex items-start space-x-4">
                        <div class="bg-green-600 p-2.5 min-w-[3rem] flex justify-center rounded-lg text-white shadow">
                            <i class="fas fa-phone text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-green-800">Teléfono</h4>
                            <p class="text-gray-600">{{ $general_setting->institute_phone }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Redes sociales -->
                <div class="mt-8">
                    <h4 class="text-lg font-semibold text-amber-700 mb-3">Seguinos en redes sociales</h4>
                    <div class="flex gap-3">
                        @if ($general_setting->institute_whatsapp)
                        <a href="{{ $general_setting->institute_whatsapp }}" class="hover:text-white bg-green-500 text-white p-2 min-w-[3rem] flex justify-center rounded-lg transition" aria-label="Whatsapp">
                            <i class="fab fa-whatsapp text-2xl"></i>
                        </a>
                        @endif
                        @if ($general_setting->institute_facebook)
                        <a href="{{ $general_setting->institute_facebook }}" class="hover:text-white bg-blue-600 text-white p-2 min-w-[3rem] flex justify-center rounded-lg transition" aria-label="Facebook">
                            <i class="fab fa-facebook-f text-2xl"></i>
                        </a>
                        @endif
                        @if ($general_setting->institute_instagram)
                        <a href="{{ $general_setting->institute_instagram }}" class="hover:text-white bg-pink-600 text-white p-2 min-w-[3rem] flex justify-center rounded-lg transition" aria-label="Instagram">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                        @endif
                        @if ($general_setting->institute_youtube)
                        <a href="{{ $general_setting->institute_youtube }}" class="hover:text-white bg-red-600 text-white p-2 min-w-[3rem] flex justify-center rounded-lg transition" aria-label="Youtube">
                            <i class="fab fa-youtube text-2xl"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
