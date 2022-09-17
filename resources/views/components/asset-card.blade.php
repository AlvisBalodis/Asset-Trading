@props(['asset'])

<x-card>

    <div class="flex justify-between px-10">
        {{--        <img class="w-8" src="{{asset('images/atlogo.png')}}" alt=""/>--}}
        <div class="drop-shadow-md text-sm font-bold hover:text-laravel"><a
                href="/assets/{{ $asset->id }}">{{ $asset->symbol }}</a>
        </div>
        <div class="drop-shadow-md text-sm">{{ $asset->name }}</div>
        <div class="drop-shadow-md text-sm">{{ '$' }} {{ $asset->price }}</div>
        <div class="drop-shadow-md text-sm">{{ $asset->percent_change_1h }} {{ '%' }}</div>
        <div class="drop-shadow-md text-sm">{{ $asset->percent_change_30d }} {{ '%' }}</div>
        <div class="drop-shadow-md text-sm">{{ $asset->volume_24 }} {{ '%' }}</div>
        <div class="drop-shadow-md text-sm">{{ $asset->market_cap }} {{ '%' }}</div>

    </div>

</x-card>
