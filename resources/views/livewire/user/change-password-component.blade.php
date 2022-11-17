<div>
    <div class="container admin-table">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <h5 class="col-md-6">{{ __('update-password.title') }}</h5>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="changePass">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">{{ __('update-password.current_pass') }}</label>
                                <div class="col-md-4">
                                    <input type="password" class="form-control input-md" required wire:model="password"/>
                                    @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">{{ __('update-password.new_pass') }}</label>
                                <div class="col-md-4">
                                    <input type="password" class="form-control input-md" required wire:model="newPassword"/>
                                    @error('newPassword') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">{{ __('update-password.confirm_pass') }}</label>
                                <div class="col-md-4">
                                    <input type="password" class="form-control input-md" required wire:model="confirmPassword"/>
                                    @error('confirmPassword') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('update-password.change_pass') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>