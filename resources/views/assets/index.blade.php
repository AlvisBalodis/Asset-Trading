<x-layout>

    @include('partials/_hero')

    <div class="flex justify-center">
        <div class="bg-gray-100 items-center justify-center bg-white overflow-auto rounded-lg shadow-lg">
            <div class="lg:w-auto">
                <div class="bg-white">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="drop-shadow-md bg-gray-200 text-gray-600 text-sm leading-normal">
                            <th class="drop-shadow-md py-3 px-6 text-left">SYMBOL</th>
                            <th class="drop-shadow-md py-3 px-6 text-left">NAME</th>
                            <th class="drop-shadow-md py-3 px-6 text-left">PRICE</th>
                            <th class="drop-shadow-md py-3 px-6 text-center">LAST HOUR</th>
                            <th class="drop-shadow-md py-3 px-6 text-center">LAST 30 DAYS</th>
                            <th class="drop-shadow-md py-3 px-6 text-center">VOLUME 24H</th>
                            <th class="drop-shadow-md py-3 px-6 text-center">MARKET CAP</th>
                            <th class="drop-shadow-md py-3 px-6 text-center">ADD TO CART</th>
                        </tr>
                        </thead>

                        <tbody class="text-gray-600 text-sm font-light">

                        @foreach($assets as $asset)
                            <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">

                                <td class="drop-shadow-md font-medium py-3 px-6 text-left">
                                    <span>{{ $asset['symbol'] }}</span>
                                </td>

                                <td class="drop-shadow-md py-3 px-6 font-bold text-black text-left">
                                    <span>{{ $asset['name'] }}</span>
                                </td>

                                <td class="drop-shadow-md py-3 px-6 text-left">
                                    <span>{{ '$' }} {{ round($asset['quote']['USD']['price'], 2)}}</span>
                                </td>

                                <td class="drop-shadow-md py-3 px-6 text-left">
                                    @if(round($asset['quote']['USD']['percent_change_1h'], 2) < 0)
                                        <span class="drop-shadow-md text-red text-2xl">{{ '⇣' }}</span>
                                        <span
                                            class="shadow-md bg-red text-white py-1 px-3 rounded-full text-sm">
                                        {{ round($asset['quote']['USD']['percent_change_1h'], 2) }} {{ '%' }}</span>
                                    @else
                                        <span class="drop-shadow-md text-green-500 text-2xl">{{ '⇡' }}</span>
                                        <span
                                            class="shadow-md bg-green-500 text-white py-1 px-3 rounded-full text-sm">
                                        {{ round($asset['quote']['USD']['percent_change_1h'], 2) }} {{ '%' }}</span>
                                    @endif
                                </td>

                                <td class="drop-shadow-md py-3 px-6 text-left">
                                    @if(round($asset['quote']['USD']['percent_change_30d'], 2) < 0)
                                        <span class="drop-shadow-md text-red text-2xl">{{ '⇣' }}</span>
                                        <span class="shadow-md bg-red text-white py-1 px-3 rounded-full text-sm">
                                        {{ round($asset['quote']['USD']['percent_change_30d'], 2) }} {{ '%' }}</span>
                                    @else
                                        <span class="drop-shadow-md text-green-500 text-2xl">{{ '⇡' }}</span>
                                        <span
                                            class="shadow-md bg-green-500 text-white py-1 px-3 rounded-full text-sm">
                                         {{ round($asset['quote']['USD']['percent_change_30d'], 2) }} {{ '%' }}</span>
                                    @endif
                                </td>

                                <td class="drop-shadow-md py-3 px-6 text-left">
                                    <span class="drop-shadow-md text-yellow-400 text-2xl">{{ '•' }}</span>
                                    <span
                                        class="shadow-md bg-yellow-400 text-white py-1 px-3 rounded-full text-sm">
                                        {{ round($asset['quote']['USD']['volume_24h'], 2) }}</span>
                                </td>

                                <td class="drop-shadow-md py-3 px-6 text-left">
                                    <span class="drop-shadow-md text-blue-500 text-2xl">{{ '•' }}</span>
                                    <span
                                        class="shadow-md bg-blue-500 text-white py-1 px-3 rounded-full text-sm">
                                        {{ round($asset['quote']['USD']['market_cap'], 2) }}</span>
                                </td>

                                <td class="drop-shadow-md py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">

                                        <div
                                            class="w-4 transform text-green-600 hover:text-laravel hover:scale-150 duration-300">
                                            <form method="POST" action="/assets">
                                                @csrf
                                                @method('post')
                                                <label>
                                                    <input type="hidden" value="{{ $asset['symbol'] }}" name="symbol">
                                                    <input type="hidden" value="{{ $asset['name'] }}" name="name">
                                                    <input type="hidden"
                                                           value="{{ round($asset['quote']['USD']['price'], 2) }}"
                                                           name="price">
                                                    <input type="hidden"
                                                           value="{{ round($asset['quote']['USD']['percent_change_1h'], 2) }}"
                                                           name="percent_change_1h">
                                                    <input type="hidden"
                                                           value="{{ round($asset['quote']['USD']['percent_change_30d'], 2) }}"
                                                           name="percent_change_30d">
                                                    <input type="hidden"
                                                           value="{{ round($asset['quote']['USD']['volume_24h'], 2) }}"
                                                           name="volume_24h">
                                                    <input type="hidden"
                                                           value="{{ round($asset['quote']['USD']['market_cap'], 2) }}"
                                                           name="market_cap">
                                                </label>
                                                <button type="submit" class="drop-shadow-md">
                                                    <i class="material-icons pt-2">add_shopping_cart</i>
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-layout>
