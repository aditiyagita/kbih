<?php 

class Cicilan extends Eloquent {

	protected $primaryKey = 'idpembayaran';
	protected $table = 'pembayaran';
	protected $guarded = array();
	protected $fillable = array(
								'idtransaksi', 
								'no_ktp', 
								'tanggal', 
								'total',
								'status'
								);
	public $timestamps = false;

	public static $rules = array(
								'total'=>'required'
								);

	public function transaksi()
	{
	    return $this->belongsTo('Transaksi', 'idtransaksi');
	}

	public function jamaah()
	{
	    return $this->belongsTo('Jamaah', 'no_ktp');
	}

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function getCicilan($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function simpan($input){
		$this->idtransaksi			= $input['idtransaksi'];
		$this->no_ktp				= Auth::user()->jamaah->no_ktp;
		$this->tanggal 				= self::getDateFormat();
		$this->total 				= $input['total'];
		$this->status 				= 36; //Submited By Jamaah
        $this->kwitansi             = $input['kwitansi'];
		$this->save();
	}

	public function apdet($input){
    	
        self::find($input['idpembayaran'])->update($input);

    }

    public function hapus($id){
        self::find($id)->delete();
    }

    public function hapusByNoKtp($value)
    {
    	self::where('no_ktp','=', $value)->delete();
    }

    public function hapusByTransaksi($value)
    {
    	self::where('idtransaksi','=', $value)->delete();
    }

    public function getMyCicilan($value)
    {
    	$no_ktp = Auth::user()->jamaah->no_ktp;
    	return self::where('no_ktp', '=', $no_ktp)
    					->where('idtransaksi', '=', $value)
    					->where('status', '=', 34)
    					->get();
    }

    public function getCicilanByNoKtp($value, $no_ktp)
    {
    	
    	return self::where('no_ktp', '=', $no_ktp)
    					->where('idtransaksi', '=', $value)
    					->where('status', '=', 34)
    					->get();
    }

    public function totalCicilan($value)
    {
    	return self::where('idtransaksi','=',$value)->where('status','=', 34)->get();
    }

    public function laporanPembayaran($type, $tahun)
    {
    	return DB::select('
    						SELECT 
	COALESCE(Y.jumlah/1000,0) AS jumlah 
FROM ( select idarticle as bulan from article where idarticle < 13 ) AS X 
	LEFT JOIN ( 	
        		SELECT 	
        				GM.desc as layanan, 
        				SUM(P.total) as jumlah, 
						YEAR(tanggal) as tahun, 
        				MONTH(tanggal) as bulan 
       			FROM pembayaran P 
        			JOIN transaksi T on P.idtransaksi = T.idtransaksi 
        			JOIN generic_master GM on T.layanan = GM.id 
        		WHERE P.status = 34 
        				AND GM.desc = "'.$type.'" 
        				AND YEAR(tanggal) = "'.$tahun.'" 
        		GROUP BY GM.desc, YEAR(tanggal), MONTH(tanggal) 
    		) AS Y on X.bulan = Y.bulan ORDER BY X.bulan ASC
    					');	
    }

}