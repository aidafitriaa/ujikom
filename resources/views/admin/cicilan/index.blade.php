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
                <h5 class="card-header">Data Tables Cicilan</h5><br>
                <center>
                        <a href="{{ route('cicilan.create') }}"
                            class="la la-cloud-upload btn btn-info btn-rounded btn-floating btn-outline">&nbsp;Tambah Data
                        </a>
                </center>
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Kode Cicilan</th>
                                <th>Kode Kredit</th>
                                <th>Tanggal Cicilan</th>
                                <th>Jumlah Cicilan</th>
                                <th>Cician Ke</th>
                                <th>Cician Sisa Ke</th>
                                <th>Cicilan Sisa Harga</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                                @php $no = 1;  @endphp
                            @foreach ($cicilan as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->kode_cicilan}}</td>
                                <td>{{$data->kode_kredit}}</td>
                                <td>{{$data->tgl_cicilan}}</td>
                                <td>{{$data->jumlah_cicilan}}</td>
                                <td>{{$data->cicilan_ke}}</td>
                                <td>{{$data->cicilan_sisa_ke}}</td>
                                <td>{{$data->cicilan_harga_ke}}</td>
                               
								<td style="text-align: center;">
                                    <form action="{{route('cicilan.destroy', $data->id)}}" method="post">
                                        {{csrf_field()}}
									<a href="{{route('cicilan.edit', $data->id)}}"
										class="zmdi zmdi-edit btn btn-warning btn-rounded btn-floating btn-outline"> Edit
                                    </a>
                                    <a href="{{route('cicilan.show', $data->id)}}"
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