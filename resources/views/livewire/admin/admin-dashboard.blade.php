<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="icon-stat">
                    <div class="row">
                        <div class="col-xs-8 text-left">
                            <span class="icon-stat-label">{{ __('admin-dashboard.total_revenue') }}</span>
                            <span class="icon-stat-value">${{ $totalRe }}</span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                        </div>
                    </div>
                    <div class="icon-stat-footer">
                        <i class="fa fa-clock-o"></i> {{ __('admin-dashboard.update') }}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="icon-stat">
                    <div class="row">
                        <div class="col-xs-8 text-left">
                            <span class="icon-stat-label">{{ __('admin-dashboard.total_sales') }}</span>
                            <span class="icon-stat-value">{{ $totalSale }}</span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                        </div>
                    </div>
                    <div class="icon-stat-footer">
                        <i class="fa fa-clock-o"></i> {{ __('admin-dashboard.update') }}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="icon-stat">
                    <div class="row">
                        <div class="col-xs-8 text-left">
                            <span class="icon-stat-label">{{ __('admin-dashboard.today_revenue') }}</span>
                            <span class="icon-stat-value">${{ $todayRe }}</span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                        </div>
                    </div>
                    <div class="icon-stat-footer">
                        <i class="fa fa-clock-o"></i> {{ __('admin-dashboard.update') }}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="icon-stat">
                    <div class="row">
                        <div class="col-xs-8 text-left">
                            <span class="icon-stat-label">{{ __('admin-dashboard.today_sales') }}</span>
                            <span class="icon-stat-value">{{ $todaySale }}</span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                        </div>
                    </div>
                    <div class="icon-stat-footer">
                        <i class="fa fa-clock-o"></i> {{ __('admin-dashboard.update') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
