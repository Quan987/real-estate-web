<?php
    session_start();
    require('./db.php'); 
    $card = getCardByAddr($_POST["location"]);
    if (!isset($_POST["wlocation"])) {
        $card = getCardByAddr($_POST["location"]);
    } 
    else {
        //add to wishlist
        $card = getCardByAddr($_POST["wlocation"]);
        addToWishlist($_POST["wlocation"]);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles.css">
    <script src="./buyer.js"></script>
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
            "<p>Total area: " . $card["areaL"] * $card["areaW"] . " sq ft. <p>" ?>
            <div>
            <button type="button" onclick="addToWishlist()">Add to Wishlist</button>
            </div>
            <p class = "center"><a href="buyer.php">Back to dashboard</a></p>
            <?=
        "</div>";
    ?>
    
</body>
</html>