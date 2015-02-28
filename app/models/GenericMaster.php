<?php 

class GenericMaster extends Eloquent {

	protected $primaryKey = 'id';
	protected $table = 'generic_master';
	protected $guarded = array();

	public $timestamps = false;

	public static $rules = array();


	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

    public function getDataByType($value)
    {
    	return self::where('type', '=', $value)->get();
    }

    public function getGenericMaster($id = null){
        if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
    }
}