<?php namespace Jamaah;

use BaseController, View, Input, Redirect, Session, Validator, Tanggal; // Tanggal;

use Article;

class InformasiController extends BaseController {

	public function __construct(){
		$this->menu 		= array(

        					);
     	$this->tanda 		= $this->tanda = array();
	    $this->title 		= 'Al-Karimiyah | Informasi';
	    $this->article 		= new Article();
	}

	public function show($id)
	{
		$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    	$data['title'] = $this->title;
    	$data['informasi'] 	= $this->article->getInformasi($id);
    	return View::make('jamaah.informasi.show')
                  ->with('data', $data);
	}

}