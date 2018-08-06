<display>
<?php
$hostname = 'localhost';
$username = '';
$password = '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=measurements", 
                               $username, $password);

    /*** The SQL SELECT statement ***/
    $sth = $dbh->prepare("
       SELECT `dtg` AS date, `level` FROM  `Carbon_dioxide`
	WHERE level IS NOT NULL"); 
    $sth->execute();

    /* Fetch all of the remaining rows in the result set */
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);

    $sthp = $dbh->prepare("
       SELECT  dtg, level FROM  Carbon_dioxide
       	WHERE id =(SELECT MAX(id) FROM Carbon_dioxide)");
	
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
</display>
