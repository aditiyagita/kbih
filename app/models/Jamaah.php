<?php 

class Jamaah extends Eloquent {

	protected $primaryKey = 'no_ktp';
	protected $table = 'jamaah';
	protected $guarded = array();
	protected $fillable = array(
								'namalengkap', 
								'ayah', 
								'tempat_lahir', 
								'tanggal_lahir',
								'umur', 
								'jenis_kelamin', 
								'rambut',
								'alis',
								'hidung',
								'muka',
								'tinggi',
								'berat_badan',
								'pendidikan', 
								'pekerjaan', 
								'warga_negara', 
								'alamat', 
								'kelurahan',
								'kecamatan',
								'kabupaten',
								'propinsi',
								'kode_pos',
								'no_telp',
								'pergi_umrah',
								'nama_mahram',
								'hub_mahram',
								'nopend_mahram',
								'gol_darah',
								'tahun_keberangkatan',
								'status_jamaah',
								'paket_umrah',
								'kamar',
								'status',
								'foto'
								);
	public $timestamps = false;

	public static $rules = array(
								'no_ktp'=>'required'
								);

	public function user()
	{
	    return $this->belongsTo('User', 'iduser');
	}

	public function transaksi()
	{
	    return $this->hasMany('Transaksi', 'no_ktp');
	}

	public function cicilan()
	{
	    return $this->hasMany('Cicilan', 'no_ktp');
	}

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function getJamaah($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function getJamaahByIdUser($value)
	{
		return self::where('iduser', '=', $value)->first();
	}

	public function getNotHavePassport($value)
	{
		return DB::select("
							SELECT x.* FROM jamaah x WHERE no_ktp NOT IN (SELECT no_ktp FROM detailpassport WHERE idpassport = ".$value.")
					");	
		//return self::where('status' ,'=' , 2)->where('no_passport','=','')->get();
	}

	public function getNotHaveCekKesehatan($value)
	{
		return DB::select("
							SELECT x.idtransaksi, jamaah.* FROM `jamaah`
							join 
								( SELECT 
										max(idtransaksi) as idtransaksi, 
										no_ktp 
									FROM transaksi 
									GROUP BY no_ktp 
								) as x on jamaah.no_ktp = x.no_ktp
							WHERE x.idtransaksi NOT IN ( select idtransaksi FROM detailcekkesehatan WHERE idcekkesehatan = ".$value." )
						");
	}

	public function getNotHaveBimbingan($value)
	{
		return DB::select("
							SELECT x.idtransaksi, jamaah.* FROM `jamaah`
							join 
								( SELECT 
										max(idtransaksi) as idtransaksi, 
										no_ktp 
									FROM transaksi 
									--WHERE status = 33 
									GROUP BY no_ktp 
								) as x on jamaah.no_ktp = x.no_ktp
							WHERE x.idtransaksi NOT IN ( select idtransaksi FROM pesertabimbingan WHERE idbimbingan = ".$value." ) 
						");			
	}

	public function checkNoKtpSama($value)
	{
		$cek = self::where('no_ktp','=', $value['no_ktp'])->get();
		if( count($cek) > 0 ){
			return false;
		}else{
			return true;
		}
	}

	public function simpan($input){
		$this->iduser 				= $input['iduser'];
		$this->no_ktp				= $input['no_ktp'];
		$this->namalengkap  		= $input['nama'];
		$this->ayah 				= $input['ayah'];
		$this->tempat_lahir			= $input['tempatlahir'];
		$this->tanggal_lahir 		= $input['tanggallahir'];
		$this->umur 				= $input['umur'];
		$this->jenis_kelamin 		= $input['jeniskelamin'];
		$this->rambut 				= $input['rambut'];
		$this->alis 				= $input['alis'];
		$this->hidung 				= $input['hidung'];
		$this->muka 				= $input['muka'];
		$this->tinggi 				= $input['tinggi'];
		$this->berat_badan 			= $input['berat_badan'];
		$this->pendidikan	 		= $input['pendidikan'];
		$this->pekerjaan 	 		= $input['pekerjaan'];
		$this->warga_negara  		= $input['kewarganegaraan'];
		$this->alamat 				= $input['alamat'];
		$this->kelurahan 			= $input['kelurahan'];
		$this->kecamatan 			= $input['kecamatan'];
		$this->kabupaten 	 		= $input['kabupaten'];
		$this->propinsi 	 		= $input['propinsi'];
		$this->kode_pos 			= $input['kodepos'];
		$this->no_telp 		 		= $input['notelp'];
		$this->gol_darah 	 		= $input['golongan-darah'];
		$this->status 				= $input['status']; // status 1 not active status 2 active
		$this->foto 				= $input['foto'];
		$this->pernah_haji_umroh 	= $input['pernah'];
		$this->nama_mahram			= $input['pendamping'];
		$this->hub_mahram 			= $input['hub-pendamping'];
		$this->save();
	}

	public function apdet($input){
    	
        self::find($input['no_ktp'])->update($input);

    }

    public function apdetByIdUser($input){
        
        self::where('iduser', '=', $input['iduser'])->update($input);

    }

    public function hapus($id){
        self::find($id)->delete();
    }

}