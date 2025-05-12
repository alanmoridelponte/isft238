<div class="bg-blue-900 text-white">
    <div class="container mx-auto px-4 py-2 flex justify-between items-center">
        <div class="flex space-x-4">
            @foreach ($leftItems as $item)
            <a href="{{ $item['href'] }}" class="text-xs md:text-sm flex items-center hover:text-blue-200">
                <i class="fas {{ $item['icon'] }} mr-2"></i>{{ $item['name'] }}
            </a>
            @endforeach
        </div>
        <div class="flex space-x-4 hidden md:block">
            @foreach ($rightItems as $item)
            <a href="{{ $item['href'] }}" class="text-sm hover:text-blue-200 tracking-tighter">
                {{ $item['name'] }}<i class="fas {{ $item['icon'] }} ml-1"></i>
            </a>
            @endforeach
        </div>
    </div>
</div>
