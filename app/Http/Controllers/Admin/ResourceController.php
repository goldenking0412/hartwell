<?php

namespace App\Http\Controllers\Admin;

use Input;
use Exception;
use stdClass;
use MetaTag;
use Str;

class ResourceController extends Admin {

	/**
	 * Get a single resource.
	 *
	 * @return Response
	 */
	public function show( $id )
	{
		$model = Input::get( 'model' );

		if ( !class_exists( $model ) ) {
			return $this->renderResponse( false, "That model does not exist" );
		}

		$item = $model::find( $id );

		if ( !is_null( $item ) ) {
			if ( property_exists( $item, 'eager_relations' ) ) {
				$item->load( $item->eager_relations );
			}
			return $this->renderResponse( true, $item->toArray( true ) );
		}

		return $this->renderResponse( false, "Resource not found" );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return $this->_store();
	}

	protected function _store( $respond = true, $except = array() )
	{
		$model = Input::get( 'model' );
		$item  = json_decode( Input::get( 'item' ) );

		if ( !class_exists( $model ) ) {
			return $this->renderResponse( false, "That model does not exist" );
		}

		$object = new $model;

		if ( in_array( 'slug', $object->getFillable() ) && property_exists( $item, 'slug' ) ) {
			if ( $model::whereSlug( $item->slug )->count() ) {
				return $this->renderResponse( false, sprintf( 'The URL slug %s is already being used. Please choose another.', $item->slug ) );
			}

			$item->slug = $item->slug;
		}

		$fillable_fields = array_except(
			array_intersect_key(
				(array) $item,
				array_flip( $object->getFillable() )
			),
			$except
		);

		if ( in_array( 'delta', $object->getFillable() ) ) {
			$last_delta = $model::max( 'delta' );
			$fillable_fields['delta'] = is_null( $last_delta ) ? 0 : ++$last_delta;
		}

		$object->fill( $fillable_fields );

		$success = $object->save();

		if ( $respond ) {
			return $this->renderResponse( $success, $object->id );
		}

		return $object;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update( $id )
	{
		return $this->_update( $id );
	}

	protected function _update( $id, $respond = true, $except = array() )
	{
		$model = Input::get( 'model' );
		$item  = json_decode( Input::get( 'item' ) );

		if ( !class_exists( $model ) ) {
			return $this->renderResponse( false, "That model does not exist" );
		}

		$object = $model::find( $id );

		if ( is_null( $object ) ) {
			return $this->renderResponse( false, "Found no object with that ID" );
		}

		if ( in_array( 'slug', $object->getFillable() ) && property_exists( $item, 'slug' ) ) {
			if ( $model::whereSlug( $item->slug )->where( 'id', '<>', $object->id )->count() ) {
				return $this->renderResponse( false, sprintf( 'The URL slug %s is already being used. Please choose another.', $item->slug ) );
			}
		}

		$fillable_fields = array_except(
			array_intersect_key(
				(array) $item,
				array_flip( $object->getFillable() )
			),
			$except
		);

		$success = $object->update( $fillable_fields );

		if ( $respond ) {
			return $this->renderResponse( $success );
		}

		return $success ? $object : false;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
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

		try {
			$success = (bool) $object->delete();
			return $this->renderResponse( $success );
		} catch ( Exception $e ) {
			return $this->renderResponse( false, "Unable to delete that object. It's likely something depends on it." );
		}
	}

	protected function updateMeta( stdClass $item, $type )
	{
		if ( isset( $item->meta ) ) {
			if ( property_exists( $item->meta, 'id' ) ) {
				$meta         = $item->meta;
				$related_meta = MetaTag::find( $meta->id );
				$related_meta->update( array(
					'title'       => $meta->title,
					'description' => $meta->description,
				) );
			} else {
				MetaTag::create( array(
					'target_type' => $type,
					'target_id'   => $item->id,
					'title'       => $item->meta->title,
					'description' => $item->meta->description,
				) );
			}
		}
	}
}
