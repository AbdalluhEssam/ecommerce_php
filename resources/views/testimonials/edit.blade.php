<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>
    <h1>Edit Page</h1>

    <form action="/products/<?= $products->id ?>" method="post">
        @csrf()
        @method("PUT")
        <input type="text" name="name" value="<?= $products->name ?>">
        <input type="submit" value="save">
    </form>


    <h1>Delete</h1>

    <form action="/products/<?= $products->id ?>" method="post">
        @csrf()
        @method("DELETE")
        <input type="submit" value="delete">
    </form>
</body>

</html>