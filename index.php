<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function getProcessor() {
            let outValue = document.getElementById('Processor').value;
            let resValue = localStorage.getItem(outValue);
            document.getElementById('Result').innerHTML = resValue;           
        }
        function getSoftware()
        {
            let outValue = document.getElementById('Software').value;
            let resValue = localStorage.getItem(outValue);
            document.getElementById('Result').innerHTML = resValue;
        }
        function getGuarantee()
        {
            let resValue = localStorage.getItem('Year');
            document.getElementById('Result').innerHTML = resValue;
        }
    </script>
</head>
<body>
    <form action="selectByProcessor.php" method="POST">
        <h3>Get computers by processor name</h3>
        Processor name:
        <select name='Processor' id='Processor' onchange onclick="getProcessor()">
            <?php
                include "connection.php";
                $find = $tbl->distinct("Processor");
                foreach($find as $result)
                {
                    print "<option>$result</option>";
                }
            ?>
        </select>
        <input type="submit" value="Send">
    </form>
    <form action="selectBySoftware.php" method="POST">
        <h3>Get computers by installed software</h3>
        Software:
        <select name="Software" id='Software' onchange onclick="getSoftware()">
            <?php
                $find = $tbl->distinct("PO");
                foreach($find as $result)
                {
                    print "<option>$result</option>";
                }
            ?>
        </select>
        <input type="submit" value="Send">
    </form>
    <form action="selectByGuarantee.php" method="POST">
        <h3> Get computers by expired guarantee</h3>
        Current year:
        <?php
            echo $current_date = date('Y');
        ?>
        <input type="submit" value="Send">
        <input type="button" value="Load data" onclick="getGuarantee()">
    </form>
    <table border='1' id='Result'>
    </table>
</body>
</html>