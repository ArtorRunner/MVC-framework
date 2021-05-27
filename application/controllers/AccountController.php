<?php

namespace application\controllers;
use application\core\Controller;

class AccountController extends Controller
{
	public function loginAction()
	{
		$this -> view -> render('Страница Входа');
	}
	
	public function registerAction()
	{
		$this -> view -> render('Страница Регистрации');
	}
}