<?php

require_once 'dbConnect.php';
require_once 'functions.php';

$db = connectToDb();

$result = getReceipts($db);

$receipts = displayData($result);

if (isset($_POST["submit"])) {

    $sName = testInput($_POST['supplier_name']);
    $details = testInput($_POST['details']);
    $amount = testInput($_POST['amount']);
    $ccy = testInput($_POST['ccy']);
    $date = testInput($_POST['date']);

    insertData($sName,$details, $amount, $ccy, $date, $db);

    header('Location: index.php');
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
    <div class='buttonBox'>
        <a class='button' href='#popup'>Add Receipt</a>
    </div>

    <div id='popup' class='overlay'>
        <div class='popup'>
            <h2> Add New Receipt </h2>
            <a class='close' href='#'>&times;</a>
            <div class='content'>
                <form action='index.php' method='post'>
                    <div class='form'>
                        <label for='supplier'>Supplier:</label>
                        <input id='supplier' type='text' name='supplier_name' required />
                    </div>
                    <div class='form'>
                        <label for='details'>Details:</label>
                        <input id='details' type='text' name='details' required/>
                    </div>
                    <div class='form'>
                        <label for='amount'>Amount:</label>
                        <input id='amount' type='text' name='amount' required/>
                    </div>
                    <div class='form'>
                        <label for='ccy'>Currency:</label>
                        <select id='ccy' name='ccy'>
                            <option value='GBP'>British Pound</option>
                            <option value='USD'>US Dollar</option>
                        </select>
                    </div>
                    <div class='form' >
                        <label for='date'>Date:</label>
                        <input id='date' type='date' name='date' required/>
                    </div>
                    <div class='form'>
                        <input type='submit' name='submit' />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>