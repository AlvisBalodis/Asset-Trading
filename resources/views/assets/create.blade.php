<x-layout>

    <div>
        <x-card class="p-10 max-w-lg mx-auto">
            <header class="text-center">
                <h2 class="drop-shadow-md text-2xl font-bold uppercase mb-1">
                    Create Asset
                </h2>
                <p class="drop-shadow-md mb-4">Add asset to your portfolio</p>
            </header>

            <form method="POST" action="/assets">
                @csrf
                <div class="mb-6">
                    <label
                        for="symbol"
                        class="drop-shadow-md inline-block text-lg mb-2 pl-3">Symbol</label>
                    <label>
                        <input
                            type="text"
                            class="border-none shadow-lg text-xs rounded-lg p-3 pl-3 w-full"
                            name="symbol"
                            placeholder="Example: BTC"
                            value="{{ old('symbol') }}"/>
                    </label>
                    @error('symbol')
                    <p class="text-red text-xs mt-1 ml-3">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="name"
                        class="drop-shadow-md inline-block text-lg mb-2 pl-3">Asset name</label>
                    <label>
                        <input
                            type="text"
                            class="border-none shadow-lg text-xs rounded-lg p-3 pl-3 w-full"
                            name="name"
                            placeholder="Example: BITCOIN"
                            value="{{ old('name') }}"/>
                    </label>
                    @error('name')
                    <p class="text-red text-xs mt-1 ml-3">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="price"
                        class="drop-shadow-md inline-block text-lg mb-2 pl-3">Price ($)</label>
                    <label>
                        <input
                            type="text"
                            class="border-none shadow-lg text-xs rounded-lg p-3 pl-3 w-full"
                            name="price"
                            placeholder="Example: 38657.98"
                            value="{{ old('price') }}"/>
                    </label>
                    @error('price')
                    <p class="text-red text-xs mt-1 ml-3">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="percent_change_1h"
                        class="drop-shadow-md inline-block text-lg mb-2 pl-3">Last hour (%)</label>
                    <label>
                        <input
                            type="text"
                            class="border-none shadow-lg text-xs rounded-lg p-3 pl-3 w-full"
                            name="percent_change_1h"
                            placeholder="Example: 63.87"
                            value="{{ old('percent_change_1h') }}"/>
                    </label>
                    @error('percent_change_1h')
                    <p class="text-red text-xs mt-1 ml-3">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="percent_change_30d"
                        class="drop-shadow-md inline-block text-lg mb-2 pl-3">Last 30 Days (%)</label>
                    <label>
                        <input
                            type="text"
                            class="border-none shadow-lg text-xs rounded-lg p-3 pl-3 w-full"
                            name="percent_change_30d"
                            placeholder="Example: 8.46"
                            value="{{ old('percent_change_30d') }}"/>
                    </label>
                    @error('percent_change_30d')
                    <p class="text-red text-xs mt-1 ml-3">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="volume_24h"
                        class="drop-shadow-md inline-block text-lg mb-2 pl-3">Volume 24H</label>
                    <label>
                        <input
                            type="text"
                            class="border-none shadow-lg text-xs rounded-lg p-3 pl-3 w-full"
                            name="volume_24h"
                            placeholder="Example: 4286674653098.87"
                            value="{{ old('volume_24h') }}"/>
                    </label>
                    @error('volume_24h')
                    <p class="text-red text-xs mt-1 ml-3">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="market_cap"
                        class="drop-shadow-md inline-block text-lg mb-2 pl-3">Market cap</label>
                    <label>
                        <input
                            type="text"
                            class="border-none shadow-lg text-xs rounded-lg p-3 pl-3 w-full"
                            name="market_cap"
                            placeholder="Example: 358734571284.45"
                            value="{{ old('market_cap') }}"/>
                    </label>
                    @error('market_cap')
                    <p class="text-red text-xs mt-1 ml-3">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button
                        class="shadow-md bg-laravel text-white rounded-3xl py-2 px-4 hover:opacity-80">Create Asset
                    </button>

                    <a href="/"
                       class="drop-shadow-md inline-block text-black font-medium ml-4 hover:text-laravel transform hover:scale-150 duration-300">
                        Back </a>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>
