@extends('layouts.public.page')

@section('content')
    <header class="bg-blue-700 text-white py-8">
        <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold">Nuestras Carreras</h1>
        <p class="mt-2 text-lg">Formación técnica superior con orientación práctica y salida laboral</p>
        </div>
    </header>
    <x-public.careers-list />
@endsection
