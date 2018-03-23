@if ((empty(Auth::user()->id))&&(empty(Auth::guard('admin')->user()->id)))

  <meta http-equiv="refresh" content="0; url=/login">

@else

  @extends('layouts.auth'))

  @section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Detail Kontrak</h2>
    <a href="{{ route('kontrak.create') }}" class="btn btn-primary">Tambah kontrak</a>
    <a href="{{ route('kontrak.edit', [$datas[0]->id]) }}" class="btn btn-warning">Edit kontrak</a>
    <button type="button" name="button" onclick="history.back()" class="btn btn-danger">Kembali</button>
    <br><br>
      <table class="table table-striped">
        @foreach($datas as $data)
        <tr>
          <th width="20%">Nomor kontrak</th>
          <td>{{$data->nomor_kontrak}}</td>
        </tr>
        <tr>
          <th>Nama pekerjaan</th>
          <td>{{$data->nama_pekerjaan}}</td>
        </tr>
        <tr>
          <th>Nama pelaksana</th>
          <td>{{$data->nama_pelaksana}}</td>
        </tr>
        <tr>
          <th>Nilai kerja</th>
          <td>Rp {{$data->nilai_kerja}}</td>
        </tr>
        <tr>
          <th>Tipe</th>
          <td>{{$data->tipe}}</td>
        </tr>
        <tr>
          <th>Tahap bayar</th>
          <td>{{$data->tahap_bayar}}</td>
        </tr>
        <tr>
          <th>Tanggal kontrak</th>
          <td>{{$data->tgl_kontrak}}</td>
        </tr>
        <tr>
          <th>Tanggal mulai</th>
          <td>{{$data->tgl_mulai}}</td>
        </tr>
        <tr>
          <th>Tanggal selesai</th>
          <td>{{$data->tgl_selesai}}</td>
        </tr>
        <?php
        if (empty($data->user->name)) {
          $user_name = '-';
          $admin_name = $data->admin->name;
        }
        else {
          $admin_name = '-';
          $user_name = $data->user->name;
        }
        ?>
        <tr>
          <th>Terakhir dibuat/ubah</th>
          <td>Pegawai(<b>{{$user_name}}</b>) | Admin(<b>{{$admin_name}}</b>)</td>
        </tr>
        <tr>
          <th>Tanggal dibuat</th>
          <td>{{$data->created_at}}</td>
        </tr>
        <tr>
          <th>Tanggal diubah</th>
          <td>{{$data->updated_at}}</td>
        </tr>
        @endforeach
      </table>
  </div>
  @endsection

@endif
