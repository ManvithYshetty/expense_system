<?php
include 'db_connection.php';

$sql = "SELECT * FROM expenses";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Expenses</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            padding: 40px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 32px;
        }

        table {
            width: 90%;
            max-width: 1000px;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 14px 18px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #007bff;
            color: white;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e8f0fe;
        }

        td {
            color: #333;
        }

        @media screen and (max-width: 768px) {
            table {
                width: 100%;
                font-size: 14px;
            }

            th, td {
                padding: 10px;
            }
        }
        a {
            text-decoration: none;
            color: #00bfff;
            font-weight: bold;
            justify-content: center;
            align-items: center;
            
        }
        .back-link {
    position: absolute;
    top: 20px;
    left: 20px;
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
    background:rgba(239, 235, 235, 0.8);
    padding: 6px 12px;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    transition: background 0.3s ease;
}

.back-link:hover {
    background: #e0eafc;
}

        
    </style>
</head>
<body>

<h2>All Expenses</h2>

<table>
    <tr>
        <th>Expense ID</th>
        <th>Group ID</th>
        <th>Paid By</th>
        <th>Amount</th>
        <th>Description</th>
        <th>Expense Date</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['expense_id']}</td>
                <td>{$row['group_id']}</td>
                <td>{$row['paid_by']}</td>
                <td>₹{$row['amount']}</td>
                <td>{$row['description']}</td>
                <td>{$row['expense_date']}</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No expenses found</td></tr>";
    }

    $conn->close();
    ?>
</table>
<br>
<a class="back-link" href="dashboard.html">⬅ Back to Dashboard</a>
</body>
</html>
