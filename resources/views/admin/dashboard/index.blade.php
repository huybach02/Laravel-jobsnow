@extends('admin.layouts.master')

@section('content')
    <div class="block-header">
        <h2 class="d-flex align-items-center"><i class="zmdi zmdi-toys zmdi-hc-spin mr-2" style="font-size: 24px"></i>
            Thống Kê</h2>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ul>
    </div>
    <div class="row clearfix">
        <div class="col-lg-5 col-md-12 col-sm-12">
            <div class="row clearfix top-report">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <h3 class="m-t-0">50.5 Gb</h3>
                            <p class="text-muted">Traffic this month</p>
                            <div class="progress">
                                <div class="progress-bar l-green" role="progressbar" aria-valuenow="68" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 68%;"></div>
                            </div>
                            <small>4% higher than last month</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <h3 class="m-t-0">$ 14,500</h3>
                            <p class="text-muted">Total Sale</p>
                            <div class="progress">
                                <div class="progress-bar l-amber" role="progressbar" aria-valuenow="68" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 68%;"></div>
                            </div>
                            <small>15% higher than last month</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="sparkline" data-type="bar" data-width="97%" data-height="77px" data-bar-Width="5"
                                data-bar-Spacing="4" data-bar-Color="rgb(69, 127, 202)">
                                6,7,8,6,7,5,8,5,7,6,8,7,6,7,5,6</div>
                            <p class="m-b-0 p-t-10 text-center">Server Uptime 95.5%</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="sparkline" data-type="bar" data-width="97%" data-height="77px" data-bar-Width="5"
                                data-bar-Spacing="4" data-bar-Color="rgb(120, 184, 62)">
                                4,2,8,6,7,6,8,3,5,8,5,6,2,8,6,7,6 </div>
                            <p class="m-b-0 p-t-10 text-center">Visitors 2,105</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card email-state">
                        <div class="header">
                            <h2>Emails Sent</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                        data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i
                                            class="zmdi zmdi-more-vert"></i></a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-7 col-sm-6  text-center">
                                    <input type="text" class="knob" value="93" data-width="110" data-height="110"
                                        data-thickness="0.1" data-fgColor="#f0ad4e" readonly>
                                </div>
                                <div class="col-md-5 col-sm-6  text-center">
                                    <p><i class="zmdi zmdi-circle text-warning"></i> 215 Read</p>
                                    <p><i class="zmdi zmdi-circle col-blue-grey"></i> 34 Unread</p>
                                    <hr>
                                    <small>810 Sent Email in Total</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-md-12 col-sm-12 ">
            <div class="card product-report">
                <div class="header">
                    <h2>Product Report</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                role="button" aria-haspopup="true" aria-expanded="false"> <i
                                    class="zmdi zmdi-more-vert"></i> </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="row clearfix m-b-25">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="icon"><i class="zmdi zmdi-chart-donut"></i></div>
                            <div class="col-in">
                                <h3 class="counter m-b-0">$4516</h3>
                                <small class="text-muted m-t-0">Sales Report</small>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="icon"><i class="zmdi zmdi-chart"></i></div>
                            <div class="col-in">
                                <h3 class="counter m-b-0">$6481</h3>
                                <small class="text-muted m-t-0">Annual Revenue </small>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="icon"><i class="zmdi zmdi-card"></i></div>
                            <div class="col-in">
                                <h3 class="counter m-b-0">$3915</h3>
                                <small class="text-muted m-t-0">Monthly Revenue</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
