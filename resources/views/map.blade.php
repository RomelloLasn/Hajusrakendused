<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: white;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
        }
        #map-container {
            width: 80%;
            max-width: 800px;
            height: 500px;
            margin-top: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        #map {
            width: 100%;
            height: 100%;
        }
    </style>
    <link href="https://js.radar.com/v4.5.1/radar.css" rel="stylesheet">
    <script src="https://js.radar.com/v4.5.1/radar.min.js"></script>
</head>
<body>
    
    <div id="map-container">
        <div id="map"></div>
    </div>

    <script>
        
        Radar.initialize('prj_live_pk_9164a6ba3513c7db6dc25c1175e28f8979b29509');

        
        const map = Radar.ui.map({
            container: 'map',
            style: 'radar-default-v1',
            center: [-73.9911, 40.7342],
            zoom: 14,
        });

        
        async function loadMarkers() {
            const response = await fetch('/markers');
            const markers = await response.json();
            markers.forEach(marker => {
                Radar.ui.marker({
                    map: map,
                    position: [marker.longitude, marker.latitude],
                    icon: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                    popup: {
                        content: `<strong>${marker.description || 'No description'}</strong>`,
                    },
                });
            });
        }

        loadMarkers();

        // Add a marker on map click and save it to the database
        map.on('click', async (event) => {
            const { lng, lat } = event.lngLat;
            const description = prompt('Enter a description for this marker:');

            Radar.ui.marker({
                map: map,
                position: [lng, lat],
                icon: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                popup: {
                    content: `<strong>${description || 'No description'}</strong>`,
                },
            });

            await fetch('/markers', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    latitude: lat,
                    longitude: lng,
                    description: description,
                }),
            });
        });
    </script>
</body>
</html>