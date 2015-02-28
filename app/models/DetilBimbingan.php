<?php 

class DetilBimbingan extends Eloquent {

	protected $primaryKey = 'iddetailbimbingan';
	protected $table = 'detailbimbingan';
	protected $guarded = array();
	protected $fillable = array(
								
								);
	public $timestamps = true;

	public static $rules = array(
								'nama_detail_bimbingan'=>'required',
								'waktu_bimbingan'=>'required',
								'tanggal_bimbingan'=>'required',
								'nama_pembimbing'=>'required'
								);

	public function bimbingan()
	{
	    return $this->BelongsTo('Bimbingan', 'idbimbingan');
	}

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function simpan($value)
	{
		$this->insert($value);
	}

    public function hapus($id){
        self::find($id)->delete();
    }

    public function getBimbingan($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

    public function getBimbinganById($value)
	{
		return self::where('idbimbingan','=', $value)->get();
	}

	public function hapusByBimbingan($value)
	{
		return self::where('idbimbingan', '=', $value)->delete();
	}

}