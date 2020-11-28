<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cork";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
/*if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
*/
/*$sql_table ="CREATE TABLE user_reg (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql_table) === TRUE) {
  echo "Table user_reg created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}*/

/*$username = $_GET['username'];
$email = $_GET['email'];
$password = $_GET['password'];*/

$username = $_GET['q'];

$select = "SELECT username, email, password FROM user_reg WHERE username= '$username'";
$result = $conn->query($select);

/*$stmt = $conn->prepare($select);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($username, $email, $password);
$stmt->fetch();
$stmt->close();
echo "<table>";
echo "<tr>";
echo "<th>username</th>";
echo "<td>" . $username . "</td>";
echo "<th>email</th>";
echo "<td>" . $email . "</td>";
echo "<th>password</th>";
echo "<td>" . $password . "</td>";
echo "</tr>";
echo "</table>";*/

//print_r($result);
if(isset($_GET['q'])){
	if ($result->num_rows == 1) {
		while ($row = $result->fetch_assoc()) {
			echo "<table>";
			echo "<tr>";
			echo "<th>username</th>";
			echo "<td>" . $row['username'] . "</td>";
			echo "<th>email</th>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<th>password</th>";
			echo "<td>" . $row['password'] . "</td>";
			echo "</tr>";
			echo "</table>";
		}
	}
}else{
	echo "no data";
}

?>