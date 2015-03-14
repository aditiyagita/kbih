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
							SELECT DISTINCT type,uraian,url, tanggal FROM (

								SELECT * FROM (
									SELECT 
										a.idpassport AS id,
										'Passport' AS type,
										CASE
											WHEN uraian = 'Pengambilan Buku Passport'
										THEN 'Jadwal Pengambilan Buku Passport'
										ELSE 'Jadwal Pembuatan Passport'
										END AS uraian,
										'jamaah/passport' AS url,
										tanggal_pembuatan AS tanggal
									FROM `passport` a
									JOIN detailpassport b ON a.idpassport = b.idpassport
									JOIN jamaah c ON b.no_ktp = c.no_ktp
									WHERE c.iduser = '".$iduser."'
										AND a.idpassport NOT IN ( SELECT refid FROM notifikasi WHERE jenis = 'Passport' AND iduser = '".$iduser."' )
									ORDER BY a.idpassport DESC
									LIMIT 0,2
								) as z	

							UNION ALL

								SELECT * FROM (
									SELECT 
										iddetailcekkesehatan AS id,
										'Cek Kesehatan' AS type,
										d.jenis_pemeriksaan AS uraian,
										'jamaah/cekkesehatan' AS url,
										tanggal_pemeriksaan AS tanggal
									FROM jamaah a 
									JOIN transaksi b ON a.no_ktp = b.no_ktp
									JOIN detailcekkesehatan c ON b.idtransaksi = c.idtransaksi
									JOIN cekkesehatan d ON c.idcekkesehatan = d.idcekkesehatan
									WHERE a.iduser = '".$iduser."' 
										AND iddetailcekkesehatan NOT IN ( SELECT refid FROM notifikasi WHERE jenis = 'Cek Kesehatan' AND iduser = '".$iduser."' )
									ORDER BY iddetailcekkesehatan DESC
									LIMIT 0,2
								) AS a

							) AS x
						");		
	}

	public function getNotif()
	{
		$iduser = Auth::user()->iduser;

		return DB::select("
								SELECT * FROM (
									SELECT 
										a.idpassport AS id,
										'Passport' AS type,
										'Jadwal Pengambilan Passport' AS uraian,
										'jamaah/passport' AS url,
										tanggal_pembuatan AS tanggal
									FROM `passport` a
									JOIN detailpassport b ON a.idpassport = b.idpassport
									JOIN jamaah c ON b.no_ktp = c.no_ktp
									WHERE c.iduser = '".$iduser."'
										AND a.idpassport NOT IN ( SELECT refid FROM notifikasi WHERE jenis = 'Passport' AND iduser = '".$iduser."' )
									ORDER BY a.idpassport DESC
									LIMIT 0,2
								) as z		

							UNION ALL

								SELECT * FROM (
									SELECT 
										iddetailcekkesehatan AS id,
										'Cek Kesehatan' AS type,
										d.jenis_pemeriksaan AS uraian,
										'jamaah/cekkesehatan' AS url,
										tanggal_pemeriksaan AS tanggal
									FROM jamaah a 
									JOIN transaksi b ON a.no_ktp = b.no_ktp
									JOIN detailcekkesehatan c ON b.idtransaksi = c.idtransaksi
									JOIN cekkesehatan d ON c.idcekkesehatan = d.idcekkesehatan
									WHERE a.iduser = '".$iduser."' 
										AND iddetailcekkesehatan NOT IN ( SELECT refid FROM notifikasi WHERE jenis = 'Cek Kesehatan' AND iduser = '".$iduser."' )
									ORDER BY iddetailcekkesehatan DESC
									LIMIT 0,2
								) AS a
							
						");		
	}

}