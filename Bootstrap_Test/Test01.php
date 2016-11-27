$host="localhost";
$user="admin";
$password="admin1";
$con=mysql_connect($host,$user,$password);
if(!$con) {
  echo '<h1>Connected to MySQL</h1>';
} else {
   echo '<h1>MySQL Server is not connected</h1>';
}