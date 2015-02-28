<?php namespace Ketua;

use BaseController, View, Session, Auth, Redirect, Hash, Mail, Input, Validator;
use Jamaah, GenericMaster, User;

class JamaahController extends BaseController {


  public function __construct(){
      $this->menu   = array(
        
        );
      $this->tanda  = $this->tanda = array();
      $this->title  = "Al-Karimiyah | Jamaah";
      $this->jamaah = New Jamaah();
      $this->generic = New GenericMaster();
      $this->user   = New User();
  }

  public function valid()
  {
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['jamaah'] = $this->jamaah->getJamaah();
      return View::make('ketua.validasi.jamaah')
          ->with('data', $data);
  }

  public function validasi($valid, $id)
  {
      $jamaah = $this->jamaah->getJamaah($id);

      if( $valid == 'valid' ){

        Mail::send('mail.validasi-jamaah', array('firstname'=>'Staff KBIH'), function($message) use ($jamaah){
            $message->to(
                           $jamaah->user->email
                          , $jamaah->namalengkap) 
                    ->subject('Valid');
        });
        $input['no_ktp'] = $id;
        $input['status'] = 2;
        $this->jamaah->apdet($input);

      }else{

        Mail::send('mail.validasi-jamaah', array('firstname'=>'Staff KBIH'), function($message) use ($jamaah){
            $message->to(
                           $jamaah->user->email
                          , $jamaah->namalengkap) 
                    ->subject('Ngga Valid');
        });
        $input['no_ktp'] = $id;
        $input['status'] = 3;
        $this->jamaah->apdet($input);

      }

      return Redirect::to('ketua/validasi-jamaah');

  }

  public function show($id)
  {
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;

      $data['generic']  = $this->generic->getGenericMaster();
      $data['jamaah'] = $this->jamaah->getJamaah($id);
      return View::make('ketua.validasi.show-jamaah')
          ->with('data', $data);
  }
  
}
