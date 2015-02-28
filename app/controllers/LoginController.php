<?php


class LoginController extends BaseController {


    public function __construct() {

        $this->user     = New User();
        $this->jamaah   = New Jamaah();
        $this->generic  = New GenericMaster();
        $this->transaksi = New Transaksi();
        $this->pegawai = New Pegawai();


    }

    

    public function login() {

        $input = Input::all();
        $v = Validator::make($input, User::$ruleslogin);

        if ($v->passes()) {

            $credentials = array(
                            'username' => $input['uname'],
                            'password' => $input['upw']
                            );

            if($this->user->credentialCheck($credentials)){

                Session::flash('message', array('failed-login', 'User Belum Diaktifasi'));
                    return Redirect::back();

            }else{

                if (Auth::attempt($credentials, true)){

                    Session::put('user',Auth::user());
                    return Redirect::to('/');

                }else{

                    Session::flash('message', array('failed-login', 'Username atau Password Salah'));
                    return Redirect::back();

                }
            }
            return Redirect::to('/');

        }else{

            Session::flash('message', array('failed-login', 'Username atau Password Tidak Lengkap'));
            return Redirect::back();

        }
        return Redirect::to('/');
    }

    public function logout(){

        Auth::logout();
        
        Session::forget('user');
        
        return Redirect::to('/');
    }

    public function do_register(){

      $input = Input::all();
      $cek   = $this->user->usernameSama($input);

      $file = Input::file('imagefile');

        $rules = array(
            'image' => 'image|max:300'
        );

        $inputs = array(
            'image' => Input::file('imagefile')
        );

        $valid = Validator::make($inputs, $rules);

        $validation = Validator::make($input, User::$rules);
        $validation2 = validator::make($input, Jamaah::$rules);
        $validation3 = validator::make($input, Transaksi::$rules);
            
            // Error mimes 
            // Go to
            // http://stackoverflow.com/questions/23065703/laravel-4-no-guessers-available-issue

            if ( ($validation->fails()) OR ($validation2->fails()) OR ($validation3->fails()) ){
                //return $input;
                Session::flash('message', array('failed-update', 'Input Data Salah Atau Tidak Sesuai Format'));
                return Redirect::back();

            }else{
                
                  if( $cek ){

                        if (!empty($file)){

                            if($valid->fails()){

                                Session::flash('message', array('failed-update', 'Foto Terlalu Besar / Tidak Sesuai Format'));
                                return Redirect::back();
                            
                            }elseif($file->getError() !== UPLOAD_ERR_OK){
                                
                                Session::flash('message', array('failed-update', 'Foto Terlalu Besar'));
                                return Redirect::back();
                            
                            }else{
                            
                                $extension = $file->getClientOriginalExtension();
                                $filename = $input['nama'].'_'.$input['no_ktp'].'.'.$extension;
                                $directory = public_path().'/images/user';
                                
                                $upload_success = Input::file('imagefile')->move($directory, $filename); 
                                   
                                if( $upload_success ) {
                                    
                                    $input['foto'] = $filename;
                            
                                }else{

                                    Session::flash('message', array('failed-update', 'Upload Foto Gagal'));
                                    return Redirect::back();

                                } 

                            }
                            
                        }
                        $total = $this->generic->getGenericMaster($input['pilihan-ibadah']);
                        $input['total'] = $total->value;

                        $input['idusertype']  = '2';
                        $input['iduser']      = $this->user->register($input);
                        $input['status']      = 1;
                        $input['pilihan-ibadah'] = $total->id;
                        $this->jamaah->simpan($input);
                        $this->transaksi->simpan($input);

                        Mail::send('mail.validasi-jamaah', array('firstname'=>'Staff KBIH'), function($message){
                        $message->to(
                                        Input::get('email'),
                                        Input::get('nama')
                                    ) 
                                ->subject('Register Berhasil Silahkan Tunggu Validasi.');
                        });

                        Session::flash('message', 'success-register');

                  }else{

                        Session::flash('message', 'failed-register');

                  }
            }

      return Redirect::to('/');
    }

