<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RaceYear;
use Config\KonfiguracniSoubor;
use App\Libraries\File;
use App\Libraries\ArrayLib;
use App\Models\Race;


class Main extends BaseController
{
    public function index()
    {
        $config = new KonfiguracniSoubor();
        $perPage = $config->strankovani;

        $sex = "W";
        $RaceYear = new RaceYear();
        $raceV = $RaceYear->where("sex", $sex)->orderBy('year', 'DESC')->paginate($perPage);
        
        $pager = $RaceYear->pager;

        $data = [
            "infoRace" => $raceV,
            "pager" => $pager
        ];

        echo view("races/index", $data);

    }
    public function zavody($id)
    {
        $RaceYear = new RaceYear();
        $data = [
            "race" => $RaceYear->find($id)
        ];
        echo view("races/druhaStranka", $data);
    }

    public function add()
    {

        
            $sex = "W";
        
            $db = new RaceYear();
            $raceModel = new Race();
        
            $arrayLib = new ArrayLib();
        
            $years = $db
                ->table('race_type')
                ->distinct()
                ->orderBy('year', 'DESC')
                ->findColumn('year');
        
            $years2 = $arrayLib->setValueToKey($years);
        
            $categories = $db
                ->table('race_type')
                ->distinct()
                ->findColumn('category');
        
            $categories2 = $arrayLib->setValueToKey($categories);
        
            $races = $raceModel
                ->table('cyklo_race')
                ->select('id, default_name, type')
                ->orderBy('type', 'ASC')
                ->orderBy('default_name', 'ASC')
                ->get()
                ->getResultArray();
        
            $grouped = [];
        
            foreach ($races as $race) {
        
                $type = $race['type'];
        
                $grouped[$type][] = [
                    'id' => $race['id'],
                    'default_name' => $race['default_name']
                ];
            }
        
            $data = [
                "kategorie" => $categories2,
                "rocniky2" => $years2,
                "zavody" => $grouped
            ];
        
            echo view('races/add', $data);
        
    }

    public function create()
    {
        $real_name   = $this->request->getPost('real_name');
        $year        = $this->request->getPost('year');
        $start_date  = $this->request->getPost('start_date');
        $end_date    = $this->request->getPost('end_date');
        $category    = $this->request->getPost('categories');
        $logo = $this->request->getPost('logo');

        $raceModel = new RaceYear();

        $data = [
            'real_name' => $real_name,
            'year' => $year,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'category' => $category,
            'logo' => $logo,
            'sex' => 'W'
        ];


        //var_dump($data);

        $raceModel->save($data);

        return redirect()->to('form-helper');
    }
}
