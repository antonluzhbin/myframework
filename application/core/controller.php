<?php
class Controller {
	public $model;
	public $view;
    
	function __construct($model)
	{
		$this -> view = new View();
        if ($model)
            $this -> model = $model;
        else
            $this -> model = new Model();
	}
	function action_index()
	{
        $this -> view -> generate('myview', 'template.php');
	}
}
