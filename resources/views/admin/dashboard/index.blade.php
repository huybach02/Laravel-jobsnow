@extends('admin.layouts.master')

@section('content')
    <div class="block-header">
        <h2 class="d-flex align-items-center"><i class="zmdi zmdi-toys zmdi-hc-spin mr-2" style="font-size: 24px"></i>
            Thống Kê</h2>
        <ul class="breadcrumb">
            <li class="breadcrumb-item active">Thông kê</li>
        </ul>
    </div>
    <div class="row clearfix">
        <div class="col-lg-5 col-md-12 col-sm-12">
            <div class="row clearfix top-report">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card bg-cyan">
                        <div class="body" style="color: #fff">
                            <h3 class="m-t-0" style="font-weight: 600">{{ sprintf('%02d', $jobCount) }}</h3>
                            <p class="text-white">Tin tuyển dụng</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card bg-blue">
                        <div class="body" style="color: #fff">
                            <h3 class="m-t-0" style="font-weight: 600">{{ sprintf('%02d', $companyCount) }}</h3>
                            <p class="text-white">Công ty/doanh nghiệp</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card bg-blush">
                        <div class="body" style="color: #fff">
                            <h3 class="m-t-0" style="font-weight: 600">{{ sprintf('%02d', $candidateCount) }}</h3>
                            <p class="text-white">Ứng viên</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card bg-blue-grey">
                        <div class="body" style="color: #fff">
                            <h3 class="m-t-0" style="font-weight: 600">{{ sprintf('%02d', $jobCategoryCount) }}</h3>
                            <p class="text-white">Danh mục nghề nghiệp</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card bg-brown">
                        <div class="body" style="color: #fff">
                            <h3 class="m-t-0" style="font-weight: 600">{{ sprintf('%02d', $blogCount) }}</h3>
                            <p class="text-white">Tin tức</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card bg-green">
                        <div class="body" style="color: #fff">
                            <h3 class="m-t-0" style="font-weight: 600">{{ formatMoney($todayRevenue) }}</h3>
                            <p class="text-white">Doanh thu ngày hôm nay</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-7 col-md-12 col-sm-12 ">
            <div class="card product-report">
                <div class="header">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <form id="yearForm" class="d-flex align-items-center">
                                <select id="yearSelect" name="year" class="form-control w-75 mr-2">
                                    @foreach (range(date('Y'), date('Y') - 2) as $year)
                                        <option {{ old('year', request('year')) == $year ? 'selected' : '' }}
                                            value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-raised g-bg-blue btn-sm waves-effect"
                                    style="margin-top: 5px">Xác
                                    nhận</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="header">
                    <h2>Biểu đồ thống kê doanh thu hàng tháng</h2>

                </div>

                <div class="body">
                    <!-- Biểu đồ doanh thu -->
                    <div class="col-12">
                        <div class="wsus__dashboard_item">
                            <canvas id="monthlyRevenueChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>

                <div class="header">
                    <h2>Biểu đồ thống kê số tin tuyển dụng hàng tháng</h2>
                </div>
                <div class="body">
                    <div class="col-12">
                        <div class="wsus__dashboard_item">
                            <canvas id="monthlyRevenueChart1" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Biểu đồ doanh thu
            var ctxRevenue = document.getElementById('monthlyRevenueChart').getContext('2d');
            var chartRevenue = new Chart(ctxRevenue, {
                type: 'bar',
                data: {
                    labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7',
                        'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
                    ],
                    datasets: [{
                        label: 'Doanh thu',
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        data: [
                            @foreach (range(1, 12) as $month)
                                {{ $monthlyEarnings[$month] ?? 0 }},
                            @endforeach
                        ],
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                callback: function(value) {
                                    return value.toLocaleString('en-US') + 'đ';
                                }
                            }
                        }]
                    },
                    hover: {
                        animationDuration: 0 // Tắt hiệu ứng zoom khi hover
                    },
                    animation: {
                        duration: 0 // Tắt toàn bộ animation
                    }
                }
            });

            var ctxRevenue = document.getElementById('monthlyRevenueChart1').getContext('2d');
            var chartRevenue = new Chart(ctxRevenue, {
                type: 'bar',
                data: {
                    labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7',
                        'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
                    ],
                    datasets: [{
                        label: 'Tin tuyển dụng',
                        backgroundColor: 'rgba(255, 159, 64, 0.5)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 1,
                        data: [
                            @foreach (range(1, 12) as $month)
                                {{ $monthlyJobCount[$month] ?? 0 }},
                            @endforeach
                        ],
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                callback: function(value) {
                                    return value.toLocaleString('en-US') + 'đ';
                                }
                            }
                        }]
                    },
                    hover: {
                        animationDuration: 0 // Tắt hiệu ứng zoom khi hover
                    },
                    animation: {
                        duration: 0 // Tắt toàn bộ animation
                    }
                }
            });
        });
    </script>
@endpush
