<?php
class Model_Get extends Model
{
    public function get($name)
	{		
        if ($_GET[$name])
            return $_GET[$name];
        
        return null;
	}
}
