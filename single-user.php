<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);
$id = $_GET["user_id"];
$response = $client->get('users/' . $id);
$code = $response->getStatusCode();
$body = $response->getBody();
$user = json_decode($body);
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single User</title>
</head>
<body>
<div class = "container"> 
        <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Complete Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Blood Type</th>
                    <th scope="col">Image</th>
                </tr>
                </thead>
                <tr>
                    <th scope="row"href="single-products.php"><?= $user->id?></th>
                    <td><?= $user->firstName?><?= " "?><?= $user->maidenName?><?= " "?><?= $user->lastName?></td>
                    <td><?= $user->age ?></td>
                    <td><?= $user->gender?></td>
                    <td><?= $user->email?></td>
                    <td><?= $user->phone?></td>
                    <td><?= $user->bloodGroup?></td>
                    <td><img src="<?= $user->image?>" width="100" length="100"></td>
                </tr>

 </table>
</div>
</body>
</html>