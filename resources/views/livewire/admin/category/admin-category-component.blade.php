<div>
    <div class="container admin-table">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>All categories</h5>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addcategory') }}" class="btn btn-success pull-right">Add new category</a>
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
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <a href="{{ route('admin.editcategory', $category->slug) }}">
                                            <i class="fa fa-edit fa-2x"></i>
                                        </a>
                                        <a href="#" wire:click.prevent="deleteCategory({{ $category->id }})">
                                            <i class="fa fa-times fa-2x text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
