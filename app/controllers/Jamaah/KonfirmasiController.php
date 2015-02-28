<?php namespace Jamaah;

use BaseController, View, Session, Auth, Redirect, Hash, Input, Validator, PDF;
use GenericMaster, Transaksi, Cicilan;

class KonfirmasiController extends BaseController {


  public function __construct(){
      $this->menu = array(
        );
      $this->tanda = $this->tanda = array();
      $this->title = "Al-Karimiyah | Konfirmasi Pembayaran";
      $this->generic = New GenericMaster();
      $this->transaksi = New Transaksi();
      $this->cicilan = New Cicilan();

  }

   public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;

      $id = Auth::user()->jamaah->no_ktp;

      $data['generic']    = $this->generic->getGenericMaster();
      $data['transaksi']  = $this->transaksi->myTransaksiMany();
      //$data['cicilan']    = count($data['transaksi']) > 0 ? $this->cicilan->getMyCicilan($data['transaksi']->idtransaksi) : null;
      return View::make('jamaah.konfirmasi.index')
          ->with('data', $data);
  }

  public function store()
  {
    $input = Input::all();
    $file = Input::file('imagefile');

    $rules = array(
        'image' => 'image|max:3000'
    );

    $inputs = array(
        'image' => Input::file('imagefile')
    );

    $validations = Validator::make($inputs, $rules);

    if (!empty($file)){
      if($validations->fails()){
        return Redirect::back()
                              ->withErrors($validations);
      }elseif($file->getError() !== UPLOAD_ERR_OK){
        return Redirect::back()->withErrors('Data Terlalu Besar');
      }else{
        $extension = $file->getClientOriginalExtension();
          $filename = $input['idtransaksi'].'_'.Auth::user()->iduser.'.'.$extension;
          $directory = public_path().'/images/kwitansi';
            
            $upload_success = Input::file('imagefile')->move($directory, $filename); 
               
            if( $upload_success ) {
                $input['kwitansi']          = $filename;
            } 
      }
      
    }
 
    $validation = Validator::make($input, Cicilan::$rules);
         
            if ($validation->fails()){
              Session::flash('message', array('failed-input', 'Input Cicilan Tidak Lengkap atau Format Salah'));
              return Redirect::back();
            }else{
              $simpan = $this->cicilan->simpan($input);
        Session::flash('message', 'success-input');
      }

    return Redirect::to('jamaah/konfirmasi');

  }

  public function show($value)
  {
      $id = Auth::user()->jamaah->no_ktp;

      $data['generic']    = $this->generic->getGenericMaster();
      $data['transaksi']  = $this->transaksi->myTransaksi();
      $data['cicilan']    = count($data['transaksi']) > 0 ? $this->cicilan->getMyCicilan($data['transaksi']->idtransaksi) : null;
      $pdf = PDF::loadView('jamaah.konfirmasi.kwitansi', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
      return $pdf->stream('kwitansi-pembayaran.pdf');
  }
  
  public function edit($value)
  {
      $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = $this->title;

      $data['generic']    = $this->generic->getGenericMaster();
      $data['transaksi']  = $this->transaksi->getTransaksi($value);
      $data['cicilan']    = count($data['transaksi']) > 0 ? $this->cicilan->getMyCicilan($data['transaksi']->idtransaksi) : null;
      return View::make('jamaah.konfirmasi.show')
          ->with('data', $data);
  }

}
