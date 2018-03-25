<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Admin;
use App\User;
use App\Kontrak;
use Auth;

class KontrakController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $datas = Kontrak::with('admin', 'user')->orderBy('nomor_kontrak')->get();
      return view('kontrak.index', compact('datas'));
    }

    public function create()
    {
      return view('kontrak.create');
    }

    public function detail($id)
    {
      $datas = Kontrak::with('admin', 'user')->where('id', $id)->get();
      return view('kontrak.detail', compact('datas'));
    }

    public function store(Request $request)
    {
      $object = new Kontrak;
      $object->nomor_kontrak = $request->get('nomor_kontrak');
      $object->nama_pekerjaan = $request->get('nama_pekerjaan');
      $object->nama_pelaksana = $request->get('nama_pelaksana');
      $object->nilai_kerja = $request->get('nilai_kerja');
      $object->tipe = $request->get('tipe');
      $tb =  $request->get('tahap_bayar');
      $object->tahap_bayar = $tb;
      if ($tb > 1) {
        $status = "Belum lunas";
      }else {
        $status = "Lunas";
      }
      $object->status = $status;
      $object->tgl_kontrak = $request->get('tgl_kontrak');
      $object->tgl_mulai = $request->get('tgl_mulai');
      $object->tgl_selesai = $request->get('tgl_selesai');
      $object->user_id = $request->get('user_id');
      $object->admin_id = $request->get('admin_id');
      $object->save();
      return redirect()->route('kontrak.index')->with('success', '1 record created!');
    }

    public function show($id)
    {
      $datas = Kontrak::with('admin', 'user')->where('id', $id)->get();
      return view('kontrak.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
      $datas = Kontrak::find($id);
      $datas->update([
        'nomor_kontrak' => $request->get('nomor_kontrak'),
        'nama_pekerjaan' => $request->get('nama_pekerjaan'),
        'nama_pelaksana' => $request->get('nama_pelaksana'),
        'nilai_kerja' => $request->get('nilai_kerja'),
        'tipe' => $request->get('tipe'),
        'status' => $request->get('status'),
        'tahap_bayar' => $request->get('tahap_bayar'),
        'tgl_kontrak' => $request->get('tgl_kontrak'),
        'tgl_mulai' => $request->get('tgl_mulai'),
        'tgl_selesai' => $request->get('tgl_selesai'),
        'admin_id' => $request->get('admin_id'),
        'user_id' => $request->get('user_id')
      ]);
      return redirect()->route('kontrak.index')->with('success', '1 record updated!');
    }

    public function destroy($id)
    {
      $datas = Kontrak::findOrFail($id);
      $datas->delete();
      return redirect()->back()->with('warning', '1 record deleted!');
    }
}
