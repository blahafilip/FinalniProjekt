<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RaceYear;
use Config\KonfiguracniSoubor;


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

        echo view("uvodniStranka", $data);

    }
    public function zavody($id)
<<<<<<< HEAD
{
    $RaceYear = new RaceYear();
    
    $raceV = $RaceYear->where("id", $id)->findAll();

    $data = [
        "infoRace" => $raceV
    ];

    echo view("infoZavody", $data);
}
=======
    {
        $RaceYear = new RaceYear();
        $data = [
            "race" => $RaceYear->find($id)
        ];
        echo view("druhaStranka", $data);
    }
>>>>>>> c396d3c268108d12fb0860ce9d46e38b94e9ce7c
}
