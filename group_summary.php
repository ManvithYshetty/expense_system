<?php
include 'db_connection.php'; // Make sure this file connects to your MySQL database

$sql = "SELECT g.group_name AS groupName, SUM(e.amount) AS totalAmount
        FROM Expenses e
        JOIN Groups g ON e.group_id = g.group_id
        GROUP BY g.group_name";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Group Summary</title>
    <link rel="stylesheet" href="group_summary.css"> <!-- Optional CSS -->
</head>
<style>
    a {
    text-decoration: none;
    color: #00bfff;
    font-weight: bold;
    position: absolute;
    top: 20px;
    left: 30px;
}
    </style>
<body>
<a href="dashboard.html">⬅ Back to Dashboard</a>
    <h1>📊 Group-Wise Expense Summary</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Group Name</th>
            <th>Total Expense</th>
        </tr>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['groupName']) . "</td>
                        <td>₹" . number_format($row['totalAmount'], 2) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No expenses found</td></tr>";
        }
        ?>
    </table>

  
</body>
</html>
