<?php

namespace application\controllers;
use application\core\Controller;
use application\lib\Db;

class MainController extends Controller
{
	public function IndexAction()
	{
		$result = $this->model->getNews();
		$vars = [
			'news' => $result,
		];
		$this->view->render('Главная страница', $vars);
	}
	
}