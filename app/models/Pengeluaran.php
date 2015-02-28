<?php 

class Pengeluaran extends Eloquent {

	protected $primaryKey = 'idpengeluaran';
	protected $table = 'pengeluaran';
	protected $guarded = array();

	public $timestamps = false;

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function getPengeluaran($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function getPengeluaranByYear($value)
	{
		return DB::select('
							SELECT * FROM pengeluaran WHERE YEAR(tanggal) = '.$value.'
						');	
	}

	public function simpan($input)
	{
		$this->tanggal 			= $input['tanggal'];
		$this->unit 			= $input['unit'];
		$this->harga_satuan		= $input['harga_satuan'];
		$this->volume 			= $input['volume'];
		$this->harga_total		= $input['harga_satuan']*$input['volume'];
		$this->save();
	}

	public function apdet($input){
        
        self::find($input['idpengeluaran'])->update($input);

    }

	public function hapus($id){
        self::find($id)->delete();
    }
}