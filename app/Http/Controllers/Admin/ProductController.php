<?php

namespace App\Http\Controllers\Admin;

use App\Models\Band;
use App\Models\Banner;
use Input;

class ProductController extends ResourceController {
	public function update( $id )
	{
		if ( Input::get( 'model' ) !== 'App\Models\Product' ) {
			return $this->renderResponse( false, "I only update Posts" );
		}

		$success = false;

		$post = parent::_update( $id, false );

		if ( $post ) {
			if ( $post instanceof \Illuminate\Http\JsonResponse ) {
				return $post;
			}

			$success = $this->updateRelations( $post );
		}

		return $this->renderResponse( $success );
	}

	public function store()
	{
		if ( Input::get( 'model' ) !== 'App\Models\Product' ) {
			return $this->renderResponse( false, "I only update Posts" );
		}

		$success = false;

		$post = parent::_store( false );

		if ( $post ) {
			if ( $post instanceof \Illuminate\Http\JsonResponse ) {
				return $post;
			}

			$success = $this->updateRelations( $post );
		}

		return $this->renderResponse( $success, $post ? $post->id : null );
	}

	private function updateRelations($page)
	{
		$item  = json_decode( Input::get( 'item' ) );
		$item->id = $page->id;

		$ids = [];

		if (isset($item->bands)) {
			foreach ($item->bands as $key => $band) {
				if ( property_exists( $band, 'id' ) ) {
					$ids[] = $band->id;
					$found = Band::find( $band->id );
					$found->update(array(
						'body' => @$band->body,
						//'page_id' => $item->id,
						'delta' => $band->delta,
						'type' => $band->type,
						'dark' => (int) $band->dark,
						'image' => @$band->image,
					));
				} else {
					$new = Band::create( array(
						'body' => @$band->body,
						//'page_id' => $item->id,
						'delta' => $band->delta,
						'type' => $band->type,
						'dark' => (int) $band->dark,
						'image' => @$band->image,
					) );
					$ids[] = $new->id;
				}
			}
		}

		$page->bands()->sync($ids);

		$ids = [];

		if (isset($item->banners)) {
			foreach ($item->banners as $key => $banner) {
				if ( property_exists( $banner, 'id' ) ) {
					$ids[] = $banner->id;
					$found = Banner::find( $banner->id );
					$found->update(array(
						'body' => @$banner->body,
						//'page_id' => $item->id,
						'delta' => $banner->delta,
						'image' => @$banner->image,
						'headline' => @$banner->headline,
					));
				} else {
					$new = Banner::create( array(
						'body' => @$banner->body,
						//'page_id' => $item->id,
						'delta' => $banner->delta,
						'image' => @$banner->image,
						'headline' => @$banner->headline,
					) );
					$ids[] = $new->id;
				}
			}
		}

		$page->banners()->sync($ids);

		return true;
	}
}