    public function doRegisterHaji(){

      $input = Input::all();
      $cek   = $this->user->usernameSama($input);
      $cekKtp = $this->jamaah->checkNoKtpSama($input);

      $file = Input::file('imagefile');

        $rules = array(
            'image' => 'image|max:300'
        );

        $inputs = array(
            'image' => Input::file('imagefile')
        );

        $valid = Validator::make($inputs, $rules);

        $validation = Validator::make($input, User::$rules);
        $validation2 = validator::make($input, Jamaah::$rules);
        $validation3 = validator::make($input, Transaksi::$rules);
            
            // Error mimes 
            // Go to
            // http://stackoverflow.com/questions/23065703/laravel-4-no-guessers-available-issue
            // http://stackoverflow.com/questions/5164930/fatal-error-maximum-execution-time-of-30-seconds-exceeded

            if ( ($validation->fails()) OR ($validation2->fails()) OR ($validation3->fails()) ){
                //return $input;
                Session::flash('message', array('failed-update', 'Input Data Salah Atau Tidak Sesuai Format'));
                return Redirect::back();

            }else{
                
                  if( $cek AND $cekKtp ){

                        if (!empty($file)){

                            if($valid->fails()){

                                Session::flash('message', array('failed-update', 'Foto Terlalu Besar / Tidak Sesuai Format'));
                                return Redirect::back();
                            
                            }elseif($file->getError() !== UPLOAD_ERR_OK){
                                
                                Session::flash('message', array('failed-update', 'Foto Terlalu Besar'));
                                return Redirect::back();
                            
                            }else{
                            
                                $extension = $file->getClientOriginalExtension();
                                $filename = $input['nama'].'_'.$input['no_ktp'].'.'.$extension;
                                $directory = public_path().'/images/user';
                                
                                $upload_success = Input::file('imagefile')->move($directory, $filename); 
                                   
                                if( $upload_success ) {
                                    
                                    $input['foto'] = $filename;
                            
                                }else{

                                    Session::flash('message', array('failed-update', 'Upload Foto Gagal'));
                                    return Redirect::back();

                                } 

                            }
                            
                        }
                        $input['pilihan-ibadah'] = 37;
                        $total = $this->generic->getGenericMaster($input['pilihan-ibadah']);
                        $input['total'] = $total->value;

                        $input['idusertype']  = '2';
                        $input['iduser']      = $this->user->register($input);
                        $input['status']      = 1;
                        $input['pilihan-ibadah'] = $total->id;

                        $input['paket'] = 0;
                        $input['kamar'] = 0;

                        $this->jamaah->simpan($input);
                        $tran = $this->transaksi->simpan($input);

                        Mail::send('mail.validasi-jamaah', array('firstname'=>'Staff KBIH'), function($message){
                        $message->to(
                                        Input::get('email'),
                                        Input::get('nama')
                                    ) 
                                ->subject('Register Berhasil Silahkan Tunggu Validasi.');
                        });

                        Session::flash('message', 'success-register');

                        $data['menu']   = '';
                        $data['tanda']  = '';
                        $data['title']  = '';
                        $data['transaksi'] = $tran;
                        $data['user'] = $input['iduser'];
                        $data['layanan'] = 'haji';

                        return View::make('default.notif.success')
                              ->with('data', $data);

                  }else{

                        Session::flash('message', 'failed-register');

                  }
            }

      return Redirect::to('/');
    }

    public function doRegisterUmroh(){

      $input = Input::all();
      $cek   = $this->user->usernameSama($input);
      $input['status-jamaah'] = 0;
      $file = Input::file('imagefile');

        $rules = array(
            'image' => 'image|max:300'
        );

        $inputs = array(
            'image' => Input::file('imagefile')
        );

        $valid = Validator::make($inputs, $rules);

        $validation = Validator::make($input, User::$rules);
        $validation2 = validator::make($input, Jamaah::$rules);
        $validation3 = validator::make($input, Transaksi::$rules);
            
            // Error mimes 
            // Go to
            // http://stackoverflow.com/questions/23065703/laravel-4-no-guessers-available-issue

            if ( ($validation->fails()) OR ($validation2->fails()) OR ($validation3->fails()) ){
                //return $input;
                Session::flash('message', array('failed-update', 'Input Data Salah Atau Tidak Sesuai Format'));
                return Redirect::back();

            }else{
                
                  if( $cek ){

                        if (!empty($file)){

                            if($valid->fails()){

                                Session::flash('message', array('failed-update', 'Foto Terlalu Besar / Tidak Sesuai Format'));
                                return Redirect::back();
                            
                            }elseif($file->getError() !== UPLOAD_ERR_OK){
                                
                                Session::flash('message', array('failed-update', 'Foto Terlalu Besar'));
                                return Redirect::back();
                            
                            }else{
                            
                                $extension = $file->getClientOriginalExtension();
                                $filename = $input['nama'].'_'.$input['no_ktp'].'.'.$extension;
                                $directory = public_path().'/images/user';
                                
                                $upload_success = Input::file('imagefile')->move($directory, $filename); 
                                   
                                if( $upload_success ) {
                                    
                                    $input['foto'] = $filename;
                            
                                }else{

                                    Session::flash('message', array('failed-update', 'Upload Foto Gagal'));
                                    return Redirect::back();

                                } 

                            }
                            
                        }
                        $input['pilihan-ibadah'] = 38;
                        $total = $this->generic->getGenericMaster($input['pilihan-ibadah']);
                        $input['total'] = $total->value;

                        $input['idusertype']  = '2';
                        $input['iduser']      = $this->user->register($input);
                        $input['status']      = 1;
                        $input['pilihan-ibadah'] = $total->id;
                        $input['no_spph'] = '';

                        $this->jamaah->simpan($input);
                        $tran = $this->transaksi->simpan($input);

                        Mail::send('mail.validasi-jamaah', array('firstname'=>'Staff KBIH'), function($message){
                        $message->to(
                                        Input::get('email'),
                                        Input::get('nama')
                                    ) 
                                ->subject('Register Berhasil Silahkan Tunggu Validasi.');
                        });

                        Session::flash('message', 'success-register');

                        $data['menu']   = '';
                        $data['tanda']  = '';
                        $data['title']  = '';
                        $data['transaksi'] = $tran;
                        $data['user'] = $input['iduser'];
                        $data['layanan'] = 'umroh';

                        return View::make('default.notif.success')
                              ->with('data', $data);

                  }else{

                        Session::flash('message', 'failed-register');

                  }
            }

      return Redirect::to('/');
    }

