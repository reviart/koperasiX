@if ((empty(Auth::user()->id))&&(empty(Auth::guard('admin')->user()->id)))

  <meta http-equiv="refresh" content="0; url=/login">

@else

  @extends('layouts.auth')

  @section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2>Edit kontrak</h2>
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('kontrak.edit.submit', [$datas[0]->id]) }}">
                      {{ csrf_field() }}
                      {{ method_field('PUT') }}
                        <?php
                        if (empty(Auth::user()->id)) {
                          $user_id = NULL;
                          $admin_id = Auth::guard('admin')->user()->id;
                        }
                        else {
                          $admin_id = NULL;
                          $user_id = Auth::user()->id;
                        }
                        ?>
                        <input type="hidden" name="admin_id" value="{{ $admin_id }}">
                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                        <div class="form-group{{ $errors->has('nomor_kontrak') ? ' has-error' : '' }}">
                            <label for="nomor_kontrak" class="col-md-3 control-label">Nomor kontrak</label>
                            <div class="col-md-8">
                                <input id="nomor_kontrak" type="text" class="form-control" name="nomor_kontrak" autocomplete="off" value="{{$datas[0]->nomor_kontrak}}" required autofocus>
                                @if ($errors->has('nomor_kontrak'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nomor_kontrak') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama_pekerjaan') ? ' has-error' : '' }}">
                            <label for="nama_pekerjaan" class="col-md-3 control-label">Nama pekerjaan</label>
                            <div class="col-md-8">
                                <input id="nama_pekerjaan" type="text" class="form-control" name="nama_pekerjaan" autocomplete="off" value="{{$datas[0]->nama_pekerjaan}}" required>
                                @if ($errors->has('nama_pekerjaan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_pekerjaan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama_pelaksana') ? ' has-error' : '' }}">
                            <label for="nama_pelaksana" class="col-md-3 control-label">Nama pelaksana</label>
                            <div class="col-md-8">
                                <input id="nama_pelaksana" type="text" class="form-control" name="nama_pelaksana" autocomplete="off" value="{{$datas[0]->nama_pelaksana}}" required>
                                @if ($errors->has('nama_pelaksana'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_pelaksana') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nilai_kerja') ? ' has-error' : '' }}">
                            <label for="nilai_kerja" class="col-md-3 control-label">Nilai kerja</label>
                            <div class="col-md-8">
                                <input id="nilai_kerja" type="number" class="form-control" name="nilai_kerja" placeholder="Contoh: 25000" value="{{$datas[0]->nilai_kerja}}">
                                @if ($errors->has('nilai_kerja'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nilai_kerja') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tipe') ? ' has-error' : '' }}">
                            <label for="tipe" class="col-md-3 control-label">Tipe</label>
                            <div class="col-md-4">
                              <select class="form-control" id="sel1" name="tipe" required>
                                <option value="{{$datas[0]->tipe}}">{{$datas[0]->tipe}}</option>
                                <option value="rutin">RUTIN</option>
                                <option value="nonrutin">NON-RUTIN</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tahap_bayar') ? ' has-error' : '' }}">
                            <label for="tahap_bayar" class="col-md-3 control-label">Tahap bayar</label>
                            <div class="col-md-8">
                                <input id="tahap_bayar" type="number" class="form-control" name="tahap_bayar" placeholder="Contoh: 2" value="{{$datas[0]->tahap_bayar}}" required>
                                @if ($errors->has('tahap_bayar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tahap_bayar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tgl_kontrak') ? ' has-error' : '' }}">
                            <label for="tgl_kontrak" class="col-md-3 control-label">Tanggal kontrak</label>
                            <div class="col-md-4">
                              <input type='date' class="form-control" class="form-control" name="tgl_kontrak" value="{{$datas[0]->tgl_kontrak}}" required/>
                              @if ($errors->has('tgl_kontrak'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('tgl_kontrak') }}</strong>
                                  </span>
                              @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tgl_mulai') ? ' has-error' : '' }}">
                            <label for="tgl_mulai" class="col-md-3 control-label">Tanggal mulai</label>
                            <div class="col-md-4">
                              <input type='date' class="form-control" class="form-control" name="tgl_mulai" value="{{$datas[0]->tgl_mulai}}" required/>
                              @if ($errors->has('tgl_mulai'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('tgl_mulai') }}</strong>
                                  </span>
                              @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tgl_selesai') ? ' has-error' : '' }}">
                            <label for="tgl_selesai" class="col-md-3 control-label">Tanggal selesai</label>
                            <div class="col-md-4">
                              <input type='date' class="form-control" class="form-control" name="tgl_selesai" value="{{$datas[0]->tgl_selesai}}" required/>
                              @if ($errors->has('tgl_selesai'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('tgl_selesai') }}</strong>
                                  </span>
                              @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" onclick="return confirm('Apakah data sudah terisi benar?')" class="btn btn-primary">
                                    Save
                                </button>
                                <button type="button" name="button" onclick="history.back()" class="btn btn-warning">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
  @endsection

@endif
