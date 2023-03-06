<?php
require '../../database/db_connect.php';

if (isset($_POST['delete'])) {
  $deleteId = $_POST['deleteId'];

  $stmtDelete = $pdo->prepare("DELETE FROM transactions WHERE id = ?");
  $stmtDelete->execute([$deleteId]);

  header("Location: ../transactions.php");
}
