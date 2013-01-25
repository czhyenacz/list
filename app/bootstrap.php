<?php

/**
 * My Application bootstrap file.
 */
use Nette\Application\Routers\Route;
use Nette\Environment;



// Load Nette Framework
require LIBS_DIR . '/Nette/loader.php';


// Configure application
$configurator = new Nette\Config\Configurator;

// Enable Nette Debugger for error visualisation & logging
//$configurator->setDebugMode($configurator::AUTO);
$configurator->enableDebugger(__DIR__ . '/../log');

// Enable RobotLoader - this will load all classes automatically
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->createRobotLoader()
	->addDirectory(APP_DIR)
	->addDirectory(LIBS_DIR)
	->register();

// Create Dependency Injection container from config.neon file
$configurator->addConfig(__DIR__ . '/config/config.neon');

$container = $configurator->createContainer();

// Setup router
$container->router[] = new Route('index.php', 'Listek:login', Route::ONE_WAY);


$container->router[] = new Route('listek', 'Listek:cisnik_listek');
$container->router[] = new Route('stoly', 'Listek:cisnik_stoly');
$container->router[] = new Route('platba', 'Listek:cisnik_platba');
$container->router[] = new Route('objednavka', 'Listek:objednavka');
$container->router[] = new Route('kuchyn_historie', 'Listek:kuchyn_historie');
$container->router[] = new Route('objednavka', 'Listek:kuchyn_objednavka');
$session = $container->getService('session');


// v novém containeru je třeba samostatně startovat, jelikož není zapnutý autostart
if ($container->session->exists()) {
    $session = $container->session->start();
}




dibi::connect(Environment::getConfig('database'));
// Configure and run the application!
$container->application->run();
