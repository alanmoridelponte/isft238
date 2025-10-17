@extends('layouts.public.page')

@section('header')
    <link rel="canonical" href="{{ route('page.institutional') }}">
    <meta name="robots" content="index,follow">
    <meta name="description" content="{{ $general_setting->institute_motto }}">
    <meta property="og:title" content="Institucional - {{ $general_setting->institute_name }}">
    <meta property="og:description" content="{{ $general_setting->institute_motto }}">
    <meta property="og:url" content="{{ route('page.institutional') }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $general_setting->institute_name }}">
    <meta name="twitter:description" content="{{ $general_setting->institute_motto }}">
@endsection

@section('content')
    <section id="contacto" class="bg-neutral-50">
        <!-- Header -->
        <header class="bg-white grid grid-cols-1 md:grid-cols-2 gap-0 items-center">
            <section class="bg-white">
                <div class="max-h-4xl max-w-4xl mx-auto text-left">
                    <picture>
                        <img src="{{ asset('assets/banner.jpg') }}" alt="Banner" class="w-full h-auto">
                    </picture>
                </div>
            </section>
            <section class="bg-linear-to-r from-white via-green-50 to-amber-50  py-12 md:py-24 pl-8 pr-6">
                <div class="max-w-4xl mx-auto text-left">
                    <h1
                        class="text-5xl md:text-6xl lg:text-8xl font-bold bg-linear-to-r from-blue-800 via-emerald-600 via-55% to-yellow-500 to-75% bg-clip-text text-transparent">
                        {{ $general_setting->institute_initialism }}</h1>
                    <h2 class="text-2xl lg:text-4xl font-bold text-blue-900 mb-4">@breakResponsive($general_setting->institute_name)</h2>
                </div>
            </section>
        </header>

        <section class="py-16 bg-blue-800">
            <div class="container mx-auto px-4 text-left">
                <h2 class="text-3xl font-bold text-white mb-4">{{ $general_setting->institute_motto }}</h2>
                <p class="text-lg text-white mb-8"> El {{ $general_setting->institute_name }} es una institución
                    pública que ofrece carreras de nivel superior técnico con títulos oficiales y validez nacional. Nuestro enfoque se centra en la
                    formación de profesionales capaces de responder a las necesidades del entramado socio-productivo
                    actual.</p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    @include('includes.institutional-card', [
                        'color' => 'blue',
                        'icon' => 'fas fa-graduation-cap',
                        'text' => 'Todas nuestras carreras cuentan con reconocimiento oficial y validez nacional',
                    ])

                    @include('includes.institutional-card', [
                        'color' => 'green',
                        'icon' => 'fas fa-briefcase',
                        'text' => 'Formación orientada a las necesidades reales del mercado laboral actual',
                    ])

                    @include('includes.institutional-card', [
                        'color' => 'amber',
                        'icon' => 'fas fa-chalkboard-teacher',
                        'text' =>
                            'Profesionales en actividad que transmiten experiencia real y conocimientos actualizados',
                    ])

                </div>


            </div>
        </section>

        <section class="py-16 bg-white">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold text-blue-800 mb-4">Da el próximo paso en tu trayectoria profesional</h2>
                <p class="text-lg text-blue-800 mb-8">El {{ $general_setting->institute_name }} te invita a
                    inscribirte y comenzar una formación integral, orientada a la excelencia y a las demandas del entorno
                    profesional contemporáneo</p>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-16 text-left">
                    @if ($general_setting->institute_email)
                        <div class="flex items-start space-x-4 mx-auto w-72">
                            <div class="bg-green-500 p-2.5 min-w-[3rem] flex justify-center rounded-lg text-white shadow">
                                <i class="fas fa-envelope text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-green-500">E-Mail</h4>
                                <p class="text-green-500">{{ $general_setting->institute_email }}</p>
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
                                <p class="text-amber-500">{{ $general_setting->institute_address }}</p>
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
                                <p class="text-green-500">{{ $general_setting->institute_business_hours }}</p>
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
                                <p class="text-amber-500">{{ $general_setting->institute_phone }}</p>
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

    </section>
@endsection
