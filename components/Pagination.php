<?php

class Pagination {

	public $total;

	public $limit;

	public $countPages;
	
	public function __construct($total, $limit)
	{
		$this->total = $total; 
		$this->limit = $limit; 
		$this->countPages = ceil($this->total / $this->limit);
	}

	public function get()
	{
		$arr = []; //существующие страницы 
		
		for($page = 1; $page <= $this->countPages; $page++){
			$arr[$page] = $page;
		}

		$links = []; //формируются ссылки 

		$current = $this->currentPage(); //что бы не писать везде $this->currentPage()
		
		/*
		 * Можно убрать. Сделал на всякий случай, 
		 * потому что в GET['page'] будет строка, 
		 * которую я складываю и вычитаю с числом в циклах
		 */
		settype($current, "integer"); 
		
		$key = array_search($current, $arr);

		if($key){

			//левая часть (4 ссылки)
			for($i = 4; $i >= 1; $i--){
				if($current - $i >= 1){
					$links[] = "<a href=\"/?users=getAll&page=" . ($current-$i) ."\">" . ($current-$i) . "</a>";
				}
			}

			array_push($links, $current); //активная ссылка

			/*
			 * Максимум 10 страниц
			 * Если слева вывелось 3 страницы
			 * То осталось 7 и это пустое место
			 * Заполнятеся остальными страницами 
			 */
			$freeArraySpaces = 10 - count($links); 

			//правая часть
			for($i = 1; $i <= $freeArraySpaces; $i++){
				if(array_search($current+$i, $arr)){
					$links[] = "<a href=\"/?users=getAll&page=" . ($current+$i) ."\">" . ($current+$i) . "</a>";
				}
				
			}
		}

		array_unshift($links, $this->firstPage()); //добавляю ссылку на первую страницу
		array_push($links, $this->lastPage()); //добавляю ссылку на первую страницу
		
		return $links;
	}

	
	
	public function currentPage()
	{
		$allUrl = parse_url($_SERVER["REQUEST_URI"], PHP_URL_QUERY);
		$currentPage = explode("&", $allUrl);
		$page = explode("=", $currentPage[1])[1];
		
		return $page;
	}

	public function firstPage()
	{
		return "<a href=\"/?users=getAll&page=" . 1 ."\">Первая</a>";
	}

	public function lastPage()
	{
		return "<a href=\"/?users=getAll&page=" . $this->countPages ."\">Последняя</a>";
	}
	
}