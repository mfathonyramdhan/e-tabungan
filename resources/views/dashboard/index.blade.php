@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">

    <!-- row -->

    <div class="row">
        <div class="row">
            <div class="col">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-success text-success">
                                <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">Total Saldo Saat Ini</p>

                                <h4 class="mb-0">{{ $formattedTotalSaldoTabungan }}</h4>
                                <!-- <span class="badge badge-success">-3.5%</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-info text-info">
                                <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">Total Tabungan</p>

                                <h4 class="mb-0">{{ $formattedTotalTabungan }}</h4>
                                <!-- <span class="badge badge-success">-3.5%</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-danger text-danger">
                                <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">Total Penarikan</p>

                                <h4 class="mb-0">{{ $formattedTotalPenarikan }}</h4>
                                <!-- <span class="badge badge-success">-3.5%</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="row">


            <div class="col">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-primary text-primary">
                                <!-- <i class="ti-user"></i> -->
                                <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">Total Admin & Supervisor</p>
                                <h4 class="mb-0">{{ $totalAdminSupervisor }}</h4>
                                <!-- <span class="badge badge-primary">+3.5%</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-primary text-primary">
                                <!-- <i class="ti-user"></i> -->
                                <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">Total Siswa</p>
                                <h4 class="mb-0">{{ $totalSiswa }}</h4>
                                <!-- <span class="badge badge-primary">+3.5%</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Grafik 7 Hari Lalu</h4>
                    </div>
                    <div class="card-body">
                        <div id="simple-line-chart" class="ct-chart ct-golden-section chartlist-chart">
                            <div class="chartist-tooltip" style="top: -40.4375px; left: 71.25px;"><span class="chartist-tooltip-value">12</span></div><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;">
                                <g class="ct-grids">
                                    <line x1="50" x2="50" y1="15" y2="184.796875" class="ct-grid ct-horizontal"></line>
                                    <line x1="140.75" x2="140.75" y1="15" y2="184.796875" class="ct-grid ct-horizontal"></line>
                                    <line x1="231.5" x2="231.5" y1="15" y2="184.796875" class="ct-grid ct-horizontal"></line>
                                    <line x1="322.25" x2="322.25" y1="15" y2="184.796875" class="ct-grid ct-horizontal"></line>
                                    <line x1="413" x2="413" y1="15" y2="184.796875" class="ct-grid ct-horizontal"></line>
                                    <line y1="184.796875" y2="184.796875" x1="50" x2="413" class="ct-grid ct-vertical"></line>
                                    <line y1="150.8375" y2="150.8375" x1="50" x2="413" class="ct-grid ct-vertical"></line>
                                    <line y1="116.878125" y2="116.878125" x1="50" x2="413" class="ct-grid ct-vertical"></line>
                                    <line y1="82.91875" y2="82.91875" x1="50" x2="413" class="ct-grid ct-vertical"></line>
                                    <line y1="48.959374999999994" y2="48.959374999999994" x1="50" x2="413" class="ct-grid ct-vertical"></line>
                                    <line y1="15" y2="15" x1="50" x2="413" class="ct-grid ct-vertical"></line>
                                </g>
                                <g>
                                    <g class="ct-series ct-series-a">
                                        <path d="M50,21.792C80.25,35.376,110.5,51.676,140.75,62.543C171,73.41,201.25,89.711,231.5,89.711C261.75,89.711,292,76.127,322.25,76.127C352.5,76.127,382.75,103.294,413,116.878" class="ct-line"></path>
                                        <line x1="50" y1="21.791875000000005" x2="50.01" y2="21.791875000000005" class="ct-point" ct:value="12"></line>
                                        <line x1="140.75" y1="62.543125" x2="140.76" y2="62.543125" class="ct-point" ct:value="9"></line>
                                        <line x1="231.5" y1="89.710625" x2="231.51" y2="89.710625" class="ct-point" ct:value="7"></line>
                                        <line x1="322.25" y1="76.126875" x2="322.26" y2="76.126875" class="ct-point" ct:value="8"></line>
                                        <line x1="413" y1="116.878125" x2="413.01" y2="116.878125" class="ct-point" ct:value="5"></line>
                                    </g>
                                    <g class="ct-series ct-series-b">
                                        <path d="M50,157.629C80.25,162.157,110.5,171.213,140.75,171.213C171,171.213,201.25,150.46,231.5,137.254C261.75,124.047,292,89.711,322.25,89.711C352.5,89.711,382.75,125.934,413,144.046" class="ct-line"></path>
                                        <line x1="50" y1="157.629375" x2="50.01" y2="157.629375" class="ct-point" ct:value="2"></line>
                                        <line x1="140.75" y1="171.213125" x2="140.76" y2="171.213125" class="ct-point" ct:value="1"></line>
                                        <line x1="231.5" y1="137.25375" x2="231.51" y2="137.25375" class="ct-point" ct:value="3.5"></line>
                                        <line x1="322.25" y1="89.710625" x2="322.26" y2="89.710625" class="ct-point" ct:value="7"></line>
                                        <line x1="413" y1="144.045625" x2="413.01" y2="144.045625" class="ct-point" ct:value="3"></line>
                                    </g>
                                    <g class="ct-series ct-series-c">
                                        <path d="M50,171.213C80.25,162.157,110.5,150.083,140.75,144.046C171,138.008,201.25,134.99,231.5,130.462C261.75,125.934,292,121.406,322.25,116.878C352.5,112.35,382.75,107.822,413,103.294" class="ct-line"></path>
                                        <line x1="50" y1="171.213125" x2="50.01" y2="171.213125" class="ct-point" ct:value="1"></line>
                                        <line x1="140.75" y1="144.045625" x2="140.76" y2="144.045625" class="ct-point" ct:value="3"></line>
                                        <line x1="231.5" y1="130.461875" x2="231.51" y2="130.461875" class="ct-point" ct:value="4"></line>
                                        <line x1="322.25" y1="116.878125" x2="322.26" y2="116.878125" class="ct-point" ct:value="5"></line>
                                        <line x1="413" y1="103.294375" x2="413.01" y2="103.294375" class="ct-point" ct:value="6"></line>
                                    </g>
                                </g>
                                <g class="ct-labels">
                                    <foreignObject style="overflow: visible;" x="50" y="189.796875" width="90.75" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 91px; height: 20px;">Mon</span></foreignObject>
                                    <foreignObject style="overflow: visible;" x="140.75" y="189.796875" width="90.75" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 91px; height: 20px;">Tue</span></foreignObject>
                                    <foreignObject style="overflow: visible;" x="231.5" y="189.796875" width="90.75" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 91px; height: 20px;">Wed</span></foreignObject>
                                    <foreignObject style="overflow: visible;" x="322.25" y="189.796875" width="90.75" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 91px; height: 20px;">Thu</span></foreignObject>
                                    <foreignObject style="overflow: visible;" x="413" y="189.796875" width="30" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 30px; height: 20px;">Fri</span></foreignObject>
                                    <foreignObject style="overflow: visible;" x="503.75" y="189.796875" width="30" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 30px; height: 20px;">Sat</span></foreignObject>




                                    <foreignObject style="overflow: visible;" y="150.8375" x="10" height="33.959375" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 34px; width: 30px;">0</span></foreignObject>
                                    <foreignObject style="overflow: visible;" y="116.87812500000001" x="10" height="33.959375" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 34px; width: 30px;">2.5</span></foreignObject>
                                    <foreignObject style="overflow: visible;" y="82.91875" x="10" height="33.959374999999994" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 34px; width: 30px;">5</span></foreignObject>
                                    <foreignObject style="overflow: visible;" y="48.959374999999994" x="10" height="33.95937500000001" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 34px; width: 30px;">7.5</span></foreignObject>
                                    <foreignObject style="overflow: visible;" y="15" x="10" height="33.959374999999994" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 34px; width: 30px;">10</span></foreignObject>
                                    <foreignObject style="overflow: visible;" y="-15" x="10" height="30" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">12.5</span></foreignObject>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Title</h5>
                        <p class="card-text">Content</p>
                    </div>
                </div>
            </div>

        </div> -->


    </div>
</div>
@endsection