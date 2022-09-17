<x-layout>

    <x-card class="p-10 max-w-lg mx-auto mt-4">
        <header class="text-center">
            <h2 class="drop-shadow-md text-2xl font-bold uppercase mb-1">Register</h2>
            <p class="drop-shadow-md mb-4">Create an account to buy and sell assets</p>
        </header>

        <form method="post" action="/users">
            @csrf
            <div class="mb-6">
                <label for="name"
                       class="drop-shadow-md inline-block text-lg mb-2 pl-3">Name</label>
                <input
                    type="text"
                    class="border-none shadow-lg text-xs rounded-lg p-3 pl-3 w-full"
                    name="name"
                    value="{{old('name')}}"/>
                @error('name')
                <p class="text-red text-xs mt-1 ml-3">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="email"
                    class="drop-shadow-md inline-block text-lg mb-2 pl-3">Email</label>
                <input
                    type="email"
                    class="border-none shadow-lg text-xs rounded-lg p-3 pl-3 w-full"
                    name="email"
                    value="{{old('email')}}"/>
                @error('email')
                <p class="text-red text-xs mt-1 ml-3">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="password"
                    class="drop-shadow-md inline-block text-lg mb-2 pl-3">Password</label>
                <input
                    type="password"
                    class="border-none shadow-lg text-xs rounded-lg p-3 pl-3 w-full"
                    name="password"
                    value="{{old('password')}}"/>
                @error('password')
                <p class="text-red text-xs mt-1 ml-3">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="password_confirmation"
                    class="drop-shadow-md inline-block text-lg mb-2 pl-3">Confirm password</label>
                <input
                    type="password"
                    class="border-none shadow-lg text-xs rounded-lg p-3 pl-3 w-full"
                    name="password_confirmation"
                    value="{{old('password_confirmation')}}"/>
                @error('password_confirmation')
                <p class="text-red text-xs mt-1 ml-3">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    type="submit"
                    class="shadow-md bg-laravel text-white rounded-3xl py-2 px-4 hover:opacity-80">Sign Up
                </button>
            </div>

            <div class="drop-shadow-md mt-8">
                <p>Already have an account?
                    <a href="/login"
                       class="drop-shadow-md inline-block text-laravel font-medium ml-2 transform hover:scale-125 duration-300">Login</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>
