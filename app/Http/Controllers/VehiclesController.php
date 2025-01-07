<?php
require_once(__DIR__ . '/../../Models/Vehicles.php');

class VehiclesController
{
    public function showVehicles()
    {
        $vehicles = Vehicle::getVehicles();
        $name = "";

        if (isset($_GET['name'])) {
            $name = $_GET['name'];
        }

        if (!empty($vehicles)) {
            foreach ($vehicles as $vehicle) {
                echo "<div class=\"vehicle-card\">";
                echo "<h3>{$vehicle['type']} - {$vehicle['brand']} {$vehicle['model']}</h3>";
                echo "<p><strong>Price per Month:</strong> \${$vehicle['price']}</p>";

                if ($vehicle['availability'] == "true") {
                    echo "<p><strong>Availability:</strong> Available</p>";

                    echo "<form method=\"POST\" action=\"../app/Http/Controllers/rentalController.php\">";
                    echo "<input type=\"hidden\" name=\"vehicle_id\" value=\"{$vehicle['id']}\">";
                    echo "<input type=\"hidden\" name=\"name\" value=\"{$name}\">";
                    echo "<button type=\"submit\" name=\"rent_button\" class=\"rent-button\">Rent Now</button>";
                    echo "</form>";
                } else {
                    echo "<p><strong>Availability:</strong> Not Available</p>";

                    if (strtolower($name) === strtolower($vehicle['renter'])) {
                        echo "<p><strong>Rented by:</strong> You</p>";
                        echo "<form method=\"POST\" action=\"../app/Http/Controllers/unRentalController.php\">";
                        echo "<input type=\"hidden\" name=\"vehicle_id\" value=\"{$vehicle['id']}\">";
                        echo "<input type=\"hidden\" name=\"name\" value=\"{$name}\">";
                        echo "<button type=\"submit\" name=\"rent_button\" class=\"rent-button\" style=\"background-color: #f00;\">Unrent Now</button>";
                        echo "</form>";
                    } else {
                        echo "<p><strong>Rented by:</strong> {$vehicle['renter']}</p>";
                        echo "<p class=\"rent-button\" style=\"background-color: #ccc; cursor: not-allowed;\">Not Available</p>";
                    }
                }

                echo "</div>";
            }
        } else {
            echo "<p>Geen voertuigen gevonden.</p>";
        }
    }
}
