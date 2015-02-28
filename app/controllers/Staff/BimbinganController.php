<?php namespace Staff;

use BaseController, View, Input, Redirect, Session, Validator, Tanggal; // Tanggal;

use Bimbingan;

class BimbinganController extends BaseController {

	public function __construct(){
		$this->menu 		= array(

        					);
     	$this->tanda 		= $this->tanda = array();
	    $this->title 		= 'Al-Karimiyah | Bimbingan';
	    $this->bimbingan	= new Bimbingan();
	}

	public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['bimbingan'] = $this->bimbingan->getBimbingan();
      return View::make('staff.bimbingan.index')
          ->with('data', $data);
	}

	public function create()
	{
		$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    	$data['title'] = $this->title;
    	return View::make('staff.bimbingan.create')
                  ->with('data', $data);
	}

	public function store()
	{
		$input = Input::all();

		$validation = Validator::make($input, Bimbingan::$rules);
         
            if ( $validation->fails() ){

            	Session::flash('message', array('failed-input', 'Input Data Bimbingan Tidak Lengkap atau Format Salah'));
            	return Redirect::back();

            }else{

            	$idbimbingan = $this->bimbingan->simpan($input);            	
				Session::flash('message', 'success-input');

			}

		return Redirect::to('staff/bimbingan');

	}

	public function show($id)
	{
		$data['menu']   = $this->menu;
      	$data['tanda']  = $this->tanda;
      	$data['title']  = $this->title;
      	$data['bimbingan'] = $this->bimbingan->getBimbingan($id);
      	return View::make('staff.bimbingan.show')
          ->with('data', $data);
	}

	public function edit($id)
	{
		$data['menu'] = $this->menu;
        $data['tanda'] = $this->tanda;
        $data['title'] = $this->title;
		$data['bimbingan'] = $this->bimbingan->getBimbingan($id);
        return View::make('staff.bimbingan.edit')
                  ->with('data', $data);
	}	

	public function update($id)
	{
		$input = Input::all();
		$input['idbimbingan'] = $id;
		$validation = Validator::make($input, Bimbingan::$rules);
         
            if ($validation->fails()){
            	Session::flash('message', array('failed-update', 'Input Data Bimbingan Tidak Lengkap atau Format Salah'));
            	return Redirect::back();
            }else{
            	$apdet = $this->bimbingan->apdet($input);
				Session::flash('message', 'success-update');
			}
		
		return Redirect::to('staff/bimbingan');	
	}

	public function destroy($id)
	{
		$this->bimbingan->hapus($id);

        Session::flash('message', 'success-delete');

		return Redirect::to('staff/bimbingan');	
	}

}