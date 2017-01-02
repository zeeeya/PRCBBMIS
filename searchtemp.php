

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require 'dbconnect.php';

$con=mysql_connect('localhost', 'root', '');
$db=mysql_select_db('prcbbmis');


if(isset($_POST['button'])){    //trigger button click

  $search=$_POST['search'];

  $query=mysql_query("SELECT * FROM Donor WHERE first_name LIKE '%{$search}%' || last_name LIKE '%{$search}%' ");

if (mysql_num_rows($query) > 0) {
  while ($row = mysql_fetch_array($query)) {
    echo "<tr><td>".$row['first_name']."</td><td></td><td>".$row['last_name']."</td></tr>";
  }
}else{
    echo "No Data Found<br><br>";
  }

}else{                          //while not in use of search  returns all the values
  $query=mysql_query("SELECT * FROM Donor");

  while ($row = mysql_fetch_array($query)) {
    echo "<tr><td>".$row['first_name']."</td><td></td><td>".$row['last_name']."</td></tr>";
  }
}

mysql_close();
?>
<body>

<form action="" method="post">

  <input name="search" type="search" autofocus><input type="submit" name="button">

</form>

<table>
  <tr><td><b>First Name</td><td></td><td><b>Last Name</td></tr>