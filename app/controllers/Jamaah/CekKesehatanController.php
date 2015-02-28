<?php namespace Jamaah;

use BaseController, View, Session, Auth, Redirect, Hash, Input, Validator, PDF;
use CekKesehatan, DetilCekKesehatan, User;

class CekKesehatanController extends BaseController {


  public function __construct(){
      $this->menu = array(
        );
      $this->tanda = $this->tanda = array();
      $this->title = "Al-Karimiyah | Cek Kesehatan";
      $this->cekkesehatan = New CekKesehatan();
      $this->detilcekkesehatan = New DetilCekKesehatan();
      $this->user = New User();

  }

  public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;

      $data['cekkesehatan'] = $this->cekkesehatan->getMyCekKesehatan(Auth::user()->jamaah->no_ktp);
      return View::make('jamaah.cek-kesehatan.index')
          ->with('data', $data);
  }

  public function show($value)
  {
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['cekkesehatan'] = $this->cekkesehatan->getMyCekKesehatan(Auth::user()->jamaah->no_ktp);
      $pdf = PDF::loadView('jamaah.cek-kesehatan.show', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
      return $pdf->stream('jadwal-cek-kesehatan.pdf');
  }

  function cetakSurat($value)
  {
      $data['cekkesehatan'] = $this->detilcekkesehatan->getDetailCekKesehatan($value);
      $data['user'] = $this->user->getDataUser(3);
      $pdf = PDF::loadView('jamaah.cek-kesehatan.cetak', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
      return $pdf->stream('jadwal-cek-kesehatan.pdf');
      //return $data['cekkesehatan'];
  }
  
}
