// script.js

var map = L.map('map').setView([14.587, 120.976], 15); // Set the initial view to Manila

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

var geocoder = L.Control.geocoder({
    defaultMarkGeocode: false
})
.on('markgeocode', function(e) {
    var bbox = e.geocode.bbox;
    var poly = L.polygon([
        bbox.getSouthEast(),
        bbox.getNorthEast(),
        bbox.getNorthWest(),
        bbox.getSouthWest()
    ]).addTo(map);
    map.fitBounds(poly.getBounds());

    // Add a custom marker for the searched location
    var marker = L.marker(e.geocode.center).addTo(map);
    marker.bindPopup('Searched Location: ' + e.geocode.name).openPopup();
})
.addTo(map);

L.Control.geocoder().addTo(map);

// Function to add a marker for the current location
function addMarkerToLocation(lat, lng, address) {
    var marker = L.marker([lat, lng]).addTo(map);
    marker.bindPopup(address).openPopup();
}

// Function to perform reverse geocoding
function reverseGeocode(lat, lng) {
    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=18&addressdetails=1`)
        .then(response => response.json())
        .then(data => {
            var address = data.display_name || 'Unknown Location';
            addMarkerToLocation(lat, lng, address);
        })
        .catch(error => {
            console.error('Error performing reverse geocoding:', error);
        });
}

// Function to move the map to the selected location
function moveToSelectedLocation(selectElement) {
    var selectedValue = selectElement.value;
    var [lat, lng] = selectedValue.split(',').map(parseFloat);

    // Set the map view to the selected location
    map.setView([lat, lng], 15);

    // Perform reverse geocoding to get the address
    reverseGeocode(lat, lng);
}

// Function to go to the current location
function goToCurrentLocation() {
    if ('geolocation' in navigator) {
        // Request permission to access the user's location
        navigator.geolocation.getCurrentPosition(
            function (position) {
                // Get the current latitude and longitude
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;

                // Set the map view to the current location
                map.setView([lat, lng], 15);

                // Add a marker for the current location
                addMarkerToLocation(lat, lng, 'Your Current Location');

                // Perform reverse geocoding to get the address
                reverseGeocode(lat, lng);
            },
            function (error) {
                console.error('Error getting user location:', error.message);
            }
        );
    } else {
        console.error('Geolocation is not supported by your browser.');
    }
}
