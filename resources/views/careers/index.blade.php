@extends('layouts.public.page')

@section('content')
    <header class="bg-green-700 text-white py-16">
        <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold">Nuestras Carreras</h1>
        <p class="mt-2 text-lg">Formación técnica superior con orientación práctica y salida laboral</p>
        </div>
    </header>
    <x-public.careers-list />
@endsection
