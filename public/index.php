<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike & Scooter Rental</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php require_once('../../../../config/php/config.php'); ?>

    <header>
        <h1>Bike & Scooter Rental</h1>
    </header>
    <main>
        <h2>Available Vehicles</h2>

        <div class="vehicles">
            <?php
            require_once('../app/Http/Controllers/VehiclesController.php');

            $controller = new VehiclesController();
            $controller->showVehicles();
            ?>
        </div>
    </main>

    <!-- Popup -->
    <?php $isNameSet = isset($_GET['name']) && !empty($_GET['name']); ?>
    <div class="overlay" id="popup-overlay" style="display: <?php echo ($isNameSet ? 'none' : 'flex'); ?>;">
        <div class="popup">
            <h2>Welcome! Please Enter Your Name</h2>
            <form method="GET" id="name-form">
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <div class="footer">
        <?php require_once('../../../../config/php/footer.php'); ?>
    </div>
</body>

</html>