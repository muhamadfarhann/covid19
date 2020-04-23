<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$covidNasional = json_decode(file_get_contents('https://api.kawalcorona.com/indonesia/'), true);
		$covidNasionalProvinsi = json_decode(file_get_contents('https://api.kawalcorona.com/indonesia/provinsi/'), true);
		$data = [
			'title' => 'Data Covid-19 Nasional',
			'nasional' => $covidNasional,
			'provinsi' => $covidNasionalProvinsi,
			'isi' => 'home',
		];
		echo view('layouts/wrapper', $data);
	}

	public function PetaNasional()
	{
		$covidNasionalProvinsi = json_decode(file_get_contents('https://services5.arcgis.com/VS6HdKS0VfIhv8Ct/arcgis/rest/services/COVID19_Indonesia_per_Provinsi/FeatureServer/0/query?where=1%3D1&outFields=*&outSR=4326&f=json'), true);
		$data = [
			'title' => 'Peta Covid-19 Nasional',
			'provinsi' => $covidNasionalProvinsi,
			'isi' => 'PetaNasional',
		];
		echo view('layouts/wrapper', $data);
	}

	public function Global()
	{
		$provinceGlobal = json_decode(file_get_contents('https://api.kawalcorona.com/'), true);
		$positifGlobal = json_decode(file_get_contents('https://api.kawalcorona.com/positif/'), true);
		$sembuhGlobal = json_decode(file_get_contents('https://api.kawalcorona.com/sembuh/'), true);
		$meninggalGlobal = json_decode(file_get_contents('https://api.kawalcorona.com/meninggal/'), true);
		$data = [
			'title' => 'Data Covid-19 Global',
			'negara' => $provinceGlobal,
			'positif' => $positifGlobal,
			'sembuh' => $sembuhGlobal,
			'meninggal' => $meninggalGlobal,
			'isi' => 'Global',
		];
		echo view('layouts/wrapper', $data);
	}

	public function PetaGlobal()
	{
		$provinceGlobal = json_decode(file_get_contents('https://api.kawalcorona.com/'), true);
		$data = [
			'title' => 'Peta Covid-19 Global',
			'global' => $provinceGlobal,
			'isi' => 'PetaGlobal',
		];
		echo view('layouts/wrapper', $data);
	}
}
