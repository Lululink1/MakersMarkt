<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jouw App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <nav class="bg-white p-4 flex items-center justify-between">
        <div class="flex items-center">
            <img src="jouw-logo.png" alt="Logo" class="h-10 w-10 mr-4">
            <input type="text" placeholder="Zoek product" class="border rounded px-4 py-2">
        </div>
        <div class="flex items-center">
            <a href="#" class="mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-1.736.183-1.736-.71v-6.983a2 2 0 0 0-2-2H11a2 2 0 0 0-2 2v6.983c0 .894 1.074 1.397 1.736.765L17 13m-8.25-4a2.25 0 1 1 5 0 2.25 0 0 1-5 0Z" />
                </svg>
            </a>
            <div class="relative">
                <button class="flex items-center">
                    <span class="mr-2">Gebruikersnaam</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profiel</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Instellingen</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Uitloggen</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-4">
        @yield('content')
    </div>

    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center">
                <img src="jouw-logo.png" alt="Logo" class="h-10 w-10 mr-4">
                <a href="#" class="mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.68 18.92a2 2 0 0 1-1.36.58 2 2 0 0 1-1.36-.58l-3.36-3.36a2 2 0 0 1-.58-1.36 2 2 0 0 1 .58-1.36l3.36-3.36a2 2 0 0 1 2.72 2.72l-3.36 3.36a2 2 0 0 1-2.72 2.72l3.36 3.36z" />
                    </svg>
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

</body>
</html>
