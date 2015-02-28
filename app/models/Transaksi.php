<?php 

class Transaksi extends Eloquent {

	protected $primaryKey = 'idtransaksi';
	protected $table = 'transaksi';
	protected $guarded = array();
	protected $fillable = array(
								'no_ktp', 
								'no_spph',
								'layanan', 
								'tahun_keberangkatan', 
								'bulan_keberangkatan',
								'status_jamaah',
								'paket',
								'kamar',
								'total_biaya',
								'status'
								);
	public $timestamps = false;

	public static $rules = array(
								
								);

	public function user()
	{
	    return $this->belongsTo('User', 'iduser');
	}

	public function jamaah()
	{
	    return $this->belongsTo('Jamaah', 'no_ktp');
	}

	public function pembayaran()
	{
	    return $this->hasMany('Pembayaran', 'idtransaksi');
	}


	public function detilcekkesehatan()
	{
	    return $this->belongsTo('DetilCekKesehatan', 'idtransaksi');
	}

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function getTransaksi($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function getByLayanan($value)
	{
		return self::where('layanan', '=', $value)->get();
	}

	public function getPemasukanByYear($value)
	{
		return DB::select('
							SELECT 
								COUNT(idtransaksi) as qty, 
								layanan, s.value as satuan, 
								COUNT(idtransaksi)*s.value as total 
							FROM transaksi x
							JOIN generic_master as s on s.desc = x.layanan
							WHERE tahun_keberangkatan = '.$value.'
							GROUP BY layanan, s.value
						');	
	}

	public function simpan($input){
		$this->no_ktp				= $input['no_ktp'];
		$this->layanan 				= $input['pilihan-ibadah'];
		$this->no_spph 				= $input['no_spph'];
		$this->tahun_keberangkatan 	= $input['tahun'];
		$this->bulan_keberangkatan  = $input['bulan'];
		$this->status_jamaah 		= $input['status-jamaah'];
		$this->paket 	 			= $input['paket'];
		$this->kamar 				= $input['kamar'];
		$this->total_biaya			= $input['total'];
		$this->status 				= 32; //belum lunas
		$this->save();

		return $this->idtransaksi;
	}

	public function apdet($input){
    	
        self::find($input['idtransaksi'])->update($input);

    }

    public function hapus($id){
        self::find($id)->delete();
    }

    public function hapusByNoKtp($value)
    {
    	self::where('no_ktp', '=', $value)->delete();
    }

    public function cekPelunasan()
    {
    	$no_ktp = Auth::user()->jamaah->no_ktp;
    	$cek = self::where('no_ktp', '=', $no_ktp)
    				->where('status', '=', 32)
    				->get();
    	return count($cek);

    }

    public function getTransaksiByNoKtp($no_ktp)
    {
    	return self::where('no_ktp', '=', $no_ktp)
    				->where('status', '=', 32)
    				->orderBy('idtransaksi', 'DESC')
    				->first();
    }

    public function myTransaksi()
    {
    	$no_ktp = Auth::user()->jamaah->no_ktp;
    	return self::where('no_ktp', '=', $no_ktp)
    				//->where('status', '=', 32)
    				->first();
    }

    public function myTransaksiMany()
    {
    	$no_ktp = Auth::user()->jamaah->no_ktp;
    	return self::where('no_ktp', '=', $no_ktp)
    				//->where('status', '=', 32)
    				->get();
    }

    public function getMyTransaksi($value)
	{
		$no_ktp = Auth::user()->jamaah->no_ktp;
    	return self::where('no_ktp', '=', $no_ktp)
    				->where('status', '=', 33)
    				->get();
	}

	public function laporanJamaah($value, $tahun)
	{
		return DB::select('
							SELECT COALESCE(Y.jumlah,0) AS jumlah FROM 
										(
											select idarticle as bulan from article where idarticle < 13
										) AS X
										LEFT JOIN (
											SELECT 
												GM.desc as layanan,
												COUNT(T.no_ktp) as jumlah,
												tahun_keberangkatan as tahun,
												bulan_keberangkatan as bulan
											FROM transaksi T
												JOIN generic_master GM on T.layanan = GM.id
											WHERE GM.desc = "'.$value.'"
												AND tahun_keberangkatan = "'.$tahun.'"
											GROUP BY
												GM.desc,
												tahun_keberangkatan,
												bulan_keberangkatan
											) AS Y on X.bulan = Y.bulan
										ORDER BY X.bulan ASC
						');
	}

}