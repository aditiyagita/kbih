<?php namespace Staff;

use BaseController, View, Input, Redirect, Session, Validator, Tanggal; // Tanggal;

use Transaksi, GenericMaster, cicilan, Jamaah, DetilCekKesehatan;

class LayananHajiCOntroller extends BaseController {

	public function __construct(){
		$this->menu 		= array(

        					);
     	$this->tanda 		= $this->tanda = array();
	    $this->title 		= 'Al-Karimiyah | Layanan Haji';
	    $this->transaksi	= new Transaksi();
	    $this->cicilan 		= new Cicilan();
	    $this->generic 		= new GenericMaster();
      $this->jamaah     = New Jamaah();
      $this->detilcekkesehatan = new DetilCekKesehatan();
	}

	public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['layanan'] = $this->transaksi->getByLayanan(37);
      $data['jamaah'] = $this->jamaah->getJamaah();
      $data['generic'] = $this->generic->getDataByType('STATUS JAMAAH');
      return View::make('staff.layanan.haji.index')
          ->with('data', $data);
	}

	public function show($id)
	{
	  $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['generic'] = $this->generic->getGenericMaster();
      $data['layanan'] = $this->transaksi->getTransaksi($id);
      return View::make('staff.layanan.haji.show')
          ->with('data', $data);
	}

	public function edit($id)
	{
	    $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['generic'] = $this->generic->getGenericMaster();
      $data['transaksi'] = $this->transaksi->getTransaksi($id);

      $ktp = $data['transaksi']->jamaah->no_ktp;
      return View::make('staff.layanan.haji.edit')
          ->with('data', $data);
	}	

  public function update($id)
  {
    $input = Input::all();
    $input['idtransaksi'] = $id;
  
    $apdet = $this->transaksi->apdet($input);
    Session::flash('message', 'success-update');
        
    return Redirect::to('staff/haji'); 
  }

  public function store()
  {
    $input = Input::all();

    $input['pilihan-ibadah'] = 37;
    $input['paket'] = 0;
    $input['kamar'] = 0;

    $dt = $this->generic->getGenericMaster(37);
    $input['total'] = $dt->value;
    $input['status'] = 32;

    $validation = Validator::make($input, Transaksi::$rules);
         
      if ($validation->fails()){
        Session::flash('message', array('failed-input', 'Input Data Tidak Lengkap atau Format Salah'));
        return Redirect::back();
      }else{
        $simpan = $this->transaksi->simpan($input);
        Session::flash('message', 'success-input');
      }

    return Redirect::to('staff/haji');

  }

  public function destroy($value)
  {
    $this->cicilan->hapusByTransaksi($value);
    $this->detilcekkesehatan->hapusByTransaksi($value);
    $this->transaksi->hapus($value);

    Session::flash('message', 'success-delete');

    return Redirect::to('staff/haji'); 
  }

}