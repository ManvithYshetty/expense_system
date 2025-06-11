<?php
include 'db_connection.php'; // Include your DB connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $group_id = $_POST['group_id'];
    $paid_by = $_POST['paid_by'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $expense_date = $_POST['expense_date'];

    $sql = "INSERT INTO Expenses (group_id, paid_by, amount, description, expense_date) 
            VALUES ('$group_id', '$paid_by', '$amount', '$description', '$expense_date')";

    if ($conn->query($sql) === TRUE) {
        header("Location: view_expenses.php");
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
