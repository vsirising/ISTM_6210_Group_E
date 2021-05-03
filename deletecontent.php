<?php
require 'config.php';
$id = $_GET['id'];
$sql = 'DELETE FROM contents WHERE ContentID=:id';
$statement = $db->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: editcontent.php");
}