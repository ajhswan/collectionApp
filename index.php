<?php

// DB CONNECTION
$db = new PDO('mysql:host=db; dbname=collectionApp', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// FETCH DATA FROM DATABASE


function query($query, $db) {
    $dbQuery = $db->prepare($query);
    $dbQuery->execute();
    $result = $dbQuery->fetchAll();

    return $result;
}

$result = query('SELECT `id`, `supplier_name`, `date`, `amount`, `details`
FROM `receiptRecord`;', $db);

var_dump($result);


?>

<!DOCTYPE html>

<html lang='en-gb'>
<head>
    <title>Collection App</title>
    <link rel='stylesheet' type='text/css' href='styles.css' />
</head>

<body>
<h1> Receipts </h1>
<div class='receipt'>add some content</div>
<div class='receipt'>add some content</div>
<div class='receipt'>add some content</div>


</body>


</html>

