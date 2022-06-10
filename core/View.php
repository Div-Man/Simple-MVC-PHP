<?php

class View {

	public function render($layout, $data=null)
	{
		$layoutPath = $_SERVER['DOCUMENT_ROOT'] . "/App/views/".$layout.".php";
		include $layoutPath;
		die;
	}
	
}