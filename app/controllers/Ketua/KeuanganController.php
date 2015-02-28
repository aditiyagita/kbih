<?php namespace Ketua;

use BaseController, View, Session, Auth, Redirect, Hash, Input, PDF;

use Pengeluaran, Cicilan, Transaksi;

class KeuanganController extends BaseController {


  public function __construct(){
      $this->menu = array(
        );
      $this->tanda = $this->tanda = array();
      $this->title = "Al-Karimiyah | Laporan Keuangan";
      $this->pengeluaran = New Pengeluaran();
      $this->cicilan = New Cicilan();
      $this->transaksi = New Transaksi();

  }

   public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['tahun']  = array('2010','2011','2012','2013','2014','2015');
    return View::make('ketua.keuangan.index')
          ->with('data', $data);
  }

  public function store()
  {
    $input = Input::all();

    $data['pemasukan']   = $this->transaksi->getPemasukanByYear($input['tahun']);
    $data['pengeluaran'] = $this->pengeluaran->getPengeluaranByYear($input['tahun']);


    $pdf = PDF::loadView('ketua.keuangan.show', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
    return $pdf->stream('laporan-keuangan.pdf');

  }
  
}
