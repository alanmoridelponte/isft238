@if (!$careers->isEmpty())
<section id="carreras" class="py-16 @if($slot->isNotEmpty()) bg-gradient-to-b from-natural-50 via-green-50 to-green-50 @else bg-gradient-to-b from-green-50 via-green-50 to-neutral-50  @endif">
    <div class="mx-auto px-0 md:px-6">
        {{ $slot }}
        <div class="grid justify-center grid-cols-1 lg:grid-cols-[repeat(auto-fit,450px)] gap-4 p-2">
            @foreach ($careers as $career)
            <x-public.careers-list-card :career="$career" />
            @endforeach
        </div>
    </div>
</section>
@endif
