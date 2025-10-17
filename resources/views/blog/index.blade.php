@extends('layouts.public.page')

@section('header')
    <link rel="canonical" href="{{ route('blog.index') }}">
    <meta name="robots" content="index,follow">
    <meta name="description" content="Noticias, experiencias y novedades del {{ $general_setting->institute_name }}">
    <meta property="og:title" content="Blog Institucional - {{ $general_setting->institute_name }}">
    <meta property="og:description" content="Noticias, experiencias y novedades del {{ $general_setting->institute_name }}">
    <meta property="og:url" content="{{ route('blog.index') }}">
    <meta property="og:type" content="article">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Blog Institucional - {{ $general_setting->institute_name }}">
    <meta name="twitter:description" content="Noticias, experiencias y novedades del {{ $general_setting->institute_name }}">
@endsection

@section('content')
    <header class="bg-amber-500 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold">Blog Institucional</h1>
            <p class="mt-2 text-lg">Noticias, experiencias y novedades del {{ $general_setting->institute_name }}</p>
        </div>
    </header>
    <section class="bg-linear-to-b from-amber-50 to-neutral-50 py-12 px-4">
        <div class="container mx-auto ">
            <!-- Filtros principales -->
            <div class="bg-white border border-amber-100 shadow rounded-lg p-4 mb-4">
                <form method="GET" action="{{ route('blog.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Búsqueda -->
                    <div class="relative col-span-1 md:col-span-3">
                        <input type="text" id="busqueda" name="busqueda" placeholder="Ingrese palabras claves..."
                            value="{{ request('busqueda') }}"
                            class="w-full pl-10 pr-4 py-2 rounded-lg border border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500" />
                        <i class="fas fa-search absolute left-3 top-3 text-amber-600 pointer-events-none"></i>
                    </div>

                    <!-- Botón -->
                    <div class="flex items-end">
                        <button type="submit"
                            class="w-full bg-amber-500 hover:bg-amber-600 text-white font-bold py-2 rounded-lg shadow transition">
                            <i class="fas fa-search mr-2"></i> Buscar
                        </button>
                    </div>
                </form>
            </div>
            <!-- Filtros de categorias y etiquetas -->
            <div class="bg-white border border-amber-100 shadow rounded-lg p-4 mb-12">
                <!-- Categoría -->
                <div>
                    <label for="category" class="text-sm font-semibold text-amber-600 flex items-center gap-2 mb-1">
                        <i class="fas fa-search text-amber-600"></i>Buscar por Categoría
                    </label>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('blog.index') }}"
                            class="text-sm px-4 py-1.5 rounded font-semibold transition-all duration-200
                      {{ request()->routeIs('blog.index') ? 'bg-amber-600 text-white shadow' : 'bg-amber-100 text-amber-600 hover:bg-amber-200' }}">
                            Todas las categorías
                        </a>
                        @foreach ($categories as $category)
                            <a href="{{ route('blog.category', ['category' => $category->slug]) }}"
                                class="text-sm px-4 py-1.5 rounded font-semibold transition-all duration-200
                      {{ request('category') === $category->slug ? 'bg-amber-600 text-white shadow' : 'bg-amber-100 text-amber-600 hover:bg-amber-200' }}">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <hr class="border-t border-amber-200 my-4">
                <!-- Tag -->
                <div>
                    <label for="tag" class="text-sm font-semibold text-amber-600 flex items-center gap-2 mb-1">
                        <i class="fas fa-search text-amber-600"></i>Buscar por Etiquetas
                    </label>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($tags as $tag)
                            <a href="{{ route('blog.tag', ['tag' => $tag->slug]) }}"
                                class="text-sm px-4 py-1.5 rounded font-medium transition-all duration-200
                      {{ request('tag') === $tag->slug ? 'bg-amber-600 text-white shadow' : 'bg-amber-100 text-amber-600 hover:bg-amber-200' }}">
                                <i
                                    class="fas fa-tags mr-2 {{ request('tag') === $tag->slug ? 'text-amber-100' : 'text-amber-600' }}"></i>{{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Posts cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-start">
                @foreach ($posts as $post)
                    <x-public.blog-card :post="$post" />
                @endforeach
            </div>

            <!-- Paginación fake -->
            <div class="mt-12 text-center">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection
