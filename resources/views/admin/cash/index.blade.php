@extends('layouts.admin')

@section('css')
        <link rel="stylesheet" href="{{asset('assets/backend/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
@endsection

@section('js')
        <script src="{{asset('assets/backend/assets/vendor/datatables.net/js/jquery.dataTables.js')}}"></script>
        <script src="{{asset('assets/backend/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
        <script src="{{asset('assets/backend/assets/js/components/datatables-init.js')}}"></script>
@endsection

@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data Tables Cash</h5><br>
                <center>
                        <a href="{{ route('cash.create') }}"
                            class="la la-cloud-upload btn btn-info btn-rounded btn-floating btn-outline">&nbsp;Tambah Data
                        </a>
                </center>
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Kode Cash</th>
                                <th>No KTP</th>
                                <th>Kode Mobil</th>
                                <th>Cash Tanggal</th>
                                <th>Cash Bayar</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1;  @endphp
                            @foreach ($cash as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->kode_cash}}</td>
                                <td>{{$data->KTP}}</td>
                                <td>{{$data->moblis_id}}</td>
                                <td>{{$data->cash_tgl}}</td>
                                <td>{{$data->cash_bayar}}</td>
                                
                    
								<td style="text-align: center;">
                                    <form action="{{route('cash.destroy', $data->id)}}" method="post">
                                        {{csrf_field()}}
									<a href="{{route('cash.edit', $data->id)}}"
										class="zmdi zmdi-edit btn btn-warning btn-rounded btn-floating btn-outline"> Edit
                                    </a>
                                    <a href="{{route('cash.show', $data->id)}}"
										class="zmdi zmdi-show btn btn-warning btn-rounded btn-floating btn-outline"> Show
									</a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="hidden" name="_method" value="DELETE">
										<button type="submit" class="zmdi zmdi-delete btn-rounded btn-floating btn btn-dangerbtn btn-danger btn-outline"> Delete</button>
									</form>
								</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</section>
@endsection