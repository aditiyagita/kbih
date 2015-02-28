<?php namespace Staff;

use BaseController, View, Input, Redirect, Session, Validator, Tanggal; // Tanggal;

use Passport, Jamaah, DetilPassport;

class PassportController extends BaseController {

	public function __construct(){
		$this->menu 		= array(

        					);
     	$this->tanda 		= $this->tanda = array();
	    $this->title 		= 'Al-Karimiyah | Passport';
	    $this->passport		= new Passport();
	    $this->jamaah 		= new Jamaah();
	    $this->detilpassport = new DetilPassport();

	}

	public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['passport'] = $this->passport->getPassport();
      return View::make('staff.passport.index')
          ->with('data', $data);
	}

	public function store()
	{
		$input = Input::all();

		$validation = Validator::make($input, Passport::$rules);
         
            if ($validation->fails()){
            	Session::flash('message', array('failed-input', 'Input Passport Tidak Lengkap atau Format Salah'));
            	return Redirect::back();
            }else{
            	$simpan = $this->passport->simpan($input);
				Session::flash('message', 'success-input');
			}

		return Redirect::to('staff/passport');

	}

	public function show($id)
	{
		$data['menu']   = $this->menu;
      	$data['tanda']  = $this->tanda;
      	$data['title']  = $this->title;
      	$data['passport'] = $this->passport->getPassport($id);
      	return View::make('staff.passport.show')
          ->with('data', $data);
	}

	public function edit($id)
	{
		$data['menu'] = $this->menu;
        $data['tanda'] = $this->tanda;
        $data['title'] = $this->title;
		$data['passport'] = $this->passport->getPassport($id);
        return View::make('staff.passport.edit')
                  ->with('data', $data);
	}	

	public function update($id)
	{
		$input = Input::all();
		$input['idpassport'] = $id;
		$validation = Validator::make($input, Passport::$rules);
         
            if ($validation->fails()){
            	Session::flash('message', array('failed-update', 'Input Data Cek Kesehatan Tidak Lengkap atau Format Salah'));
            	return Redirect::back();
            }else{
            	$apdet = $this->passport->apdet($input);
				Session::flash('message', 'success-update');
			}
		
		return Redirect::to('staff/passport');	
	}

	public function destroy($id)
	{
		$this->detilpassport->hapusByPassport($id);
		$this->passport->hapus($id);

        Session::flash('message', 'success-delete');

		return Redirect::to('staff/passport');	
	}

	public function listJamaah($id)
	{
		$data['menu']   = $this->menu;
      	$data['tanda']  = $this->tanda;
      	$data['title']  = $this->title;
      	$data['jamaah'] = $this->jamaah->getNotHavePassport($id);
      	$data['idpassport'] = $id;
      	return View::make('staff.passport.jamaah')
          ->with('data', $data);
	}

	public function addJamaah()
	{
		$input = Input::all();

		$x = 0;
		foreach ($input['urut'] as $in) {

			$inp[$x]['idpassport'] = $input['idpassport'];
			$inp[$x]['no_ktp'] = $input['no_ktp'][$in];
		
			$x++;
		}
		
		$this->detilpassport->simpan($inp);
		Session::flash('message', 'success-update');

		return Redirect::to('staff/passport');
	}

	public function hapusJamaah($value)
	{
		$this->detilpassport->hapus($value);

        Session::flash('message', 'success-delete');

		return Redirect::to('staff/passport');	
	}

}