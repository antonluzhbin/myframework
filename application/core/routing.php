<?php
class Routing
{
	static function execute() 
	{
		$controllerName = 'Main';	
		$actionName = 'index';
		$piecesOfUrl = explode('/', $_SERVER['REQUEST_URI']);
		
		if (!empty($piecesOfUrl[1])) 
		{
			$controllerName = $piecesOfUrl[1];
		}
		if (!empty($piecesOfUrl[2]))
		{
			$actionName = $piecesOfUrl[2];
		}
		$modelName = 'Model_' . $controllerName;
		$controllerName = 'Controller_' . $controllerName;
		$actionName = 'action_' . $actionName;
		$fileWithModel = strtolower($modelName) . '.php';
		$fileWithModelPath	= "application/models/" . $fileWithModel;
		$model = null;
        if (file_exists($fileWithModelPath))
		{
			include $fileWithModelPath;
            $model = new $modelName;
		}        
		$fileWithController = strtolower($controllerName) . '.php';
		$fileWithControllerPath = "application/controllers/" . $fileWithController;
		if (file_exists($fileWithControllerPath))
		{
			include $fileWithControllerPath;
		}
		else
		{
			header("HTTP/1.0 404 Not Found");
            exit();
		}
        $controller = new $controllerName($model);
		$action = $actionName;
		if (method_exists($controller, $action))
		{
			call_user_func(array($controller, $action), $piecesOfUrl);
		}
		else
		{
            header("HTTP/1.0 404 Not Found");
            exit();
		}
	}	
}
