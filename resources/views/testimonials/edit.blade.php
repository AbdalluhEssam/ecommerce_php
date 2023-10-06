<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>
    <h1>Edit Page</h1>

    <form action='{{ route("testimonials.update", $testimonials->id)}}' method="post" enctype="multipart/form-data">
        @csrf()
        @method("PUT")
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="name" placeholder="Name" @error('name') is-invalid
                    @enderror>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">jop_title</label>
            <div class="col-sm-9">
                <input type="jop_title" class="form-control" name="jop_title" placeholder="jop_title"
                    @error('jop_title') is-invalid @enderror>
                @error('jop_title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">description</label>
            <div class="col-sm-9">
                <input type="description" class="form-control" name="description" placeholder="description"
                    @error('description') is-invalid @enderror>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>



        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Profile Pic</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" name="image" @error('image') is-invalid @enderror>
            </div>
            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="row mb-3">
    </form>


    <h1>Delete</h1>

    <form action="/products/<?= $products->id ?>" method="post">
        @csrf()
        @method("DELETE")
        <input type="submit" value="delete">
    </form>
</body>

</html>