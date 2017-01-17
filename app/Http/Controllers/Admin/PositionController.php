<?php

namespace App\Http\Controllers\Admin;

use App\Models\Position;
use Input;

class PositionController extends ResourceController {
	public function update( $id )
	{
		if ( Input::get( 'model' ) !== 'App\Models\Position' ) {
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
		if ( Input::get( 'model' ) !== 'App\Models\Position' ) {
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
		return true;
	}
}
