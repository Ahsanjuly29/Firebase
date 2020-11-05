
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Firestore - Product Create</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>


    <body>
        <div class="container">
            <h2>Product Create</h2>

            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Given Qnty:</label>
                    <input type="text" class="form-control"  placeholder="givenQnty" name="givenQnty">
                </div>

                <input type="hidden" class="form-control"  placeholder="Product Name" name="img" value="0" />

                <div class="form-group">
                    <label>Opening Qnty:</label>
                    <input type="text" class="form-control"  placeholder="openingQnty" name="openingQnty">
                </div>

                <div class="form-group">
                    <label>Per Qnty:</label>
                    <input type="text" class="form-control"  placeholder="perQnty" name="perQnty">
                </div>

                <div class="form-group">
                    <label>productBuyPrice:</label>
                    <input type="text" class="form-control"  placeholder="productBuyPrice" name="productBuyPrice">
                </div>

                <div class="form-group">
                    <label>Product Name:</label>
                    <input type="text" class="form-control"  placeholder="productName" name="productName">
                </div>


                <div class="form-group">
                    <label>Product Sell Price</label>
                    <input type="text" class="form-control"  placeholder="productSellPrice" name="productSellPrice">
                </div>


                <div class="form-group">
                    <label>Product Code:</label>
                    <input type="text" class="form-control"  placeholder="product_code" name="product_code">
                </div>

                <div class="form-group">
                    <label>Total Price:</label>
                    <input type="text" class="form-control"  placeholder="totalPrice" name="totalPrice">
                </div>

                <div class="form-group">
                    <label>Unit Type:</label>
                    <input type="text" class="form-control"  placeholder="totalPrice" name="unitType">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </body>
</html>
