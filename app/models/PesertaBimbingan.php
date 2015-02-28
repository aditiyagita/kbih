<?php 

class PesertaBimbingan extends Eloquent {

	protected $primaryKey = 'idpesertabimbingan';
	protected $table = 'pesertabimbingan';
	protected $guarded = array();
	protected $fillable = array(
								
								);
	public $timestamps = true;

	public static $rules = array(
								
								);

	public function bimbingan()
	{
	    return $this->BelongsTo('Bimbingan', 'idbimbingan');
	}

	public function jamaah()
	{
	    return $this->BelongsTo('Jamaah', 'no_ktp');
	}

	public function simpan($value)
	{
		$this->insert($value);
	}

    public function hapus($id){
        self::find($id)->delete();
    }

    public function getPesertaBimbinganById($value)
	{
		return self::where('idbimbingan','=', $value)->get();
	}

	public function getPesertaBimbinganByNoKtp($value)
	{
		return self::where('no_ktp','=', $value)->get();
	}

	public function hapusByPesertaBimbingan($value)
	{
		return self::where('idbimbingan', '=', $value)->delete();
	}

}