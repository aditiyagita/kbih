<?php namespace Jamaah;

use BaseController, View, Session, Auth, Redirect, Hash, Input, Validator, PDF;
use Jamaah, GenericMaster;

class ProfileController extends BaseController {


  public function __construct(){
      $this->menu = array(
        );
      $this->tanda = $this->tanda = array();
      $this->title = "Al-Karimiyah | My Profile";
      $this->generic = New GenericMaster();
      $this->jamaah = New Jamaah();

  }

   public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;

      $id = Auth::user()->jamaah->no_ktp;

      $data['generic']  = $this->generic->getGenericMaster();
      $data['jamaah'] = $this->jamaah->getJamaah($id);
      return View::make('jamaah.profil.index')
          ->with('data', $data);
  }

  public function update($id)
  {
    $input = Input::all();
    $validation = Validator::make($input, Jamaah::$rules);
         
            if ($validation->fails()){
              Session::flash('message', array('failed-update', 'Data Jamaah Tidak Lengkap atau Format Salah'));
              return Redirect::back();
            }else{
              $apdet = $this->jamaah->apdet($input);
        Session::flash('message', 'success-update');
      }
    
    return Redirect::to('jamaah/my-profile');  
  }

  public function show($value)
  {
    if($value== 'cetak'){

      $id = Auth::user()->jamaah->no_ktp;

      $data['generic']  = $this->generic->getGenericMaster();
      $data['jamaah'] = $this->jamaah->getJamaah($id);

      $pdf = PDF::loadView('jamaah.profil.cetak', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
      return $pdf->stream('biodata.pdf');

    }
    else{
      return Redirect::back();
    }

  }
  
}
