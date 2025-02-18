<?php

namespace App\Controllers;
use App\CodeIgniter\HTTP\RequestInterface;
use App\CodeIgniter\HTTP\ResponseInterface;
use App\Psr\Log\LoggerInterface;
use App\Models\Okres;
use App\Models\Obce;
use App\Models\AdresniMisto;
use App\Models\Ulice;
use App\Models\CastObce;

class Home extends BaseController
{
    var $okres;
    var $obce;
    var $data = [];
    public function initController( $request, $response, $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
    
        // Preload any models, libraries, etc, here.
        $this->okres = new Okres();
        $this->obce = new Obce();
        $this->data['okres'] = $this->okres->where('kraj', 141)->findAll();
        // E.g.: $this->session = service('session');
    }
    public function index(): string
    {
        $this->data['page_title'] = "Home";
        $this->data['obec'] = $this->obce->select("obec.nazev, Count(*) as pocet")->join("cast_obce", "obec.kod = cast_obce.obec", "inner")->join("ulice", "ulice.cast_obce = cast_obce.kod", "inner")->join("adresni_misto", "adresni_misto.ulice = ulice.kod", "inner")->join("okres", "okres.kod = obec.okres")->groupBy("obec.kod")->orderBy("pocet", "desc")->paginate(20);
        $pager = $this->obce->pager;
        $this->data['pager'] = $this->obce->pager;
        return view('index', $this->data);
    }
    public function okres($id,$pageSize): string
    {
        if ($pageSize == null) {
            $pageSize = 20;
        }
        $this->data['obec'] = $this->obce->select("obec.nazev, Count(*) as pocet")->join("cast_obce", "obec.kod = cast_obce.obec", "inner")->join("ulice", "ulice.cast_obce = cast_obce.kod", "inner")->join("adresni_misto", "adresni_misto.ulice = ulice.kod", "inner")->join("okres", "okres.kod = obec.okres")->where("okres.kod", $id)->groupBy("obec.kod")->orderBy("pocet", "desc")->paginate($pageSize);
        $this->data['page_title'] = $this->okres->where('kod', $id)->findAll()[0]['nazev'];
        $pager = $this->obce->pager;
        $this->data['pager'] = $this->obce->pager;
        $this->data['okres'] = $this->okres->where('kod', $id)->findAll();
        return view('okres', $this->data);
    }
}
