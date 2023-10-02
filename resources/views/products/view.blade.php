<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titlePage }}</title>
</head>

<body>

    <h1>{{ $titlePage }}</h1>
    <center>
        <table border="1px" style="padding: 2px">
            <tr>
                <td style="padding: 10px; font-size: 30px;">ID</td>
                <td style="padding: 10px; font-size: 30px;">Name</td>
                <td style="padding: 10px; font-size: 30px;">Details</td>
                <td style="padding: 10px; font-size: 30px;">Edit</td>
            </tr>

            @foreach($products as $product)
            <tr>
                <td style='padding: 10px; font-size: 30px;'>{{ $product->id }}</td>
                <td style='padding: 10px; font-size: 30px;'>{{ $product->name }}</td>
                <td style='padding: 10px; font-size: 30px;'><a href="/products/{{ $product->id }}">Details</a></td>
                <td style='padding: 10px; font-size: 30px;'><a href="/products/{{ $product->id }}/edit">Edit</a></td>
            </tr>
            @endforeach
        </table>
    </center>

    @if($pageLoading == "true")
    <p>Likes Are Loading</p>
    @else
    <p>Likes Are not Activeted</p>
    @endif

</body>

</html>