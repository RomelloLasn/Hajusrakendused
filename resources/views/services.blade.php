<!-- filepath: /home/romello/roofing-company/resources/views/services.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
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
                <a href="{{ route('contact') }}" class="hover:text-yellow-400 transition duration-300">Contact Us</a>
            </nav>
            <a href="{{ route('contact') }}" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-4 rounded-full transition duration-300">
                Contact Us
            </a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-black text-white py-20 text-center">
        <div class="container mx-auto px-4">
            <h1 class="text-5xl font-extrabold mb-4">
                Our <span class="text-yellow-400">Services</span>
            </h1>
            <p class="text-lg">
                High-quality roofing and construction services tailored to your needs.
            </p>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 bg-gray-100 text-gray-900">
        <div class="container mx-auto px-4 space-y-12">
            <!-- Service 1 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl font-bold mb-4">Katuseehitus ja -renoveerimine</h3>
                    <p class="text-lg leading-relaxed mb-4">
                        Uue katuse paigaldamine või vana katuse renoveerimine aitab vältida lekkeid ja struktuurilisi kahjustusi, mis võivad põhjustada suuri remondikulusid.
                    </p>
                    <p class="text-lg leading-relaxed">
                        Teostame plekk-, eterniit-, kärg-, kivi- ja SBS rullmaterjalist katuste ehitust ja renoveerimist. Meie teenus hõlmab kõiki tööetappe alates vana katuse demonteerimisest kuni uue katuse paigaldamiseni.
                    </p>
                </div>
                <div>
                    <img src="{{ asset('/images/473317870_590069857206643_6268164033222356348_n.jpg') }}" alt="Katuseehitus" class="rounded-lg shadow-lg">
                </div>
            </div>

            <!-- Service 2 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="{{ asset('/images/473317870_590069857206643_6268164033222356348_n.jpg') }}" alt="Vihmaveesüsteemid" class="rounded-lg shadow-lg">
                </div>
                <div>
                    <h3 class="text-2xl font-bold mb-4">Vihmaveesüsteemide paigaldus</h3>
                    <p class="text-lg leading-relaxed mb-4">
                        Vihmaveesüsteem on oluline investeering, kuna see suunab sademevee õigesse kohta, et kaitsta maja fassaadi ja soklit veekahjustuste eest.
                    </p>
                    <p class="text-lg leading-relaxed">
                        Kvaliteetne vee äravoolu lahendus igale katusele.
                    </p>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl font-bold mb-4">Tuulekastide ehitus ja renoveerimine</h3>
                    <p class="text-lg leading-relaxed mb-4">
                        Tuulekastid tagavad katuse ventilatsiooni, mis aitab vältida niiskuse ja hallitusseente kogunemist, ning annavad katusele viimistletud välimuse.
                    </p>
                    <p class="text-lg leading-relaxed">
                        Ehitame või renoveerime olemasolevad tuulekastid.
                    </p>
                </div>
                <div>
                    <img src="{{ asset('/images/473317870_590069857206643_6268164033222356348_n.jpg') }}" alt="Tuulekastid" class="rounded-lg shadow-lg">
                </div>
            </div>

            <!-- Service 4 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="{{ asset('/images/473317870_590069857206643_6268164033222356348_n.jpg') }}" alt="Plekitööd" class="rounded-lg shadow-lg">
                </div>
                <div>
                    <h3 class="text-2xl font-bold mb-4">Plekitööd</h3>
                    <p class="text-lg leading-relaxed mb-4">
                        Plekitööd on olulised igasuguste katuste ja fassaadide vastupidavuse tagamiseks. Lisaplekid annavad majale tervikliku ilme, aga kaitsevad ka maja ilmastiku mõju eest.
                    </p>
                    <p class="text-lg leading-relaxed">
                        Valmistame ja paigaldame erinevaid lisaplekke: aknaplekid, sokliplekid, korstnamütsid, nurgaliistud jpm.
                    </p>
                </div>
            </div>

            <!-- Service 5 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl font-bold mb-4">Katusepesu ja värvimine</h3>
                    <p class="text-lg leading-relaxed mb-4">
                        Vahepeal piisab katusele uue ilme loomisest ka ainult pesust, pleekinud katus vajaks aga uut värvikihti.
                    </p>
                    <p class="text-lg leading-relaxed">
                        Peseme ja vajadusel ka värvime plekk-, eterniit- ja kivikatuseid.
                    </p>
                </div>
                <div>
                    <img src="{{ asset('/images/473317870_590069857206643_6268164033222356348_n.jpg') }}" alt="Katusepesu" class="rounded-lg shadow-lg">
                </div>
            </div>

            <!-- Service 6 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="{{ asset('/images/473317870_590069857206643_6268164033222356348_n.jpg') }}" alt="Lumekoristus" class="rounded-lg shadow-lg">
                </div>
                <div>
                    <h3 class="text-2xl font-bold mb-4">Lumekoristus</h3>
                    <p class="text-lg leading-relaxed mb-4">
                        Regulaarne lumekoristus hoiab katuse struktuuri tervena, kaitseb selle pikaealisust ja aitab vältida tõsiseid kahjustusi.
                    </p>
                    <p class="text-lg leading-relaxed">
                        Eemaldame turvaliselt raske lume katustelt.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    
</body>
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