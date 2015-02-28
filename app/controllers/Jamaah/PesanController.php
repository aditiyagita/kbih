<?php namespace Jamaah;

use BaseController, View, Session, Auth, Redirect, Hash, Input, Validator;
use Article, GenericMaster, Transaksi;

class PesanController extends BaseController {


  public function __construct(){
      $this->menu = array(
        );
      $this->tanda = $this->tanda = array();
      $this->title = "Al-Karimiyah | Pesan Layanan Haji & Umroh";
      $this->article = New Article();
      $this->generic = New GenericMaster();
      $this->transaksi = New Transaksi();
  }

   public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['informasi']  = $this->article->getInformasi(4);
      return View::make('jamaah.info.haji.index')
          ->with('data', $data);
  }

  public function show($value)
  {
      $data['menu']           = $this->menu;
      $data['tanda']          = $this->tanda;
      $data['title']          = $this->title;

      $data['layanan']        = $value;
      $data['status_jamaah']  = $this->generic->getDataByType('STATUS JAMAAH');
      $data['paket_umrah']    = $this->generic->getDataByType('PAKET UMRAH');
      $data['kamar']          = $this->generic->getDataByType('KAMAR');

      $data['cek-pelunasan']  = $this->transaksi->cekPelunasan();
      return View::make('jamaah.pesan.index')
          ->with('data', $data);
  }

  public function store()
  {
      $input = Input::all();
      $input['no_ktp'] = Auth::user()->jamaah->no_ktp;  
      $validation = Validator::make($input, Transaksi::$rules);
           
              if ($validation->fails()){
                Session::flash('message', array('failed-input', 'Input Pesan Layanan Tidak Lengkap atau Format Salah'));
                return Redirect::back();
              }else{
                $simpan = $this->transaksi->simpan($input);
          Session::flash('message', 'success-input');
        }

      return Redirect::to('jamaah/konfirmasi');
  }
  
}
