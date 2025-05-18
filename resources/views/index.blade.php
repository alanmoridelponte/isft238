@extends('layouts.public.page')
@section('header')
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600;700&display=swap" rel="stylesheet">
<style>
html {
    font-family: Rubik, sans-serif!important;
}
</style>
@endsection


@section('content')
<section class="relative h-[calc(100vh-96px)] md:h-[calc(100vh-100px)] w-full overflow-hidden">
  <!-- Video de fondo -->
  <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover z-0">
    <source src="https://cuono.dev/video1.mp4" type="video/mp4" />
  </video>

  <!-- Capa de overlay oscura si la necesitás -->
  <div class="absolute inset-0 bg-black/50 z-10"></div>

  <!-- Texto lateral tipo cápsula -->
  <div class="absolute z-20 left-0 top-1/4 w-[85%] md:w-[67%] lg:w-[70%] xl:w-[55%]">
    <section class="bg-white pt-12 pb-6 mb-2 pl-8 pr-6 shadow-2xl rounded-tr-lg">
        <div class="max-w-4xl mx-auto text-left">
            <h1 class="text-5xl md:text-6xl lg:text-8xl font-bold bg-gradient-to-r from-blue-800 via-emerald-600 via-55% to-yellow-500 to-75% bg-clip-text text-transparent">{{ $general_setting->institute_initialism }}</h1>
            <h2 class="text-2xl lg:text-4xl font-bold text-blue-900 mb-4">@breakResponsive($general_setting->institute_name)</h2>
        </div>
    </section>
    <section class="bg-white pt-4 pb-6 pl-8 pr-6 shadow-2xl rounded-br-lg">
        <div class="max-w-4xl mx-auto text-left">
            <p class="text-md md:text-xl text-semibold bg-gradient-to-r from-blue-800 via-emerald-600 via-55% to-amber-600 to-75% bg-clip-text text-transparent">
            {{ $general_setting->institute_motto }}
            </p>
        </div>
    </section>
  </div>

</section>


<x-public.careers-list>
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-800">Nuestras Carreras</h2>
        <p class="text-gray-600 mt-2 px-1">Formación técnica superior con orientación práctica y salida laboral</p>
    </div>
    <hr class="container mx-auto px-4 mb-12">
</x-public.careers-list>
@endsection
