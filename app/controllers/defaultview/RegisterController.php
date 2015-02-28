<?php namespace Defaultview;

use BaseController, View, Session, Auth, Redirect, Hash, Input;

use User, JobVacancy, Department, Keluarga, Validator, Cuti, Karyawan, Pelatihan, Notifikasi, Pelamar;

class RegisterController extends BaseController {


	public function __construct(){
    	$this->menu = array(
    			array('menu' => 'Home',
                      'link' => '/'
                      ),
    			array('menu' => 'Lowongan Kerja',
                      'link' => 'job-vacancy'
                      ),
    		);
    	$this->tanda = $this->tanda = array('', '', '', '');
      $this->user = new User();
      $this->pelamar = new Pelamar();
      $this->jobvacancy = new JobVacancy();
      $this->department = new Department();
      $this->keluarga = new Keluarga();
      $this->cuti = new Cuti();
      $this->karyawan = new Karyawan();
      $this->pelatihan = new Pelatihan();
      $this->notifikasi = new Notifikasi();

	}

  public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']    = $this->tanda;
      $data['title']      = 'JC & K - Register';
      $data['agama'] = array('Islam', 'Kristen Katholik', 'Kristen Protestan', 'Hindu', 'Budha');
      $data['statuskawin'] = array('Belum Kawin', 'Kawin', 'janda', 'Duda');
      $data['department'] = $this->department->getDataDepartment();
      $data['jobwidget'] = $this->jobvacancy->getWidget();
      return View::make('pelamar.register')
              ->with('data', $data);
  }

  public function storeUpdate()
  {
    $input = Input::all();
    $file = Input::file('imagefile');

    $rules = array(
        'image' => 'image|max:3000'
    );

    $inputs = array(
        'image' => Input::file('imagefile')
    );

    $validation = Validator::make($inputs, $rules);

    if (!empty($file)){
      if($validation->fails()){
        return Redirect::back()
                              ->withErrors($validation);
      }elseif($file->getError() !== UPLOAD_ERR_OK){
        return Redirect::back()->withErrors('Data Terlalu Besar');
      }else{
        $extension = $file->getClientOriginalExtension();
          $filename = $input['nama_panggilan'].'_'.Auth::user()->iduser.'.'.$extension;
          $directory = public_path().'/assets/images/user';
            
            $upload_success = Input::file('imagefile')->move($directory, $filename); 
               
            if( $upload_success ) {
                $updatekaryawan['foto']          = $filename;
            } 
      }
      
    }
      
    $input['iduser'] = Auth::user()->iduser;
    $tanggal = date('Y-m-d', strtotime($input['tanggal_lahir']));
    $input['tanggal_lahir'] = $tanggal;
    if($input['password'] == ''){
      $input['password'] = Auth::user()->password;
    }else{
      $input['password'] = Hash::make($input['password']);
    }
    $updateuser['username'] = $input['username'];
    $updateuser['password'] = $input['password'];
    $updateuser['iduser']   = $input['iduser'];
    $apdet = $this->user->apdet($updateuser);

    $updatekaryawan['agama']          = $input['agama'];
    $updatekaryawan['status_kawin']   = $input['status_kawin'];
    $updatekaryawan['kacamata']       = $input['kacamata'];
    $updatekaryawan['nama_lengkap']   = $input['nama_lengkap'];
    $updatekaryawan['nama_panggilan'] = $input['nama_panggilan'];
    $updatekaryawan['alamat']         = $input['alamat'];
    $updatekaryawan['kode_pos']       = $input['kode_pos'];
    if($input['warga_negara'] == "Indonesia"){
      $updatekaryawan['no_ktp']        = $input['no_ktp'];
    }else{
      $updatekaryawan['no_passport']        = $input['no_passport'];
    }
    //$updatekaryawan['no_telp']        = $input['no_telp'];
    $updatekaryawan['no_hp']          = $input['no_hp'];
    $updatekaryawan['tempat_lahir']   = $input['tempat_lahir'];
    $updatekaryawan['tanggal_lahir']  = date('Y-m-d', strtotime($input['tanggal_lahir']));
    $updatekaryawan['jenis_kelamin']  = $input['jenis_kelamin'];
    $updatekaryawan['berat_badan']    = $input['berat_badan'];
    $updatekaryawan['tinggi_badan']   = $input['tinggi_badan'];
    $updatekaryawan['nokaryawan']     = $input['nokaryawan'];

    $apdetkaryawan = $this->karyawan->apdet($updatekaryawan);

    return Redirect::back()->withErrors('Update Profil Berhasil');  
  }

  public function notification()
  {
    $iduser = Auth::user()->iduser;
    $datauser = $this->user->getDataUser($iduser);
    $nokaryawan = $datauser->karyawan->nokaryawan;

    $data = $this->notifikasi->getNotifikasi();
    $i= 0;
    foreach($data as $dt){
      $input[$i]['nokaryawan'] = $nokaryawan;
      $input[$i]['refid'] = $dt->id;
      $input[$i]['jenis'] = $dt->type;
      $i++;
    }
    $this->notifikasi->simpan($input);
   
  }
  
}