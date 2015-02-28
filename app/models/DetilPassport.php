<?php 

class DetilPassport extends Eloquent {

	protected $primaryKey = 'iddetailpassport';
	protected $table = 'detailpassport';
	protected $guarded = array();
	protected $fillable = array(
								
								);
	public $timestamps = true;

	public static $rules = array(
								
								);

	public function passport()
	{
	    return $this->BelongsTo('Passport', 'idpassport');
	}

	public function jamaah()
	{
		return $this->BelongsTo('Jamaah', 'no_ktp');
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
		return self::where('no_ktp','=', $value)->first();
	}

	public function getPassportById($value)
	{
		return self::where('idpassport','=', $value)->get();
	}

	public function simpan($value)
	{
		$this->insert($value);
	}

	public function apdet($input){
    	
        self::find($input['idpassport'])->update($input);

    }

    public function hapus($id){
        self::find($id)->delete();
    }

    public function hapusByPassport($value)
    {
    	self::where('idpassport', '=', $value)->delete();
    }

}