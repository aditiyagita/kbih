<?php 

class Pegawai extends Eloquent {

	protected $primaryKey = 'idpegawai';
	protected $table = 'pegawai';
	protected $guarded = array();

    protected $fillable = array(
                                'namalengkap', 
                                'alamat'
                                );

	public $timestamps = false;

	public static $rules = array(
                                
                            );

    public function user()
    {
        return $this->belongsTo('User', 'iduser');
    }


	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

    public function getPegawai($id = null){
        if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
    }

    public function simpan($input)
    {
        $this->iduser         = $input['iduser'];
        $this->namalengkap    = $input['namalengkap'];
        $this->alamat         = $input['alamat'];
        $this->save();
    }

    public function apdet($input){
        
        self::find($input['idbimbingan'])->update($input);

    }

    public function apdetByIdUser($input){
        
        self::find($input['idpegawai'])->update($input);

    }

    public function hapus($id){
        self::find($id)->delete();
    }   
}