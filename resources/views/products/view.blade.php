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
            <td style="padding: 10px; font-size: 30px;">Details</td>
            <td style="padding: 10px; font-size: 30px;">Edit</td>
        </tr>
        <?php
        foreach ($products as $value) { ?>

<tr>
        <td style='padding: 10px; font-size: 30px;'><?=$value->id?></td>
        <td style='padding: 10px; font-size: 30px;'><?=$value->name?></td>
        <td style='padding: 10px; font-size: 30px;'><a href="/products/<?=$value->id?>">Details</a></td>
        <td style='padding: 10px; font-size: 30px;'><a href="/products/<?=$value->id?>/edit">Edit</a></td>
   </tr>


            <?php } ?>

    </table>
   </center>

</body>

</html>