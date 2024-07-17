<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<body>

    <div class="container p-2">
        <h5 class="text-center">All Product</h5>
        <a href="{{ url('add-product') }}" class="btn btn-info">Add Product</a>

    </div>
    <table class="table" id="product-data">
        <thead>
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Offer</th>
                <th scope="col">Important Note</th>
                <th scope="col">Product Details </th>
                <th scope="col">File </th>
                <th scope="col">Action </th>
            </tr>
        </thead>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "{{ url('all-product') }}",
                success: function(data) {
                    console.log(data);
                    if (data.product.length > 0) {
                        for (let i = 0; i < data.product.length; i++) {
                            let img = data.product[i]['file'];
                            console.log(img);
                            $("#product-data").append(`<tr>
                           <td>` + (i + 1) + `</td>
                           <td>` + data.product[i]['title'] + `</td>
                           <td>` + data.product[i]['description'] + `</td>
                           <td>` + data.product[i]['price'] + `</td>
                           <td>` + data.product[i]['offer'] + `</td>
                           <td>` + data.product[i]['important_note'] + `</td>
                           <td>` + data.product[i]['product_details'] + `</td>
                           <td>
                        <img src="{{ asset('storage/`+img+`') }}" height="50" width="50" />
                             </td>
                             <td>
                               <div class="btn-group">
                                <a href="editproduct/` + data.product[i]['id'] + `" class='btn btn-success'>edit</a>
                                <a href="#" class="btn btn-danger" data-id="` + data.product[i]['id'] + `">delete</a>
                                </div>
                                <td>
                           </tr>`)
                        }
                    } else {
                        $("#product-data").append(`<tr>
                              <td colspan='9'>Data Not Found </td>
                            <tr>`)
                    }
                },
                error: function(err) {
                    console.log(err.responseText);
                }

            })

            $("#product-data").on("click", ".btn-danger", function() {
                var id = $(this).attr("data-id");
                $.ajax({
                    type: "GET",
                    url: "delete-product/" + id,
                    success: function(data) {
                        alert(data.res);
                        window.location.reload();

                    },
                    error: function(err) {
                        alert(err.responseText);
                    }
                })
            })
        })
    </script>

</body>

</html>
