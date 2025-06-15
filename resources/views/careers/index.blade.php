@extends('layouts.public.page')

@section('header')
    <link rel="canonical" href="{{ route('careers.index') }}">
    <meta name="robots" content="index,follow">
    <meta name="description" content="Formación técnica superior con orientación práctica y salida laboral">
    <meta property="og:title" content="Nuestras Carreras - {{ $general_setting->institute_name }}">
    <meta property="og:description" content="Formación técnica superior con orientación práctica y salida laboral">
    <meta property="og:url" content="{{ route('careers.index') }}">
    <meta property="og:type" content="article">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Nuestras Carreras - {{ $general_setting->institute_name }}">
    <meta name="twitter:description" content="Formación técnica superior con orientación práctica y salida laboral">
@endsection

@section('content')
    <header class="bg-green-700 text-white py-16">
        <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold">Nuestras Carreras</h1>
        <p class="mt-2 text-lg">Formación técnica superior con orientación práctica y salida laboral</p>
        </div>
    </header>
    <x-public.careers-list />
@endsection
