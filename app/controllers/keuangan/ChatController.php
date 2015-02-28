<?php namespace Keuangan;

use BaseController, View, Session, Auth, Redirect, Hash, Input;
use User, Chat, DetilChat;

class ChatController extends BaseController {


  public function __construct(){
      $this->menu = array(
        );
      $this->tanda = $this->tanda = array();
      $this->title = "Al-Karimiyah | Chat";
      $this->user  = New User();
      $this->chat  = New Chat();
      $this->detilchat = New DetilChat();

  }

  public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;

      $data['chat-with']   = null;
      $data['user']   = $this->chat->getChatNotExist();
      $data['mychat']   = $this->chat->getMyChat();
      return View::make('keuangan.chat.index')
          ->with('data', $data);
  }

  public function show($id)
  {
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;

      $data['chat-with']   = $id;
      $data['user']   = $this->chat->getChatNotExist();

      $user = $this->user->getDataUserByUsername($id);
      $input['user1'] = Auth::user()->iduser;
      $input['user2'] = $user->iduser;
      $data['mychat']   = $this->chat->getMyChat();
      $data['chat'] = $this->chat->getChatBySenderReceiver($input);

      if( count($data['chat']) > 0 ){
        $in['idchat'] = $data['chat']->idchat;
        $in['to']     = $input['user1'];
        $in['status'] = 0;

        $this->detilchat->apdetByRead($in);
      }

      return View::make('keuangan.chat.index')
          ->with('data', $data);
  }

  public function update($value)
  {
      
      $input = Input::all();
      $user = $this->user->getDataUserByUsername($value);
      $input['user1'] = Auth::user()->iduser;
      $input['user2'] = $user->iduser;

      $cek = $this->chat->getChatBySenderReceiver($input);
      if( count($cek) > 0 ){
        $chat['idchat'] = $cek->idchat;
        $chat['isi']    = $input['chat']; 
        $chat['to']     = $input['user2'];
        $chat['status'] = 1;
        $this->detilchat->simpan($chat);

      }else{
        $input['status1'] = 1;
        $input['status2'] = 1;
        $idchat = $this->chat->simpan($input);

        $chat['idchat'] = $idchat;
        $chat['isi']    = $input['chat']; 
        $chat['to']     = $input['user2'];
        $chat['status'] = 1;
        $this->detilchat->simpan($chat);
      }

      return Redirect::to('keuangan/chat/'.$value);

  }
  
}
