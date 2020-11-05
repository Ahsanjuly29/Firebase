
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Firestore - Product Edit</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>


    <body>
        <div class="container">
            <h2>Product Edit</h2>

            <form action="{{ route('products.update', $product['id']) }}" method="POST">
                @csrf @method('PUT')

                <div class="form-group">
                    <label>Product Name:</label>
                    <input type="text" class="form-control"  placeholder="Product Name" value="{{ old('name', $product['name']) }}" name="name">
                </div>

                <div class="form-group">
                    <label>Product Quantity:</label>
                    <input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 57" class="form-control" value="{{ old('quantity', $product['quantity']) }}" placeholder="Product Quantity" name="quantity">
                </div>

                <div class="form-group">
                    <label>Product Price:</label>
                    <input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 57" class="form-control" value="{{ old('price', $product['price']) }}" placeholder="Product Price" name="price">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </body>
</html>
