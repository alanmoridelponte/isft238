<div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
    <div class="bg-green-800 h-3"></div>
    <div class="p-4 md:pb-3 md:px-6">
        <h3 class="text-xl font-bold text-green-800 mb-2">{{ $career->title }}</h3>
        <p class="text-gray-600 mb-4">{{ $career->excerpt }}</p>
        <div class="mb-4 flex flex-wrap justify-start">
            <span class="inline-block bg-amber-100 text-amber-800 text-xs font-semibold px-2 py-1 rounded mr-2 mb-2">
                <i class="far fa-clock mr-0"></i>
                {{ $career->duration }}
            </span>
            <span class="inline-block bg-amber-100 text-amber-800 text-xs font-semibold px-2 py-1 rounded mr-2 mb-2">
                <i class="fas fa-chalkboard-teacher mr-0"></i>
                Modalidad {{ $career->modality }}
            </span>
        </div>
        <div class="flex items-center text-sm text-gray-700 justify-start">
            <a href="{{ route('careers.show', ['career' => $career->slug ?? 'not-found']) }}" class="inline-block bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">Más información</a>
        </div>
     </div>
</div>
