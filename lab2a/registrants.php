<?php
$file = fopen("registrations.csv", "r");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrants</title>
    <style>
        table{
            border-collapse: collapse;
            width:100%;
        }
        th,td{
            border:1px solid black;
            padding:8px;
            text-align:left;
        }
        th{
            background:#f2f2f2;
        }
    </style>
</head>
<body>

<h2>Registrants</h2>

<table>
<tr>
    <th>Complete Name</th>
    <th>Birthday</th>
    <th>Age</th>
    <th>Contact Number</th>
    <th>Sex</th>
    <th>Program</th>
    <th>Complete Address</th>
    <th>Email Address</th>
</tr>

<?php
while (($row = fgetcsv($file)) !== false) {
    echo "<tr>";
    foreach ($row as $cell) {
        echo "<td>" . htmlspecialchars($cell) . "</td>";
    }
    echo "</tr>";
}
fclose($file);
?>

</table>

</body>
</html>
