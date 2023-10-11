@extends('layouts.app')

@section('content')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            <!-- Menu -->

            @include('layouts.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="container-fluid">
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>
                            </a>
                        </div>

                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                            <!-- Search -->
                            <div class="navbar-nav align-items-center">
                                <div class="nav-item navbar-search-wrapper mb-0">
                                    <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
                                        <i class="bx bx-search-alt bx-sm"></i>
                                        <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
                                    </a>
                                </div>
                            </div>
                            <!-- /Search -->

                            @include('layouts.headbar')


                        </div>

                        <!-- Search Small Screens -->
                        <div class="navbar-search-wrapper search-input-wrapper  d-none">
                            <input type="text" class="form-control search-input container-fluid border-0"
                                placeholder="Search..." aria-label="Search..." />
                            <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
                        </div>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">




                            <!-- Statistics cards & Revenue Growth Chart -->
                            <div class="col-lg-12 col-12">
                                <div class="row">
                                    <!-- Statistics Cards -->
                                    <div class="col-6 col-md-6 col-lg-6 mb-4">
                                        <div class="card h-100">
                                            <div class="card-body text-center">
                                                <div class="avatar mx-auto mb-2">
                                                    <span class="avatar-initial rounded-circle bg-label-success"><i
                                                            class="tf-icons bx bx-basket fs-4"></i></span>
                                                </div>
                                                <span class="d-block text-nowrap">Total Semua Bahan</span>
                                                <h2 class="mb-0">{{ $seluruh_bahan }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-lg-6 mb-4">
                                        <div class="card h-100">
                                            <div class="card-body text-center">
                                                <div class="avatar mx-auto mb-2">
                                                    <span class="avatar-initial rounded-circle bg-label-success"><i
                                                            class="tf-icons bx bx-basket fs-4"></i></span>
                                                </div>
                                                <span class="d-block text-nowrap">Total Bahan Tersedia</span>
                                                <h2 class="mb-0">{{ $bahan_akitf }}</h2>
                                            </div>
                                        </div>
                                    </div>




                                    <!--/ Statistics Cards -->

                                </div>
                            </div>
                            <!--/ Statistics cards & Revenue Growth Chart -->


                            @if (Auth::user()->role != 'kasir')
                                <!-- Latest Update -->
                                <div class="col-md-6 col-lg-6 col-xl-4 col-xl-4 mb-4">
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center justify-content-between mb-3">
                                            <h5 class="card-title mb-0">
                                                Update Terbaru Penggunaan Bahan
                                            </h5>

                                        </div>
                                        <div class="card-body overflow-auto" style="max-height: 300px;">
                                            <ul class="p-0 m-0">

                                                @foreach ($penggunaan_terakhir as $item)
                                                    <li class="d-flex mb-4">
                                                        <div class="avatar avatar-sm flex-shrink-0 me-3">
                                                            <span class="avatar-initial rounded-circle bg-label-primary">
                                                                <img src="{{ asset('assets/img/bahan/' . $item->gambar_bahan) }}"
                                                                    alt="" style="border-radius: 100%">
                                                            </span>
                                                        </div>
                                                        <div
                                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                            <div class="me-2">
                                                                <p class="mb-0 lh-1">
                                                                    {{ $item->nama_bahan }}
                                                                </p>

                                                                @if ($item->status == 0)
                                                                    <small class="text-danger">Pemakaiian</small>
                                                                @else
                                                                    <small class="text-success">Penambahan</small>
                                                                @endif



                                                                <small class="text-muted">({{ $item->created_at }})</small>
                                                            </div>
                                                            <div class="item-progress">
                                                                {{ $item->stok_berubah }} {{ $item->satuan_bahan }} &nbsp;

                                                                @if ($item->status == 0)
                                                                    <i class='bx bx-trending-down' style='color: red'></i>
                                                                @else
                                                                    <i class='bx bx-trending-up' style='color: green'></i>
                                                                @endif



                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach





                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Latest Update -->
                            @endif










                        </div>
                    </div>
                    <!-- / Content -->

                    @include('layouts.footer')

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->
@endsection

@section('addScript')
    <!-- Vendors JS -->
    <script src="{{ asset('/') }}assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <!-- Page JS -->
    <script src="{{ asset('/') }}assets/js/dashboards-ecommerce.js"></script>
@endsection
