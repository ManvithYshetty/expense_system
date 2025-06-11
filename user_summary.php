<?php
include 'db_connection.php';

$sql = "SELECT u.name, SUM(e.amount) AS total_paid
        FROM users u
        JOIN expenses e ON u.user_id = e.paid_by
        GROUP BY u.user_id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Expense Summary</title>
    <link rel="stylesheet" href="user_summary.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    a{
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

    <header>
        <h1>👤 User Expense Summary</h1>
    </header>

    <main>
        <div class="summary-container">
            <table>
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Total Paid (₹)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['name']}</td>
                                    <td>₹{$row['total_paid']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No data found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
            
        </div>
    </main>

 

</body>
</html>
