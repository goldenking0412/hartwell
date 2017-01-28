<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as Controller;

class BaseController extends Controller
{
	protected function renderView($view, $data = [])
	{
		return response()
			->view('layouts.main', [
				'content' => view($view, $data)->render(),
				//'productCategories' => $data['productCategories'],
				//'markets' => $data['markets'],
				//'showSubnav' => $data['showSubnav'],
				'metaDescription' => @$data['metaDescription'],
				'page' => @$data['page'],
				'globalData' => $data,
			]);
	}
}
