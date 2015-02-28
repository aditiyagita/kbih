<?php 

class CekKesehatan extends Eloquent {

	protected $primaryKey = 'idcekkesehatan';
	protected $table = 'cekkesehatan';
	protected $guarded = array();
	protected $fillable = array(
								'jenis_pemeriksaan', 
								'waktu_pemeriksaan_mulai', 
								'waktu_pemeriksaan_selesai', 
								'tempat_pemeriksaan', 
								'tanggal_pemeriksaan'
								);
	public $timestamps = true;

	public static $rules = array(
								'jenis_pemeriksaan'=>'required',
								'waktu_pemeriksaan_mulai'=>'required',
								'waktu_pemeriksaan_selesai'=>'required',
								'tempat_pemeriksaan'=>'required',
								'tanggal_pemeriksaan'=>'required'
								);

	public function transaksi()
	{
	    return $this->BelongsTo('Transaksi', 'idtransaksi');
	}

	public function detilcekkesehatan()
	{
	    return $this->hasMany('DetilCekKesehatan', 'idcekkesehatan');
	}


	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function getCekKesehatan($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function getMyCekKesehatan($value)
	{
		return DB::select('
							SELECT y.iddetailcekkesehatan, x.* FROM cekkesehatan x
								left join detailcekkesehatan y on x.idcekkesehatan = y.idcekkesehatan
							    left join transaksi t on t.idtransaksi = y.idtransaksi
							WHERE t.no_ktp = "'.$value.'"							
					');
	}

	public function simpan($input){
		$this->jenis_pemeriksaan 			= $input['jenis_pemeriksaan'];
		$this->waktu_pemeriksaan_mulai 		= $input['waktu_pemeriksaan_mulai'];
		$this->waktu_pemeriksaan_selesai 	= $input['waktu_pemeriksaan_selesai'];
		$this->tempat_pemeriksaan 			= $input['tempat_pemeriksaan'];
		$this->tanggal_pemeriksaan 			= $input['tanggal_pemeriksaan'];
		$this->save();
	}

	public function apdet($input){
    	
        self::find($input['idcekkesehatan'])->update($input);

    }

    public function hapus($id){
        self::find($id)->delete();
    }

}