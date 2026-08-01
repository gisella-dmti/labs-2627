<?php
$file = fopen("registrations.csv", "r");
?>

<table border="1">
<tr>
    <th>Name</th>
    <th>Birthday</th>
    <th>Age</th>
    <th>Contact</th>
    <th>Sex</th>
    <th>Program</th>
    <th>Address</th>
    <th>Email</th>
</tr>

<?php
while (($row = fgetcsv($file)) !== false) {
    echo "<tr>";

    foreach ($row as $cell) {
        echo "<td>$cell</td>";
    }

    echo "</tr>";
}

fclose($file);
?>

</table>
