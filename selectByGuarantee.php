<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>By processor</title>
</head>
<body>
    <table border="1">
        <?php

use function MongoDB\is_string_array;
            $Table = "<tr><td>Inventory number</td><td>Year</td><td>Guarantee</td><td>Processor</td><td>Memory</td><td>HDD</td><td>PO</td></tr>";
            $current_date = intval(date('Y'));
            $year = gettype($current_date);
            include "connection.php";
            $find = $tbl->find(["Guarantee" => ['$lt' => $current_date]],["projection" => ["_id" => 0]]);
            foreach($find as $result)
            {
                $Table = $Table."<tr>";
                foreach($result as $coll)
                {
                    if(is_object($coll))
                    {
                        $Table = $Table."<td>";
                        foreach($coll as $po)
                        {
                            $Table = $Table."$po || ";
                        }
                        $Table = $Table."</td>";
                        break;
                    }
                    $Table = $Table."<td> $coll </td>";
                }
                $Table = $Table."</tr>";
            }
            print $Table;
            print "<script>localStorage.setItem('Year','$Table')</script>";
        ?>
    </table>
</body>
</html>