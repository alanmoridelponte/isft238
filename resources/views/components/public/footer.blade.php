<footer class="bg-blue-900 text-white py-10">
  <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
    <div class="flex flex-col items-top">
        <a href="{{ route('home') }}" class="flex items-top">
            <span class="text-2xl font-bold text-blue-400 mr-2">ISFT</span>
            <span class="text-2xl font-bold text-blue-300">238</span>
        </a>
        <span class="text-md text-white-400 mt-1 mb-2">Instituto Superior de Formación Técnica N° 238</span>
        <span class="text-sm text-white-400 mb-2">{{ $motto }}</span>

    </div>

    <!-- Redes Sociales -->
    <div>
      <h2 class="text-xl font-semibold mb-4 text-white">Conectá con nosotros</h2>
      <div class="flex gap-x-6 mb-4">
        @foreach ($socials as $social)
          <a href="{{ $social['href'] }}" class="{{ $social['class'] }}" aria-label="{{ $social['name'] }}">
            <i class="fab {{ $social['icon'] }} text-2xl"></i>
          </a>
        @endforeach
      </div>
      <div class="flex flex-col gap-y-4">
        @foreach ($data as $datum)
          <a href="{{ $datum['href'] }}" class="text-white-400">
            @if(!empty($datum['icon']))<i class="fas {{ $datum['icon'] }} text-xl mr-2"></i>@endif{{ $datum['name'] }}
          </a>
        @endforeach
      </div>
    </div>

    <!-- Enlaces Rápidos -->
    <div>
      <h2 class="text-xl font-semibold mb-4 text-white">Enlaces rápidos</h2>
      <ul class="space-y-2 text-white-300">
        @foreach ($menu as $item)
        <li>
            <a href="{{ $item['url'] }}" class="@if($item['active']) font-bold @endif hover:text-blue-200">{{ $item['name'] }}</a>
        </li>
        @endforeach
      </ul>
    </div>

  </div>
</footer>
