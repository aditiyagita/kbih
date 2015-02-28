<?php 

class Chat extends Eloquent {

	protected $primaryKey = 'idchat';
	protected $table = 'chat';
	protected $guarded = array();
	public $timestamps = false;

	public static $rules = array(

								);


	public function detailchat()
	{
	    return $this->hasMany('DetilChat', 'idchat');
	}

	public function sender()
	{
		return $this->BelongsTo('User', 'user1');
	}

	public function receiver()
	{
		return $this->BelongsTo('User', 'user2');
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

	public function getMyChat()
	{
		$id = Auth::user()->iduser;
		return self::where('user1', '=', $id)->orWhere('user2', '=', $id)->get();
	}

	public function getChatByUser($id)
	{
		return self::where('user1', '=', $id)->orWhere('user2', '=', $id)->get();
	}

	public function getChatNotExist()
	{
		$id = Auth::user()->iduser;
		return DB::select('
						SELECT 
							* 
						FROM users
						JOIN usertype ON users.idusertype = usertype.idusertype
						WHERE 
							iduser NOT IN (
											SELECT user1 FROM chat WHERE user1 = '.$id.'
											UNION ALL
											SELECT user2 FROM chat WHERE user1 = '.$id.'
											)
				');	
	}

	public function getChatBySenderReceiver($value)
	{
		return self::whereRaw('( user1 = ? AND user2 = ? ) or ( user1 = ? AND user2 = ? )', array($value['user1'],$value['user2'],$value['user2'],$value['user1']))->first();
	}

	public function simpan($input){
		$this->user1 	= $input['user1'];
		$this->user2 	= $input['user2'];
		$this->save();

		return $this->idchat;
	}

	public function apdet($input){
    	
        self::find($input['idpassport'])->update($input);

    }

    public function hapus($id){
        self::find($id)->delete();
    }

    public function hapusByNoKtp($value)
    {
    	# code...
    }

    public function hapusChatByUser($id)
	{
		return self::where('user1', '=', $id)->orWhere('user2', '=', $id)->delete();
	}

}