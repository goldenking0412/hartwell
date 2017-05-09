<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\ProductCategory;
use App\Models\PlatformCategory;
use App\Models\Market;
use App\Models\Product;
use App\Models\News;
use App\Models\Position;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends BaseController
{

	private function simplePage($key, $showSubnav = false, $extra = [])
	{
		$page = Page::with(['bands', 'banners'])->whereType($key)->first();

		$datas = array_merge($extra, [
			'page' => $page,
			'productCategories' => ProductCategory::all(),
			'platformCategories' => PlatformCategory::all(),
			'metaDescription' => $page->meta_description,
		]);

		return $this->renderView('home', $datas);
	}

	public function home()
	{
		return $this->simplePage('home');
	}

	public function support()
	{
		return redirect('/support/aftermarket-support');
	}

	public function aftermarketSupport()
	{
		return $this->simplePage('aftermarket');
	}

	public function faaRepairStation()
	{
		return $this->simplePage('faarepair');
	}

	public function qualityControl()
	{
		return $this->simplePage('qualitycontrol');
	}

	public function capabilities()
	{
		return $this->simplePage('capabilities', false, ['hideSubNav' => true]);
	}

	public function hr()
	{
		return $this->simplePage('hr', false, ['hideSubNav' => true]);
	}

	public function contact()
	{
		return $this->simplePage('contact', false, [
			'hideSubNav' => true,
			'usa'    => Contact::whereGroup('usa')->orderBy('delta')->get(),
			'sales'  => Contact::whereGroup('sales')->orderBy('delta')->get(),
			'europe' => Contact::whereGroup('europe')->orderBy('delta')->get(),
			'distributors' => Contact::whereGroup('distributors')->orderBy('delta')->get(),
			'sales_representatives' => Contact::whereGroup('sales-representatives')->orderBy('delta')->get(),
		]);
	}

	private function career($slug)
	{
		$career = Position::whereSlug($slug)->first();

		if (! $career) {
			return abort(404);
		}

		return $this->renderView('career', [
			'position' => $career,
			'productCategories' => ProductCategory::orderBy('delta')->get(),
			'platformCategories' => PlatformCategory::orderBy('delta')->get(),
			'markets' => Market::orderBy('delta')->get(),
			'showSubnav' => true,
		]);
	}

	public function careers($slug = null)
	{
		if ($slug) {
			return $this->career($slug);
		}
		return $this->simplePage('careers', false, ['positions' => Position::all()]);
	}

	public function faa()
	{
		return $this->simplePage('faa-repair');
	}

	public function markets()
	{
		$category = Market::first();

		return redirect('/markets/' . $category->slug);
	}

	public function market($slug)
	{
		$category = Market::whereSlug($slug)->with(['bands', 'banners'])->first();

		return $this->renderView('market', [
			'market' => $category,
			'productCategories' => ProductCategory::orderBy('delta')->get(),
			'platformCategories' => PlatformCategory::orderBy('delta')->get(),
			'markets' => Market::orderBy('delta')->get(),
			'showSubnav' => true,
		]);
	}

	public function clients()
	{
		return $this->simplePage('clients');
	}

	public function quality()
	{
		return $this->simplePage('quality');
	}

	public function certifications()
	{
		return $this->simplePage('certifications');
	}

	public function platforms()
	{
		$category = PlatformCategory::first();
		return redirect('/platforms/' . $category->slug);
	}

	public function platformCategory($slug = null)
	{
		$category = PlatformCategory::whereSlug($slug)->with(['bands.bandImages', 'banners', 'hotspots'])->first();

		if (! $category) {
			abort(404);
		}

		return $this->renderView('platform-category', [
			'category' => $category,
			'productCategories' => ProductCategory::orderBy('delta')->get(),
			'platformCategories' => PlatformCategory::orderBy('delta')->get(),
			'metaDescription' => $category->meta_description,
		]);
	}

	public function products()
	{
		$category = ProductCategory::first();

		return redirect('/products/' . $category->slug);
	}

	public function productCategory($slug = null)
	{
		$category = ProductCategory::whereSlug($slug)->with(['bands.bandImages', 'banners'])->first();

		if (! $category) {
			abort(404);
		}

		return $this->renderView('category', [
			'category' => $category,
			'productCategories' => ProductCategory::orderBy('delta')->get(),
			'platformCategories' => PlatformCategory::orderBy('delta')->get(),
			'metaDescription' => $category->meta_description,
		]);
	}

	public function newsItem($slug = null)
	{
		$news = News::whereSlug($slug)->first();

		if (! $news) {
			abort(404);
		}

		return $this->renderView('news-item', [
			'news' => $news,
			'productCategories' => ProductCategory::orderBy('delta')->get(),
			'platformCategories' => PlatformCategory::orderBy('delta')->get(),
			'metaDescription' => $news->meta_description,
		]);
	}

	public function search(Request $request)
	{

		$query = <<<EOF

		SELECT * FROM (
			SELECT
				'page' AS type,
				p.title AS title,
				p.slug AS slug,
				CONCAT_WS(
					' ',
					GROUP_CONCAT(CONCAT_WS(' ', bd.body, bd.body_2, bd.body_3) SEPARATOR ' '),
					GROUP_CONCAT(CONCAT_WS(' ', bn.headline, bn.body) SEPARATOR ' ')
				) AS body
			FROM pages p
			LEFT JOIN bands bd ON p.id = bd.page_id
			LEFT JOIN banners bn ON p.id = bn.page_id
			GROUP BY p.id
			UNION
			SELECT 'news' AS type, n.title AS title, n.slug AS slug, n.body AS body
			FROM news n
			UNION
			SELECT
				'product_category' AS type,
				p.title AS title,
				p.slug AS slug,
				CONCAT_WS(
					' ',
					GROUP_CONCAT(CONCAT_WS(' ', bd.body, bd.body_2, bd.body_3) SEPARATOR ' '),
					GROUP_CONCAT(CONCAT_WS(' ', bn.headline, bn.body) SEPARATOR ' ')
				) AS body
			FROM product_categories p
			LEFT JOIN band_product_category bpc ON p.id = bpc.product_category_id
			LEFT JOIN bands bd ON bpc.band_id = bd.id
			LEFT JOIN banner_product_category bbpc ON p.id = bbpc.product_category_id
			LEFT JOIN banners bn ON bbpc.banner_id = bn.id
			GROUP BY p.id
			UNION
			SELECT
				'platform_category' AS type,
				p.title AS title,
				p.slug AS slug,
				CONCAT_WS(
					' ',
					GROUP_CONCAT(CONCAT_WS(' ', bd.body, bd.body_2, bd.body_3) SEPARATOR ' '),
					GROUP_CONCAT(CONCAT_WS(' ', bn.headline, bn.body) SEPARATOR ' ')
				) AS body
			FROM platform_categories p
			LEFT JOIN band_platform_category bpc ON p.id = bpc.platform_category_id
			LEFT JOIN bands bd ON bpc.band_id = bd.id
			LEFT JOIN banner_platform_category bbpc ON p.id = bbpc.platform_category_id
			LEFT JOIN banners bn ON bbpc.banner_id = bn.id
			GROUP BY p.id
		) z
		WHERE
			z.title LIKE ?
			OR z.body LIKE ?
EOF;

		$search = \Input::get('query');

		$results = \DB::select($query, [
			'%'.((string) $search).'%',
			'%'.((string) $search).'%',
		]);

		if (empty($search)) {
			$results = [];
		}

		return $this->renderView('search', [
			'hideSubNav' => true,
			'results' => $results,
			'platformCategories' => PlatformCategory::orderBy('delta')->get(),
			'productCategories' => ProductCategory::orderBy('delta')->get(),
			'metaDescription' => '',
		]);
	}

	public function getTime()
	{
		$la_time = new \DateTime('now', new \DateTimeZone('America/Los_Angeles'));
		$ny_time = new \DateTime('now', new \DateTimeZone('America/New_York'));
		$ln_time = new \DateTime('now', new \DateTimeZone('Europe/London'));
		$hk_time = new \DateTime('now', new \DateTimeZone('Asia/Hong_Kong'));

		return response()->json([
			'la' => $la_time->format('H:i'),
			'ny' => $ny_time->format('H:i'),
			'ln' => $ln_time->format('H:i'),
			'hk' => $hk_time->format('H:i'),
		]);
	}

	public function news($slug = null)
	{
		return $this->simplePage('news', false, [
			'news' => News::all(),
			'hideSubNav' => true,
		]);
		// $news = News::all();


		// if (! $news) {
		// 	abort(404);
		// }

		// if (! is_null($slug)) {
		// 	return $this->newsItem($slug);
		// }

		// return $this->renderView('news', [
		// 	'news' => $news,
		// 	'productCategories' => ProductCategory::orderBy('delta')->get(),
		// 	'markets' => Market::orderBy('delta')->get(),
		// 	'showSubnav' => true,
		// ]);
	}
}
