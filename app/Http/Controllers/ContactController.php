<?php

namespace App\Http\Controllers;

use Request;
use Response;
use Input;
use App\Models\Submission;
use App\Models\Application;
use App\Models\Position;
use Mail;
use URL;

class ContactController extends BaseController
{
	public function submit()
	{
		$response = [
			'success' => true,
			'message' => null,
			'field'   => null,
		];

		$fields = [
			'name' => 'Name',
			'email' => 'Email',
			'recipient' => 'Contact',
			//'g-recaptcha-response' => 'Human verification',
		];

		if (! filter_var(Input::get('recipient'), FILTER_VALIDATE_EMAIL)) {
			$response['success'] = false;
			$response['message'] = 'There was an error sending the message.';
			return Response::json($response);
		}

		foreach ($fields as $key => $value) {
			if (! Input::has($key)) {
				$response['success'] = false;
				$response['message'] = $value . ' is required';
				$response['field'] = $key;
				return Response::json($response);
			}
		}

		//$submission = Submission::create(Input::all());

		$inputs = Input::all();

		Mail::send('emails.contact-form', ['inputs' => $inputs], function($message) use ($inputs) {
			$message->to(Input::get('recipient'))
				->subject('Hartwell Contact Form: ' . $inputs['name']);
		});

		return Response::json([
			'success' => true,
			//'model' => $submission->toArray(),
		]);
	}

	public function apply()
	{
		$response = [
			'success' => true,
			'message' => null,
			'field'   => null,
		];

		$fields = [
			'name' => 'Name',
			'email' => 'Email',
			'phone' => 'phone',
			'resume' => 'resume',
			//'g-recaptcha-response' => 'Human verification',
		];

		// foreach ($fields as $key => $value) {
		// 	if (! Input::has($key)) {
		// 		$response['success'] = false;
		// 		$response['message'] = $value . ' is required';
		// 		$response['field'] = $key;
		// 		return Response::json($response);
		// 	}
		// }

		$submission = Application::create(Input::all());

		$inputs = Input::all();

		$position = Position::find($inputs['position_id']);

		if ($position) {
			$inputs['position'] = $position->title;
		}

		unset($inputs['position_id']);

		if (isset($inputs['resume']) && ! empty($inputs['resume'])) {
			$inputs['resume'] = URL::to('') . '/resumes/' . $inputs['resume'];
		}

		// Mail::send('emails.contact-form', ['inputs' => $inputs], function($message) use ($inputs) {
		// 	$message->to('jobsat@araero.com')
		// 		->subject('Job Application: ' . $inputs['name']);
		// });

		return Response::json([
			'success' => true,
			'model' => $submission->toArray(),
		]);
	}
}
