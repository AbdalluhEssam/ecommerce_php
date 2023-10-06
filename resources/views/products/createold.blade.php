<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Create Page</h1>

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf()
        @method("POST")
        <p>name : <input type="text" name="name"></p>
        <p>price : <input type="text" name="price"> </p>
        <p>count stock : <input type="text" name="count_in_stock"></p>
        <p>Category Id :
            <select name="category_id">
                <option disabled selected>Choose Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </p>
        <p>Brand Id :
            <select name="barnd_id">
                <option disabled selected>Choose Brand</option>
                @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </p>
        <p>description : </p><textarea name="description" id="" cols="40" rows="5"></textarea><br>
        <img id="image-preview" height="150">
        <p>Image :<input type="file" name="image" onchange="updatePreview(this, 'image-preview')"> </p>
        <input type="submit" value="save">
        <form>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
            <script type="text/javascript">
            function updatePreview(input, target) {
                let file = input.files[0];
                let reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function() {
                    let img = document.getElementById(target);
                    // can also use "this.result"
                    img.src = reader.result;
                }
            }
            </script>
</body>

</html>