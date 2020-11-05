<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Firestore - Products</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>


    <body>
        <div class="container">
            <h2 class="mt-3">
                <strong>Product List</strong> <span class="badge badge-success badge-pill total-product-count"></span>
                <a href="{{ route('products.create') }}" class="btn btn-primary float-right">Create</a>
            </h2>
            <hr>

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Name</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-right">Price</th>
                        <th class="text-center" width="120px">Action</th>
                    </tr>
                </thead>

                @php $sln = 1 @endphp

                <tbody>
                    @foreach(collect($products)->sortBy('id') as $key => $product)
                        <tr>
                            <td>{{ $sln++ }}</td>
                            <td>{{ $product['name'] }}</td>
                            <td class="text-center">{{ $product['quantity'] }}</td>
                            <td class="text-right">{{ number_format($product['price'], 2) }}</td>
                            <td>
                                <div class="btn-group btn-corner">
                                    <a href="{{ route('products.edit', $product['id']) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="#" onclick="delete_item(`{{ route('products.destroy', $product['id']) }}`)"  data-toggle="modal" data-target="#delete-modal" class="ml-2 btn btn-sm btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- delete modal -->

        <!-- The Modal -->
        <div class="modal fade" id="delete-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="" id="deleteItemForm" method="POST">
                        @csrf @method("DELETE")
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Data Delete</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            Are you sure, want to delete this record
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer text-right">
                            <div class="btn-group btn-corner">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script type="text/javascript">
            $('.total-product-count').text('Total: ' + (Number($('tr').length) - 1))

            function delete_item(url) {
                $('#deleteItemForm').attr('action', url)
            }
        </script>
    </body>
</html>
