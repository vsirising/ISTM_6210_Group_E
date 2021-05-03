<?php
require 'config.php';
$id = $_GET['id'];
$sql = 'DELETE FROM account WHERE AccountID=:id';
$statement = $db->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: editstudent.php");
}