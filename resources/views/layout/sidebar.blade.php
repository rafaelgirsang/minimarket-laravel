<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
        data-kt-scroll-activate="true" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
        data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
        <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
            data-kt-menu-expand="false">
            {{-- <div class="menu-item">
                <a class="menu-link " href="{{ route('dashboard') }}">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-element-11 fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </div> --}}

            @auth

                @if (auth()->user()->role_id == 1)
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion show">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">User</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link " href="{{ url('/user') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Nama User</span>
                                </a>
                            </div>
                        </div>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link " href="{{ url('/userRole') }}"">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Role</span>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion show">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">Produk</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link " href="{{ route('produk') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Nama Produk</span>
                                </a>
                            </div>
                        </div>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link " href="{{ route('kategori') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Kategori</span>
                                </a>
                            </div>
                        </div>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link " href="{{ route('supplier') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Supplier Produk</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion show">

                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">Transaksi</span>
                            <span class="menu-arrow"></span>
                        </span>


                        <div class="menu-sub menu-sub-accordion show">
                            <div class="menu-item">
                                <a class="menu-link " href="{{ route('transaksi') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Penjualan</span>
                                </a>
                            </div>
                        </div>

                        <div class="menu-sub menu-sub-accordion ">
                            <div class="menu-item">
                                <a class="menu-link " href="{{ url('laporan/pembelian') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Pembelian</span>
                                </a>
                            </div>
                        </div>

                        <div class="menu-sub menu-sub-accordion ">
                            <div class="menu-item">
                                <a class="menu-link " href="{{ url('laporan/pendapatan') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Pendapatan</span>
                                </a>
                            </div>
                        </div>

                    </div>
                @elseif(roleId() == 2)
                    <div class="menu-item">
                        <a class="menu-link " href="{{ url('/cabang') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">Cabang</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link " href="{{ url('/user') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">User</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link " href="{{ url('/userRole') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">User Role</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link " href="{{ url('/customer') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">Customer</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link " href="{{ url('/jasa') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">Jasa</span>
                        </a>
                    </div>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">

                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">Transaksi</span>
                            <span class="menu-arrow"></span>
                        </span>


                        <div class="menu-sub menu-sub-accordion">

                            <div class="menu-item">

                                <a class="menu-link" href="{{ route('transaksi') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Aktif</span>
                                </a>

                            </div>
                            <div class="menu-item">

                                <a class="menu-link" href="{{ route('transaksi-done') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Packing</span>
                                </a>

                            </div>
                            <div class="menu-item">

                                <a class="menu-link" href="{{ route('transaksi-history') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Sudah Diambil</span>
                                </a>

                            </div>

                            <div class="menu-item">

                                <a class="menu-link" href="{{ route('transaksi-all') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Semua</span>
                                </a>

                            </div>


                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <div class="menu-item">
                        <a class="menu-link " href="{{ route('transaksi-status') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">Transaksi Status</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link " href="{{ route('metode-pembayaran') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">Metode Pembayaran</span>
                        </a>
                    </div>
                @elseif(roleId() == 3)
                    <div class="menu-item">
                        <a class="menu-link " href="{{ url('/customer') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">Customer</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link " href="{{ url('/jasa') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">Jasa</span>
                        </a>
                    </div>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">

                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">Transaksi</span>
                            <span class="menu-arrow"></span>
                        </span>


                        <div class="menu-sub menu-sub-accordion">

                            <div class="menu-item">

                                <a class="menu-link" href="{{ route('transaksi') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Aktif</span>
                                </a>

                            </div>
                            <div class="menu-item">

                                <a class="menu-link" href="{{ route('transaksi-done') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Packing</span>
                                </a>

                            </div>
                            <div class="menu-item">

                                <a class="menu-link" href="{{ route('transaksi-history') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Sudah Diambil</span>
                                </a>

                            </div>

                            <div class="menu-item">

                                <a class="menu-link" href="{{ route('transaksi-all') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Semua</span>
                                </a>

                            </div>


                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <div class="menu-item">
                        <a class="menu-link " href="{{ url('/penjualan') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">Pembelian</span>
                        </a>
                    </div>
                @endif

            @endauth





        </div>

    </div>

</div>
