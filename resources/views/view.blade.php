<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>

<body>
   <center>
   <table border="1px" style="padding: 2px">
        <tr>
            <td style="padding: 10px; font-size: 30px;" >ID</td>
            <td style="padding: 10px; font-size: 30px;">Name</td>
        </tr>
        <?php
        foreach ($products as $value) {
            echo "<tr>";
            echo "<td style='padding: 10px; font-size: 30px;'>$value->id</td>";
            echo "<td style='padding: 10px; font-size: 30px;'>$value->name</td>";
            echo " </tr>";
        }
        ?>

    </table>
   </center>

</body>

</html>