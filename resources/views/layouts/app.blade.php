<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Student Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Container -->
    <div class="min-h-screen flex flex-col">

        <!-- Navbar -->
        <header class="bg-white shadow">
            <div class="container mx-auto px-4 py-4">
                @include('partials.navbar')
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow container mx-auto px-4 py-6">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white shadow mt-6">
            <div class="container mx-auto px-4 py-4 text-center text-sm text-gray-500">
                @include('partials.footer')
            </div>
        </footer>

    </div>

</body>
</html>
