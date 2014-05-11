<?php
 try {
    //Register an autoloader
    $loader = new \Phalcon\Loader();
    $loader->registerDirs(array(
        '../app/controllers/',
        '../app/models/'
    ))->register();

    //Create a DI
    $di = new Phalcon\DI\FactoryDefault();
    //Setup the database service
    $di->set('db', function(){
    	return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
    			"host" => "localhost",
    			"username" => "root",
    			"password" => "",
    			"dbname" => "estudent"
    	));
    });
    
    //Registering Volt as template engine
$di->set('view', function() {

    $view = new \Phalcon\Mvc\View();

    $view->setViewsDir('../app/views/');

    $view->registerEngines(array(
        ".volt" => 'Phalcon\Mvc\View\Engine\Volt'
    ));

    return $view;
});
    //Setup a base URI so that all generated URIs include the "tutorial" folder
    $di->set('url', function(){
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri('/tutorial/');
        return $url;
    });

    //Handle the request
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch(\Phalcon\Exception $e) {
     echo "PhalconException: ", $e->getMessage();
}