<?php

namespace App\Domains\User\Controllers;

use App\Core\Controller;

class UserController extends Controller {

	public function index() {

		return $this->view('/App/Domains/User/Views/index');

	}
}

