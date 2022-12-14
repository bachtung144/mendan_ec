<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">Add new product</div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.products') }}" class="btn btn-success pull-right">All Products</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addProduct">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug" />
                                @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Slug</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Slug" class="form-control input-md" wire:model="slug" />
                                @error('slug') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Short description</label>
                            <div class="col-md-4">
                                <textarea type="text" placeholder="Short description" class="form-control input-md" wire:model="short_description"></textarea>
                                @error('short_description') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Description</label>
                            <div class="col-md-4">
                                <textarea type="text" placeholder="Description" class="form-control input-md" wire:model="description"></textarea>
                                @error('description') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Price</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Price" class="form-control input-md" wire:model="price"/>
                                @error('price') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Quantity</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity"/>
                                @error('quantity') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Thumbnail</label>
                            <div class="col-md-4">
                                <input type="file"  class="input-file" wire:model="image">
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" width="120" />
                                @endif
                                @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Gallery</label>
                            <div class="col-md-4">
                                <input type="file" class="input-file" wire:model="galleryImages" multiple>
                                @if ($galleryImages)
                                    @foreach ($galleryImages as $image)
                                        <img src="{{ $image->temporaryUrl() }}" width="120" />
                                    @endforeach
                                @endif
                                @error('galleryImages') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Category</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit"  class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
