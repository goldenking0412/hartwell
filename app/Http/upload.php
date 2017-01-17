<?php

require_once __DIR__.'/Libraries/FileObject.php';

Route::post( 'upload', function() {
	$success  = false;
	$filename = null;

	if ( Input::hasFile( 'qqfile' ) || Input::hasFile('upload') ) {
		$input = Input::hasFile( 'qqfile' ) ? Input::file( 'qqfile' ) : Input::file( 'upload' );
		$file_object  = new FileObject($input, Input::get( 'obfuscate', true ) );

		if ( Input::get( 'image' ) && !$file_object->isImage() ) {
			return Response::json( array( 'success' => false, 'error' => "Nice try, mister! That's not even an image." ) );
		}

		$directory = Input::get( 'directory', 'uploads' );

		@mkdir(public_path() . '/' . $directory, 0777, true);

		$path = public_path() . '/' . $directory . '/' . $file_object->getFullFilename();

		$success = File::put($path , $file_object->raw) !== false;
	} else {
		return Response::json( array( 'success' => false, 'error' => 'An unacceptable or nonexistent file was provided.' ) );
	}

	if (isset($directory) && $directory === 'uploads') {
		$funcNum = $_GET['CKEditorFuncNum'];
		$url = '/uploads/' . $file_object->getFullFilename();
		$message = '';
		echo "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
		exit();
	}

	return Response::json( array( 'success' => $success, 'filename' => $file_object->getFullFilename(), ) );
} );
