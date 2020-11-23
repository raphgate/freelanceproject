<?php
include_once '../../auth/dbc.php';
require "../../auth/access_levels.php";
if (isset($_POST["query"])) {
$search=mysqli_real_escape_string($_POST['query']);
$searchQuery=mysqli_query($con, "SELECT * FROM projects WHERE skillRequired LIKE '%search%' ");

}
?>