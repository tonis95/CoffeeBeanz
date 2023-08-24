<?php
/* Database credentials. */
$config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/../config/config.ini");
$dsn = "mysql:host={$config['MYSQL_HOST']};dbname={$config['MYSQL_DATABASE']}";
$username = $config['MYSQL_USER'];
$password = $config['MYSQL_PASSWORD'];

/* Attempt to connect to MySQL database */
try{
    $pdo = new PDO($dsn, $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

# this is where drawing the table starts
function draw_table($rows)
{
  if(empty($rows)) {
    echo "<p>No results found.</p>";
  } else {
      echo "<table>";
      echo "<tr>";
      foreach($rows[0] as $key => $item){
        echo "<th>$key</th>";
      }
      echo "</tr>";
      foreach($rows as $row) {
        echo "<tr>";
        foreach($row as $key => $item) {
          echo "<td>$item</td>";
        }
        echo "</tr>";
      }
      echo "</table>\n";
    }
  # finish drawing the table 
}
?>