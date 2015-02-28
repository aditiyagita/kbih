<?php namespace Ketua;

use BaseController, View, Session, Auth, Redirect, Hash, Mail, Input, Validator;
use User, UserType, Pegawai, GenericMaster, Jamaah, Cicilan, Transaksi, Chat, DetilChat;

class UserController extends BaseController {


  public function __construct(){
      $this->menu   = array(
        
        );
      $this->tanda  = $this->tanda = array();
      $this->title  = "Al-Karimiyah | User";
      $this->user   = New User();
      $this->usertype = New UserType();
      $this->pegawai = New Pegawai();
      $this->generic = New GenericMaster();
      $this->jamaah = New Jamaah();
      $this->cicilan = New Cicilan();
      $this->transaksi = New Transaksi();
      $this->chat = New Chat();
      $this->detilchat = New DetilChat();
  }

   public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['user'] = $this->user->getDataUser();
      $data['usertype'] = json_decode($this->usertype->getDataUserType());
      return View::make('ketua.user.index')
          ->with('data', $data);
  }

  public function store()
  {
    $input = Input::all();

    $validation = Validator::make($input, User::$rules);
         
            if ($validation->fails()){
              Session::flash('message', array('failed-input', 'Input Data User Tidak Lengkap atau Format Salah'));
              return Redirect::back();
            }else{
              $input['iduser'] = $this->user->register($input);
              $this->pegawai->simpan($input);
        Session::flash('message', 'success-input');
      }

    return Redirect::to('ketua/user');

  }

  public function show($id)
  {
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['generic']  = $this->generic->getGenericMaster();
      $data['user']   = $this->user->getDataUser($id);
      return View::make('ketua.user.show')
          ->with('data', $data);
  }

  public function edit($id)
  {
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['generic']  = $this->generic->getGenericMaster();
      $data['user']   = $this->user->getDataUser($id);
      return View::make('ketua.user.edit')
          ->with('data', $data);
  }

  public function update($id)
  {
    $input = Input::all();

    if( $id == 2 ){
        $validation = Validator::make($input, Jamaah::$rules);
        unset($input['_method']); 
        unset($input['_token']);
        if ($validation->fails()){
            Session::flash('message', array('failed-update', 'Data Jamaah Tidak Lengkap atau Format Salah'));
            return Redirect::back();
        }else{
            $apdet = $this->jamaah->apdet($input);
            Session::flash('message', 'success-update');
         }
    }else{
        $validation = Validator::make($input, Pegawai::$rules);
         
        if ($validation->fails()){
            Session::flash('message', array('failed-update', 'Data Pegawai Tidak Lengkap atau Format Salah'));
            return Redirect::back();
        }else{
            $apdet = $this->pegawai->apdetByIdUser($input);
            Session::flash('message', 'success-update');
         }
    }

    return Redirect::to('ketua/user');  
  }

  public function destroy($id)
  {
    $getUser = $this->user->getDataUser($id);

    if( $getUser->idusertype == 2 ){

      $this->cicilan->hapusByNoKtp($getUser->jamaah->no_ktp);
      $this->transaksi->hapusByNoKtp($getUser->jamaah->no_ktp);
      $this->user->hapus($id);

    }else{

      $this->user->hapus($id);

    }

    $chatList = $this->chat->getChatByUser($id);

      foreach ($chatList as $chat) {
        $this->detilchat->hapusByIdChat($chat->idchat);
      }

    $this->chat->hapusChatByUser($id);

    Session::flash('message', 'success-delete');
    
    return Redirect::to('ketua/user');  
  }
  
}
