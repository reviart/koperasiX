<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biaya;
use App\Admin;
use App\User;
use App\Kontrak;
use Auth;
use PDF;
use Carbon\Carbon;

class BiayaController extends Controller
{
  public function index()
  {
    $datas = Kontrak::with('admin', 'user')->orderBy('nomor_kontrak')->get();
    return view('biaya.index', compact('datas'));
  }

  public function create($id)
  {
    $datas = Kontrak::with('admin', 'user')->where('id', $id)->get();
    return view('biaya.create', compact('datas'));
  }

  public function detail($id)
  {
    $datas = Kontrak::with('admin', 'user')->where('id', $id)->get();
    $biayas = Biaya::with('admin', 'user', 'kontrak')->where('kontrak_id', $id)->get();
    return view('biaya.detail', compact('datas', 'biayas'));
  }

  public function print($id)
  {
    $mytime = Carbon::now();
    $waktu = $mytime->toDateTimeString();
    $datas = Kontrak::with('admin', 'user')->where('id', $id)->get();
    $biayas = Biaya::with('admin', 'user', 'kontrak')->where('kontrak_id', $id)->get();
    $pdf = PDF::loadView('biaya.print', compact('datas', 'biayas', 'waktu'));
    return $pdf->download('invoice.pdf');
  }

  public function store(Request $request)
  {
    $object = new Biaya;
    $object->biaya = $request->get('biaya');
    $object->admin_id = $request->get('admin_id');
    $object->user_id = $request->get('user_id');
    $object->kontrak_id = $request->get('kontrak_id');
    $object->save();

    return redirect()->route('biaya.index')->with('success', '1 record created!');
  }

  public function show($id)
  {
    $datas = Biaya::with('admin', 'user', 'kontrak')->where('id', $id)->get();
    return view('biaya.edit', compact('datas'));
  }

  public function update(Request $request, $id)
  {
    $datas = Biaya::find($id);
    $datas->update([
      'biaya' => $request->get('biaya'),
      'admin_id' => $request->get('admin_id'),
      'user_id' => $request->get('user_id'),
      'kontrak_id' => $request->get('kontrak_id')
    ]);

    return redirect()->route('biaya.index')->with('success', '1 record updated!');
  }

  public function destroy($id)
  {
    $datas = Biaya::findOrFail($id);
    $datas->delete();
    return redirect()->back()->with('warning', '1 record deleted!');
  }

}
