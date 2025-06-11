<?php
include 'db_connection.php';

$sql = "SELECT u1.name AS user1, u2.name AS user2, b.balance
        FROM Balances b
        JOIN Users u1 ON b.user_id_1 = u1.user_id
        JOIN Users u2 ON b.user_id_2 = u2.user_id
        WHERE b.balance != 0";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Balances</title>
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: 'Segoe UI', sans-serif;
            text-align: center;
            padding: 40px;
        }

        h2 {
            margin-bottom: 30px;
            font-size: 30px;
        }

        table {
            margin: auto;
            width: 70%;
            border-collapse: collapse;
            background: #1e1e1e;
            color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            border: 1px solid #333;
        }

        th {
            background-color:#007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #2a2a2a;
        }

        tr:hover {
            background-color: #333333;
        }

        a {
            text-decoration: none;
            color: #00bfff;
            font-weight: bold;
            position: absolute;
            top: 20px;
            left: 30px;
        }
    </style>
</head>
<body>

<a href="dashboard.html">⬅ Back to Dashboard</a>

<h2>Outstanding User Balances</h2>

<table>
    <tr>
        <th>From (Owes)</th>
        <th>To (Gets)</th>
        <th>Amount (₹)</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['user1']}</td>
                    <td>{$row['user2']}</td>
                    <td>₹{$row['balance']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No outstanding balances found</td></tr>";
    }

    $conn->close();
    ?>
</table>

</body>
</html>
