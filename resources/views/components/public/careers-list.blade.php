@if (!$careers->isEmpty())
<section id="carreras" class="py-16 bg-gray-100">
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
