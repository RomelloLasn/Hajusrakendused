<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }
        #map {
            width: 80%;
            height: 80%;
            margin-top: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([0, 0], 2); 
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        fetch('/markers')
            .then(response => response.json())
            .then(markers => {
                markers.forEach(marker => {
                    const markerInstance = L.marker([marker.latitude, marker.longitude])
                        .addTo(map)
                        .bindPopup(`${marker.description || 'No description'}<br>Lat: ${marker.latitude}, Lng: ${marker.longitude}`);
                    markerInstance.on('contextmenu', () => {
                        if (confirm('Do you want to delete this marker?')) {
                            fetch(`/markers/${marker.id}`, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            }).then(response => {
                                if (response.ok) {
                                    map.removeLayer(markerInstance);
                                } else {
                                    alert('Failed to delete marker.');
                                }
                            }).catch(error => {
                                alert('An error occurred while deleting the marker.');
                                console.error(error);
                            });
                        }
                    });
                });
            }).catch(error => {
                alert('An error occurred while fetching markers.');
                console.error(error);
            });

        map.on('click', function(e) {
            const { lat, lng } = e.latlng;
            const description = prompt('Enter a description for this marker:');
            if (description !== null) {
                fetch('/markers', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ latitude: lat, longitude: lng, description })
                })
                .then(response => response.json())
                .then(marker => {
                    const markerInstance = L.marker([marker.latitude, marker.longitude])
                        .addTo(map)
                        .bindPopup(`${marker.description || 'No description'}<br>Lat: ${marker.latitude}, Lng: ${marker.longitude}`);
                    markerInstance.on('contextmenu', () => {
                        if (confirm('Do you want to delete this marker?')) {
                            fetch(`/markers/${marker.id}`, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            }).then(response => {
                                if (response.ok) {
                                    map.removeLayer(markerInstance);
                                } else {
                                    alert('Failed to delete marker.');
                                }
                            }).catch(error => {
                                alert('An error occurred while deleting the marker.');
                                console.error(error);
                            });
                        }
                    });
                }).catch(error => {
                    alert('An error occurred while adding the marker.');
                    console.error(error);
                });
            }
        });
    </script>
</body>
</html>