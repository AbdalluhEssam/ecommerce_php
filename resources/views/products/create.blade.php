<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Create Page</h1>

    <form action="/products" method="post">
        @csrf()
        <input type="text" name="name">
        <input type="submit" value="save">
    <form>
</body>

</html>