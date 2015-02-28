<?php namespace Staff;

use BaseController, View, Input, Redirect, Session, Validator, Tanggal; // Tanggal;

use Transaksi, GenericMaster, Cicilan, Jamaah, DetilCekKesehatan;

class LayananUmrohCOntroller extends BaseController {

	public function __construct(){
		$this->menu 		= array(

        					);
     	$this->tanda 		= $this->tanda = array();
	    $this->title 		= 'Al-Karimiyah | Layanan Haji';
	    $this->transaksi	= new Transaksi();
	    $this->cicilan 		= new Cicilan();
	    $this->generic 		= new GenericMaster();
      $this->jamaah     = new Jamaah();
      $this->detilcekkesehatan = new DetilCekKesehatan();
	}

	public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['layanan'] = $this->transaksi->getByLayanan(38);
      $data['jamaah'] = $this->jamaah->getJamaah();
      $data['generic'] = $this->generic->getDataByType('STATUS JAMAAH');
      $data['paket'] = $this->generic->getDataByType('PAKET UMRAH');
      $data['kamar'] = $this->generic->getDataByType('KAMAR');
      return View::make('staff.layanan.umroh.index')
          ->with('data', $data);
	}

	public function show($id)
	{
	  $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['generic'] = $this->generic->getGenericMaster();
      $data['layanan'] = $this->transaksi->getTransaksi($id);
      return View::make('staff.layanan.umroh.show')
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
      return View::make('staff.layanan.umroh.edit')
          ->with('data', $data);
	}	

  public function store()
  {
    $input = Input::all();

    $input['pilihan-ibadah'] = 38;
    $input['no_spph'] = '';
    $input['status-jamaah'] = 0;

    $dt = $this->generic->getGenericMaster(38);
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

    return Redirect::to('staff/umroh');

  }

  public function update($id)
  {
    $input = Input::all();
    $input['idtransaksi'] = $id;
  
    $apdet = $this->transaksi->apdet($input);
    Session::flash('message', 'success-update');
        
    return Redirect::to('staff/umroh'); 
  }

  public function destroy($value)
  {
    $this->cicilan->hapusByTransaksi($value);
    $this->detilcekkesehatan->hapusByTransaksi($value);
    $this->transaksi->hapus($value);

    Session::flash('message', 'success-delete');

    return Redirect::to('staff/umroh'); 
  }

}