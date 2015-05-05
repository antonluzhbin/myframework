<?php
class Model_Post extends Model
{
    public function get($name)
	{		
        if ($_POST[$name])
            return $_POST[$name];
        
        return null;
	}
}
