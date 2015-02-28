<?php 

class Article extends Eloquent {

	protected $primaryKey = 'idarticle';
	protected $table = 'article';
	protected $guarded = array();
	protected $fillable = array(
								'judul', 
								'isi', 
								'type', 
								'created_by',
								'created_at',  
								'created_updated'
								);
	public $timestamps = false;

	public static $rules = array(
								
								);

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function getInformasi($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function simpan($input){
		$this->judul				= $input['judul'];
		$this->isi  				= $input['isi'];
		$this->type 				= $input['type'];
		$this->created_by			= '';
		$this->created_at 			= self::getDateFormat();
		$this->created_updated 		= self::getDateFormat();
		$this->save();
	}

	public function apdet($input){
    	
        self::find($input['idarticle'])->update($input);

    }

}