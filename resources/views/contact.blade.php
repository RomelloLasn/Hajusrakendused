<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>
<body class="bg-black text-white">
    <!-- Header -->
    <header class="bg-black py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/logo.png') }}" alt="SAABTEHTUD OÜ" class="h-10 w-10">
                <span class="text-xl font-bold">SaabTehtud OÜ</span>
            </div>
            <nav class="hidden md:flex space-x-6 text-sm font-medium">
                <a href="/" class="hover:text-yellow-400 transition duration-300">Home</a>
                <a href="{{ route('services') }}" class="hover:text-yellow-400 transition duration-300">Services</a>
                <a href="{{ route('contact') }}" class="hover:text-yellow-400 transition duration-300">Contact Us</a>
            </nav>
            <a href="{{ route('contact') }}" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-4 rounded-full transition duration-300">
                Contact Us
            </a>
        </div>
    </header>

    <!-- Main Section -->
    <main class="container mx-auto py-12 px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Contact Information -->
            <div class="bg-gray-900 text-white shadow-md rounded-lg p-6">
                <h2 class="text-3xl font-bold mb-4 text-yellow-400">Get in Touch with Us</h2>
                <p class="text-gray-400 mb-6">
                    Feel free to reach out to us for any inquiries or assistance. We're here to help!
                </p>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="bg-yellow-400 p-3 rounded-full">
                            <i class="fas fa-map-marker-alt text-black"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Our Location</h3>
                            <p class="text-gray-400">99 S.t Jomblo Park Pekanbaru, 28292, Indonesia</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="bg-yellow-400 p-3 rounded-full">
                            <i class="fas fa-phone-alt text-black"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Telefon</h3>
                            <p class="text-gray-400">(+372) 54540423</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="bg-yellow-400 p-3 rounded-full">
                            <i class="fas fa-envelope text-black"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">E-Post</h3>
                            <p class="text-gray-400">saabtehtud@online.ee</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-gray-900 text-white shadow-md rounded-lg p-6">
                <h2 class="text-3xl font-bold mb-4 text-yellow-400">Send Us a Message</h2>
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <input type="text" name="name" placeholder="Your Name" class="w-full bg-gray-800 text-white border-gray-700 rounded-md shadow-sm focus:ring-yellow-400 focus:border-yellow-400 p-3" required>
                    </div>
                    <div class="mb-4">
                        <input type="email" name="email" placeholder="Your Email" class="w-full bg-gray-800 text-white border-gray-700 rounded-md shadow-sm focus:ring-yellow-400 focus:border-yellow-400 p-3" required>
                    </div>
                    <div class="mb-4">
                        <input type="text" name="phone" placeholder="Your Phone" class="w-full bg-gray-800 text-white border-gray-700 rounded-md shadow-sm focus:ring-yellow-400 focus:border-yellow-400 p-3">
                    </div>
                    <div class="mb-4">
                        <textarea name="message" rows="4" placeholder="Your Message" class="w-full bg-gray-800 text-white border-gray-700 rounded-md shadow-sm focus:ring-yellow-400 focus:border-yellow-400 p-3" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-3 rounded-md">
                        Send Message
                    </button>
                </form>
            </div>
        </div>

        <!-- Map Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-bold mb-4 text-yellow-400 text-center">Our Location</h2>
            <div id="map" class="w-full h-96 rounded-lg shadow-lg"></div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-black text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Left Section -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Saabtehtud OÜ</h3>
                    <p class="text-sm text-gray-400">Registrikood: 16572649</p>
                    <p class="text-sm text-gray-400">© Saabtehtud OÜ {{ date('Y') }}</p>
                </div>

                <!-- Right Section -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Lingid</h3>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-sm text-gray-400 hover:text-yellow-400 transition duration-300">Avaleht</a></li>
                        <li><a href="{{ route('services') }}" class="text-sm text-gray-400 hover:text-yellow-400 transition duration-300">Teenused</a></li>
                        <li><a href="/about" class="text-sm text-gray-400 hover:text-yellow-400 transition duration-300">Meist</a></li>
                        <li><a href="{{ route('contact') }}" class="text-sm text-gray-400 hover:text-yellow-400 transition duration-300">Kontakt</a></li>
                        <li><a href="/privacy-policy" class="text-sm text-gray-400 hover:text-yellow-400 transition duration-300">Privaatsuspoliitika</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Leaflet Map Script -->
    <script>
        var map = L.map('map').setView([51.505, -0.09], 13); // Random coordinates for now
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);
        L.marker([51.505, -0.09]).addTo(map) // Random marker
            .bindPopup('Saabtehtud OÜ Location')
            .openPopup();
    </script>
</body>
</html>