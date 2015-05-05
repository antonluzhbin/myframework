<?php

class Controller_Post extends Controller
{    
    function action_index()
	{
        $this -> book = $this -> model -> get('book');
        $this -> descr = $this -> model -> get('descr');
        $this -> view -> generate('myview', 'post_template.php', $this);
	}
}
