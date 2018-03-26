@if ((empty(Auth::user()->id))&&(empty(Auth::guard('admin')->user()->id)))

  <meta http-equiv="refresh" content="0; url=/login">

@else

  @extends('layouts.auth')
  @section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Penerimaan</h2>
    @if (session('success'))
        <div class="alert alert-success">
          <center>
            {{ session('success') }}
          </center>
        </div>
    @elseif (session('warning'))
        <div class="alert alert-warning">
          <center>
            {{ session('warning') }}
          </center>
        </div>
    @else
    @endif

    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr class="success">
            <th>No</th>
            <th>Nomor kontrak</th>
            <th>Total biaya</th>
            <th>Tipe</th>
            <th>Tanggal input</th>
            <th colspan="2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0; ?>
          @foreach($datas as $data)
          <?php
            if ($data->tipe == "rutin") {
              $tr = "info";
            }
            else {
              $tr = "warning";
            }
          ?>
          <tr class="{{$tr}}">
            <td>{{$no += 1}}</td>
            <td>{{$data->nomor_kontrak}}</td>
            <td>Rp {{$data->nilai_kerja}},-</td>
            <td>{{$data->tipe}}</td>
            <td>{{$data->created_at}}</td>
            <td width="5%"><a href="{{ route('penerimaan.detail', [$data->id]) }}" class="btn btn-primary">Detail</a></td>
            <td width="5%"><a href="{{ route('penerimaan.create', [$data->id]) }}" class="btn btn-success">Tambah penerimaan</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endsection

@endif
