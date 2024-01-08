<?php

class MonitoringSystem {
    private $historicalData = [];
    private $currentThreshold;

    public function __construct($initialThreshold) {
        $this->currentThreshold = $initialThreshold;
    }

    public function monitorMetric($currentValue) {
        // Store current metric value in historical data
        $this->historicalData[] = $currentValue;

        // Check if the current value breaches the threshold
        if ($currentValue > $this->currentThreshold) {
            // Trigger an alert or take corrective action
            $this->handleThresholdBreach($currentValue);
        }

        // Adjust threshold based on historical data
        $this->adjustThreshold();
    }

    private function handleThresholdBreach($currentValue) {
        // Example: Log the breach and send an alert
        echo "Threshold breached! Current value: $currentValue\n";
        // Add code here to send an alert, log to a database, etc.
    }

    private function adjustThreshold() {
        // Example: Adjust threshold based on historical data (simplified for demonstration)
        $averageValue = array_sum($this->historicalData) / count($this->historicalData);
        
        // Adjust threshold based on the average value
        $this->currentThreshold = $averageValue * 1.2; // Increase threshold by 20%
    }

    public function getCurrentThreshold() {
        return $this->currentThreshold;
    }

    public function getLastMonitoredValue() {
        return end($this->historicalData);
    }
}

// Example usage
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $metricValue = isset($_POST['metricValue']) ? floatval($_POST['metricValue']) : 0;

    // Create an instance of the MonitoringSystem
    $monitoringSystem = new MonitoringSystem(75); // Initial threshold

    // Monitor the metric
    $monitoringSystem->monitorMetric($metricValue);

    // Get data for response
    $data = array(
        'currentThreshold' => $monitoringSystem->getCurrentThreshold(),
        'lastMonitoredValue' => $monitoringSystem->getLastMonitoredValue()
    );

    // Output the data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
}
?>
