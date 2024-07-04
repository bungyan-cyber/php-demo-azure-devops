<?php
// Set some variables
$title = "Welcome to Azure DevOps Engineer!!!";
$currentDate = date('Y-m-d H:i:s');
$visitorCount = 100; // Example of a counter

// Function to generate a random quote
function getRandomQuote() {
    $quotes = [
        "Success usually comes to those who are too busy to be looking for it. - Henry David Thoreau",
        "The way to get started is to quit talking and begin doing. - Walt Disney",
        "It is our choices, that show what we truly are, far more than our abilities. - J.K. Rowling",
        "Whether you think you can or you think you can't, you're right. - Henry Ford"
    ];
    $randomIndex = array_rand($quotes);
    return $quotes[$randomIndex];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 20px;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .quote {
            font-style: italic;
            margin-top: 20px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $title; ?></h1>
        <p>Current date and time: <?php echo $currentDate; ?></p>
        <p>Visitors today: <?php echo $visitorCount; ?></p>
        <p>Random quote of the day:</p>
        <p class="quote"><?php echo getRandomQuote(); ?></p>
        <hr>
        <p>This is a PHP-powered page deployed with Azure DevOps!</p>
    </div>
</body>
</html>
