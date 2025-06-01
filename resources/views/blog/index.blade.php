@extends('layouts.public.page')

@section('content')
    <header class="bg-amber-700 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold">Blog Institucional</h1>
            <p class="mt-2 text-lg">Noticias, experiencias y novedades del {{ $general_setting->institute_name }}</p>
        </div>
    </header>
    <section class="bg-gradient-to-b from-amber-50 to-neutral-50 py-12 px-4">
        <div class="container mx-auto ">

            <!-- Filtros principales -->
            <div class="bg-white border border-amber-100 shadow-md rounded-xl p-4 mb-10">
                <form method="GET" action="{{ route('blog.index') }}"
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

                    <!-- Categoría -->
                    <div>
                        <label for="category" class="text-sm font-semibold text-amber-700 flex items-center gap-2 mb-1">
                            <i class="fas fa-folder-open text-amber-500"></i> Categoría
                        </label>
                <div class="flex flex-wrap gap-2">
                    @foreach (['Eventos', 'Educación', 'Tecnología', 'Comunidad'] as $category)
                        <a href="{{ route('blog.index', ['category' => Str::slug($category)]) }}"
                            class="text-sm px-4 py-1.5 rounded font-medium transition-all duration-200
                      {{ request('category') === Str::slug($category) ? 'bg-amber-600 text-white shadow' : 'bg-amber-100 text-amber-800 hover:bg-amber-200' }}">
                            {{ $category }}
                        </a>
                    @endforeach
                </div>
                    </div>

                    <!-- Tag -->
                    <div>
                        <label for="tag" class="text-sm font-semibold text-amber-700 flex items-center gap-2 mb-1">
                            <i class="fas fa-hashtag text-amber-500"></i> Etiqueta
                        </label>
                        <select id="tag" name="tag"
                                class="w-full border border-amber-200 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-amber-400">
                            <option value="">Todos</option>
                            @foreach (['educacion', 'formacion', 'isft'] as $tag)
                                <option value="{{ $tag }}" {{ request('tag') === $tag ? 'selected' : '' }}>
                                    #{{ $tag }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Búsqueda -->
                    <div>
                        <label for="search" class="text-sm font-semibold text-amber-700 flex items-center gap-2 mb-1">
                            <i class="fas fa-search text-amber-500"></i> Buscar
                        </label>
                        <input type="text" id="search" name="search" value="{{ request('search') }}"
                            placeholder="Palabra clave..."
                            class="w-full border border-amber-200 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-amber-400">
                    </div>

                    <!-- Botón -->
                    <div class="flex items-end">
                        <button type="submit"
                                class="w-full bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 rounded-lg shadow-md transition">
                            <i class="fas fa-filter mr-2"></i> Aplicar filtros
                        </button>
                    </div>
                </form>

            </div>





            <!-- Posts mockup -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @for ($i = 1; $i <= 6; $i++)
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                        <img src="https://source.unsplash.com/600x400/?university,student,{{ $i }}"
                            alt="Imagen del post" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-2">
                                <span
                                    class="text-sm bg-amber-100 text-amber-800 font-medium px-2 py-1 rounded">Educación</span>
                                <span class="text-xs text-gray-500">Hace 2 semanas</span>
                            </div>
                            <h2 class="text-xl font-bold text-amber-700 mb-2">Título del Post {{ $i }}</h2>
                            <p class="text-gray-700 text-sm mb-4">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
                                Sed cursus ante dapibus diam.
                            </p>
                            <a href="#" class="text-amber-700 font-semibold hover:underline">Leer más →</a>
                            <div class="flex flex-wrap gap-2 mt-4">
                                @foreach (['educación', 'formación', 'ISFT'] as $tag)
                                    <span class="text-xs bg-amber-100 text-amber-800 font-medium px-2 py-1 rounded">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <!-- Paginación fake -->
            <div class="mt-12 text-center">
                <span
                    class="inline-block px-4 py-2 text-amber-700 border border-amber-300 rounded-lg bg-white shadow">1</span>
                <span class="inline-block px-4 py-2 text-gray-500">...</span>
                <span class="inline-block px-4 py-2 text-amber-700 hover:underline">Siguiente →</span>
            </div>
        </div>
    </section>
@endsection
