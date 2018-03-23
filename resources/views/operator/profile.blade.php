@extends('layouts.auth')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="sub-header">Profile</h2>

  <h4>Nama : {{Auth::user()->name}}</h4>
  <h4>Email : {{Auth::user()->email}}</h4>
  <h4>Jabatan : Operator</h4>
  <h4>Terakhir login : {{Auth::user()->current_sign_in}}</h4>
</div>
@endsection
