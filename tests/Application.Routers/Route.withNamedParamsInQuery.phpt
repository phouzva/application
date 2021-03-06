<?php

/**
 * Test: Nette\Application\Routers\Route with WithNamedParamsInQuery
 */

use Nette\Application\Routers\Route,
	Tester\Assert;


require __DIR__ . '/../bootstrap.php';

require __DIR__ . '/Route.inc';


$route = new Route('?action=<presenter> & act=<action [a-z]+>', [
	'presenter' => 'Default',
	'action' => 'default',
]);

testRouteIn($route, '/?act=action', 'Default', [
	'action' => 'action',
	'test' => 'testvalue',
], '/?act=action&test=testvalue');

testRouteIn($route, '/?act=default', 'Default', [
	'action' => 'default',
	'test' => 'testvalue',
], '/?test=testvalue');

testRouteIn($route, '/?action[]=invalid&act=default', NULL);
