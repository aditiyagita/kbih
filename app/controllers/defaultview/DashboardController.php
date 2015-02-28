<?php namespace Defaultview;

use BaseController, View, Session, Auth, Redirect, Hash, Notifikasi;
use GenericMaster;

class DashboardController extends BaseController {


  public function __construct(){
      $this->menu = array(
          array('menu' => '',
                      'link' => ''
                      ),
          array('menu' => '',
                      'link' => ''
                      ),
        );
      $this->tanda = $this->tanda = array('', '');
      $this->title = "Al Karimiyah | Home";
      $this->generic = New GenericMaster();
      $this->notifikasi = New Notifikasi();

  }

  public function index(){
      if(Auth::check()){

          if (Auth::user()->idusertype == '1') {

              return Redirect::intended('staff');

          } elseif (Auth::user()->idusertype == '2') {

              return Redirect::intended('jamaah');

          } elseif (Auth::user()->idusertype == '3') {

              return Redirect::intended('ketua');

          } elseif (Auth::user()->idusertype == '4') {

              return Redirect::intended('front-office');

          } elseif (Auth::user()->idusertype == '5') {

              return Redirect::intended('kepala-sekretariat');

          } elseif (Auth::user()->idusertype == '6') {

              return Redirect::intended('keuangan');

          } else {

              $data['menu']     = $this->menu;
              $data['tanda']    = $this->tanda;
              $data['title']    = $this->title;

              return View::make('default.index')
                    ->with('data', $data);

          }

      }else{

          $data['menu']     = $this->menu;
          $data['tanda']    = $this->tanda;
          $data['title']    = $this->title;
          
          return View::make('default.index')
                ->with('data', $data);

      }


  }

  public function getGeneric($value)
  {
    return $this->generic->getGenericMaster($value);
  }

  public function notification()
  {
    $iduser = Auth::user()->iduser;

    $data = $this->notifikasi->getNotif();
    $i= 0;
    foreach($data as $dt){
      $input[$i]['iduser'] = $iduser;
      $input[$i]['refid'] = $dt->id;
      $input[$i]['jenis'] = $dt->type;
      $i++;
    }
    $this->notifikasi->simpan($input);
   
  }

    
  
}