    public function cetakHaji($value, $id)
    {
        $data['transaksi'] = $this->transaksi->getTransaksi($id);
        $data['generic']  = $this->generic->getGenericMaster();
        $data['user'] = $this->user->getDataUser($value);

        $pdf = PDF::loadView('default.notif.success-register', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
        return $pdf->stream('formulir-pendaftaran.pdf');
    }

    public function cetakUmroh($value, $id)
    {
        $data['transaksi'] = $this->transaksi->getTransaksi($id);
        $data['generic']  = $this->generic->getGenericMaster();
        $data['user'] = $this->user->getDataUser($value);

        $pdf = PDF::loadView('default.notif.success-register-umroh', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
        return $pdf->stream('formulir-pendaftaran.pdf');
    }

    public function register($value){

        $data['menu']   = '';
        $data['tanda']  = '';
        $data['title']  = '';

        $data['jeniskelamin']       = $this->generic->getDataByType('JK');
        $data['kewarganegaraan']    = $this->generic->getDataByType('WARGANEGARA');
        $data['pergi_umrah']        = $this->generic->getDataByType('PERGI UMRAH');
        $data['hub_mahram']         = $this->generic->getDataByType('MAHRAM');
        $data['gol_darah']          = $this->generic->getDataByType('GOL DARAH');
        $data['status_jamaah']      = $this->generic->getDataByType('STATUS JAMAAH');
        $data['paket_umrah']        = $this->generic->getDataByType('PAKET UMRAH');
        $data['kamar']              = $this->generic->getDataByType('KAMAR');


        if( $value == 'haji' ){
            return View::make('default.pendaftaran.haji')
              ->with('data', $data);
        }
            return View::make('default.pendaftaran.umroh')
              ->with('data', $data);

    }

    public function loginPage(){

        $data['menu']   = '';
        $data['tanda']  = '';
        $data['title']  = '';

        return View::make('default.login')
              ->with('data', $data);

    }

    public function myProfile()
    {
        
        if(Auth::check()){

            $data['menu']   = '';
            $data['tanda']  = '';
            $data['title']  = '';

            if (Auth::user()->idusertype == '2') {

                return Redirect::to('/');

            }else{

                return View::make('my-profile.index')
                                ->with('data', $data);

            }

        }else{

            return Redirect::to('/');

        }

    }

    public function updateProfile()
    {
        $input = Input::all();

        $input['username']  = $input['username'] == Auth::user()->username  ? '-' : $input['username'];
        $input['email']     = $input['email'] == Auth::user()->email  ? '-' : $input['email'];

        $cek = $this->user->usernameSama($input);

        if($cek){ 

            $input['username'] = $input['username'] == '-'  ? Auth::user()->username : $input['username'];
            $input['email'] = $input['email'] == '-'  ? Auth::user()->email : $input['email'];
            $input['iduser'] = Auth::user()->iduser;
            $update          = $this->user->apdet($input);

            $in['idpegawai'] = Auth::user()->pegawai->idpegawai;    
            $in['namalengkap'] = $input['namalengkap'];
            $in['alamat'] = $input['alamat'];
            $up  = $this->pegawai->apdetByIdUser($in);

            Session::flash('message', 'success-update'); 

        }else{

            Session::flash('message', 'failed-register');
            return Redirect::back();   

        }

        return Redirect::to('my-profile');

    }

    public function updatePassword()
    {
        $input = Input::all();
        $rules = array(
                    'password' => 'required|min:3'
                );
        $validation = Validator::make($input, $rules);

        if($validation->fails()){

            Session::flash('message', array('failed-update', 'Panjang Karakter Min 3 Kombinasi'));
            return Redirect::back();

        }else{

            $input['password'] = Hash::make($input['password']);
            $input['iduser'] = Auth::user()->iduser;
            $update          = $this->user->apdet($input);

            Session::flash('message', 'success-update');

            Auth::logout();
        
            Session::forget('user');

        }

        return Redirect::to('/');

    }

}
?>
