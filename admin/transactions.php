<?php
include '../database/db_connect.php';

$stmtTransaction = $pdo->prepare("SELECT * FROM transactions");
$stmtTransaction->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TRANSACTIONS</title>

	<?php include './view/bootstrap.php' ?>
</head>

<body>
	<?php include './view/navbar.php' ?>
	<?php include './view/sidebar.php' ?>

	<div class="container-fluid mt-5">
		<div class="container">
			<div class="mb-3">
				<button class="btn btn-primary fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#addTransactionList">
					Add Transaction List
				</button>

				<form action="./php/transaction_create.php" method="post" class="add">
					<div class="modal fade" id="addTransactionList">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Create Transaction List</h5>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-12">
											<div class="mb-3 form-group">
												<label for="transactionStatus" class="form-label">Transaction Status</label>
												<select name="transaction_status" id="transactionStatus" class="form-select">
													<option value="queue">Queue</option>
												</select>
											</div>
										</div>
										<div class="col-12">
											<div class="mb-3 form-group">
												<label for="transactionNumber" class="form-label">Transaction Number</label>
												<input type="text" name="transaction_number" id="transactionNumber" class="form-control" placeholder="Enter transaction number">
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary fw-bold" name="create" value="">Create</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Transaction Status</th>
							<th>Transaction Number</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($rowTransaction = $stmtTransaction->fetch()) { ?>
							<tr>
								<td><?php echo $rowTransaction->transaction_status ?></td>
								<td><?php echo $rowTransaction->transaction_number ?></td>
								<td>
									<div class="d-inline-block">
										<form action="./php/transaction_delete.php" method="post">
											<input type="submit" value="Delete" class="btn btn-danger fw-bold" name="delete">
											<input type="hidden" name="deleteId" value="<?php echo $rowTransaction->id ?>">
										</form>
									</div>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>

</html>