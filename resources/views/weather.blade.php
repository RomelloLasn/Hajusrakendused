<!-- filepath: /home/romello/weather-app/resources/views/weather.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #87CEEB, #ffffff);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 80%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        #weather-result {
            margin-top: 20px;
            text-align: left;
            font-size: 14px;
            color: #333;
        }
        #weather-icon {
            margin-top: 10px;
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Weather App</h1>
        <form id="weather-form">
            <input type="text" name="city" placeholder="Enter city" required>
            <button type="submit">Get Weather</button>
        </form>
        <div id="weather-result"></div>
    </div>

    <script>
        document.getElementById('weather-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            const city = e.target.city.value;
            const response = await fetch('/weather/fetch', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ city })
            });
            const data = await response.json();
            const resultDiv = document.getElementById('weather-result');
            if (data.main) {
                const iconUrl = `http://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`;
                resultDiv.innerHTML = `
                    <h3>Weather in ${data.name}</h3>
                    <img id="weather-icon" src="${iconUrl}" alt="Weather Icon">
                    <p><strong>Temperature:</strong> ${data.main.temp}°C</p>
                    <p><strong>Humidity:</strong> ${data.main.humidity}%</p>
                    <p><strong>Condition:</strong> ${data.weather[0].description}</p>
                `;
            } else {
                resultDiv.innerHTML = `<p style="color: red;">City not found. Please try again.</p>`;
            }
        });
    </script>
</body>
</html>