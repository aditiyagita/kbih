<?php 

class DetilCekKesehatan extends Eloquent {

	protected $primaryKey = 'iddetailcekkesehatan';
	protected $table = 'detailcekkesehatan';
	protected $guarded = array();
	protected $fillable = array(
								
								);
	public $timestamps = true;

	public static $rules = array(
								
								);

	public function cekkesehatan()
	{
	    return $this->BelongsTo('CekKesehatan', 'idcekkesehatan');
	}

	public function transaksi()
	{
	    return $this->BelongsTo('Transaksi', 'idtransaksi');
	}

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

    public function getDetailCekKesehatan($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function simpan($value)
	{
		$this->insert($value);
	}

    public function hapus($id){
        self::find($id)->delete();
    }

    public function getCekKesehatanById($value)
	{
		return self::where('idcekkesehatan','=', $value)->get();
	}

	public function hapusByCekKesehatan($value)
	{
		return self::where('idcekkesehatan', '=', $value)->delete();
	}

	public function hapusByTransaksi($value)
	{
		return self::where('idtransaksi', '=', $value)->delete();
	}

}