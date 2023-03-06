<?php
require '../../database/db_connect.php';

if (isset($_POST['create'])) {
  $transactionStatus = filter_var($_POST['transaction_status'], FILTER_SANITIZE_SPECIAL_CHARS);
  $transactionNumber = filter_var($_POST['transaction_number'], FILTER_SANITIZE_SPECIAL_CHARS);

  $stmtTransaction = $pdo->prepare("INSERT INTO transactions (transaction_status, transaction_number) VALUES (?,?)");
  $stmtTransaction->execute([$transactionStatus, $transactionNumber]);

  header("Location: ../transactions.php");
}
