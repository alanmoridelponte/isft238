@extends('layouts.public.page')

@section('content')
  <!-- Encabezado -->
  <header class="bg-blue-700 text-white py-8">
    <div class="container mx-auto px-4">
      <h1 class="text-4xl font-bold">Tecnicatura en Desarrollo de Software</h1>
      <p class="mt-2 text-lg">Duración: 3 años | Modalidad: Presencial</p>
    </div>
  </header>

  <!-- Descripción -->
  <section class="container mx-auto px-4 mt-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <div>
        <h2 class="text-2xl font-semibold mb-4">Sobre la carrera</h2>
        <p class="text-gray-700 mb-4">
          La Tecnicatura en Desarrollo de Software te brinda las herramientas para diseñar, desarrollar e implementar sistemas informáticos. Aprenderás desde programación básica hasta desarrollo web y móvil.
        </p>
        <p class="text-gray-700">
          Nuestros egresados están preparados para enfrentar los desafíos del mundo laboral moderno, con un enfoque práctico y actualizado.
        </p>
      </div>
      <div class="bg-blue-100 p-6 rounded-2xl shadow-sm">
        <h3 class="text-xl font-semibold mb-4 text-blue-800">¿Qué vas a aprender?</h3>
        <ul class="list-disc list-inside text-gray-800 space-y-2">
          <li>Programación en distintos lenguajes</li>
          <li>Desarrollo Web y Aplicaciones Móviles</li>
          <li>Base de datos y estructuras de datos</li>
          <li>Metodologías ágiles</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Plan de estudios -->
  <section class="container mx-auto px-4 mt-12">
    <h2 class="text-2xl font-semibold mb-6">Plan de Estudios</h2>
    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-gray-100 p-4 rounded-xl">
        <h3 class="text-lg font-bold text-blue-700 mb-2">1º Año</h3>
        <ul class="text-gray-700 list-disc list-inside">
          <li>Algoritmos y Programación</li>
          <li>Matemática</li>
          <li>Sistemas Operativos</li>
          <li>Inglés Técnico</li>
        </ul>
      </div>
      <div class="bg-gray-100 p-4 rounded-xl">
        <h3 class="text-lg font-bold text-blue-700 mb-2">2º Año</h3>
        <ul class="text-gray-700 list-disc list-inside">
          <li>Programación Web</li>
          <li>Base de Datos</li>
          <li>Diseño de Interfaces</li>
          <li>Redes y Seguridad</li>
        </ul>
      </div>
      <div class="bg-gray-100 p-4 rounded-xl">
        <h3 class="text-lg font-bold text-blue-700 mb-2">3º Año</h3>
        <ul class="text-gray-700 list-disc list-inside">
          <li>Aplicaciones Móviles</li>
          <li>Proyecto Final</li>
          <li>Práctica Profesional</li>
          <li>Gestión de Proyectos</li>
        </ul>
      </div>
    </div>
  </section>


    <hr class="container mx-auto px-4 mt-20">
    <x-public.careers-list :exclude-career="$career" :randomize="true" :limit="3">
        <h2 class="text-2xl font-semibold text-center mb-10">Otras carreras que te pueden interesar</h2>
    </x-public.careers-list>

@endsection
