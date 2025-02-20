<section>
    <div {{ $attributes->merge(["class"=> "pl-4"]) }}>
        <h2 class="font-bold text-sky-600">{{ $title }}</h2>
    </div>
    <div class="grid overflow-x-auto">
        <div class="flex gap-4 px-4 py-4">
            {{ $slot }}
        </div>
    </div>
</section>