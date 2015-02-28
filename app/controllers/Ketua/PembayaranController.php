<?php namespace Ketua;

use BaseController, View, Session, Auth, Redirect, Hash, Mail, Input, Validator;
use Cicilan, GenericMaster, Transaksi;

class PembayaranController extends BaseController {

  public function __construct(){
      $this->menu   = array(
        
        );
      $this->tanda  = $this->tanda = array();
      $this->title  = "Al-Karimiyah | Pembayaran";
      $this->cicilan = New Cicilan();
      $this->generic = New GenericMaster();
      $this->transaksi = New Transaksi();
  }

  public function valid()
  {
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['validasi'] = $this->cicilan->getCicilan();
      $data['generic'] = $this->generic->getGenericMaster();

      return View::make('ketua.validasi.pembayaran')
          ->with('data', $data);
  }

  public function validasi($valid, $id, $val)
  {
      if( $valid == 'valid' ){

        $input['idpembayaran'] = $id;
        $input['status'] = 34;
        $this->cicilan->apdet($input);

        $cicilan = $this->cicilan->totalCicilan($val);
        $tunggak = $this->transaksi->getTransaksi($val);

        if( $cicilan->sum('total') >= $tunggak->total_biaya ){

          $in['idtransaksi'] = $val;
          $in['status'] = 33; //Lunas
          $this->transaksi->apdet($in);

        }

      }else{

        $input['idpembayaran'] = $id;
        $input['status'] = 35;
        $this->cicilan->apdet($input);

      }

      return Redirect::to('ketua/validasi-pembayaran');

  }

  public function show($id)
  {
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;

      $data['generic']  = $this->generic->getGenericMaster();
      $data['cicilan'] = $this->cicilan->getCicilan($id);
      return View::make('ketua.validasi.show-cicilan')
          ->with('data', $data);
  }

}
