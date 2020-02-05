<?php

require_once 'dbConnect.php';
require_once 'functions.php';

$db = connectToDb($dbName, $userName, $password);

//set query variable and pass to query function to fetch data from DB
$sqlQuery = 'SELECT `id`, `supplier_name`, `date`, `amount`,`ccy`, `details`
FROM `receiptRecord`';
$result = query($sqlQuery, $db);

$receipt = displayData($result);
?>

<!DOCTYPE html>

<html lang='en-gb'>

<head>
    <title>Collection App</title>
    <link rel='stylesheet' type='text/css' href='normalize.css'/>
    <link rel='stylesheet' type='text/css' href='styles.css' />
</head>

<body>
    <h1> Receipts </h1>
    <?php echo $receipt;?>
</body>

</html>

