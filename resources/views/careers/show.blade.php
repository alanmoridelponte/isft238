@extends('layouts.public.page')

@section('header')
    <link rel="canonical" href="{{ route('careers.show', ['career' => $career->slug ?? 'not-found']) }}">
    <meta name="robots" content="index,follow">
    <meta name="description" content="{{ $career->excerpt }}">
    <meta property="og:title" content="{{ $career->title }} - {{ $general_setting->institute_name }}">
    <meta property="og:description" content="{{ $career->excerpt }}">
    <meta property="og:url" content="{{ route('careers.show', ['career' => $career->slug ?? 'not-found']) }}">
    <meta property="og:type" content="article">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $career->title }} - {{ $general_setting->institute_name }}">
    <meta name="twitter:description" content="{{ $career->excerpt }}">
@endsection

@section('content')
    <!-- Encabezado de la carrera -->
    <header class="bg-green-700 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold">{{ $career->title }}</h1>
            <p class="mt-3 text-md md:text-lg">{{ $career->excerpt }}</p>
        </div>
    </header>

    <!-- Sobre la carrera -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-10 items-start">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <div class="bg-green-50 p-4 rounded-xl shadow-sm hover:shadow-md transition sm:col-span-2">
                        <div class="flex items-center md:items-top justify-between gap-4 mb-4 md:mb-0">
                            <div class="flex items-center justify-center w-12 lg:w-16 h-12 lg:h-16 rounded-md bg-linear-to-br from-green-700 to-green-800">
                                <i class="fas fa-graduation-cap text-2xl lg:text-3xl text-white"></i>
                            </div>
                            <h3 class="text-2xl lg:text-3xl flex-1 font-bold bg-linear-to-br from-green-700 to-green-800 bg-clip-text text-transparent tracking-tight">
                                Título de Grado<div class="hidden md:flex"><br><span class="text-xl font-semibold">{{ $career->resolution }}</span></div>
                            </h3>
                        </div>
                        <span class="md:hidden text-xl font-semibold bg-linear-to-br from-green-700 to-green-800 bg-clip-text text-transparent tracking-tight">{{ $career->resolution }}</span>
                    </div>

                    <div class="bg-amber-50 p-4 rounded-xl shadow-sm hover:shadow-md transition">
                        <div class="flex items-center md:items-top justify-between gap-2 leading-none">
                            <div class="flex items-center justify-center w-10 lg:w-12 h-10 lg:h-12 rounded-md bg-linear-to-br from-amber-700 to-amber-800">
                                <i class="far fa-clock text-xl lg:text-2xl text-white font-bold"></i>
                            </div>
                            <h3 class="flex flex-col flex-1 bg-linear-to-br from-amber-700 to-amber-800 bg-clip-text text-transparent tracking-tight">
                                <span class="text-xl lg:text-2xl font-bold">Duración</span>
                                <span class="text-md lg:text-lg font-semibold">{{ $career->duration }}</span>
                            </h3>
                        </div>
                    </div>

                    <div class="bg-amber-50 p-4 rounded-xl shadow-sm hover:shadow-md transition">
                        <div class="flex items-center md:items-top justify-between gap-2 leading-none">
                            <div class="flex items-center justify-center w-10 lg:w-12 h-10 lg:h-12 rounded-md bg-linear-to-br from-amber-700 to-amber-800">
                                <i class="fas fa-chalkboard-teacher text-xl lg:text-2xl text-white font-bold"></i>
                            </div>
                            <h3 class="flex flex-col flex-1 bg-linear-to-br from-amber-700 to-amber-800 bg-clip-text text-transparent tracking-tight">
                                <span class="text-xl lg:text-2xl font-bold">Modalidad</span>
                                <span class="text-md lg:text-lg font-semibold">{{ $career->modality }}</span>
                            </h3>
                        </div>
                    </div>

                </div>
                <div>
                    <h2 class="text-2xl lg:text-3xl font-bold text-green-800 mb-6">Alcances del Título</h2>
                    <div class="text-gray-700 text-md lg:text-lg leading-relaxed mb-4">{!! $career->scope !!}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Plan de Estudios -->
    <hr class="container mx-auto px-4">
    <section class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-blue-800 mb-12">Plan de Estudios</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach ($career->study_plan as $study_plan)
                <div class="bg-sky-50 shadow-md rounded-xl p-6">
                <h3 class="text-xl font-bold text-blue-700 mb-4">{{ $study_plan['title'] }}</h3>
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($study_plan['subjects'] as $item)
                        <li class="font-medium text-sky-700">
                            <span class="text-gray-700">{{ $item['subject'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Otras carreras -->
    <hr class="container mx-auto px-4 mt-12">
    <div class="bg-white">
    <x-public.careers-list :exclude-career="$career" :randomize="true" :limit="2">
        <h2 class="text-xl md:text-2xl font-semibold text-center text-gray-700 mb-10 mx-2">Otras carreras que te pueden interesar</h2>
    </x-public.careers-list>
    </div>
@endsection
