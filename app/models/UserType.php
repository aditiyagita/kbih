<?php 

class UserType extends Eloquent {

	protected $primaryKey = 'idusertype';
	protected $table = 'usertype';
	protected $guarded = array();

	public $timestamps = false;

	public static $rules = array();

	public function vendorauc()
	{
	    return $this->hasOne('User', 'idusertype');
	}

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function getDataUserType($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all()->toJson();
        }
	}
}