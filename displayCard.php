<?php require('./db.php'); 
    $card = getCardByAddr($_POST["location"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <?=
        "<div class='dashboard'>" .
            "<img src=" . $card['img'] . ">" .
            "<h1>" . $card["addr"] . "</h1>" .
            "<h2>$" . $card["price"] . " • " . $card["age"] . " years old</h2>" . 
            "<p>Sold by: " . $card["seller"] . 
            "<p>" . $card["beds"] . " bedrooms, " . $card["baths"] . " bathrooms</p>" . 
            "<p>" . $card["garage"] . "-car garage</p>" .
            "<p>" . $card["areaL"] . " ft. by " . $card["areaW"] . " ft.</p>".
            "<p>Total area: " . $card["areaL"] * $card["areaW"] . " sq ft. <p>"
        . "</div>";
    ?>
</body>
</html>