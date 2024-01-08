<?php include('../../temp/header.php'); 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>
    <style>
        body {
            background-color: #eee ;
        }
        .container_mon {
            background-color: #fff;
            border-radius: 5px;
            margin: 5%;
            padding: 5%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }

        form {
            padding: 5%;
            flex-direction: column;
        }

        .btn-success {
            margin-top: 10px;
        }

        label {
            margin-bottom: 10px;
        }

        input{
            padding: 10px;
            margin-bottom: 20px;
        }


        input[type=submit] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            width: 150px;
        }

        canvas {
            max-width: 4400px;
        }

    </style>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 
<body>

    <div class="container_mon">
        <h1>BMI and Goal Health Tracker</h1>
        <form class ="form_bmi" action="#" method="POST">
            <h1>Body Max Index Calculator</h1>
            <label>Height</label>
            <input type="number" name="height" min=0 max=300 placeholder="Height in cm" value="<?php $height?>" id="height">
            <label>Weight</label>
            <input type="number" name="weight" min=0 max=300 placeholder="Weight in kg" value="<?php $weight?>" id="weight">
            <input type="submit" class="btn btn-success" value="Calculate BMI">
            
        <?php 
           $categories = array(
            'Underweight' => 'BMI less than 18.5',
            'Normal weight' => 'BMI 18.5 - 24.9',
            'Overweight' => 'BMI 25 - 29.9',
            'Obesity I' => 'BMI 30 - 34.9',
            'Obesity II' => 'BMI 35 - 39.9',
            'Obesity III' => 'BMI 40 or greater',
        );
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Check if the necessary keys are present in the $_POST array
                if (isset($_POST["height"]) && isset($_POST["weight"])) {
                    // Retrieve height and weight from the form
                    $height = $_POST["height"];
                    $weight = $_POST["weight"];
                         
                    // Ensure height and weight are numeric and not zero
                    if (is_numeric($height) && is_numeric($weight) && $height > 0 && $weight > 0) {
                        // Convert height to meters
                        $heightInMeters = $height / 100;
                        // Calculate BMI
                        $bmi = $weight / ($heightInMeters * $heightInMeters);
                        $bmi_ = number_format($bmi,2);
                        
                        if ($bmi_ < 18.5) {
                            $category = 'Underweight';
                        } elseif ($bmi_ >= 18.5 && $bmi <= 24.9) {
                            $category = 'Normal weight';
                        } elseif ($bmi_ >= 25 && $bmi <= 29.9) {
                            $category = 'Overweight';
                        } elseif ($bmi_ >= 30 && $bmi <= 34.9) {
                            $category = 'Obesity I';
                        } elseif ($bmi_ >= 35 && $bmi <= 39.9) {
                            $category = 'Obesity II';
                        } else {
                            $category = 'Obesity III';
                        }
                        
                         // Display the result
                        echo "<br><br><h2>Your BMI is: " . $bmi_ . " kg/m<sup>2</sup> | ".$category."</h2>";

                    }
               }
            }
        ?>
            <div class="container_water">
            <h1>Water Intake Tracker</h1>
                <form action="" method="post">
                    <label for="waterIntake">Daily Water Intake (in ounces):</label>
                    <input type="number" id="waterIntake" name="waterIntake" value = "<?php echo "$waterInTake" ?>" required>
                  
                </form>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $waterIntake = $_POST["waterIntake"];
                    } else {
                        $waterIntake = 0;
                    }
                ?>
                    <input type="submit" class="btn btn-success" value="Enter"><br>
                    <?php echo "Today's water intake goal: $waterIntake ounces"; ?>
            </div>
        </form>

        <div>
            <canvas id="myChart"></canvas>
        </div>

        <script>
            // Check if the form has been submitted
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Water Intake'],
                        datasets: [{
                            label: 'Daily Water Intake (ounces)',
                            data: [<?php echo $waterIntake; ?>],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            <?php } ?>
        </script>
    </div>
    </div>

   

</body>
</html>
<?php 
        include ('temp/footer.php');
?>

<!-- test -->