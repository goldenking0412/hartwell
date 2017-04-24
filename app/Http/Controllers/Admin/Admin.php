<?php

namespace App\Http\Controllers\Admin;

use Input, View, Response, Auth, Session, Redirect, Controller, Request, Cache, Hash;
use App\User as User;
use App\Models\Page as Page;
use App\Models\Product as Product;
use App\Models\ProductCategory as ProductCategory;
use App\Models\PlatformCategory as PlatformCategory;
use App\Models\Market as Market;
use App\Models\News as News;
use App\Models\Submission as Submission;
use App\Models\Application as Application;
use App\Models\Position as Position;
use Illuminate\Routing\Controller as InitController;


class Admin extends InitController {
	protected $layout = 'layouts.admin';

	public function __construct()
	{
		$this->beforeFilter( 'authenticated' );
	}

	protected function wantsData()
	{
		return Input::has( 'data' );
	}

	protected function wantNoData()
	{
		if ( Input::has( 'data' ) ) {
			die();
		}
	}

	/**
	 * Setup the layout used by the controller.
	 */
	protected function setupLayout()
	{
		if ( !is_null( $this->layout ) ) {
			$this->layout = View::make( $this->layout );
		}
	}

    public function callAction($method, $parameters)
    {
        $this->setupLayout();

        $response = call_user_func_array(array($this, $method), $parameters);


        if (is_null($response) && ! is_null($this->layout))
        {
            $response = $this->layout;
        }

        return $response;
    }

	protected function renderView( $title, $view_name, $data = array() )
	{
		if ( Request::ajax() ) {
			return View::make( $view_name )->with( $data )->render();
		}

		$this->layout->with( 'title', $title );
	}

	protected function renderResponse( $success, $data = array() )
	{
		return Response::json( array(
			'success' => $success,
			'data'    => $data,
		) );
	}

	public function getLogout()
	{
		Auth::logout();
		Session::flush();
		return Redirect::to( 'admin/login' );
	}

	public function getLogin()
	{
		$this->wantNoData();

		if ( Auth::check() ) {
			return Redirect::to( 'admin' );
		}

		Session::reflash();

		return $this->renderView( 'Log In', 'admin.login' );
	}

	public function getIndex()
	{
		return Redirect::to( 'admin/home' );
	}

