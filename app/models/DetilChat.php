<?php 

class DetilChat extends Eloquent {

	protected $primaryKey = 'iddetailchat';
	protected $table = 'detailchat';
	protected $guarded = array();
	public $timestamps = false;

	public static $rules = array(

								);

	public function user()
	{
	    return $this->BelongsTo('User', 'to');
	}

	public function chat()
	{
		return $this->BelongsTo('Chat', 'idchat');
	}

	protected function getDateFormat()
    {
        return date('Y-m-d H:i:s');
    }

	public function getChat($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function simpan($input){
		$this->idchat 	= $input['idchat'];
		$this->to 		= $input['to'];
		$this->isi 		= $input['isi'];
		$this->waktu 	= self::getDateFormat();
		$this->status 	= $input['status'];
		$this->save();
	}

	public function apdet($input){
    	
        self::find($input['idpassport'])->update($input);

    }

    public function apdetByRead($input)
    {
    	self::where('idchat', '=', $input['idchat'])
    				->where('to', '=', $input['to'])
    				->update($input);
    }

    public function hapus($id){
        self::find($id)->delete();
    }

    public function hapusByIdChat($value)
    {
    	self::where('idchat', '=', $value)->delete();
    }

}