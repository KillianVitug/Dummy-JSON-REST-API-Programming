<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

//Handling HTTP Response
$response = $client->get('https://dummyjson.com/products');
$code = $response->getStatusCode();
$body = $response->getBody();
$prod = json_decode($body);
$products = $prod->products;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Products List</title>
</head>
<body>
<table>
  <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Description</th>
    <th>Price</th>
    <th>Brand</th>
    <th>Category</th>
    <th>Thumbnail</th>
  </tr>

  <?php
    foreach ($products as $info):
    ?>
    <tr>
        <td><?=$info->id;?></td>
        <td><?=$info->title;?></td>
        <td><?=$info->description;?></td>
        <td><?=$info->price;?></td>
        <td><?=$info->brand;?></td>
        <td><?=$info->category;?></td>
        <td><?="<img width=150x; height=150x; src=" . $info->thumbnail .">";?></td>
        
    </tr>
    <?php 
        endforeach; 
    ?>

</body>
</html>