	public function getHome()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => Page::whereType('home')->with(['bands', 'banners'])->first()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.page'
		);
	}

	public function getAftermarketsupport()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => Page::whereType('aftermarket')->with(['bands', 'banners'])->first()->toArray(),
			) );
		}

		return $this->renderView(
			'Aftermarket Support',
			'admin.globals.page'
		);
	}

	public function getCapabilities()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => Page::whereType('capabilities')->with(['bands', 'banners'])->first()->toArray(),
			) );
		}

		return $this->renderView(
			'Capabilities',
			'admin.globals.page'
		);
	}

	public function getContact()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => Page::whereType('contact')->with(['bands', 'banners'])->first()->toArray(),
			) );
		}

		return $this->renderView(
			'Contact',
			'admin.globals.page'
		);
	}

	public function getQualitycontrol()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => Page::whereType('qualitycontrol')->with(['bands', 'banners'])->first()->toArray(),
			) );
		}

		return $this->renderView(
			'Quality Control',
			'admin.globals.page'
		);
	}

	public function getHr()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => Page::whereType('hr')->with(['bands', 'banners'])->first()->toArray(),
			) );
		}

		return $this->renderView(
			'Human Resources',
			'admin.globals.page'
		);
	}

	public function getFaarepair()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => Page::whereType('faarepair')->with(['bands', 'banners'])->first()->toArray(),
			) );
		}

		return $this->renderView(
			'FAA Repair Station',
			'admin.globals.page'
		);
	}

	public function getNewsLanding()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => Page::whereType('news')->with(['bands', 'banners'])->first()->toArray(),
			) );
		}

		return $this->renderView(
			'News Landing Page',
			'admin.globals.page'
		);
	}

	public function getCareers()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => Page::whereType('careers')->with(['bands', 'banners'])->first()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.page'
		);
	}

	public function getPlatforms()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => Page::whereType('platforms')->with(['bands', 'banners'])->first()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.page'
		);
	}

	private function getNewsItem($id)
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => News::find($id)->toArray(),
			) );
		}

		return $this->renderView(
			'News',
			'admin.globals.news-item'
		);
	}

	public function getNewsItems($id = null)
	{
		if (! is_null($id)) {
			return $this->getNewsItem($id);
		}
		if ( $this->wantsData() ) {
			return Response::json( array(
				'items' => News::orderBy('delta')->get()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.news'
		);
	}

	public function getContactItems()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'items' => \App\Models\Contact::orderBy('delta')->get()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.contacts'
		);
	}

	public function getFooterItems()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'items' => \App\Models\FooterItem::orderBy('delta')->get()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.footer-items'
		);
	}

	public function getSupplierLogos()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'items' => \App\Models\SupplierLogo::orderBy('delta')->get()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.supplier-logos'
		);
	}

	private function getMarket($id)
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => Market::find($id)->load(['bands', 'banners'])->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.market'
		);
	}

	public function getMarkets($id = null)
	{
		if (! is_null($id)) {
			return $this->getMarket($id);
		}
		if ( $this->wantsData() ) {
			return Response::json( array(
				'items' => Market::orderBy('delta')->get()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.markets'
		);
	}

	private function getPosition($id)
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => Position::find($id)->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.position'
		);
	}

	public function getPositions($id = null)
	{
		if (! is_null($id)) {
			return $this->getPosition($id);
		}

		if ( $this->wantsData() ) {
			return Response::json( array(
				'items' => Position::get()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.positions'
		);
	}

	public function getAbout()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => Page::whereType('about')->with(['bands', 'banners'])->first()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.page'
		);
	}

	public function getClients()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => Page::whereType('clients')->with(['bands', 'banners'])->first()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.page'
		);
	}

	public function getQuality()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => Page::whereType('quality')->with(['bands', 'banners'])->first()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.page'
		);
	}

	public function getCertifications()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => Page::whereType('certifications')->with(['bands', 'banners'])->first()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.page'
		);
	}

	private function getProduct($id)
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => Product::find($id)->load(['bands', 'banners'])->toArray(),
				'product_categories' => ProductCategory::all()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.product'
		);
	}

	public function getSubmissions()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'items' => Submission::orderBy('id', 'desc')->get()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.submissions'
		);
	}

	public function getApplications()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'items' => Application::orderBy('id', 'desc')->get()->load('position')->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.applications'
		);
	}

	public function getUsers()
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'items' => User::orderBy('id')->get()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.users'
		);
	}

	public function getProducts($id = null)
	{
		if (! is_null($id)) {
			return $this->getProduct($id);
		}
		if ( $this->wantsData() ) {
			return Response::json( array(
				'items' => Product::orderBy('delta')->get()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.products'
		);
	}

	private function getPlatformCategory($id)
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => PlatformCategory::find($id)->load(['bands.bandImages', 'banners'])->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.platform-category'
		);
	}

	public function getPlatformCategories($id = null)
	{
		if (! is_null($id)) {
			return $this->getPlatformCategory($id);
		}
		if ( $this->wantsData() ) {
			return Response::json( array(
				'items' => PlatformCategory::orderBy('delta')->get()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.platform-categories'
		);
	}

	private function getProductCategory($id)
	{
		if ( $this->wantsData() ) {
			return Response::json( array(
				'item' => ProductCategory::find($id)->load(['bands.bandImages', 'banners'])->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.product-category'
		);
	}

	public function getProductCategories($id = null)
	{
		if (! is_null($id)) {
			return $this->getProductCategory($id);
		}
		if ( $this->wantsData() ) {
			return Response::json( array(
				'items' => ProductCategory::orderBy('delta')->get()->toArray(),
			) );
		}

		return $this->renderView(
			'Home',
			'admin.globals.product-categories'
		);
	}

	public function postLogin()
	{
		$user = User::whereName(Input::get('username'))->first();

		if ($user && Hash::check(Input::get('password'), $user->password)) {
			Auth::login($user, true);
			return Redirect::to('admin');
		}

		Input::flash();

		return Redirect::to( 'admin/login' )->withInput();
	}

}
