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
$sqlQuery = 'SELECT `id`, `supplier_name`, `date`, `amount`,`ccy`, `details`
FROM `receiptRecord`';
$result = query($sqlQuery, $db);


// function to get data from query array into new data structure

function displayData (array $query) {

    foreach($query as $array) {
        echo "<div class='receipt'>";
            echo '<h2> Receipt </h2>';
        foreach($array as $key=>$value){
            echo $value;
        }
        echo "</div>";
    }

}

//var_dump($result);

?>

<!DOCTYPE html>

<html lang='en-gb'>
<head>
    <title>Collection App</title>
    <link rel='stylesheet' type='text/css' href='styles.css' />
</head>

<body>
    <h1> Receipts </h1>
    <?php displayData($result);?>


<!--<div class='receipt'>add some content</div>-->
<!--<div class='receipt'>add some content</div>-->
<!--<div class='receipt'>add some content</div>-->


</body>


</html>

