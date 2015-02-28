<?php namespace Ketua;

use BaseController, View, Session, Auth, Redirect, Hash, PDF;
use User, Cicilan, GenericMaster, Transaksi;


class LaporanController extends BaseController {


  public function __construct(){
      $this->menu = array(
        );
      $this->tanda            = $this->tanda = array();
      $this->title            = "E-Auction | Laporan";
      $this->user             = New User();
      $this->cicilan          = New Cicilan();
      $this->generic          = New GenericMaster();
      $this->transaksi        = New Transaksi();

  }

  public function show($value)
  {
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;

      if($value == 'jamaah'){

        $now = date('Y');
        $haji = $this->transaksi->laporanJamaah('haji', $now);
        $umroh = $this->transaksi->laporanJamaah('umroh', $now);

        foreach ($haji as $h) {
          $data['grafik-haji'][] = $h->jumlah;
        }

        foreach ($umroh as $u) {
          $data['grafik-umroh'][] = $u->jumlah;
        }
        $data['select'] = 0;
        $data['tahun']  = array('2010','2011','2012','2013','2014','2015');
        $data['user']   = $this->user->getDataUser();
        $data['generic']  = $this->generic->getGenericMaster();
        return View::make('ketua.laporan.jamaah')
          ->with('data', $data);

      }else{
        $now = date('Y');
        $haji = $this->cicilan->laporanPembayaran('haji', $now);
        $umroh = $this->cicilan->laporanPembayaran('umroh', $now);

        foreach ($haji as $h) {
          $data['grafik-haji'][] = $h->jumlah;
        }

        foreach ($umroh as $u) {
          $data['grafik-umroh'][] = $u->jumlah;
        }
        $data['select'] = 0;
        $data['tahun']  = array('2010','2011','2012','2013','2014','2015');
        $data['generic']  = $this->generic->getGenericMaster();
        $data['cicilan']   = $this->transaksi->getTransaksi();
        return View::make('ketua.laporan.pembayaran')
          ->with('data', $data);

      }

  }

  public function showYear($value, $tahun)
  {
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;

      if($value == 'jamaah'){

        $haji = $this->transaksi->laporanJamaah('haji', $tahun);
        $umroh = $this->transaksi->laporanJamaah('umroh', $tahun);

        foreach ($haji as $h) {
          $data['grafik-haji'][] = $h->jumlah;
        }

        foreach ($umroh as $u) {
          $data['grafik-umroh'][] = $u->jumlah;
        }
        $data['select'] = $tahun;
        $data['tahun']  = array('2010','2011','2012','2013','2014','2015');
        $data['generic']  = $this->generic->getGenericMaster();
        $data['user']   = $this->user->getDataUser();
        return View::make('ketua.laporan.jamaah')
          ->with('data', $data);

      }else{

        $haji = $this->cicilan->laporanPembayaran('haji',$tahun);
        $umroh = $this->cicilan->laporanPembayaran('umroh',$tahun);

        foreach ($haji as $h) {
          $data['grafik-haji'][] = $h->jumlah;
        }

        foreach ($umroh as $u) {
          $data['grafik-umroh'][] = $u->jumlah;
        }
        $data['select'] = $tahun;
        $data['tahun']  = array('2010','2011','2012','2013','2014','2015');
        $data['generic']  = $this->generic->getGenericMaster();
        $data['cicilan']   = $this->transaksi->getTransaksi();
        return View::make('ketua.laporan.pembayaran')
          ->with('data', $data);

      }

  }

  public function cetak($value)
  {
      $data['auction']        = $this->auction->getDataAuction($value);
      $data['position-all']   = $this->biddingposition->getDataBidding($value);
      $data['position']       = $this->biddingposition->getPemenang($value);
      $data['bidding']        = json_decode($this->bidding->getBidding($value));
      $data['barang']         = $this->tipebarang;
      $data['jasa']           = $this->tipejasa;
      $data['pesertabidding'] = $this->pesertabidding->getPesertaBidding($value);
      $pdf = PDF::loadView('manager.laporan.print', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
      return $pdf->stream('auction'.date('d M Y').'.pdf');
  }

  public function cetakDetail($value, $id)
  {
      if( $value == 'jamaah' ){

        $data['generic']  = $this->generic->getGenericMaster();
        $data['user']   = $this->user->getDataUser($id);

        $pdf = PDF::loadView('ketua.laporan.detail-jamaah', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
        return $pdf->stream('jamaah-detail.pdf');

      }else{

        $data['generic']    = $this->generic->getGenericMaster();
        $data['transaksi']  = $this->transaksi->getTransaksi($id);
        $data['cicilan']    = count($data['transaksi']) > 0 ? $this->cicilan->getCicilanByNoKtp($id, $data['transaksi']->no_ktp) : null;
        
        $pdf = PDF::loadView('ketua.laporan.detail-pembayaran', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
        return $pdf->stream('pembayaran-detail.pdf');

      }

      
  }

  public function cetakAll($value)
  {
      if( $value == 'jamaah' ){

        $data['generic']  = $this->generic->getGenericMaster();
        $data['user']   = $this->user->getDataUser();

        $pdf = PDF::loadView('ketua.laporan.all-jamaah', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
        return $pdf->stream('all-jamaah.pdf');

      }else{

        $data['generic']    = $this->generic->getGenericMaster();
        $data['transaksi']  = $this->transaksi->getTransaksiByNoKtp($id);
        $data['cicilan']    = count($data['transaksi']) > 0 ? $this->cicilan->getCicilanByNoKtp($data['transaksi']->idtransaksi, $id) : null;
      
        return View::make('ketua.laporan.detail-pembayaran')
            ->with('data', $data);

      }

      
  }
  
}
