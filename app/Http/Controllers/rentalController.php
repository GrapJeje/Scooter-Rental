<?php 
require_once(__DIR__ . '/../../Models/Vehicles.php');

$id = $_POST['vehicle_id'];
$name = $_POST['name'];
$vehicle = new Vehicle($id);

if ($vehicle->getAvailability() == 'true') {
    $vehicle->setAvailability('false');
    $vehicle->setRenter($name);
    Vehicle::writeToCsv($id, $vehicle->toCsv());
}

header("Location: " . $_SERVER['HTTP_REFERER']);