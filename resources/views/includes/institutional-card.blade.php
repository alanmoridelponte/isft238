@isset($color, $icon, $text)
<div class="bg-gradient-to-br from-{{ $color }}-50 to-{{ $color }}-100 p-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-{{ $color }}-100 group">
    <div class="flex items-left justify-between gap-4">
        <div class="flex items-center justify-center w-16 h-16 rounded-md bg-gradient-to-br from-{{ $color }}-600 to-{{ $color }}-700 group-hover:from-{{ $color }}-700 group-hover:to-{{ $color }}-800 transition-colors">
            <i class="{{ $icon }} text-3xl text-white"></i>
        </div>
        <h3 class="text-md flex-1 font-semibold bg-gradient-to-br from-{{ $color }}-600 to-{{ $color }}-700 group-hover:from-{{ $color }}-700 group-hover:to-{{ $color }}-800 transition-colors bg-clip-text text-transparent tracking-tight">
            {{ $text }}
        </h3>
    </div>
</div>
@endisset
