<!DOCTYPE html>
<html>
<style>
table,th,td {
  border : 1px solid black;
  border-collapse: collapse;
}
th,td {
  padding: 5px;
}
</style>
<body>

<h2>The XMLHttpRequest Object</h2>
<!-- <?php /*include './dbquery.php'*/; ?> -->
<form action=""> 
  <select name="customers" onchange="showCustomer(this.value)">
    <option value=" ">Select a customer:</option>
    <option value="hr5">hr5</option>
    <option value="rajheta">rajheta</option>
    <option value="raj">raj</option>
  </select>
</form>
<br>
<div id="txtHint">Customer info will be listed here...</div>

<script>
function showCustomer(str) {
  var xhttp;  
  if (str == "") {
    document.getElementById("txtHint").innerHTML = " ";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "dbquery.php?q="+str, true);
  xhttp.send();
}
</script>
</body>
</html>