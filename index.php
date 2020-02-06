<?php

require_once 'dbConnect.php';
require_once 'functions.php';

$db = connectToDb();

$result = getReceipts($db);

$receipts = displayData($result);

if (isset($_POST["submit"])) {
    $connectionStatus = $db->getAttribute(PDO::ATTR_CONNECTION_STATUS);
    echo $connectionStatus;
    var_dump($_POST);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO receiptRecord_test (supplier_name, details, amount,ccy, date)
                    VALUES ('".$_POST['supplier_name']."','".$_POST['details']. "','".$_POST['amount']."', '".$_POST['ccy']."', '".$_POST['date']."')";
    $sqlInsert = $db->prepare($sql);
    $result = $sqlInsert->execute();
    echo $result;
    $_POST = array();
    var_dump($_POST);

}
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
    <div class='receiptsContainer'>
    <?php echo $receipts;?>
    </div>
    <div class='box'>
        <a class='button' href='#popup'>Add Receipt</a>
    </div>

    <div id='popup' class='overlay'>
        <div class='popup'>
            <h2> Add New Receipt </h2>
            <a class='close' href='#'>&times;</a>
            <div class='content'>
                <form action='' method='post'>
                    <div class='form'>
                        <h4>Supplier:</h4>
                        <input type='text' name='supplier_name' size='50' />
                    </div>
                    <div class='form'>
                        <h4>Details:</h4>
                        <input type='text' name='details' size='50'/>
                    </div>
                    <div class='form'>
                        <h4>Amount:</h4>
                        <input type='text' name='amount'/>
                    </div>
                    <div class='form'>
                        <h4>Currency:</h4>
                        <select name='ccy'>
                            <option value='GBP'>British Pound</option>
                            <option value='USD'>US Dollar</option>
                        </select>
                    </div>
                    <div class='form'>
                        <h4>Date:</h4>
                        <input type='date' name='date'  />
                    </div>
                    <div class='form' id='submit'>
                        <input type='submit' name='submit' />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>