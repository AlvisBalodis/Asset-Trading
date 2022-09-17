<x-layout>

    <div>
        <section
            class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4 drop-shadow-lg">
            <div
                class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
                style="background-image: url('/images/atlogo.png')">
            </div>

            <div class="z-10">
                <h1 class="drop-shadow-lg text-6xl font-bold uppercase text-white">
                    Asset<span class="drop-shadow-lg text-black">Trading</span>
                </h1>
                <p
                    class="drop-shadow-lg text-2xl text-gray-200 font-medium my-10">
                    ASSET INFO
                </p>

            </div>
        </section>

        <a href="/search"
           class="flex w-10 drop-shadow-md font-medium ml-6 mb-4 hover:text-laravel transform hover:scale-150 duration-300">
            <i class="material-icons">arrow_back_ios</i>
            Back
        </a>

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
                                <th class="drop-shadow-md py-3 px-6 text-left">BOUGHT</th>
                                <th class="drop-shadow-md py-3 px-6 text-center">LAST HOUR</th>
                                <th class="drop-shadow-md py-3 px-6 text-center">LAST 30 DAYS</th>
                                <th class="drop-shadow-md py-3 px-6 text-center">VOLUME 24H</th>
                                <th class="drop-shadow-md py-3 px-6 text-center">MARKET CAP</th>
                                <th class="drop-shadow-md py-3 px-6 text-center">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600 text-lg font-light">

                            <tr class="border-b border-gray-200  bg-gray-50 hover:bg-gray-100">

                                <td class="drop-shadow-md py-12 px-6 text-left font-medium">
                                    <span>{{ $asset->symbol }}</span>
                                </td>

                                <td class="drop-shadow-md py-3 px-6 text-left font-bold text-black">
                                    <span>{{ $asset->name }}</span>
                                </td>

                                <td class="drop-shadow-md py-3 px-6 text-left">
                                    <span>{{ '$' }} {{ $asset->price }}</span>
                                </td>

                                <td class="drop-shadow-md py-3 px-6 text-center">
                                    <span>{{ Carbon\Carbon::parse($asset->updated_at)->longRelativeToNowDiffForHumans() }}</span>
                                </td>

                                <td class="drop-shadow-lg py-3 px-6 text-left">
                                    @if($asset->percent_change_1h < 0)
                                        <span class="drop-shadow-lg text-red font-medium text-3xl">{{ '⇣' }}</span>
                                        <span
                                            class="shadow-lg bg-red text-white py-1 px-3 rounded-full text-lg">
                                        {{ $asset->percent_change_1h }} {{ '%' }}</span>
                                    @else
                                        <span
                                            class="drop-shadow-lg text-green-500 font-medium text-3xl">{{ '⇡' }}</span>
                                        <span
                                            class="shadow-lg bg-green-500 text-white py-1 px-3 rounded-full text-lg">
                                            {{ $asset->percent_change_1h }} {{ '%' }}</span>
                                    @endif
                                </td>

                                <td class="drop-shadow-lg py-3 px-6 text-left">
                                    @if($asset->percent_change_30d < 0)
                                        <span class="drop-shadow-lg text-red text-3xl">{{ '⇣' }}</span>
                                        <span class="shadow-lg bg-red text-white py-1 px-3 rounded-full text-lg">
                                        {{ $asset->percent_change_30d }} {{ '%' }}</span>
                                    @else
                                        <span
                                            class="drop-shadow-lg text-green-500 text-3xl">{{ '⇡' }}</span>
                                        <span class="shadow-lg bg-green-500 text-white py-1 px-3 rounded-full text-lg">
                                            {{ $asset->percent_change_30d }} {{ '%' }}</span>
                                    @endif
                                </td>

                                <td class="drop-shadow-lg py-3 px-6 text-left">
                                    <span class="drop-shadow-lg text-yellow-400 text-3xl">{{ '•' }}</span>
                                    <span
                                        class="shadow-lg bg-yellow-400 text-white py-1 px-3 rounded-full text-lg">
                                        {{ $asset->volume_24h }}</span>
                                </td>

                                <td class="drop-shadow-md py-3 px-6 text-left">
                                    <span class="drop-shadow-lg text-blue-500 text-3xl">{{ '•' }}</span>
                                    <span
                                        class="shadow-lg bg-blue-500 text-white py-1 px-3 rounded-full text-lg">
                                        {{ $asset->market_cap }}</span>
                                </td>

                                <td class="drop-shadow-lg py-3 px-6 text-left">
                                    <div class="flex item-center justify-center">

                                        <div
                                            class="drop-shadow-lg w-4 mr-12 transform text-blue-400 hover:text-laravel hover:scale-150 duration-300">
                                            <a href="/assets/{{ $asset->id }}/edit">
                                                <i class="material-icons text-4xl">edit_square</i>
                                            </a>
                                        </div>

                                        <div
                                            class="drop-shadow-lg w-8 transform text-red hover:text-laravel hover:scale-150 duration-300">
                                            <form method="post" action="/assets/{{ $asset->id }}">
                                                @csrf
                                                @method('delete')
                                                <button>
                                                    <i class="material-icons text-4xl">remove_shopping_cart</i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
