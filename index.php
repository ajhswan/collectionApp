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
    $result = '';

    foreach($query as $array) {
        $result .= "<div class='receipt'>";
        $result .= '<h2> Receipt </h2>';
        $result .= "<div class='supplier'>" . "<h3>" . $array['supplier_name'] . "</h3>" . "</div>";
        $result .= "<div class='details'>" . "<h4>" . $array['details'] . "</h4>" . "</div>";
        $result .= "<div class='amount'>" . "<h4>£" . $array['amount'] . "</h4>" . "</div>";
        $result .= "<div class='id'>" . "<h5>" . "INV". $array['id'] . "</h5>" . "</div>";
        $result .= "<div class='date'>" . "<h5>" . $array['date'] . "</h5>" . "</div>";
        $result .= "</div>";
    }
    return $result;
}
//echo "<pre>";
//var_dump($result);
//echo '</pre>';
$receipt = displayData($result);
?>

<!DOCTYPE html>

<html lang='en-gb'>
<head>
    <title>Collection App</title>
    <link rel='stylesheet' type='text/css' href='styles.css' />
</head>

<body>
    <h1> Receipts </h1>
    <?php echo $receipt;?>


</body>


</html>

