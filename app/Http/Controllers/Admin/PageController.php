<?php

namespace App\Http\Controllers\Admin;

use App\Models\Band;
use App\Models\Banner;
use Input;

class PageController extends ResourceController {
	public function update( $id )
	{
		if ( Input::get( 'model' ) !== 'App\Models\Page' ) {
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
		if ( Input::get( 'model' ) !== 'App\Models\Page' ) {
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
						'body_2' => @$band->body_2,
						'body_3' => @$band->body_3,
						'page_id' => $item->id,
						'delta' => $band->delta,
						'type' => $band->type,
						'background' => $band->background,
						'image' => @$band->image,
						'floating' => @$band->floating,
						'map' => @$band->map,
					));
				} else {
					$new = Band::create( array(
						'body' => @$band->body,
						'body_2' => @$band->body_2,
						'body_3' => @$band->body_3,
						'page_id' => $item->id,
						'delta' => $band->delta,
						'type' => $band->type,
						'background' => $band->background,
						'image' => @$band->image,
						'floating' => @$band->floating,
						'map' => @$band->map,
					) );
					$ids[] = $new->id;
				}
			}
		}

		// Delete anything we didn't just update
		if( ! empty( $ids ) )
			Band::wherePageId( $page->id )->whereNotIn( 'id', $ids )->delete();

		if (empty($ids))
			Band::wherePageId($page->id)->delete();

		$ids = [];

		if (isset($item->banners)) {
			foreach ($item->banners as $key => $banner) {
				if ( property_exists( $banner, 'id' ) ) {
					$ids[] = $banner->id;
					$found = Banner::find( $banner->id );
					$found->update(array(
						'body' => @$banner->body,
						'page_id' => $item->id,
						'delta' => $banner->delta,
						'image' => @$banner->image,
						'headline' => @$banner->headline,
					));
				} else {
					$new = Banner::create( array(
						'body' => @$banner->body,
						'page_id' => $item->id,
						'delta' => $banner->delta,
						'image' => @$banner->image,
						'headline' => @$banner->headline,
					) );
					$ids[] = $new->id;
				}
			}
		}

		// Delete anything we didn't just update
		if( ! empty( $ids ) )
			Banner::wherePageId( $page->id )->whereNotIn( 'id', $ids )->delete();

		if (empty($ids))
			Banner::wherePageId($page->id)->delete();

		return true;
	}
}
