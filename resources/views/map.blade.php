<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
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
        #edit-marker-modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
        #edit-marker-modal input, #edit-marker-modal textarea {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
        }
        #edit-marker-modal button {
            margin-right: 10px;
        }
        #modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
</head>
<body>
    <div id="map"></div>

    <!-- Modal Overlay -->
    <div id="modal-overlay" onclick="closeEditModal()"></div>

    <!-- Edit Marker Modal -->
    <div id="edit-marker-modal">
        <h3>Edit Marker</h3>
        <input type="hidden" id="edit-marker-id">
        <label for="edit-description">Description:</label>
        <textarea id="edit-description" required></textarea>
        <button onclick="submitEditForm()">Save</button>
        <button onclick="closeEditModal()">Cancel</button>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([0, 0], 2);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Fetch and display markers
        fetch('/markers')
            .then(response => response.json())
            .then(markers => {
                markers.forEach(marker => {
                    const markerInstance = L.marker([marker.latitude, marker.longitude])
                        .addTo(map)
                        .bindPopup(createPopupContent(marker));
                });
            })
            .catch(error => console.error('Error fetching markers:', error));

        function createPopupContent(marker) {
            return `
                <div>
                    <p>${marker.description || 'No description'}</p>
                    <button onclick="editMarker(${marker.id}, '${marker.description}')">Edit</button>
                    <button onclick="deleteMarker(${marker.id})">Delete</button>
                </div>
            `;
        }

        // Add a new marker
        map.on('click', function (e) {
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
                    console.log('Marker added:', marker);
                    L.marker([marker.latitude, marker.longitude])
                        .addTo(map)
                        .bindPopup(createPopupContent(marker));
                })
                .catch(error => console.error('Error adding marker:', error));
            }
        });

        function editMarker(id, description) {
            document.getElementById('edit-marker-id').value = id;
            document.getElementById('edit-description').value = description;
            document.getElementById('edit-marker-modal').style.display = 'block';
        }

        function closeEditModal() {
            document.getElementById('edit-marker-modal').style.display = 'none';
        }

        function submitEditForm() {
            const id = document.getElementById('edit-marker-id').value;
            const description = document.getElementById('edit-description').value;

            fetch(`/markers/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ description })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Marker updated successfully!');
                    location.reload();
                } else {
                    alert('Failed to update marker.');
                }
            })
            .catch(error => console.error('Error updating marker:', error));
        }

        function deleteMarker(id) {
            if (confirm('Are you sure you want to delete this marker?')) {
                fetch(`/markers/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Marker deleted successfully!');
                        location.reload();
                    } else {
                        alert('Failed to delete marker.');
                    }
                })
                .catch(error => console.error('Error deleting marker:', error));
            }
        }
    </script>
</body>
</html>