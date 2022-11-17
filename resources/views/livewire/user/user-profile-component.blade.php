<div>
    <div class="container admin-table">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <h5 class="col-md-6">{{ __('user-profile.title') }}</h5>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="editProfile">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">{{ __('user-profile.name') }}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('user-profile.name') }}" class="form-control input-md" wire:model="name"/>
                                    @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">{{ __('user-profile.email') }}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('user-profile.email') }}" class="form-control input-md" wire:model="email"/>
                                    @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('user-profile.edit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>