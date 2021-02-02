<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 02 Assignment</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<main>

<?php

    $firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_GET, 'lastname', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_GET, 'age', FILTER_SANITIZE_NUMBER_INT);
    define('DAYS_IN_YEAR', 365);
    $calcDaysOld = number_format($age * DAYS_IN_YEAR);
    $date = date("m/d/y");
    ?>

    <?php if(!empty($firstname) && !empty($lastname) && !empty($age)) {?>
        <header><h1 class='heading'> <?php echo "Hello, my name is {$firstname} {$lastname} <br>
        Today's date is {$date}" ?> </h1></header>
        <div class= "wrapper">
        <?php
        
        if ($age >= 18) { ?>
            <p class='userInfo'> <?php echo "I am {$age}  years old, <br> 
            and I am old enough to vote in the United States." ?></p>
        <?php } else if ($age < 18) { ?>
            <p class='userInfo'> <?php echo "I am {$age} years old, <br>
            and I am not old enough to vote in the United States." ?></p>
            <?php  }

    ?> <span class='spanDateInfo'> <?php  echo "That means I'm about {$calcDaysOld} days old." ?></span>

    <?php } else if (empty($firstname) || empty($lastname)) {
        echo "<h2 class='errorMssg'>You did not submit firstname and lastname parameters.</h2>";
    } else if (empty($age)) {
        echo "<h2 class='errorMssg'>You did not submit a numeric age parameter.</h2>";
    }

    ?>
    </div>


</main>
</body>
</html>