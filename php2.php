<!DOCTYPE html>
<html>
<head>
    <title>Custom Multiplication Table</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<form method="post" action="">
    <label for="columns">Enter Number of Columns:</label>
    <input type="number" id="columns" name="columns" min="1" required><br><br>

    <label for="rows">Enter Number of Rows:</label>
    <input type="number" id="rows" name="rows" min="1" required><br><br>


    <input type="submit" value="Generate Table">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rows = intval($_POST["rows"]);
    $columns = intval($_POST["columns"]);

    echo "<h2>Multiplication Table ($columns x $rows)</h2>";
    echo "<table>";

    
    echo "<tr><th></th>";  
    for ($j = 1; $j <= $columns; $j++) {
        echo "<th>$j</th>";  
    }
    echo "</tr>";

   
    for ($i = 1; $i <= $rows; $i++) {
        echo "<tr><th>$i</th>";  
        for ($j = 1; $j <= $columns; $j++) {
            echo "<td>" . ($i * $j) . "</td>";  
        }
        echo "</tr>";
    }

    echo "</table>";
}
?>

</body>
</html>
