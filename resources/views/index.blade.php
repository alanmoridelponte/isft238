@extends('layouts.public.page')
@section('content')
<section class="relative h-[calc(100vh-96px)] md:h-[calc(100vh-100px)] w-full overflow-hidden">
   <!-- Video de fondo -->
   <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover z-0">
      <source src="https://www.ucaece.edu.ar/assets/uploads/app.web.base/customslider/video/55e2017fffc3450981648beed44a2bf6.mp4" type="video/mp4" />
   </video>
   <!-- Capa de overlay oscura si la necesitás -->
   <div class="absolute inset-0 bg-black/50 z-10"></div>
   <!-- Texto lateral tipo cápsula -->
   <div class="absolute z-20 left-0 top-1/4 transform -translate-y-1/4 w-[85%] md:w-[67%] lg:w-[70%] xl:w-[55%]">
      <section class="bg-gradient-to-r from-blue-50 via-green-50 to-amber-50 shadow-2xl rounded-tr-lg">
         <div class="max-h-4xl max-w-4xl mx-auto text-left">
            <picture>
  <!-- Imagen para pantallas grandes -->
  <source srcset="assets/banner-lg.jpg" media="(min-width: 1024px)">

  <!-- Imagen para pantallas pequeñas -->
  <img src="assets/banner.jpg" alt="Banner" class="w-full h-auto rounded-lg shadow-lg">
</picture>
         </div>
      </section>
      <section class="bg-gradient-to-r from-blue-50 via-green-50 to-amber-50 pt-12 pb-6 my-2 pl-8 pr-6 shadow-2xl">
         <div class="max-w-4xl mx-auto text-left">
            <h1 class="text-5xl md:text-6xl lg:text-8xl font-bold bg-gradient-to-r from-blue-800 via-emerald-600 via-55% to-yellow-500 to-75% bg-clip-text text-transparent">{{ $general_setting->institute_initialism }}</h1>
            <h2 class="text-2xl lg:text-4xl font-bold text-blue-900 mb-4">@breakResponsive($general_setting->institute_name)</h2>
         </div>
      </section>
      <section class="bg-gradient-to-r from-blue-50 via-green-50 to-amber-50 pt-4 pb-6 pl-8 pr-6 shadow-2xl rounded-br-lg">
         <div class="max-w-4xl mx-auto text-left">
            <p class="text-lg md:text-xl text-semibold bg-gradient-to-r from-blue-800 via-emerald-600 via-55% to-amber-600 to-75% bg-clip-text text-transparent">
               {{ $general_setting->institute_motto }}
            </p>
         </div>
      </section>
   </div>
</section>

<section class="py-16 bg-gradient-to-b to-natural-50">
   <div class="container mx-auto px-4">
      <div class="text-center mb-12">
         <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-800 via-green-800 to-amber-800 bg-clip-text text-transparent">¿Por qué elegir ISFT238?</h2>
         <p class="text-gray-900 text-lg mt-2">Formamos profesionales técnicos comprometidos con el territorio socio-productivo actual</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
         <div class="bg-blue-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
            <div class="mb-4">
               <i class="fas fa-graduation-cap text-5xl text-blue-700"></i>
            </div>
            <h3 class="text-xl font-bold text-blue-800 mb-2">Título Oficial</h3>
            <p class="text-blue-900">Todas nuestras carreras cuentan con reconocimiento oficial y validez nacional.</p>
         </div>
         <div class="bg-green-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
            <div class="mb-4">
               <i class="fas fa-briefcase text-5xl text-green-700"></i>
            </div>
            <h3 class="text-xl font-bold text-green-800 mb-2">Salida Laboral</h3>
            <p class="text-green-900">Formación orientada a las necesidades reales del mercado laboral actual.</p>
         </div>
         <div class="bg-amber-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
            <div class="mb-4">
               <i class="fas fa-institution text-amber-700 text-5xl"></i>
            </div>
            <h3 class="text-xl font-bold text-amber-800 mb-2">Docentes Expertos</h3>
            <p class="text-amber-900">Profesionales en actividad que transmiten experiencia real y conocimientos actualizados.</p>
         </div>
      </div>
   </div>
</section>

<x-public.careers-list>
   <div class="text-center mb-12">
      <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-800 via-green-800 to-amber-800 bg-clip-text text-transparent">Nuestras Carreras</h2>
      <p class="text-green-900 text-lg mt-2 px-1">Formación técnica superior con orientación práctica y salida laboral</p>
   </div>
   <hr class="container mx-auto px-4 mb-12">
</x-public.careers-list>

<section class="py-16 bg-blue-800">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Da el próximo paso en tu trayectoria académica</h2>
        <p class="text-lg text-white mb-8">El Instituto Superior de Formación Técnica N.º 238 te invita a inscribirte y comenzar una formación integral, orientada a la excelencia y a las demandas del entorno profesional contemporáneo</p>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-16 text-left">
            @if ($general_setting->institute_email)
            <div class="flex items-start space-x-4 mx-auto w-72 md:w-64 md:text-nowrap">
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
            <div class="flex items-start space-x-4 mx-auto w-72 md:w-64 md:text-nowrap">
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
            <div class="flex items-start space-x-4 mx-auto w-72 md:w-64 md:text-nowrap">
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
            <div class="flex items-start space-x-4 mx-auto w-72 md:w-64 md:text-nowrap">
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

        <a href="{{ route('contact') }}" class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-3 px-8 rounded-lg transition duration-300 text-lg">
            Contactá con nosotros
        </a>
    </div>
</section>

<section class="py-16 bg-gradient-to-b to-natural-50">
   <div class="container mx-auto px-4">
      <div class="text-center mb-12">
         <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-800 via-green-800 to-amber-800 bg-clip-text text-transparent">Nuestras últimas novedades del blog</h2>
         <p class="text-gray-900 text-lg mt-2">Descubrí artículos, noticias y consejos pensados para acompañarte en tu camino académico y profesional</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
         <div class="bg-amber-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
            <div class="mb-4">
               <i class="fas fa-graduation-cap text-5xl text-blue-700"></i>
            </div>
            <h3 class="text-xl font-bold text-amber-800 mb-2">EN PROGRESO</h3>
            <p class="text-amber-900">EN PROGRESO - EN PROGRESO - EN PROGRESO - EN PROGRESO</p>
         </div>
         <div class="bg-amber-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
            <div class="mb-4">
               <i class="fas fa-graduation-cap text-5xl text-blue-700"></i>
            </div>
            <h3 class="text-xl font-bold text-amber-800 mb-2">EN PROGRESO</h3>
            <p class="text-amber-900">EN PROGRESO - EN PROGRESO - EN PROGRESO - EN PROGRESO</p>
         </div>
         <div class="bg-amber-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
            <div class="mb-4">
               <i class="fas fa-graduation-cap text-5xl text-blue-700"></i>
            </div>
            <h3 class="text-xl font-bold text-amber-800 mb-2">EN PROGRESO</h3>
            <p class="text-amber-900">EN PROGRESO - EN PROGRESO - EN PROGRESO - EN PROGRESO</p>
         </div>
      </div>
   </div>
</section>

@endsection
