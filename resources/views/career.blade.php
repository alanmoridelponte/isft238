@extends('layouts.public.page')

@section('content')
    <!-- Encabezado de la carrera -->
    <header class="bg-green-700 text-white py-10">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold">{{ $career->title }}</h1>
            <p class="mt-3 text-md md:text-lg">{{ $career->excerpt }}</p>
        </div>
    </header>

    <!-- Sobre la carrera -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="bg-green-50 p-5 rounded-xl shadow-sm hover:shadow-md transition sm:col-span-2">
                        <h2 class="text-green-800 text-3xl font-bold mb-2"><i class="fas fa-graduation-cap mr-2"></i>Título de Grado</h3>
                        <p class="text-gray-700">
                            <span class="font-bold">{{ $career->title }}</span><br>
                            <span class="font-semibold">{{ $career->resolution }}</span>
                        </p>
                    </div>
                    <div class="bg-amber-50 p-5 rounded-xl shadow-sm hover:shadow-md transition">
                        <h2 class="text-amber-800 font-semibold text-xl mb-2"><i class="far fa-clock mr-2"></i>Duración</h3>
                        <p class="text-gray-700 font-medium">{{ $career->duration }}</p>
                    </div>
                    <div class="bg-amber-50 p-5 rounded-xl shadow-sm hover:shadow-md transition">
                        <h2 class="text-amber-800 font-semibold text-xl mb-2"><i class="fas fa-chalkboard-teacher mr-2"></i>Modalidad</h3>
                        <p class="text-gray-700 font-medium">{{ $career->modality }}</p>
                    </div>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-green-800 mb-6">Alcances del Título</h2>
                    <p class="text-gray-700 text-lg leading-relaxed mb-4">{!! $career->scope !!}</p>
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
    <x-public.careers-list :exclude-career="$career" :randomize="true" :limit="3">
        <h2 class="text-xl md:text-2xl font-semibold text-center text-gray-700 mb-10 mx-2">Otras carreras que te pueden interesar</h2>
    </x-public.careers-list>
    </div>
@endsection
