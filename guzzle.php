<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'http://omdbapi.com', [
    'query' => [
        'apikey' => 'f8b551a8',
        's' => 'transformers'
    ]
]);

$result = json_decode($response->getBody()->getContents(), true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
</head>

<body>
    <a href="index.html">Back</a>

    <?php foreach ($result['Search'] as $movie) : ?>
        <ul>
            <li>Title : <?= $movie['Title']; ?></li>
            <li>Year : <?= $movie['Year']; ?></li>
            <li><img src="<?= $movie['Poster']; ?>" width="80"></li>
        </ul>
    <?php endforeach; ?>
</body>

</html>