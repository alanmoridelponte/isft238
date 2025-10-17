@isset($color, $icon, $text)
<div class="bg-{{ $color }}-500 p-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
    <div class="flex items-left justify-between gap-4">
        <div class="flex items-center justify-center w-16 h-16 rounded-md bg-700">
            <i class="{{ $icon }} text-3xl text-white"></i>
        </div>
        <h3 class="text-md flex-1 font-semibold text-white tracking-tight ml-3">
            {{ $text }}
        </h3>
    </div>
</div>
@endisset
