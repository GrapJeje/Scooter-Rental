<?php 
require_once(__DIR__ . '/../../Models/Vehicles.php');

$id = $_POST['vehicle_id'];
$name = $_POST['name'];
$vehicle = new Vehicle($id);

if ($vehicle->getAvailability() == 'false' && strtolower($vehicle->getRenter()) == strtolower($name)) {
    $vehicle->setAvailability('true');
    $vehicle->setRenter("-");
    Vehicle::writeToCsv($id, $vehicle->toCsv());
}

header("Location: " . $_SERVER['HTTP_REFERER']);
