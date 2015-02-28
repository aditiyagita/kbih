<?php 

class Passport extends Eloquent {

	protected $primaryKey = 'idpassport';
	protected $table = 'passport';
	protected $guarded = array();
	protected $fillable = array(
								'tanggal_pembuatan', 
								'waktu_pembuatan_awal', 
								'waktu_pembuatan_akhir', 
								'tempat_pembuatan'
								);
	public $timestamps = true;

	public static $rules = array(
								'tanggal_pembuatan'=>'required',
								'waktu_pembuatan_awal'=>'required',
								'waktu_pembuatan_akhir'=>'required',
								'tempat_pembuatan'=>'required'
								);

	public function jamaah()
	{
	    return $this->BelongsTo('User', 'iduser');
	}

	public function detailpassport()
	{
	    return $this->hasMany('DetilPassport', 'idpassport');
	}

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function getPassport($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function getMyPassport($value)
	{
		return DB::select('
							SELECT b.iddetailpassport, a.* FROM passport a
								JOIN detailpassport b ON a.idpassport = b.idpassport
							WHERE b.no_ktp = "'.$value.'"
						');		
	}

	public function simpan($input){
		$this->tanggal_pembuatan 		= $input['tanggal_pembuatan'];
		$this->waktu_pembuatan_awal 	= $input['waktu_pembuatan_awal'];
		$this->waktu_pembuatan_akhir 	= $input['waktu_pembuatan_akhir'];
		$this->tempat_pembuatan 		= $input['tempat_pembuatan'];
		$this->save();
	}

	public function apdet($input){
    	
        self::find($input['idpassport'])->update($input);

    }

    public function hapus($id){
        self::find($id)->delete();
    }

}