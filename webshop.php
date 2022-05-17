<?php include_once 'includes/header.php';?> 
    <title>webshop</title>
</head>
<body>
<?php include_once 'includes/nav.php';?>
<style>
.card { 
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  max-height: 650px;
 /* margin: auto;*/
  text-align: center;
  font-family: arial;
  width: 28%;
  flex: 1 1 290%;
}

.price {
  color: grey;
  font-size: 22px;
}


.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
.pricefilter{
    width: 150px;
}
.ratingfilter{
    width: 150px;
}
.submit{
    width: 150px;
}
.orderbyfilter{
    width: 300px;
}
</style>

<div class="AllContent">
<div class="SearchEnginePart">
    <div class="BarPostion">
        <br>
            <div class="HeaderWebshop">
                 <span class="iconify" data-icon="simple-icons:xampp" style="color: black;" data-width="50" id="IMAN"></span>
             </div>
            
             <div class="HeaderWebshop">
                 WEBSHOP
             </div>
        <br>
        <br>
        <form action="includes/searchbar.php" method="post" class="search-bar">
        Search:  <input type="search" name="search" pattern=".*\S.*" required>
            <button class="search-btn" type="submit"  name="submit">
                <span>Search</span>
            </button>
        </form>
    </div>
<br>
<br>
<br>
<br>
<br>
<div class="filters">

<form id="myFunction">

<div class="FilterContent">
    <div class="pricefilter">
        <p>MAX PRICE:</p>
        <input type="number" name="max" id="max" min="1" max="10000" value="50">
        
        </div>
        <div class="ratingfilter">
        <p>MIN RATING:</p>
        <input type="number" name="min" id="min" min="1" max="5" value="3">
    
    </div>
</div>
<br>
<br>
    <div class="orderbyfilter">
        <p>ORDER BY:</p>
        <select name="order" id="order">
        <option value="descending" name="descending" id="descending">price descending</option>
        <option value="ascending" name="ascending" id="ascending">price ascending</option>
        </select>
    </div>
</div>
<br>
<br>
<br>
    <div class="submit">
        <input type="submit" value="Submit" >
    </div>
</form>
</div>

<div class="CardContent">
<?php
$path = "includes/Python/". $_SESSION["AccountsID"]."_output.json";
$json = file_get_contents($path, true);
$data = json_decode($json, true);
$pricelist = [];
if (isset($_GET["order"])) {
    $order = $_GET['order'];
    foreach ($data['items'] as $address)
        {
            $price = str_replace(",","",$address['price']);
            $price = str_replace("$","",$price);
            $price = (int)$price;
            array_push($pricelist, $price);
        
        }
    if($order == "descending"){
        rsort($pricelist);
    }
    else{
        sort($pricelist);
    }

}
foreach ($data['items'] as $address)
{
    $price = str_replace(",","",$address['price']);
    $price = str_replace("$","",$price);
    $price = (int)$price;
    $rating = $address['rating'];
    
        if($price != null){
            if($rating != null){
                
                $rating = $rating[0];
                $rating = (int)$rating;

                if (isset($_GET["max"])) {

                    $maxprice = $_GET['max'];

                    if (isset($_GET["min"])) {
                        $minrating = $_GET['min'];
                        
                        if($price <= $maxprice){

                            if($rating >= $minrating){

                                echo "<div class='card' >";
                                echo "<img src='". $address['image'] ." 'style='height:300px'>";
                                echo  "<p id = 'textSize'> ".$address['title'] ."</p> ";
                                echo "<p>". $address['rating']."</p>";
                                echo "<p>". $address['reviews']."</p>";
                                echo  "<p class='price'>".$address['price'] ."</p> ";
                                echo"<p><a href='https://www.amazon.com" . $address['url']. "' target = '_blank'><button>Buy
                                </button></a></p></div></br>";
                                
                            }

                        }

                    }
                }
                    
            
            
        
        else{
            echo "<div class='card' >";
                echo "<img src='". $address['image'] ." 'style='height:300px'>";
                echo  "<p> ".$address['title'] ."</p> ";
                echo "<p>". $address['rating']."</p>";
                echo "<p>". $address['reviews']."</p>";
                echo  "<p class='price'>".$address['price'] ."</p> ";
                
                echo"<p><a href='https://www.amazon.com" . $address['url']. "' target = '_blank'><button>Buy</button></a></p></div></br>";
        }
    }
    }

};
?>

</div>


</div>

<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
