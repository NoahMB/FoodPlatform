<?php include_once 'includes/header.php';?> 
    <title>webshop</title>
</head>
<body>
<?php include_once 'includes/nav.php';?>

<form action="includes/searchbar.php" method="post">
    Search: <input type="text" name="search">
    <input type="submit" name="submit">
</form>

<?php
$json = file_get_contents('C:\xampp\htdocs\Kaddoo\includes\Python\search_results_output.json', true);
$data = json_decode($json, true);

foreach ($data['items'] as $address)
{
    if($address['price'] != null){
        echo "<div><a href='https://www.amazon.com" . $address['url']. "' target = '_blank'>";
        echo  $address['title'] ." ";
        echo  $address['rating']." ";
        echo  $address['reviews']." ";
        echo  $address['price'] ." ";
        echo "<img src='". $address['image'] ." '> </a></div></br>";
    }
};
?>