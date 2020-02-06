<?php

require_once 'dbConnect.php';
require_once 'functions.php';

$db = connectToDb();

$result = getReceipts($db);

$receipts = displayData($result);
?>

<!DOCTYPE html>

<html lang='en-gb'>

<head>
    <title>Collection App</title>
    <meta name='viewport' content='width=device-width' />
    <link rel='stylesheet' type='text/css' href='normalize.css'/>
    <link rel='stylesheet' type='text/css' href='styles.css' />
</head>

<body>
    <h1> Receipts </h1>
    <?php echo $receipts;?>
</body>

</html>

