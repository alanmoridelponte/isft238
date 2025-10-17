<header class="bg-white shadow-md sticky top-0 z-50">
    <nav class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center">
                <a href="{{ route('page.index') }}" class="flex items-center">
                    <span class="text-2xl font-bold bg-linear-to-r from-blue-800 via-emerald-600 via-55% to-yellow-500 to-95% bg-clip-text text-transparent">{{ $general_setting->institute_initialism }}</span>
                </a>
            </div>

            <!-- Menú navegación desktop -->
            <div class="hidden md:flex items-center space-x-8">
                @foreach ($menu as $item)
                <a href="{{ $item['url'] }}" class="font-medium text-{{  $item['active'] ? 'blue' : 'gray' }}-700 hover:text-blue-600">{{ $item['name'] }}</a>
                @endforeach
            </div>

            <!-- Botón móvil -->
            <div class="md:hidden">
                <button id="mobile-menu-toggle" class="flex flex-col justify-evenly h-8 text-gray-700 hover:text-blue-600 focus:outline-none transition-all duration-400">
                  <div class="bar w-[31px] h-[4px] bg-blue-800 transition-transform duration-400 origin-center"></div>
                  <div class="bar w-[31px] h-[4px] bg-blue-800 transition-opacity duration-400"></div>
                  <div class="bar w-[31px] h-[4px] bg-blue-800 transition-transform duration-400 origin-center"></div>
                </button>
              </div>
    </nav>

    <!-- Mobile menu, show/hide based on menu open state. -->
    <div id="mobile-menu" class="md:hidden hidden bg-white shadow-lg" role="dialog" aria-modal="true">
        <hr>
        <div class="px-4 py-4">
            <div class="flex flex-col space-y-2">
                @foreach ($menu as $item)
                <a href="{{ $item['url'] }}" class="block px-4 py-2 font-medium text-{{  $item['active'] ? 'blue' : 'gray' }}-700 hover:text-blue-600">{{ $item['name'] }}</a>
                @endforeach
            </div>
        </div>
    </div>
</header>

@section('scripts')
<script>
    document.getElementById('mobile-menu-toggle').addEventListener('click', function () {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');

        this.classList.toggle('open');
        const [bar1, bar2, bar3] = this.querySelectorAll('.bar');

        bar1.classList.toggle('rotate-[-45deg]');
        bar1.classList.toggle('translate-y-[9px]');

        bar2.classList.toggle('opacity-0');

        bar3.classList.toggle('rotate-[45deg]');
        bar3.classList.toggle('translate-y-[-9px]');
    });
</script>
@stop
