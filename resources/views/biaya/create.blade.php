@if ((empty(Auth::user()->id))&&(empty(Auth::guard('admin')->user()->id)))

  <meta http-equiv="refresh" content="0; url=/login">

@else

  @extends('layouts.auth')

  @section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2>Tambah biaya</h2>
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('biaya.store.submit') }}">
                        {{ csrf_field() }}
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
                        <input type="hidden" name="kontrak_id" value="{{ $datas[0]->id }}">
                        <div class="form-group{{ $errors->has('nomor_kontrak') ? ' has-error' : '' }}">
                            <label for="nomor_kontrak" class="col-md-3 control-label">Nomor kontrak</label>
                            <div class="col-md-8">
                                <input id="nomor_kontrak" type="text" class="form-control" name="nomor_kontrak" autocomplete="off" value="{{$datas[0]->nomor_kontrak}}" disabled>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('biaya') ? ' has-error' : '' }}">
                            <label for="biaya" class="col-md-3 control-label">Biaya</label>
                            <div class="col-md-8">
                                <input id="biaya" type="number" class="form-control" name="biaya" placeholder="Contoh: 25000" required>
                                @if ($errors->has('biaya'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('biaya') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                            <label for="keterangan" class="col-md-3 control-label">Keterangan</label>
                            <div class="col-md-8">
                                <input id="keterangan" type="text" class="form-control" name="keterangan" placeholder="max 35 karakter" maxlength="35" required>
                                @if ($errors->has('keterangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keterangan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" onclick="return confirm('Apakah data sudah terisi benar?')" class="btn btn-primary">
                                    Create
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
