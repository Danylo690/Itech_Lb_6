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
        <tr>
            <td>Inventory number</td>
            <td>Year</td>
            <td>Guarantee</td>
            <td>Processor</td>
            <td>Memory</td>
            <td>HDD</td>
            <td>PO</td>
        </tr>
        <?php

use function MongoDB\is_string_array;

            include "connection.php";
            $Processor = $_POST['Processor'];
            $find = $tbl->find(["Processor" => $Processor],["projection" => ["_id" => 0]]);
            foreach($find as $result)
            {
                print "<tr>";
                foreach($result as $coll)
                {
                    if(is_object($coll))
                    {
                        print "<td>";
                        foreach($coll as $po)
                        {
                            print "$po || ";
                        }
                        print "</td>";
                        break;
                    }
                    print "<td> $coll </td>";
                }
                print "</tr>";
            }
        ?>
    </table>
</body>
</html>