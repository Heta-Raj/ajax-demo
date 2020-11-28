<?php
include './db_auth_register_boxed.php';
if(isset($_POST["state_id"])){

    $state_id = $_POST['state_id'];

    $select_sql = "SELECT * FROM states WHERE country_id = $state_id" ;
    $result = $conn->query($select_sql);

    foreach($result as $value){
                echo "<option value=".$value['id'].">". $value['name'] . "</option>";
            }

}
if (isset($_POST['city_id'])) {
    $city_id = $_POST['city_id'];

    $select_city = "SELECT * FROM cities WHERE state_id = '$city_id' ";
    $res = $conn->query($select_city);

    foreach ($res as $value) {
        echo "<option value=".$value['id'].">". $value['name'] . "</option>";

    }
  
}
?>