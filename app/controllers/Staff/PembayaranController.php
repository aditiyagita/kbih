<?php namespace Staff;

use BaseController, View, Input, Redirect, Session, Validator, Tanggal, PDF; // Tanggal;

use Transaksi, GenericMaster, cicilan;

class PembayaranCOntroller extends BaseController {

  public function __construct(){
    $this->menu     = array(

                  );
      $this->tanda    = $this->tanda = array();
      $this->title    = 'Al-Karimiyah | Pembayaran Bimbingan';
      $this->transaksi  = new Transaksi();
      $this->cicilan    = new Cicilan();
      $this->generic    = new GenericMaster();
  }

  public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['generic'] = $this->generic->getGenericMaster();
      $data['layanan'] = $this->transaksi->getTransaksi();
      return View::make('staff.pembayaran.index')
          ->with('data', $data);
  }

  public function show($id)
  {
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['generic'] = $this->generic->getGenericMaster();
      $data['layanan'] = $this->transaksi->getTransaksi($id);

      $ktp = $data['layanan']->jamaah->no_ktp;
      $data['cicilan']    = count($data['layanan']) > 0 ? $this->cicilan->getCicilanByNoKtp($id, $ktp) : null;
      return View::make('staff.pembayaran.show')
          ->with('data', $data);
  }

  public function cetak($id)
  {
      $data['generic']    = $this->generic->getGenericMaster();
      $data['transaksi']  = $this->transaksi->getTransaksi($id);
      $data['cicilan']    = count($data['transaksi']) > 0 ? $this->cicilan->getCicilanByNoKtp($id, $data['transaksi']->no_ktp) : null;
        
      $pdf = PDF::loadView('staff.pembayaran.detail-pembayaran', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
      return $pdf->stream('pembayaran-detail.pdf');
  }

}