<?php
class Vehicle
{
    public $id;
    public $type;
    public $brand;
    public $model;
    public $price;
    public $availability;
    public $renter;

    public function __construct($id)
    {
        $this->id = $id;

        $vehicles = $this::getVehicles();

        if (isset($vehicles[$id])) {
            $vehicle = $vehicles[$id];
            $this->type = $vehicle['type'];
            $this->brand = $vehicle['brand'];
            $this->model = $vehicle['model'];
            $this->price = $vehicle['price'];
            $this->availability = $vehicle['availability'];
            $this->renter = $vehicle['renter'];
        } else {
            throw new Exception("Vehicle with ID $id not found.");
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getAvailability()
    {
        return $this->availability;
    }

    public function setAvailability($availability)
    {
        $this->availability = $availability;
    }

    public function getRenter()
    {
        return $this->renter;
    }

    public function setRenter($renter)
    {
        $this->renter = $renter;
    }

    public function toCsv()
    {
        return $this->id . "," . $this->type . "," . $this->brand . "," . $this->model . "," . $this->price . "," . $this->availability . "," . $this->renter . "\n";
    }

    public static function writeToCsv($id, $vehicleCsv)
    {
        $filePath = __DIR__ . '/../../data/vehicles.csv';
        $lines = [];

        if (($file = fopen($filePath, 'r')) !== false) {
            while (($data = fgetcsv($file)) !== false) {
                $lines[] = ($data[0] === $id) ? str_getcsv($vehicleCsv) : $data;
            }
            fclose($file);
        }

        if (($file = fopen($filePath, 'w')) !== false) {
            foreach ($lines as $line) {
                fputcsv($file, $line);
            }
            fclose($file);
        } else {
            throw new Exception("Kan het bestand niet openen voor schrijven: {$filePath}");
        }
    }

    public static function getVehicles()
    {
        $vehicles = [];
        $file = fopen(__DIR__ . '/../../data/vehicles.csv', 'r');

        if ($file !== false) {
            fgetcsv($file);

            while (($row = fgetcsv($file)) !== false) {
                $vehicles[] = [
                    'id' => $row[0],
                    'type' => $row[1],
                    'brand' => $row[2],
                    'model' => $row[3],
                    'price' => $row[4],
                    'availability' => $row[5],
                    'renter' => $row[6]
                ];
            }

            fclose($file);
        } else {
            echo "<script>console.error('Het bestand \"vehicles.csv\" kon niet worden geopend.');</script>";
        }
        return $vehicles;
    }
}
