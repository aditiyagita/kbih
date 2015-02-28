<?php namespace Jamaah;

use BaseController, View, Session, Auth, Redirect, Hash;
use Article;

class HajiController extends BaseController {


  public function __construct(){
      $this->menu = array(
        );
      $this->tanda = $this->tanda = array();
      $this->title = "Al-Karimiyah | Layanan Haji";
      $this->article = New Article();

  }

   public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['informasi']  = $this->article->getInformasi(7);
      return View::make('jamaah.info.haji.index')
          ->with('data', $data);
  }
  public function show($value)
  {
    $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['informasi']  = $this->article->getInformasi($value);
      return View::make('jamaah.info.haji.index')
          ->with('data', $data);
  }
  
}
