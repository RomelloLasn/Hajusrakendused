<!-- filepath: /home/romello/roofing-company/resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

    <!-- Hero Section -->
    <section class="relative h-[80vh] bg-black text-white">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/hero-image.jpg') }}'); opacity: 0.2;"></div>
        <div class="relative container mx-auto flex flex-col items-center justify-center h-full text-center">
            <h1 class="text-5xl font-extrabold mb-4">
                Saabtehtud OÜ – <span class="text-yellow-400">Katustööd, mis saavad tehtud!</span>
            </h1>
            <p class="text-lg mb-6">
                Usaldusväärne Eesti ettevõte, mis pakub kvaliteetseid katuse- ja plekitöid üle kogu Eesti. Meie töö on professi	onaalne, aus ja alati kokkulepitud ajal.

            </p>
            <a href="{{ route('contact') }}" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-3 px-6 rounded-full transition duration-300">
                Meist →
            </a>
        </div>
    </section>

    <!-- Services Section -->

    <section class="py-16 bg-gray-100 text-gray-900">
        <div class="container mx-auto px-4 space-y-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl font-bold mb-4">Roof Installation & Renovation</h3>
                    <p class="text-lg leading-relaxed mb-4">
                        We provide professional roof installation and renovation services to ensure your home stays protected and looks great.
                    </p>
                    <p class="text-lg leading-relaxed">
                        From dismantling old roofs to installing new ones, we handle every step with precision and care.
                    </p>
                    <!-- Updated Buttons -->
                    <div class="flex flex-wrap gap-4 mt-6">
                        <button class="service-btn px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-black font-semibold rounded-full transition duration-300">
                            SBS
                        </button>
                        <button class="service-btn px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-black font-semibold rounded-full transition duration-300">
                            eterniit
                        </button>
                        <button class="service-btn px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-black font-semibold rounded-full transition duration-300">
                            kärg
                        </button>
                        <button class="service-btn px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-black font-semibold rounded-full transition duration-300">
                            kivi
                        </button>
                        <button class="service-btn px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-black font-semibold rounded-full transition duration-300">
                            Vihmavee süsteemid
                        </button>
                        <button class="service-btn px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-black font-semibold rounded-full transition duration-300">
                            Tuulekastid
                        </button>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('/images/473317870_590069857206643_6268164033222356348_n.jpg') }}" alt="Roof Installation" class="rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>
    
    <section class="py-16 bg-black text-white">
        <div class="container mx-auto px-4">
            <!-- Gallery Title -->
            <div class="text-center mb-12">
                <h2  class="text-4xl font-extrabold text-yellow-400">Our Projects</h2>
                <p class="text-lg text-gray-400">Explore some of our recent work and projects.</p>
            </div>
    
            <!-- Filter Buttons -->
            <div class="flex justify-center space-x-4 mb-8">
                <button class="px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-black font-semibold rounded-full transition duration-300">
                    All
                </button>
                <button class="px-4 py-2 bg-gray-800 hover:bg-yellow-400 text-white hover:text-black font-semibold rounded-full transition duration-300">
                    Residential
                </button>
                <button class="px-4 py-2 bg-gray-800 hover:bg-yellow-400 text-white hover:text-black font-semibold rounded-full transition duration-300">
                    Commercial
                </button>
                <button class="px-4 py-2 bg-gray-800 hover:bg-yellow-400 text-white hover:text-black font-semibold rounded-full transition duration-300">
                    Renovation
                </button>
            </div>
    
            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Gallery Item 1 -->
                <div class="relative group">
                    <img src="{{ asset('/images/473317870_590069857206643_6268164033222356348_n.jpg') }}" alt="Project 1" class="rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <p class="text-yellow-400 font-bold text-lg">Residential Project</p>
                    </div>
                </div>
    
                <!-- Gallery Item 2 -->
                <div class="relative group">
                    <img src="{{ asset('/images/473317870_590069857206643_6268164033222356348_n.jpg') }}" alt="Project 2" class="rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <p class="text-yellow-400 font-bold text-lg">Commercial Project</p>
                    </div>
                </div>
    
                <!-- Gallery Item 3 -->
                <div class="relative group">
                    <img src="{{ asset('/images/473317870_590069857206643_6268164033222356348_n.jpg') }}" alt="Project 3" class="rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <p class="text-yellow-400 font-bold text-lg">Renovation Project</p>
                    </div>
                </div>
    
                <!-- Gallery Item 4 -->
                <div class="relative group">
                    <img src="{{ asset('/images/473317870_590069857206643_6268164033222356348_n.jpg') }}" alt="Project 4" class="rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <p class="text-yellow-400 font-bold text-lg">Custom Design</p>
                    </div>
                </div>
    
                <!-- Gallery Item 5 -->
                <div class="relative group">
                    <img src="{{ asset('/images/473317870_590069857206643_6268164033222356348_n.jpg') }}" alt="Project 5" class="rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <p class="text-yellow-400 font-bold text-lg">Roof Installation</p>
                    </div>
                </div>
    
                <!-- Gallery Item 6 -->
                <div class="relative group">
                    <img src="{{ asset('/images/473317870_590069857206643_6268164033222356348_n.jpg') }}" alt="Project 6" class="rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <p class="text-yellow-400 font-bold text-lg">Maintenance</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white text-gray-900">
        <div class="container mx-auto px-4">
            <!-- Section Title -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold text-black">Tagasiside / Arvustused</h2>
                <p class="text-lg text-yellow-500">Mida meie kliendid räägivad</p>
            </div>
    
            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg- shadow-lg rounded-lg p-6">
                    <p class="text-lg leading-relaxed text-gray-800 italic">
                        “Töö kiire ja korralik! Soovitan kindlasti.”
                    </p>
                    <div class="mt-4 text-right">
                        <span class="text-yellow-400 font-bold">- Rahulolev Klient</span>
                    </div>
                </div>
    
                <!-- Testimonial 2 -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <p class="text-lg leading-relaxed text-gray-800 italic">
                        “Katus sai nii hea, et naabridki küsivad ehitaja kontakte.”
                    </p>
                    <div class="mt-4 text-right">
                        <span class="text-yellow-400 font-bold">- Rahulolev Klient</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<!-- Footer -->
<footer class="bg-black text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Left Section -->
            <div>
                <img src="{{ asset('images/logo.png') }}" alt="SAABTEHTUD OÜ" class="h-13 w-10">
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

</html>

