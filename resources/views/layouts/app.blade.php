<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makersmarkt</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100">

    <!-- Navigation -->
    <nav class="bg-white p-4 flex items-center justify-between shadow">
        <div class="flex items-center flex-grow">
            <img src="{{ asset('/img/logo.png') }}" alt="Logo" class="h-10 w-10 mr-4">
            <div class="flex-grow flex justify-center">
                <input type="text" placeholder="Zoek product" class="border rounded px-4 py-2 w-3/4">
            </div>
        </div>
        <div class="flex items-center relative">
            <a href="{{ route('cart') }}" class="relative mr-4">
                <i class="fas fa-shopping-cart text-xl"></i>
            </a>
            <div class="relative">
                <button onclick="toggleDropdown()" class="flex items-center focus:outline-none">
                    <span class="mr-2">Gebruikersnaam</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg hidden z-50">
                    <a href="{{ route('orders.track') }}" class="block px-4 py-2 hover:bg-gray-100">Mijn
                        bestellingen</a>
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Profiel</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Uitloggen</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mx-auto p-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-10">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center flex-col gap-4">
                <img src="{{ asset('/img/logo.png') }}" alt="Logo" class="h-10 w-10 mr-4">
                <a href="#" class="mr-4">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
            <div class="flex space-x-20">
                <div>
                    <h3 class="font-semibold mb-2">Help</h3>
                    <ul>
                        <li><a href="#" class="block hover:underline">FAQ</a></li>
                        <li><a href="#" class="block hover:underline">Klantenservice</a></li>
                        <li><a href="#" class="block hover:underline">Handleidingen</a></li>
                        <li><a href="#" class="block hover:underline">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-2">Overig</h3>
                    <ul>
                        <li><a href="#" class="block hover:underline">Privacybeleid</a></li>
                        <li><a href="#" class="block hover:underline">Sitemap</a></li>
                        <li><a href="#" class="block hover:underline">Abonnementen</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Dropdown toggle script -->
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        }

        // Optional: Close dropdown when clicking outside
        window.addEventListener('click', function (e) {
            const button = document.querySelector('button[onclick="toggleDropdown()"]');
            const menu = document.getElementById('dropdownMenu');
            if (!button.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
