<?php
class Vehicle {
    public $type;
    public $brand;
    public $model;
    public $price;
    public $availability;
    public $renter;

    public function __construct($type, $brand, $model, $price, $availability, $renter) {
        $this->type = $type;
        $this->brand = $brand;
        $this->price = $price;
        $this->availability = $availability;
        $this->renter = $renter;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function setBrand($brand) {
        $this->brand = $brand;
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getAvailability() {
        return $this->availability;
    }

    public function setAvailability($availability) {
        $this->availability = $availability;
    }

    public function getRenter() {
        return $this->renter;
    }

    public function setRenter($renter) {
        $this->renter = $renter;
    }

    public function toCsv() {
        return $this->type . "," . $this->brand . "," . $this->model . "," . $this->price . "," . $this->availability . "," . $this->renter . "\n";
    }

    public static function getVehicles() {
        $vehicles = [];
        $file = fopen(__DIR__ . '/../../data/vehicles.csv', 'r');

        if ($file !== false) {
            fgetcsv($file);

            while (($row = fgetcsv($file)) !== false) {
                $vehicles[] = [
                    'type' => $row[0],
                    'brand' => $row[1],
                    'model' => $row[2],
                    'price' => $row[3],
                    'availability' => $row[4],
                    'renter' => $row[5]
                ];
            }
        
            fclose($file);
        } else {
            echo "<script>console.error('Het bestand \"vehicles.csv\" kon niet worden geopend.');</script>";
        }
        return $vehicles;
    }

}