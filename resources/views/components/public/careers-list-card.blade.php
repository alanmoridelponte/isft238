<div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
    <div class="bg-blue-800 h-3"></div>
    <div class="p-4 md:pb-3 md:px-6">
        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $career->title }}</h3>
        <p class="text-gray-600 mb-4">{{ $career->excerpt }}</p>
        <div class="mb-4 flex flex-wrap justify-start">
            <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded mr-2 mb-2">
                <i class="far fa-clock mr-0"></i>
                {{ $career->duration }}
            </span>
            <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded mr-2 mb-2">
                <i class="fas fa-chalkboard-teacher mr-0"></i>
                Modalidad {{ $career->modality }}
            </span>
        </div>
        <div class="flex items-center text-sm text-gray-600 justify-start">
            <a href="{{ route('careers.show', ['career' => $career->slug ?? 'not-found']) }}" class="inline-block bg-blue-800 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-lg transition duration-300">Más información</a>
        </div>
     </div>
</div>
