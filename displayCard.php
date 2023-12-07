<?php require('./db.php'); 
    $card = getCardByAddr($_POST["location"]);
?>
<?=
    "<div>" .
        "<img src=" . $card['img'] . ">" .
        "<h1>" . $card["addr"] . "</h1>" .
        "<h2>$" . $card["price"] . " • " . $card["age"] . " years old</h2>" . 
        "<p>Sold by: " . $card["seller"] . 
        "<p>" . $card["beds"] . "bedrooms, " . $card["baths"] . "bathrooms</p>" . 
        "<p>" . $card["garage"] . "-car garage</p>" .
        "<p>" . $card["areaL"] . "sq. ft. by " . $card["areaW"] . "sq. ft.</p>"

    . "</div>";
?>