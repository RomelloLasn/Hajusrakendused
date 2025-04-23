<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: #f0f8ff;
        }
        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
        }
        .weather-icon {
            width: 100px;
            height: 100px;
        }
        input {
            padding: 10px;
            width: 80%;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ilm</h1>
        <form id="weather-form">
            <input type="text" id="city" name="city" placeholder="Enter city" required>
            <button type="submit">Get Weather</button>
        </form>
        <div id="weather-result"></div>
    </div>

    <script>
        const apiKey = '4f0dc013ce6b7230bb86e9984e3561c4';
        const cache = new Map();

        document.getElementById('weather-form').addEventListener('submit', async function(event) {
            event.preventDefault();
            const city = document.getElementById('city').value.trim();
            const weatherResult = document.getElementById('weather-result');

            if (cache.has(city)) {
                displayWeather(cache.get(city));
                return;
            }

            weatherResult.innerHTML = 'Loading...';

            try {
                const response = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`);
                if (!response.ok) {
                    throw new Error('City not found');
                }
                const data = await response.json();
                cache.set(city, data);
                displayWeather(data);
            } catch (error) {
                weatherResult.innerHTML = `<p style="color: red;">${error.message}</p>`;
            }
        });

        function displayWeather(data) {
            const weatherResult = document.getElementById('weather-result');
            const icon = `https://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`;
            weatherResult.innerHTML = `
                <h2>${data.name}, ${data.sys.country}</h2>
                <img src="${icon}" alt="${data.weather[0].description}" class="weather-icon">
                <p><strong>Temperature:</strong> ${data.main.temp}°C</p>
                <p><strong>Weather:</strong> ${data.weather[0].description}</p>
                <p><strong>Humidity:</strong> ${data.main.humidity}%</p>
                <p><strong>Wind Speed:</strong> ${data.wind.speed} m/s</p>
            `;
        }
    </script>
</body>
</html>