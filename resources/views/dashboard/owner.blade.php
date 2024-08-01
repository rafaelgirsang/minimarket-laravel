@extends('layout.app')
@section('content')

			<a href="{{ route('create-transaksi') }}" class="btn btn-light bg-white   hover-elevate-up w-90px  h-60px m-3" style="box-shadow: 1px 2px 5px 0px;padding: 9px 0px 6px 0px">
			<span><i class="bi bi-cart-plus fs-1 text-info"></i> </span><br>
			<h6 class=" text-center text-gray-700 fs-9" style="font-weight: 400;">Tambah <br> Cucian</h6>
			</a>
			<a href="{{ route('transaksi') }}" class="btn btn-light bg-white  hover-elevate-up w-90px  h-60px m-3" style="box-shadow: 1px 2px 5px 0px;padding: 9px 0px 6px 0px">
			<span><i class=" bi bi-list-task fs-1 text-info"></i> </span><br>
			<h6 class=" text-center text-gray-700 fs-9" style="font-weight: 400;">Cucian <br> Aktif</h6>
			</a>

		<a href="{{ route('transaksi-done') }}" class="btn btn-light bg-white  hover-elevate-up h-60px w-90px m-3" style="box-shadow: 1px 2px 5px 0px;padding: 9px 0px 5px 0px">
			<span><i class="bi bi-list-check fs-1 text-info"></i></span><br>
	 	<h6 class=" text-center text-gray-700 fs-9" style="font-weight: 400;">Cucian <br>Dipacking</h6>

			</a>

			<a href="{{ route('transaksi-history') }}" class="btn btn-light bg-white  hover-elevate-up h-60px w-90px m-3" style="box-shadow: 1px 2px 5px 0px;padding: 9px 0px 5px 0px">
			<span><i class="bi bi-list-check fs-1 text-info"></i></span><br>
	 	<h6 class=" text-center text-gray-700 fs-9" style="font-weight: 400;">Cucian <br>Diambil</h6>

			</a>

			</a>
				<a href="{{  route('transaksi-all') }}" class="btn btn-light bg-white  hover-elevate-up h-60px w-90px m-3" style="box-shadow: 1px 2px 5px 0px;padding: 9px 0px 5px 0px">
				<span><i class="bi bi-list-columns fs-1 text-info"></i></span><br>
			<h6 class=" text-center text-gray-700 fs-9" style="font-weight: 400;">Semua<br> Cucian</h6>

			</a>

			</a>
				<a href="{{ route('scanner-proses') }}" class="btn btn-light bg-white  hover-elevate-up h-60px w-90px m-3 text-center" style="box-shadow: 1px 2px 5px 0px; padding: 9px 0px 5px 0px">
				<span><i class="bi bi-upc-scan fs-1 text-info"></i></span><br>
				<h6 class=" text-center text-gray-700 fs-9" style="font-weight: 400;">Scanner <br>Proses</h6>
				

			</a></a>
				<a href="{{ route('scanner-pengambilan') }}" class="btn btn-light bg-white  hover-elevate-up h-60px w-90px m-3 text-center" style="box-shadow: 1px 2px 5px 0px; padding: 9px 0px 5px 0px">
				<span><i class="bi bi-qr-code-scan fs-1 text-info"></i></span><br>
				<h6 class=" text-center text-gray-700 fs-9" style="font-weight: 400;">Scanner <br>Pengambilan</h6>
				

			</a>

			</a>
		   </a>
				<a href="{{ route('customer') }}" class="btn btn-light bg-white  hover-elevate-up h-60px w-90px m-3 text-center" style="box-shadow: 1px 2px 5px 0px; padding: 9px 0px 5px 0px">
				<span><i class="bi bi-people fs-1 text-info"></i></span><br>
				<h6 class=" text-center text-gray-700 fs-9" style="font-weight: 400;">Data <br>Customer</h6>
				

			</a>
			</a>
				<a href="{{ route('jasa') }}" class="btn btn-light bg-white  hover-elevate-up h-60px w-90px m-3 text-center" style="box-shadow: 1px 2px 5px 0px; padding: 9px 0px 5px 0px">
				<span><i class="bi bi-database-gear  fs-1 text-info"></i></span><br>
				<h6 class=" text-center text-gray-700 fs-9" style="font-weight: 400;">Jasa <br>Laundry</h6>
				

			</a>
				
@endsection()