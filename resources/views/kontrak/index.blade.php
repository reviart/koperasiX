@if ((empty(Auth::user()->id))&&(empty(Auth::guard('admin')->user()->id)))

  <meta http-equiv="refresh" content="0; url=/login">

@else

  @extends('layouts.auth')
  @section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Kontrak</h2>
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

    <a href="{{ route('kontrak.create') }}" class="btn btn-primary">Tambah kontrak</a>
    <a href="{{ route('kontrak.print') }}" class="btn btn-primary" target="_blank">Cetak</a>
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr class="success">
            <th>No</th>
            <th>Nomor kontrak</th>
            <th>Nama pekerjaan</th>
            <th>Nama pelaksana</th>
            <th>Tanggal input</th>
            <th colspan="3">Aksi</th>
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
            <td>{{$data->nama_pekerjaan}}</td>
            <td>{{$data->nama_pelaksana}}</td>
            <td>{{$data->created_at}}</td>
            <td width="5%"><a href="{{ route('kontrak.detail', [$data->id]) }}" class="btn btn-primary">Detail</a></td>
            <td width="5%"><a href="{{ route('kontrak.edit', [$data->id]) }}" class="btn btn-warning">Edit</a></td>
            <td width="5%">
              <form class="" action="{{ route('kontrak.destroy', [$data->id]) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" name="button" onclick="return confirm('Apakah yakin menghapus kontrak {{$data->nomor_kontrak}} ?')" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endsection

@endif
