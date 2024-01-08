function monitorMetric() {
    const metricValueInput = document.getElementById('metricValue');
    const metricValue = parseFloat(metricValueInput.value);

    if (!isNaN(metricValue)) {
        // Send the metric value to the server for monitoring
        fetch('monitor.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `metricValue=${metricValue}`,
        })
        .then(response => response.json())
        .then(data => {
            // Update the displayed data
            updateMonitorData(data);
        })
        .catch(error => {
            console.error('Error monitoring metric:', error);
        });

        // Clear the input field
        metricValueInput.value = '';
    } else {
        alert('Please enter a valid numeric value for the metric.');
    }
}

function updateMonitorData(data) {
    // Update the HTML to display the fetched data
    const monitorDataElement = document.getElementById('monitorData');
    monitorDataElement.innerHTML = `
        <p>Current Threshold: ${data.currentThreshold}</p>
        <p>Last Monitored Value: ${data.lastMonitoredValue}</p>
    `;
}
