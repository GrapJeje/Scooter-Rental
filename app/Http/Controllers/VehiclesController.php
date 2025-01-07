<?php
require_once(__DIR__ . '/../../Models/Vehicles.php');

class VehiclesController {
    public function showVehicles() {
        $vehicles = Vehicle::getVehicles();

        if (!empty($vehicles)) {
            foreach ($vehicles as $vehicle) {
                echo "<div class=\"vehicle-card\">";
                echo "<h3>{$vehicle['type']} - {$vehicle['brand']} {$vehicle['model']}</h3>";
                echo "<p><strong>Price per Month:</strong> \${$vehicle['price']}</p>";

                if ($vehicle['availability'] == "true") {
                    echo "<p><strong>Availability:</strong> Available</p>";
                    echo "<a href=\"#\" class=\"rent-button\">Rent Now</a>";
                } else {
                    echo "<p><strong>Availability:</strong> Not Available</p>"; 
                    echo "<p class=\"rent-button\" style=\"background-color: #ccc; cursor: not-allowed;\">Not Available</p>";
                }
                
                echo "</div>";
            }
        } else {
            echo "<p>Geen voertuigen gevonden.</p>";
        }
    }
}