<?php
    require('./db.php');
    session_start();
    initTables();
	if(empty($_SESSION['user_auth'])) {
        header('Location: ./session_destroy_buyer.php');
        exit;
	}
	$minBed = (int)$_POST["minBed"];
	$minBath = (float)$_POST["minBath"];
	$minPrice =(float) $_POST["minPrice"];
	$maxPrice = (float) $_POST["maxPrice"];
    if(isset($_POST["search"]) and $_POST["search"] != '')
    {
        $searchAvailable = 1;
        $searchBar = (string) $_POST["search"];
    }
    else
    {
        $searchAvailable = 0;
    }
	
	if(isset($_POST["wishFilter"]))
    {
        $wishFilter = 1;
    }
    else
    {
        $wishFilter = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Dashboard</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard">
        <div class="welcome-note" id="welcomeNote"></div>
		
        <!-- <input type="text" id="searchInput" class="search-bar" placeholder="Search...">
        <button onclick="search()">Search</button> -->
		<form action="" method="post">
			<input type="text" id="search" name="search" class="search-bar" placeholder="Search...">
			<br>
			<label for="minBed">Minimum number of bedrooms</label> 
			<select name="minBed" id="minBed">
				<option value=0 selected>0</option>
				<option value=1>1</option>
				<option value=2>2</option>
				<option value=3>3</option>
				<option value=4>4</option>
			</select>
			<br>
			<label for="minBath">Minimum number of bathrooms</label> 
			<select name="minBath" id="minBath">
				<option value=0 selected>0</option>
				<option value=1>1</option>
				<option value=2>2</option>
				<option value=3>3</option>
				<option value=4>4</option>
			</select>
			<br>
			<label for="minPrice">Minimum price:</label> 
			<select name="minPrice" id="minPrice">
				<option value=0 selected>0</option>
				<option value=100000>$100,000</option>
				<option value=200000>$200,000</option>
				<option value=300000>$300,000</option>
				<option value=400000>$400,000</option>
				<option value=500000>$500,000</option>
				<option value=600000>$600,000</option>
				<option value=700000>$700,000</option>
				<option value=800000>$800,000</option>
				<option value=900000>$900,000</option>
				<option value=1000000>$1,000,000</option>
			</select>
			<label for="maxPrice">Maximum price:</label>
			<select name="maxPrice" id="maxPrice">
				<option value=0>0</option>
				<option value=100000>$100,000</option>
				<option value=200000>$200,000</option>
				<option value=300000>$300,000</option>
				<option value=400000>$400,000</option>
				<option value=500000>$500,000</option>
				<option value=600000>$600,000</option>
				<option value=700000>$700,000</option>
				<option value=800000>$800,000</option>
				<option value=900000>$900,000</option>
				<option value=1000000>$1,000,000</option>
				<option value=2000000>$2,000,000</option>
				<option value=3000000>$3,000,000</option>
				<option value=4000000>$4,000,000</option>
				<option value=5000000>$5,000,000</option>
				<option value=6000000>$6,000,000</option>
				<option value=7000000>$7,000,000</option>
				<option value=8000000>$8,000,000</option>
				<option value=9000000>$9,000,000</option>
				<option value=10000000>$10,000,000</option>
				<option value=1000000000000 selected>No limit</option>
			</select>
			<br>
			<label for="wishFilter">Wishlisted only:</label>
			<input type="checkbox" value="yes" name="wishFilter"></input>
			<br><br>
			<input type="submit" value = "Search">
		</form>
        <div class="search-results" id="searchResults">
			<?php
                $db = getDB();
                if($searchAvailable == 1 && $wishFilter == 1)
                {
                    $sql="SELECT * FROM Card WHERE (addr LIKE CONCAT('%', ?, '%')) and price > ? and price < ? and beds > ? and baths > ?";
					//Adding implementation to include wishlisted value later.
					$statement = $db->prepare($sql);
    				$statement->bind_param("sddid",$searchBar, $minPrice, $maxPrice, $minBed, $minBath);
    				$statement->execute();
					$intermediate = $statement->get_result();
                }
                else if($wishFilter == 1)
                {
                    $sql="SELECT * FROM Card WHERE price > ? and price < ? and beds > ? and baths > ?";
					//Adding implementation to include wishlisted value later using EXIST in the select statement to check the 2nd table
					$statement = $db->prepare($sql);
    				$statement->bind_param("ddid", $minPrice, $maxPrice, $minBed, $minBath);
    				$statement->execute();
					$intermediate = $statement->get_result();
                }
                else if($searchAvailable == 1)
                {
                    $sql="SELECT * FROM Card WHERE (addr LIKE CONCAT('%', ?, '%')) and price > ? and price < ? and beds > ? and baths > ? ";
					$statement = $db->prepare($sql);
    				$statement->bind_param("sddid",$searchBar, $minPrice, $maxPrice, $minBed, $minBath);
    				$statement->execute();
					$intermediate = $statement->get_result();
                }
                else
                {
                    $sql="SELECT * FROM Card WHERE price > ? and price < ? and beds > ? and baths > ?";
					$statement = $db->prepare($sql);
    				$statement->bind_param("ddid", $minPrice, $maxPrice, $minBed, $minBath);
    				$statement->execute();
					$intermediate = $statement->get_result();
                }
                    while($result = $intermediate->fetch_assoc())
				    {
					    $seller = $result["seller"];
					    $addr = $result["addr"];
					    $age = $result["age"];
					    $price = $result["price"];
					    $img = $result["img"];
					    $beds = $result["bed"];
					    $baths = $result["baths"];
					    $garage = $result["garage"];
					    $area = $result["areaL"] * $result["areaW"];
					?>
					<div class="property-card">
						<img src="<?= $img; ?>" alt="Property Image" style="width:100%;">
						<h3>Sold by <?= $seller; ?></h3>
						<p>Location: <?= $addr; ?></p>
						<p>Price: $<?= $price; ?></p>
						<!-- The stuff in here should be saved for when the user clicks on the card
						<p>//$beds  bedrooms, //$baths bathrooms, =//$garage garage</p>
						<p>Area: //$area square feet</p>
						Implement wishlist later -->
					</div>
				<?php }
				$db->close();
			?>
        </div>
    </div>
</body>
</html>
