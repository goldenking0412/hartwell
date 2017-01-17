<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Input;
use Hash;
use Auth;

class UserController extends ResourceController {
	public function update( $id )
	{
		if ( Input::get( 'model' ) !== 'App\User' ) {
			return $this->renderResponse( false, "I only update Users" );
		}

		$success = false;

		$post = parent::_update( $id, false, ['password'] );

		if ( $post ) {
			if ( $post instanceof \Illuminate\Http\JsonResponse ) {
				return $post;
			}

			$success = $this->updateRelations( $post );
			$this->updatePassword($post);
		}

		return $this->renderResponse( $success );
	}

	public function store()
	{
		if ( Input::get( 'model' ) !== 'App\User' ) {
			return $this->renderResponse( false, "I only update Users" );
		}

		$success = false;

		$post = parent::_store( false, ['password'] );

		if ( $post ) {
			if ( $post instanceof \Illuminate\Http\JsonResponse ) {
				return $post;
			}

			$success = $this->updateRelations( $post );
			$this->updatePassword($post);
		}

		return $this->renderResponse( $success, $post ? $post->id : null );
	}

	public function destroy( $id )
	{
		$model = Input::get( 'model' );

		if ( !class_exists( $model ) ) {
			return $this->renderResponse( false, "That model does not exist" );
		}

		$object = $model::find( $id );

		if ( is_null( $object ) ) {
			return $this->renderResponse( false, "Found no object with that ID" );
		}

		if ($object->id == 1 || Auth::user()->id != 1) {
			return $this->renderResponse( false, "Invalid permissions" );
		}

		try {
			$success = (bool) $object->delete();
			return $this->renderResponse( $success );
		} catch ( Exception $e ) {
			return $this->renderResponse( false, "Unable to delete that object. It's likely something depends on it." );
		}
	}

	private function updateRelations($page)
	{
		return true;
	}

	private function updatePassword($user)
	{
		$item = json_decode(Input::get('item'));

		if (Auth::user()->id == 1) {
			if (isset($item->password) && !empty($item->password)) {
				$user->password = Hash::make($item->password);
				$user->save();
			}
		}

		if (Auth::user()->id == $item->id) {
			if (isset($item->password) && !empty($item->password)) {
				$user->password = Hash::make($item->password);
				$user->save();
			}
		}
	}
}
