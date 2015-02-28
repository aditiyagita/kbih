<?php namespace Staff;

use BaseController, View, Input, Redirect, Session, Validator, Tanggal; // Tanggal;

use Jamaah, CekKesehatan, DetilCekKesehatan;

class CekKesehatanCOntroller extends BaseController {

	public function __construct(){
		$this->menu 		= array(

        					);
     	$this->tanda 		= $this->tanda = array();
	    $this->title 		= 'Al-Karimiyah | Cek Kesehatan';
	    $this->jamaah 		= new Jamaah();
	    $this->cekkesehatan = New CekKesehatan();
	    $this->detilcekkesehatan = New DetilCekKesehatan();
	}

	public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['cekkesehatan'] = $this->cekkesehatan->getCekKesehatan();
      return View::make('staff.cek-kesehatan.index')
          ->with('data', $data);
	}

	public function create()
	{
		$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    	$data['title'] = $this->title;
    	return View::make('staff.cek-kesehatan.create')
                  ->with('data', $data);
	}

	public function store()
	{
		$input = Input::all();

		$validation = Validator::make($input, CekKesehatan::$rules);
         
            if ($validation->fails()){
            	Session::flash('message', array('failed-input', 'Input Data Cek Kesehatan Tidak Lengkap atau Format Salah'));
            	return Redirect::back();
            }else{
            	$simpan = $this->cekkesehatan->simpan($input);
				Session::flash('message', 'success-input');
			}

		return Redirect::to('staff/cek-kesehatan');

	}

	public function show($id)
	{
		$data['menu'] = $this->menu;
        $data['tanda'] = $this->tanda;
        $data['title'] = $this->title;
		$data['cekkesehatan'] = $this->cekkesehatan->getCekKesehatan($id);
        return View::make('staff.cek-kesehatan.show')
                  ->with('data', $data);
	}

	public function edit($id)
	{
		$data['menu'] = $this->menu;
        $data['tanda'] = $this->tanda;
        $data['title'] = $this->title;
		$data['cekkesehatan'] = $this->cekkesehatan->getCekKesehatan($id);
        return View::make('staff.cek-kesehatan.edit')
                  ->with('data', $data);
	}	

	public function update($id)
	{
		$input = Input::all();
		$input['idcekkesehatan'] = $id;
		$validation = Validator::make($input, CekKesehatan::$rules);
         
            if ($validation->fails()){
            	Session::flash('message', array('failed-update', 'Input Data Cek Kesehatan Tidak Lengkap atau Format Salah'));
            	return Redirect::back();
            }else{
            	$apdet = $this->cekkesehatan->apdet($input);
				Session::flash('message', 'success-update');
			}
		
		return Redirect::to('staff/cek-kesehatan');	
	}

	public function destroy($id)
	{
		$this->detilcekkesehatan->hapusByCekKesehatan($id);
		$this->cekkesehatan->hapus($id);

        Session::flash('message', 'success-delete');

		return Redirect::to('staff/cek-kesehatan');	
	}

	public function listJamaah($id)
	{
		$data['menu']   = $this->menu;
      	$data['tanda']  = $this->tanda;
      	$data['title']  = $this->title;
      	$data['jamaah'] = $this->jamaah->getNotHaveCekKesehatan($id);
      	$data['idcekkesehatan'] = $id;
      	return View::make('staff.cek-kesehatan.jamaah')
          ->with('data', $data);
	}

	public function addJamaah()
	{
		$input = Input::all();
		$x = 0;
		foreach ($input['urut'] as $in) {

			$inp[$x]['idcekkesehatan'] = $input['idcekkesehatan'];
			$inp[$x]['idtransaksi'] = $input['idtransaksi'][$in];
			
			$x++;
		}
		
		$this->detilcekkesehatan->simpan($inp);
		Session::flash('message', 'success-update');

		return Redirect::to('staff/cek-kesehatan');
	}

	public function hapusJamaah($value)
	{
		$this->detilcekkesehatan->hapus($value);

        Session::flash('message', 'success-delete');

		return Redirect::to('staff/cek-kesehatan');	
	}

}