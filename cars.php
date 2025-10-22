<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cars List</title>
    <style>
        
        th, td {
            border: 1px solid #555;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #ddd;
        }
        
    </style>
</head>
<body>
    <?php
    require_once "settings.php";
    $dbconn = @mysqli_connect ($host,$user,$pwd,$sql_db);
     if (!$dbconn) 
        {
            echo "<p>Unable to connect to db</p>";
            //mysqli_close ($dbconn);
        }
    else 
        {
            echo "<p>Connection Successful</p>";

    
        $query = "SELECT * FROM cars";
        $result = mysqli_query($dbconn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>
                    <th>Car ID</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Year of Manufacture</th>
                  </tr>";

            
            while ($row = mysqli_fetch_assoc($result)) 
                {
                    echo "<tr>";
                    echo "<td>" . $row['car_id'] . "</td>";
                    echo "<td>" . $row['make'] . "</td>";
                    echo "<td>" . $row['model'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['yom'] . "</td>";
                    echo "</tr>";
                }


            echo "</table>";
        } 
        else {
            echo "<p>There are no cars to display.</p>";
        }

        // Free result set and close connection
        mysqli_free_result($result);
        mysqli_close($dbconn);
    }
    ?>


    
</body>
</html>