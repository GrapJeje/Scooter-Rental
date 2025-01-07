<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike & Scooter Rental</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }

        main {
            padding: 20px;
        }

        .vehicle-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            padding: 15px;
            margin: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .vehicle-card h3 {
            margin: 0 0 10px 0;
        }

        .vehicle-card p {
            margin: 5px 0;
        }

        .rent-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .rent-button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <?php require_once('../../../../config/php/config.php'); ?>

    <header>
        <h1>Bike & Scooter Rental</h1>
    </header>
    <main>
        <h2>Available Vehicles</h2>

        <?php
        require_once('../app/Http/Controllers/VehiclesController.php');

        $controller = new VehiclesController();
        $controller->showVehicles();
        ?>

    </main>

    <?php require_once('../../../../config/php/footer.php'); ?>
</body>

</html>