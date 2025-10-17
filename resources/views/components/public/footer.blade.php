<footer class="bg-blue-900 text-white py-10">
  <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
    <div class="flex flex-col items-top">
        <a href="{{ route('page.index') }}" class="flex items-top">
            <span class="text-2xl font-bold bg-linear-to-r from-sky-500 via-emerald-500 via-55% to-yellow-500 to-95% bg-clip-text text-transparent">{{ $general_setting->institute_initialism }}</span>
        </a>
        <span class="text-md font-bold text-white-400 mt-1 mb-2">{{ $general_setting->institute_name }}</span>
        <span class="text-sm font-semibold text-white-400 mb-2">{{ $general_setting->institute_motto }}</span>
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
