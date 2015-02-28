<?php namespace Staff;

use BaseController, View, Session, Auth, Redirect, Hash, Mail, Input, Validator, PDF;
use Jamaah, GenericMaster, User,  Cicilan, Transaksi, Chat, DetilChat;

class JamaahController extends BaseController {


  public function __construct(){
      $this->menu   = array(
        
        );
      $this->tanda  = $this->tanda = array();
      $this->title  = "Al-Karimiyah | Jamaah";
      $this->jamaah = New Jamaah();
      $this->generic = New GenericMaster();
      $this->user   = New User();
      $this->cicilan = New Cicilan();
      $this->transaksi = New Transaksi();
      $this->chat = New Chat();
      $this->detilchat = New DetilChat();
  }

   public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['jamaah'] = $this->jamaah->getJamaah();
      return View::make('staff.jamaah.index')
          ->with('data', $data);
  }

  public function show($id)
  {
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;

      $data['generic']  = $this->generic->getGenericMaster();
      $data['jamaah'] = $this->jamaah->getJamaah($id);
      return View::make('staff.jamaah.show')
          ->with('data', $data);
  }

  public function edit($id)
  {
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;

      $data['generic']  = $this->generic->getGenericMaster();
      $data['jamaah'] = $this->jamaah->getJamaah($id);
      return View::make('staff.jamaah.edit')
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
    
    return Redirect::to('staff/jamaah');  
  }

  public function destroy($id)
  {
    $getJamaah  = $this->jamaah->getJamaah($id);
    $delUser    = $this->user->hapus($getJamaah->iduser);
    $del        = $this->jamaah->hapus($id);

    $this->cicilan->hapusByNoKtp($id);
    $this->transaksi->hapusByNoKtp($id);
    $this->user->hapus($getJamaah->iduser);

    $chatList = $this->chat->getChatByUser($getJamaah->iduser);

      foreach ($chatList as $chat) {
        $this->detilchat->hapusByIdChat($chat->idchat);
      }
    Session::flash('message', 'success-delete');
    
    return Redirect::to('staff/jamaah');  
  }

  public function cetak($value)
  {
    $data['generic']  = $this->generic->getGenericMaster();
    $data['jamaah']   = $this->jamaah->getJamaah($value);

    $pdf = PDF::loadView('staff.jamaah.detail-jamaah', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
    return $pdf->stream('jamaah-detail.pdf');
  }
  
}
