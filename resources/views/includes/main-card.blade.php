@isset($color, $icon, $title, $text)
<div class="bg-{{ $color }}-500 p-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
    <div class="mb-2 flex items-center justify-between gap-4">
        <div class="flex items-center justify-center w-16 h-16 rounded-md bg-linear-to-br from-{{ $color }}-600 to-{{ $color }}-700 group-hover:from-{{ $color }}-700 group-hover:to-{{ $color }}-800 transition-colors">
            <i class="{{ $icon }} text-3xl text-white"></i>
        </div>
        <h3 class="text-2xl flex-1 font-semibold bg-white bg-clip-text text-transparent tracking-tight">
            {{ $title }}
        </h3>
    </div>
    <p class="text-white leading-relaxed">{{ $text }}</p>
</div>
@endisset
