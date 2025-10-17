@extends('layouts.public.page')

@section('header')
    <link rel="canonical" href="{{ route('page.index') }}">
    <meta name="robots" content="index,follow">
    <meta name="description" content="{{ $general_setting->institute_motto }}">
    <meta property="og:title" content="{{ $general_setting->institute_name }}">
    <meta property="og:description" content="{{ $general_setting->institute_motto }}">
    <meta property="og:url" content="{{ route('page.index') }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $general_setting->institute_name }}">
    <meta name="twitter:description" content="{{ $general_setting->institute_motto }}">
@endsection

@section('content')
    <section class="relative h-[calc(100vh-96px)] md:h-[calc(100vh-100px)] w-full overflow-hidden">
        <!-- Video de fondo -->
        <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover z-0">
            <source src="{{ asset('assets/background.mp4') }}" type="video/mp4" />
        </video>
        <!-- Capa de overlay oscura -->
        <div class="absolute inset-0 bg-black/50 z-10"></div>
        <!-- Texto lateral tipo cápsula -->
        <div class="absolute z-20 left-0 top-1/4 transform -translate-y-1/4 w-[85%] md:w-[67%] lg:w-[70%] xl:w-[55%]">
            <section class="bg-white shadow-2xl rounded-tr-lg">
                <div class="max-h-4xl max-w-4xl mx-auto text-left">
                    <picture>
                        <!-- Imagen para pantallas grandes -->
                        <source srcset="{{ asset('assets/banner-lg.jpg') }}" media="(min-width: 1024px)">

                        <!-- Imagen para pantallas pequeñas -->
                        <img src="{{ asset('assets/banner.jpg') }}" alt="Banner" class="w-full h-auto rounded-tr-lg">
                    </picture>
                </div>
            </section>
            <section class="bg-linear-to-r from-blue-50 via-green-50 to-amber-50 pt-12 pb-6 my-2 pl-8 pr-6 shadow-2xl">
                <div class="max-w-4xl mx-auto text-left">
                    <h1
                        class="text-5xl md:text-6xl lg:text-8xl font-bold bg-linear-to-r from-blue-800 via-emerald-600 via-55% to-yellow-500 to-75% bg-clip-text text-transparent">
                        {{ $general_setting->institute_initialism }}</h1>
                    <h2 class="text-2xl lg:text-4xl font-bold text-blue-900 mb-4">@breakResponsive($general_setting->institute_name)</h2>
                </div>
            </section>
            <section
                class="bg-linear-to-r from-blue-50 via-green-50 to-amber-50 pt-4 pb-6 pl-8 pr-6 shadow-2xl rounded-br-lg">
                <div class="max-w-4xl mx-auto text-left">
                    <p
                        class="text-lg md:text-xl text-semibold bg-linear-to-r from-blue-800 via-emerald-600 via-55% to-amber-600 to-75% bg-clip-text text-transparent">
                        {{ $general_setting->institute_motto }}
                    </p>
                </div>
            </section>
        </div>
    </section>

    <section class="py-16 bg-linear-to-b to-natural-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2
                    class="text-3xl font-bold bg-linear-to-r from-blue-800 via-green-800 to-amber-800 bg-clip-text text-transparent">
                    ¿Por qué elegir {{ $general_setting->institute_initialism }}?</h2>
                <p class="text-gray-900 text-lg mt-2">Formamos profesionales técnicos comprometidos con el territorio
                    socio-productivo actual</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                @include('includes.main-card', [
                    'color' => 'blue',
                    'icon' => 'fas fa-graduation-cap',
                    'title' => 'Título Oficial',
                    'text' => 'Todas nuestras carreras cuentan con reconocimiento oficial y validez nacional',
                ])

                @include('includes.main-card', [
                    'color' => 'green',
                    'icon' => 'fas fa-briefcase',
                    'title' => 'Salida Laboral',
                    'text' => 'Formación orientada a las necesidades reales del mercado laboral actual',
                ])

                @include('includes.main-card', [
                    'color' => 'amber',
                    'icon' => 'fas fa-chalkboard-teacher',
                    'title' => 'Docentes Expertos',
                    'text' =>
                        'Profesionales en actividad que transmiten experiencia real y conocimientos actualizados',
                ])

            </div>
        </div>
    </section>

    <x-public.careers-list>
        <div class="text-center mb-12">
            <h2
                class="text-3xl font-bold bg-linear-to-r from-blue-800 via-green-800 to-amber-800 bg-clip-text text-transparent">
                Nuestras Carreras</h2>
            <p class="text-green-900 text-lg mt-2 px-1">Formación técnica superior con orientación práctica y salida laboral
            </p>
        </div>
        <hr class="container mx-auto px-4 mb-12">
    </x-public.careers-list>

    <section class="py-16 bg-blue-800">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Da el próximo paso en tu trayectoria profesional</h2>
            <p class="text-lg text-white mb-8">El {{ $general_setting->institute_name }} te invita a inscribirte y comenzar
                una formación integral, orientada a la excelencia y a las demandas del entorno profesional contemporáneo</p>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-16 text-left">
                @if ($general_setting->institute_email)
                    <div class="flex items-start space-x-4 mx-auto w-72">
                        <div class="bg-green-500 p-2.5 min-w-[3rem] flex justify-center rounded-lg text-white shadow">
                            <i class="fas fa-envelope text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-green-500">E-Mail</h4>
                            <p class="text-white">{{ $general_setting->institute_email }}</p>
                        </div>
                    </div>
                @endif

                @if ($general_setting->institute_address)
                    <div class="flex items-start space-x-4 mx-auto w-72">
                        <div class="bg-amber-500 p-2.5 min-w-[3rem] flex justify-center rounded-lg text-white shadow">
                            <i class="fas fa-map-marker-alt text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-amber-500">Dirección</h4>
                            <p class="text-white">{{ $general_setting->institute_address }}</p>
                        </div>
                    </div>
                @endif

                @if ($general_setting->institute_business_hours)
                    <div class="flex items-start space-x-4 mx-auto w-72">
                        <div class="bg-green-500 p-2.5 min-w-[3rem] flex justify-center rounded-lg text-white shadow">
                            <i class="fas fa-clock text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-green-500">Horario de atención</h4>
                            <p class="text-white">{{ $general_setting->institute_business_hours }}</p>
                        </div>
                    </div>
                @endif

                @if ($general_setting->institute_phone)
                    <div class="flex items-start space-x-4 mx-auto w-72">
                        <div class="bg-amber-500 p-2.5 min-w-[3rem] flex justify-center rounded-lg text-white shadow">
                            <i class="fas fa-phone text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-amber-500">Teléfono</h4>
                            <p class="text-white">{{ $general_setting->institute_phone }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <a href="{{ route('page.contact') }}"
                class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-3 px-8 rounded-lg transition duration-300 text-lg">
                Contactá con nosotros
            </a>
        </div>
    </section>

    <section class="py-16 bg-linear-to-b to-natural-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2
                    class="text-3xl font-bold bg-linear-to-r from-blue-800 via-amber-800 to-green-800 bg-clip-text text-transparent">
                    Nuestras últimas novedades del blog</h2>
                <p class="text-gray-900 text-lg mt-2">La Revista Digital isft238 es una publicación educativa, cuyo objetivo
                    es consolidarse como un espacio para el encuentro y la difusión de saberes y experiencias del ámbito
                    estudiantil y de la vida del instituto, aportando una mirada integradora y cooperativa</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
                @foreach ($posts as $post)
                    <x-public.blog-card :post="$post" />
                @endforeach
            </div>
        </div>
    </section>
@endsection
