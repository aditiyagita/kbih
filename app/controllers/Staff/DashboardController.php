<?php namespace Staff;

use BaseController, View, Session, Auth, Redirect, Hash;

class DashboardController extends BaseController {


  public function __construct(){
      $this->menu = array(
        );
      $this->tanda = $this->tanda = array();
      $this->title = "Al-Karimiyah | Home";

  }

   public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
    return View::make('staff.index')
          ->with('data', $data);
  }
  
}
