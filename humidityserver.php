<?php
$hostname = 'localhost';
$username = '';
$password = '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=measurements", 
                               $username, $password);

    /*** The SQL SELECT statement ***/
    $sth = $dbh->prepare("
       SELECT `dtg`, `humidity` FROM  `humidity` 
	WHERE dtg > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 1 DAY) 
	AND humidity IS NOT NULL
	LIMIT 0 , 800");
    $sth->execute();

    /* Fetch all of the remaining rows in the result set */
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);

    $sthp = $dbh->prepare("
       SELECT  dtg, humidity FROM  humidity
       	WHERE id =(SELECT MAX(id) FROM humidity)");
    $sthp->execute();
    $resultp = $sthp->fetchAll(PDO::FETCH_ASSOC);

    /*** close the database connection ***/
    $dbh = null;
    
}
catch(PDOException $e)
    {
        echo $e->getMessage();
    }

$json_data = json_encode($result); 
?>

