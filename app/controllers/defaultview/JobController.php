<?php namespace Defaultview;

use BaseController, View, Session, Auth, Redirect, Hash, JobVacancy, Department, Input, Lamaran, User, Pelamar;

class JobController extends BaseController {


	public function __construct(){
      $this->menu         = array(
                    			     array('menu' => 'Home',
                                      'link' => '/'
                                      ),
                    			     array('menu' => 'Lowongan Kerja',
                                      'link' => 'job-vacancy'
                                      ),
                    		    );
    	$this->tanda        = $this->tanda = array('', 'active', '', '');
      $this->title        = "JC & K Advertising - Lowongan Kerja";
      $this->jobvacancy   = new JobVacancy();
      $this->department   = new Department();
      $this->user         = new User();
      $this->lamaran      = new Lamaran();
      $this->pelamar      = new Pelamar();

	}

  public function index(){
      $data['menu']       = $this->menu;
      $data['tanda']      = $this->tanda;
      $data['title']      = $this->title = "JC & K Advertising - Lowongan Kerja";
      $data['jobvacancy'] = $this->jobvacancy->getDataJobVacancy();
      $data['department'] = $this->department->getDataDepartment();
      $data['jobwidget']  = $this->jobvacancy->getWidget();
      return View::make('pelamar.jobvacancy.index')
              ->with('data', $data);
  }

  public function show($id){
      $data['menu']       = $this->menu;
      $data['tanda']      = $this->tanda;
      $data['title']      = $this->title = "JC & K Advertising - Lowongan Kerja";
      $data['jobvacancy'] = $this->jobvacancy->getDataJobVacancy($id);
      $data['department'] = $this->department->getDataDepartment();
      $data['jobwidget']  = $this->jobvacancy->getWidget();
      $data['id']         = $id;

      if(Auth::check()){
        $data['ceklamaran'] = $this->lamaran->cekLamaran($id);
      }
      $data['bulan']      = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
      return View::make('pelamar.jobvacancy.show')
              ->with('data', $data);
  }

  public function store(){
    $input                = Input::all();
    $idpelamar            = Auth::user()->pelamar->idpelamar;
    $cekk                 = $this->pelamar->getDataPelamar($idpelamar);
    $cektinggi            = $cekk->tinggi_badan;
    $cekberat             = $cekk->berat_badan;

    $pendidikan           = count($cekk->pendidikan);
    $bahasa               = count($cekk->bahasa);
    $pertanyaan           = count($cekk->jawaban);

    if( $pendidikan == 0 OR $bahasa == 0 OR $pertanyaan == 0){
      return Redirect::back()->withErrors('Maaf, Data Resume Harus Dilengkapi');
    }else{
      $this->lamaran->simpan($input);
    }
    return Redirect::back();
  }
  
}