<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="conteiner">
        <div class = "row mt-5 "style="padding-right: 200px" >
            <div class = "col md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <div style = "float:left;">
                            <h2>Laravel 9 Image Crud</h2>
                        </div>
                        <div style = "float:right;">
                            <a class = "btn btn-dark" href="{{route('add.product')}}">Add New Products</a>
                        </div>
                    </div>
                    <div class = "card-body">
                        @if(Session::has('msg'))
                            <p class = "alert alert-success">{{ Session::get('msg') }}</p>
                            @endif
                        <table class = "table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $key=>$product)
                                    <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img style= "width:150px" src="{{ asset('images/products/'.$product->image) }}"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <a class = "btn btn-warning" href="{{route( 'edit.product',$product->id)}}">Edit</a>
                                        <a class = "btn btn-danger" onclick="return confirm('Are you sure to delete?')" href="{{ route('delete.product',$product->id) }}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>

</body>
</html>
