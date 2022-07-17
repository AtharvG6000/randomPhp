<?php

$con = mysqli_connect("localhost" , "root" , "" , "first_db");

 
?>
<html>
<style>
    table , td , tr{
        border: 2px solid black;
        border-collapse: collapse;
    }
    </style>
<body>

<!-- ACCEPT INPUT -->

<form method="post">

 Roll No:<input type="number" name="_num">
 <br>
 Name:<input type="text" name="name">
 <br>
 Division:<input type="text" name="div">
 <br>
 Year : <input type="text" name="_year">
 <br>
 Department:<input type="text" name="_dept">
 <br>
 Address:<textarea name="address"></textarea>
 <br>
 <input type="submit" name="btn-save">
 <input type="submit" name="reset_btn" value="Clear Table">

</form>
<!-- TRUNCATE THE TABLE -->
<?php

if(isset($_POST['reset_btn']))
{
    mysqli_query($con , "TRUNCATE TABLE stud_records" );
    echo "TABLE TRUNCATED";
}

?>

<!-- INSERT DATA INTO DB -->
<?php
$_rollNo = $_POST["_num"];
$_name = $_POST["name"];
$_div = $_POST["div"];
$_year = $_POST["_year"];
$_dept = $_POST["_dept"];
$_add = $_POST["address"];

mysqli_query( $con , " INSERT INTO `stud_records`( `roll_no`, `name`, `address`, `year`, `dept`, `divi`) 
VALUES ('$_rollNo',' $_name ',' $_add ','$_year',' $_dept ',' $_div') ");


?>
<!-- DISPLAY DATA -->
<table align=center >
    <tr>
        <th>ID</th>
        <th>Roll No</th>
        <th>Name</th>
        <th>Address</th>
        <th>Year</th>
        <th>Dept</th>
        <th>Div</th>
        
    </tr>
<?php
$sql = mysqli_query( $con , "select * from stud_records");
while($result = mysqli_fetch_array($sql)) {
    echo "<tr>";

    echo "<td>". $result["id"] ."</td>";
    echo "<td>". $result["roll_no"] ."</td>";

    echo "<td>". $result["name"] ."</td>";
    echo "<td>". $result["address"] ."</td>";

    echo "<td>". $result["year"] ."</td>";

    echo "<td>". $result["year"] ."</td>";

    echo "<td>". $result["divi"] ."</td>";

    echo "</tr>";
    echo "<br>";
}

?>
</table>

</body>
</html>