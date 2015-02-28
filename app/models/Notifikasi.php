<?php 

class Notifikasi extends Eloquent {

	protected $primaryKey = 'idnotifikasi';
	protected $table = 'notifikasi';
	protected $guarded = array();
	protected $fillable = array(
								'iduser', 
								'idnotifikasi', 
								'refid', 
								'jenis'
								);
	public $timestamps = false;

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function getData($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function simpan($input){
		
		$this->insert($input);
	}

	public function getNotifikasi()
	{
		$iduser = Auth::user()->iduser;

		return DB::select("
							SELECT DISTINCT type,uraian,url FROM (
							SELECT 
								idbimbingan AS id,
								'Bimbingan' AS type,
								'Jadwal Bimbingan' AS uraian,
								'jamaah/bimbingan' AS url
							FROM bimbingan
							WHERE idbimbingan NOT IN ( SELECT refid FROM notifikasi WHERE jenis = 'Bimbingan' AND iduser = '".$iduser."' )
							
							UNION ALL

							SELECT 
								idpassport AS id,
								'Passport' AS type,
								'Jadwal Pengambilan Passport' AS uraian,
								'jamaah/passport' AS url
							FROM `passport`
							WHERE idpassport NOT IN ( SELECT refid FROM notifikasi WHERE jenis = 'Passport' AND iduser = '".$iduser."' )
							
							UNION ALL

							SELECT 
								iddetailcekkesehatan AS id,
								'Cek Kesehatan' AS type,
								d.jenis_pemeriksaan AS uraian,
								'jamaah/cekkesehatan' AS url
							FROM jamaah a 
							JOIN transaksi b ON a.no_ktp = b.no_ktp
							JOIN detailcekkesehatan c ON b.idtransaksi = c.idtransaksi
							JOIN cekkesehatan d ON c.idcekkesehatan = d.idcekkesehatan
							WHERE a.iduser = '".$iduser."' 
								AND iddetailcekkesehatan NOT IN ( SELECT refid FROM notifikasi WHERE jenis = 'Cek Kesehatan' AND iduser = '".$iduser."' )

							) AS x
						");		
	}

	public function getNotif()
	{
		$iduser = Auth::user()->iduser;

		return DB::select("
							SELECT 
								idbimbingan AS id,
								'Bimbingan' AS type,
								'Jadwal Bimbingan' AS uraian,
								'jamaah/bimbingan' AS url
							FROM bimbingan
							WHERE idbimbingan NOT IN ( SELECT refid FROM notifikasi WHERE jenis = 'Bimbingan' AND iduser = '".$iduser."' )
							
							UNION ALL

							SELECT 
								idpassport AS id,
								'Passport' AS type,
								'Jadwal Pengambilan Passport' AS uraian,
								'jamaah/passport' AS url
							FROM `passport`
							WHERE idpassport NOT IN ( SELECT refid FROM notifikasi WHERE jenis = 'Passport' AND iduser = '".$iduser."' )
							
						");		
	}

}