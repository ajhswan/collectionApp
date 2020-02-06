<?php

/** dbQuery function to fetch data from database
 *
 * @param string $query
 * @param PDO $db
 *
 * @return array
 */
function getReceipts(PDO $db): array {
    $sqlQuery = 'SELECT `id`, `supplier_name`, `date`, `amount`,`ccy`, `details`
                 FROM `receiptRecord`';
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
function displayData (array $query): string{
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

/** Validate and sanitise $_POST data from user form submission
 *
 * @param mixed $data data from user form and initilised in index.php
 *
 * @return mixed $data to be used in insertData function
 */
function testInput(string $data): string {
    $data = trim($data);
    $data = filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW | FILTER_FLAG_ENCODE_AMP);
    return $data;
}


/**Insert sanitised data from user form into database
 *
 * @param string $sName Supplier Name from form
 * @param string $details Details/Descriptions  from form
 * @param string $amount amount/spent from form
 * @param string $ccy currency sleceted on form
 * @param string $date date slected from dropdown on form
 * @param PDO $db database connection for insert
 *
 * @return bool to check that insert has worked
 */
function insertData(string $sName, string $details, string $amount, string $ccy, string $date, PDO $db): bool {

    $sqlInsert = $db->prepare("INSERT INTO receiptRecord (supplier_name, details, amount,ccy, date)
              VALUES (:sName, :details, :amount, :ccy, :date)");
    $sqlInsert->bindParam(':sName', $sName);
    $sqlInsert->bindParam(':details', $details);
    $sqlInsert->bindParam(':amount', $amount);
    $sqlInsert->bindParam(':ccy', $ccy);
    $sqlInsert->bindParam(':date', $date);
    $result = $sqlInsert->execute();
    return $result;
}