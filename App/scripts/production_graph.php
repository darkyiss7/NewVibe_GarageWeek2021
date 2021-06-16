<?php

$servername = "localhost";

// REPLACE with your Database name
$dbname = "new_vibe_db";
// REPLACE with Database user
$username = "root";
// REPLACE with Database user password
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$req1 = "SELECT * FROM production_log;";
$req2 = "SELECT * FROM etat_log;";
$req3 = "SELECT * FROM batterie_log;";

$row_etat_log=$row_production_log=$row_batterie_log=[];

if ($result1 = $conn->query($req1)) {
    while ($row = $result1->fetch_assoc()) {
        array_push($row_etat_log,$row);

    }
    $result1->free();
}
if ($result2 = $conn->query($req2)) {
    while ($row = $result2->fetch_assoc()) {
        array_push($row_production_log,$row);
    }
    $result2->free();
}
if ($result3 = $conn->query($req3)) {
    while ($row = $result3->fetch_assoc()) {
        array_push($row_batterie_log ,$row);
    }
    $result3->free();
}



$conn->close();
?>
<script type="text/javascript">
  var etats = <?php echo json_encode($row_etat_log); ?>;
  var prods = <?php echo json_encode($row_production_log); ?>;
  var batt =<?php echo json_encode($row_batterie_log); ?>;
  console.log(etats);
  console.log(prods);
  console.log(batt);

</script>
</body>
</html>
