<?php namespace Staff;

use BaseController, View, Input, Redirect, Session, Validator, Tanggal; // Tanggal;

use Pengeluaran;

class PengeluaranCOntroller extends BaseController {

  public function __construct(){
    $this->menu     = array(

                  );
      $this->tanda    = $this->tanda = array();
      $this->title    = 'Al-Karimiyah | Pengeluaran';
      $this->pengeluaran  = new Pengeluaran();
  }

  public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['pengeluaran'] = $this->pengeluaran->getPengeluaran();
      return View::make('staff.pengeluaran.index')
          ->with('data', $data);
  }

  public function edit($id)
  {
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;
      $data['pengeluaran'] = $this->pengeluaran->getPengeluaran($id);
      return View::make('staff.pengeluaran.edit')
          ->with('data', $data);
  } 

  public function update($id)
  {
    $input = Input::all();
    $input['idpengeluaran'] = $id;
    $input['harga_total'] = $input['harga_satuan']*$input['volume'];
  
    $apdet = $this->pengeluaran->apdet($input);
    Session::flash('message', 'success-update');
        
    return Redirect::to('staff/keuangan'); 
  }

  public function store()
  {
    $input = Input::all();

    $validation = Validator::make($input, Pengeluaran::$rules);
         
            if ($validation->fails()){
              Session::flash('message', array('failed-input', 'Input Data Pengeluaran Tidak Lengkap atau Format Salah'));
              return Redirect::back();
            }else{
              $simpan = $this->pengeluaran->simpan($input);
        Session::flash('message', 'success-input');
      }

    return Redirect::to('staff/keuangan');

  }

  public function destroy($id)
  {
    $this->pengeluaran->hapus($id);

    Session::flash('message', 'success-delete');

    return Redirect::to('staff/keuangan'); 
  }

}