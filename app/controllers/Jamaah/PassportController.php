<?php namespace Jamaah;

use BaseController, View, Session, Auth, Redirect, Hash, Input, Validator, PDF;
use Passport, DetilPassport, User;

class PassportController extends BaseController {


  public function __construct(){
      $this->menu = array(
        );
      $this->tanda = $this->tanda = array();
      $this->title = "Al-Karimiyah | Passport";
      $this->passport = New Passport();
      $this->detailpassport = New DetilPassport();
      $this->user = New User();

  }

  public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['passport'] = $this->passport->getMyPassport(Auth::user()->jamaah->no_ktp);
      return View::make('jamaah.passport.index')
          ->with('data', $data);
  }

  public function show($value){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['passport'] = $this->passport->getMyPassport(Auth::user()->jamaah->no_ktp);
      $pdf = PDF::loadView('jamaah.passport.show', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
      return $pdf->stream('jadwal-passport.pdf');
  }

  public function cetakSurat($value)
  {
      $data['passport'] = $this->detailpassport->getPassport($value);
      $data['user'] = $this->user->getDataUser(3);
      $pdf = PDF::loadView('jamaah.passport.cetak', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
      return $pdf->stream('jadwal-passport.pdf');
  }

}
