<?php

/** dbQuery function to fetch data from database
 *
 * @param string $query
 * @param PDO $db
 *
 * @return array
 */
function getReceipts(PDO $db):array {
    $sqlQuery = 'SELECT `id`, `supplier_name`, `date`, `amount`,`ccy`, `details`
                 FROM `receiptRecord_test`';
    $dbQuery = $db->prepare($sqlQuery);
    $dbQuery->execute();
    $result = $dbQuery->fetchAll();

return $result;
}

/** Display data from sql query and loop for each item in the array
 *
 * @param array $query
 *
 * @return string
 */
function displayData (array $query):string{
    $result = '';
    foreach ($query as $array) {
        if (!array_key_exists('supplier_name', $array) || !array_key_exists('details', $array) || !array_key_exists('amount', $array) || !array_key_exists('id', $array) || !array_key_exists('date', $array)) {
            return 'Error! Missing array key!';
        }

            $result .= "<div class='receipt'>";
            $result .= '<h2> Receipt </h2>';
            $result .= "<div class='supplier'>" . "<h3>" . $array['supplier_name'] . "</h3>" . "</div>";
            $result .= "<div class='details'>" . "<h4>" . $array['details'] . "</h4>" . "</div>";
            $result .= "<div class='amount'>" . "<h4>£" . $array['amount'] . "</h4>" . "</div>";
            $result .= "<div class='id'>" . "<h5>" . "INV" . $array['id'] . "</h5>" . "</div>";
            $result .= "<div class='date'>" . "<h5>" . $array['date'] . "</h5>" . "</div>";
            $result .= "</div>";
        }
        return $result;
}

///validation function

//if (isset($POST["submit"])) {
//if  ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    $sName = testInput($_POST['supplier_name']);
//    $details = testInput($_POST['details']);
//    $amount = testInput($_POST['amount']);
//    $ccy = testInput($_POST['ccy']);
//    $date = testInput($_POST['date']);

//}


function testInput($data) {
    $data = trim($data);
    $data = filter_var($data, FILTER_SANITIZE_STRING);
    $data = filter_var($data, FILTER_SANITIZE_SPECIAL_CHARS);
    $data = filter_var($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return $data;
}

function insertData($sName, $details, $amount, $ccy, $date, $db) {

    $sqlInsert = $db->prepare("INSERT INTO receiptRecord_test (supplier_name, details, amount,ccy, date)
              VALUES (:sName, :details, :amount, :ccy, :date)");
    $sqlInsert->bindParam(':sName', $sName);
    $sqlInsert->bindParam(':details', $details);
    $sqlInsert->bindParam(':amount', $amount);
    $sqlInsert->bindParam(':ccy', $ccy);
    $sqlInsert->bindParam(':date', $date);
    $result = $sqlInsert->execute();
    return $result;

}