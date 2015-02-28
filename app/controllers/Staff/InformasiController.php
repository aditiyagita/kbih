<?php namespace Staff;

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

	// public function index(){
 //    	$data['menu'] = $this->menu;
 //    	$data['tanda'] = $this->tanda;
 //    	$data['title'] = $this->title;
 //    	$data['tipe'] = $this->tipebarang;
 //    	return View::make('staff.informasi.profil.index')
 //                  ->with('data', $data);
	// }

	public function profil()
	{
		$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    	$data['title'] = $this->title;
    	$data['informasi'] 	= $this->article->getInformasi(1);
    	return View::make('staff.informasi.profil.index')
                  ->with('data', $data);
	}

	public function create()
	{
		$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    	$data['title'] = $this->title;
    	$data['tipe'] = $this->tipebarang;
    	$data['tanggal'] = $this->tanggal->tahun();
    	return View::make('procurement.barang.create')
                  ->with('data', $data);
	}

	public function store()
	{
		$input = Input::all();

		$validation = Validator::make($input, Barang::$rules);
         
            if ($validation->fails()){
            	Session::flash('message', array('failed-input', 'Barang Tidak Lengkap atau Format Barang Salah'));
            	return Redirect::back();
            }else{
            	$simpan = $this->barang->simpan($input);
				Session::flash('message', 'success-input');
			}

		return Redirect::to('procurement/barang');

	}

	public function show($id)
	{
		$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    	$data['title'] = $this->title;
    	$data['informasi'] 	= $this->article->getInformasi($id);
    	return View::make('staff.informasi.index')
                  ->with('data', $data);
	}	

	public function update($id)
	{
		$input = Input::all();
		$input['idarticle'] = $id;
		$validation = Validator::make($input, Article::$rules);
         
            if ($validation->fails()){
            	Session::flash('message', array('failed-update', 'Input Informasi Tidak Lengkap atau Format Barang Salah'));
            	return Redirect::back();
            }else{
            	$apdet = $this->article->apdet($input);
				Session::flash('message', 'success-update');
			}
		
		return Redirect::to('staff/informasi/'.$id);	
	}

	public function destroy($id)
	{
		$del = $this->barang->hapus($id);

		if ($del == true){
           	Session::flash('message', 'success-delete');
        }else{
            Session::flash('message', 'failed-delete');
		}
		return Redirect::to('procurement/barang');	
	}

}