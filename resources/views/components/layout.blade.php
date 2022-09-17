<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="images/favicon.ico"/>
    {{--    <link--}}
    {{--        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"--}}
    {{--        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="--}}
    {{--        crossorigin="anonymous"--}}
    {{--        referrerpolicy="no-referrer"/>--}}

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#2d64ef",
                        red: "#ff0000"
                    },
                },
            },
        };
    </script>
    <title>Asset Trading</title>
</head>

<body class="mb-48 mt-2">

<nav class="flex justify-between items-center mb-2 ml-6">
    <a href="/"><img class="hover:scale-110 duration-300 drop-shadow-lg w-24"
                     src="{{ asset('images/atlogo.png') }}"
                     alt=""/></a>
    <ul class="drop-shadow-md flex space-x-6 mr-6 text-md">
        @auth
            <li>
                <span class="drop-shadow-md font-semibold uppercase">Welcome {{ auth()->user()->name }}</span>
            </li>
            <li>
                <div
                    class="drop-shadow-md font-medium w-35 mr-35 transform hover:text-laravel hover:scale-125 duration-300">
                    <a href="/search" class="hover:text-laravel">

                        <button type="submit" class="drop-shadow-md flex justify-content-end">
                            <i class="material-icons pr-1">manage_accounts</i>
                            Manage Assets
                        </button>

                    </a>
                </div>
            </li>
            <li>
                <div
                    class="drop-shadow-md font-medium w-4 mr-20 transform hover:text-laravel hover:scale-125 duration-300">
                    <form method="post" action="/logout">
                        @csrf
                        <button type="submit" class="drop-shadow-md flex justify-content-end">
                            <i class="material-icons pr-1">logout</i>
                            Logout
                        </button>
                    </form>
                </div>
            </li>
        @else
            <li>
                <div
                    class="drop-shadow-md font-medium w-4 mr-20 transform hover:text-laravel hover:scale-125 duration-300">
                    <a href="/register">
                        <button class="drop-shadow-md flex justify-content-end">
                            <i class="material-icons pr-1">how_to_reg</i>
                            Register
                        </button>
                    </a>
                </div>
            </li>
            <li>
                <div
                    class="drop-shadow-md font-medium w-4 mr-20 transform hover:text-laravel hover:scale-125 duration-300">
                    <a href="/login">
                        <button class="drop-shadow-md flex justify-content-end">
                            <i class="material-icons pr-1">login</i>
                            Login
                        </button>
                    </a>
                </div>
            </li>
        @endauth
    </ul>
</nav>
<main>
    {{$slot}}
</main>

<footer
    class="shadow-sm fixed bottom-0 left-0 w-full flex items-center justify-start font-light bg-white text-black h-20 mt-40 opacity-90 md:justify-left">
    <p class="drop-shadow-sm ml-4 text-xs">
        Copyright &copy; 2022 Asset Trading. All Rights reserved.</p>

    <a href="/assets/create"
       class="drop-shadow-md absolute top-1/5 right-10 bg-black text-white py-3 px-5 rounded-3xl hover:opacity-80">Add
        Asset</a>
</footer>
<x-flash-message/>

</body>
</html>
