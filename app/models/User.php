<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'iduser';
	protected $table = 'users';
	public $timestamps = false; 
	protected $fillable  = array('username', 'password', 'idusertype', 'email');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	public static $ruleslogin = array(
        'uname' => 'required|min:3',
        'upw' => 'required|min:3'
    );

    public static $rules = array(
        'username' => 'required|min:3',
        'password' => 'required|min:3',
        'email' => 'required|email'
    );

    public function jamaah()
	{
	    return $this->hasOne('Jamaah', 'iduser');
	}

	public function pegawai()
	{
	    return $this->hasOne('Pegawai', 'iduser');
	}

	public function usertype()
	{
	    return $this->belongsTo('UserType', 'idusertype');
	}

	public function credentialCheck($value)
	{
		$getCount = DB::select(" call getStatusActive ('".$value['username']."') ");
		$result = count($getCount) > 0 ? true : false;
		
		return $result;
	}
	
	public function register($input) {

        $this->username = $input['username'];
        $this->password = (Hash::make($input['password']));
        $this->email 	= $input['email'];
        $this->idusertype = $input['idusertype'];
        $this->save();
        $id = $this->iduser;

        return $id;
    }

    public function getDataUser($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function getDataUserByUsername($value)
	{
		return self::where('username', '=', $value)->first();
	}

	public function usernameSama($value)
	{
		$cek = self::whereRaw('username = ? OR email = ?', array($value['username'], $value['email']))->get();
		if(count($cek) > 0){
			return false;
		}else{
			return true;
		}
	}

	public function apdet($input){
            self::find($input['iduser'])->update($input);
    }

    public function hapus($id){
        self::find($id)->delete();
    }

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}