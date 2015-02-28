<?php namespace Jamaah;

use BaseController, View, Session, Auth, Redirect, Hash, Input, Validator, PDF;
use Bimbingan, DetilBimbingan;

class BimbinganController extends BaseController {


  public function __construct(){
      $this->menu = array(
        );
      $this->tanda = $this->tanda = array();
      $this->title = "Al-Karimiyah | Bimbingan";
      $this->bimbingan = New Bimbingan();
      $this->detilbimbingan = New DetilBimbingan();

  }

  public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['bimbingan'] = $this->bimbingan->getBimbingan();
      return View::make('jamaah.bimbingan.index')
          ->with('data', $data);
  }

  public function show($value)
  {
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['bimbingan'] = $this->bimbingan->getBimbingan();
      $pdf = PDF::loadView('jamaah.bimbingan.show', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
      return $pdf->stream('jadwal-bimbingan.pdf');
  }
  
}
