<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shoping Assignmet </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <div class="container p-5">
        <h5 class="text-center">Add Prodcut</h5>
        <div class="row">
            <div class="col-8 m-auto">
                <form action="{{ route('store-product') }}" id="form-data" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title">
                    </div>
                    <div class="mb-2">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Description">
                    </div>
                    <div class="mb-2">
                        <label for="">Price</label>
                        <input type="text" class="form-control" name="price" placeholder="Price">
                    </div>

                    <div class="mb-2">
                        <label for="">Available offers</label>
                        <input type="text" class="form-control" name="offer" placeholder="Offer">
                    </div>
                    <div class="mb-2">
                        <label for="">Important Note</label>
                        <input type="text" class="form-control" name="important_note" placeholder="Important Note">
                    </div>
                    <div class="mb-2">
                        <label for="">Product Details</label>
                        <input type="text" class="form-control" name="product_details" placeholder="Product Details">
                    </div>
                    <div class="mb-2">
                        <label for="">Images</label>
                        <input type="file" class="form-control" name="file" placeholder="Product Details">
                    </div>

                    <input type="submit" class="btn btn-success" value="Add product">
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#form-data').submit(function(e) {
                e.preventDefault();
                let formdata = $('#form-data')[0];
                let data = new FormData(formdata);
                // console.log(data);
                $.ajax({
                    type: "POST",
                    url: "{{ route('store-product') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        alert(data.res)
                           window.location.reload();
                         
                    },
                    error: function(e) {
                        alert(e.responseText)
                    }
                })
            })
        });
    </script>
</body>


</html>
