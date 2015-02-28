<?php namespace Jamaah;

use BaseController, View, Session, Auth, Redirect, Hash;
use Article;

class UmrohController extends BaseController {


  public function __construct(){
      $this->menu = array(
        );
      $this->tanda = $this->tanda = array();
      $this->title = "Al-Karimiyah | Layanan Umroh";
      $this->article = New Article();

  }

   public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['informasi']  = $this->article->getInformasi(8);
      return View::make('jamaah.info.umroh.index')
          ->with('data', $data);
  }

  public function show($value){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['informasi']  = $this->article->getInformasi($value);
      return View::make('jamaah.info.umroh.index')
          ->with('data', $data);
  }
  
}
