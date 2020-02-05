<?php

/** dbquery function to fetch data from database
 * @param string $query
 * @param PDO $db
 * @return array
 */
function query(string $query, PDO $db):array {
$dbQuery = $db->prepare($query);
$dbQuery->execute();
$result = $dbQuery->fetchAll();

return $result;
}


/** Display data from sql query
 * @param array $query
 * @return string
 */
function displayData (array $query):string {
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
