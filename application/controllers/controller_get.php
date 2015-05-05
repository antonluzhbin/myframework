<?php

class Controller_Get extends Controller
{    
    function action_test()
	{
        $this -> page = $this -> model -> get('page');
        $this -> count = $this -> model -> get('count');
        $this -> view -> generate('myview', 'get_template.php', $this);
	}
}
