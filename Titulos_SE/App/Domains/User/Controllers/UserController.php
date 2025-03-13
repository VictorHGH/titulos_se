<?php

namespace App\Domains\User\Controllers;

use App\Core\Controller;

class UserController extends Controller {

	public function index() : string {

		return $this->view('index', [
			'title' => 'Home Page',
			'description' => 'Esta es la página de inicio'
		]);

	}
}

