<?php

require_once 'dbConnect.php';
require_once 'functions.php';
ini_set('file_uploads', 'on');

$db = connectToDb();

$result = getReceipts($db);

$receipts = displayData($result);


if (isset($_POST["submit"])) {
    // validate data before going to DB

    // sanatize data before sending to DB
    $sName = testInput($_POST['supplier_name']);
    $details = testInput($_POST['details']);
    $amount = testInput($_POST['amount']);
    $ccy = testInput($_POST['ccy']);
    $date = testInput($_POST['date']);

    //if there is and image upload image to upload folder
    $target_dir = 'uploads/';
    $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $uploadCheck = getimagesize($_FILES['fileToUpload']['tmp_name']);


    if($uploadCheck !== false) {
        echo 'File is an image -' . $uploadCheck['mime'] . '.';
        $uploadOk = 1;
    } else {
        echo 'File is not an image.';
        $uploadOk = 0;
    }

    if($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png' && $imageFileType != 'gif') {
        echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
        $uploadOk = 0;
    }

    if($uploadOk == 0) {
        echo 'Sorry, your file was not uploaded';

    } else {
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
            echo 'The file' . basename($_FILES['fileToUpload']['name']) . 'has been uploaded.';

        } else {
            echo 'Sorry, there was an error uploading your file';
        }

    }

// insert data from user form and save in DB
    insertData($sName,$details, $amount, $ccy, $date, $db);

// Automatically save refresh page to show new data from user.

    echo "<meta http-equiv='refresh' content='0'>";
//    header('Location: index.php')
}
// upload images


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
                <form action='index.php' method='post' enctype='multipart/form-data'>
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
                    <div class='form' >
                        <label for='uploads'>Upload Photo</label>
                        <input id='fileToUpload' type='file' name='fileToUpload' accept='image/*;capture=camera'  />
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