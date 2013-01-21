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
$container->router[] = new Route('index.php', 'Hledam:default', Route::ONE_WAY);

$container->router[] = new Route('kontakt', 'Rozhrani:kontakt');
$container->router[] = new Route('podminky', 'Rozhrani:podminky');
//$container->router[] = new Route('vybraný-dárek-je-[<nazev>]', 'Hledam:detail');
$container->router[] = new Route('vybrany-darek-je-[<nazev_pekny>]', 'Hledam:detail');
$container->router[] = new Route('prihlaseni', 'Rozhrani:prihlaseni');
$container->router[] = new Route('originální-dárek-pro-[<hledany_vyraz>]', 'Hledam:vypis');
$container->router[] = new Route('originální-dárek-pro-[<hledany_vyraz>]', 'Hledam:vypis_vyhl');
$container->router[] = new Route('hledám-dárek-pro-[<hledany_vyraz>]', 'Hledam:vypis_vyhl');
$container->router[] = new Route('hledám-dárek-pro-[<hledany_vyraz>]', 'Hledam:vypis');
$container->router[] = new Route('emailhavr', 'Hledam:emailhavr');
$container->router[] = new Route('okno', 'Hledam:okno');

$container->router[] = new Route('vypis_vyhl', 'Hledam:vypis_vyhl');
$container->router[] = new Route('po', 'Hledam:po');
$container->router[] = new Route('menu', 'Rozhrani:menu');
$container->router[] = new Route('Po2', 'Hledam:po2');

$container->router[] = new Route('odhlaseni', 'Rozhrani:out');
$container->router[] = new Route('test', 'Rozhrani:test');

$container->router[] = new Route('detail_1', 'Hledam:detail_1');
$container->router[] = new Route('O nás', 'Rozhrani:o_nas');
$container->router[] = new Route('faq','Rozhrani:faq');
$container->router[] = new Route('osobní údaje', 'Rozhrani:osobni_udaje');
$container->router[] = new Route('klient', 'Rozhrani:pokus');
$container->router[] = new Route('sprava_uctu', 'Rozhrani:klient_detail');
$container->router[] = new Route('sprava_kampane', 'Rozhrani:klient_ucet');
$container->router[] = new Route('<presenter>-[<action>]-pro-[<hledany_vyraz>]', 'Hledam:default');
$container->router[] = new Route('klient-registrace', 'Rozhrani:klient_registrace');
$container->router[] = new Route('klient-prihlaseni', 'Rozhrani:prihlaseni');
$container->router[] = new Route('klient-update', 'Rozhrani:klient_update');
$container->router[] = new Route('klient-update-form', 'Rozhrani:klient_update_form');
$container->router[] = new Route('klient-update-form', 'Rozhrani:klient_update_form');
$container->router[] = new Route('master_1', 'Rozhrani:master_1');

$container->router[] = new Route('master_spravauctu', 'Rozhrani:master_spravauctu');
$container->router[] = new Route('master_urlchecker', 'Rozhrani:master_urlchecker');
$container->router[] = new Route('master_aktualizacefeedu', 'Rozhrani:master_aktualizacefeedu');
$container->router[] = new Route('klient_detailproadmina', 'Rozhrani:klient_detailproadmina');
$container->router[] = new Route('klient_ucetproadmina', 'Rozhrani:klient_ucetproadmina');
$session = $container->getService('session');


// v novém containeru je třeba samostatně startovat, jelikož není zapnutý autostart
if ($container->session->exists()) {
    $session = $container->session->start();
}




dibi::connect(Environment::getConfig('database'));
// Configure and run the application!
$container->application->run();
