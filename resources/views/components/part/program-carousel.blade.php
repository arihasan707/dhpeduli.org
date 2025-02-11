<section>
    <div {{ $attributes->merge(["class"=> "pl-4"]) }}>
        <h2 class="font-bold text-sky-600">{{ $title }}</h2>
    </div>
    <div class="grid overflow-x-auto">
        <div class="flex gap-4 pl-4 pb-4 pt-3 pr-4">
            {{ $slot }}
        </div>
    </div>
</section>