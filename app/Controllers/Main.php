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
    {
        $RaceYear = new RaceYear();
        $data = [
            "race" => $RaceYear->find($id)
        ];
        echo view("druhaStranka", $data);
    }

    public function add()
    {

        $sex = "W";
        $db = new RaceYear();

        $years = $db->table('race_type')->distinct()->orderBy('year', 'DESC')->findColumn('year');
        $categories = $db->table('race_type')->distinct()->findColumn('category');

        $data = [
            "rocniky" => $years,
            "kategorie" => $categories
        ];

        echo view('add', $data);
    }

    public function create()
    {
        $name = $this->request->getPost('name');
        $short_name = $this->request->getPost('short_name');
        $description = $this->request->getPost('description');

        $raceModel = new RaceYear();

        $data = [
            'name' => $name,
            'short_name' => $short_name,
            'info' => $description
        ];

        $result = $raceModel->save($data);
        if ($result) {
            service('alerts')->set('success', 'recordCreated');
        } else {
            service('alerts')->set('danger', 'recordCreated');
        }

        return redirect()->to('form-alert');
    }
}
