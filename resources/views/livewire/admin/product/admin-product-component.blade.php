<div>
    <div class="container pad-cus" >
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Products
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addproduct') }}" class="btn btn-success pull-right">Add new product</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Thumbnail</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td><img src="{{ asset('bower_components/bower_ec/assets/images/products') }}/{{ $product->images->get(0)->name }}" width="60" /></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        <a href="{{route('admin.editproduct', ['product_slug' => $product->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                        <a href="#" class="margin-cus" wire:click.prevent="deleteProduct({{$product->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
