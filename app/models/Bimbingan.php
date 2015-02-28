<?php 

class Bimbingan extends Eloquent {

	protected $primaryKey = 'idbimbingan';
	protected $table = 'bimbingan';
	protected $guarded = array();

    protected $fillable = array(
                                'tanggal_bimbingan',
                                'waktu_bimbingan_awal', 
                                'waktu_bimbingan_akhir',
                                'tempat_bimbingan',
                                'nama_pembimbing'
                                );

	public $timestamps = false;

	public static $rules = array(
                                'tanggal_bimbingan' => 'required',
                                'waktu_bimbingan_awal' => 'required', 
                                'waktu_bimbingan_akhir' => 'required',
                                'tempat_bimbingan' => 'required',
                                'nama_pembimbing' => 'required'
                            );


	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

    public function getBimbingan($id = null){
        if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
    }

    public function simpan($input)
    {
        $this->tanggal_bimbingan        = $input['tanggal_bimbingan'];
        $this->waktu_bimbingan_awal     = $input['waktu_bimbingan_awal'];
        $this->waktu_bimbingan_akhir    = $input['waktu_bimbingan_akhir'];
        $this->tempat_bimbingan         = $input['tempat_bimbingan'];
        $this->nama_pembimbing          = $input['nama_pembimbing'];
        $this->save();

        return $this->idbimbingan;
    }

    public function apdet($input){
        
        self::find($input['idbimbingan'])->update($input);

    }

    public function hapus($id){
        self::find($id)->delete();
    }   
}