@if ((empty(Auth::user()->id))&&(empty(Auth::guard('admin')->user()->id)))

  <meta http-equiv="refresh" content="0; url=/login">

@else

  @extends('layouts.auth'))

  @section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Detail Biaya</h2>
    <a href="{{ route('biaya.create', [$datas[0]->id]) }}" class="btn btn-primary">Tambah tahap</a>
    <a href="{{ route('biaya.print', [$datas[0]->id]) }}" class="btn btn-primary" target="_blank">Cetak</a>
    <button type="button" name="button" onclick="history.back()" class="btn btn-danger">Kembali</button>
    <br><br>
      <table class="table table-striped">
        @foreach($datas as $data)
        <tr>
          <th width="20%">Nomor kontrak</th>
          <td>{{$data->nomor_kontrak}}</td>
        </tr>
        <tr>
          <th>Total biaya</th>
          <td>Rp {{$data->nilai_kerja}},-</td>
        </tr>
        <tr>
          <th>Tipe</th>
          <td>{{$data->tipe}}</td>
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
          <td>Pegawai(<b>{{substr($user_name, 0, 7)}}</b>) | Admin(<b>{{substr($admin_name, 0, 7)}}</b>)</td>
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

      <table class="table table-striped table-hover">
        <thead>
          <tr class="success">
            <th>No</th>
            <th>Biaya</th>
            <th>Keterangan</th>
            <th>Terakhir dibuat/ubah</th>
            <th>Tanggal dibuat</th>
            <th>Tanggal diubah</th>
            <th colspan="2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0; ?>
          @foreach($biayas as $data)
          <?php
            if ($datas[0]->tipe == "rutin") {
              $tr = "info";
            }
            else {
              $tr = "warning";
            }
          ?>
          <tr class="{{$tr}}">
            <td>{{$no += 1}}</td>
            <td>Rp {{$data->biaya}},-</td>
            <td>{{substr($data->keterangan, 0, 35)}}</td>
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
            <td>operator(<b>{{substr($user_name, 0, 7)}}</b>) | Admin(<b>{{substr($admin_name, 0, 7)}}</b>)</td>
            <td>{{$data->created_at}}</td>
            <td>{{$data->updated_at}}</td>
            <td width="5%"><a href="{{ route('biaya.edit', [$data->id]) }}" class="btn btn-warning">Edit</a></td>
            <td width="5%">
              <form class="" action="{{ route('biaya.destroy', [$data->id]) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" name="button" onclick="return confirm('Apakah yakin menghapus biaya Rp {{$data->biaya}},- ?')" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
  @endsection

@endif
