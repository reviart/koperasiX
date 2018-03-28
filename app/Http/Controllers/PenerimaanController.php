<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penerimaan;
use App\Admin;
use App\User;
use App\Kontrak;
use Auth;
use PDF;
use Carbon\Carbon;

class PenerimaanController extends Controller
{
  public function index()
  {
    $datas = Kontrak::with('admin', 'user')->orderBy('nomor_kontrak')->get();
    return view('penerimaan.index', compact('datas'));
  }

  public function create($id)
  {
    $datas = Kontrak::with('admin', 'user')->where('id', $id)->get();
    return view('penerimaan.create', compact('datas'));
  }

  public function detail($id)
  {
    $datas = Kontrak::with('admin', 'user')->where('id', $id)->get();
    $penerimaans = Penerimaan::with('admin', 'user', 'kontrak')->where('kontrak_id', $id)->get();
    return view('penerimaan.detail', compact('datas', 'penerimaans'));
  }

  public function print($id)
  {
    $mytime = Carbon::now();
    $waktu = $mytime->toDateTimeString();
    $datas = Kontrak::with('admin', 'user')->where('id', $id)->get();
    $penerimaans = Penerimaan::with('admin', 'user', 'kontrak')->where('kontrak_id', $id)->get();
    $pdf = PDF::loadView('penerimaan.print', compact('datas', 'penerimaans', 'waktu'));
    return $pdf->stream('penerimaan.pdf');
  }

  public function store(Request $request)
  {
    $object = new Penerimaan;
    $object->nilai = $request->get('nilai');
    $object->admin_id = $request->get('admin_id');
    $object->user_id = $request->get('user_id');
    $object->kontrak_id = $request->get('kontrak_id');
    $object->save();

    return redirect()->route('penerimaan.index')->with('success', '1 record created!');
  }

  public function show($id)
  {
    $datas = Penerimaan::with('admin', 'user', 'kontrak')->where('id', $id)->get();
    return view('penerimaan.edit', compact('datas'));
  }

  public function update(Request $request, $id)
  {
    $datas = Penerimaan::find($id);
    $datas->update([
      'nilai' => $request->get('nilai'),
      'admin_id' => $request->get('admin_id'),
      'user_id' => $request->get('user_id'),
      'kontrak_id' => $request->get('kontrak_id')
    ]);

    return redirect()->route('penerimaan.index')->with('success', '1 record updated!');
  }

  public function destroy($id)
  {
    $datas = Penerimaan::findOrFail($id);
    $datas->delete();
    return redirect()->back()->with('warning', '1 record deleted!');
  }
}
