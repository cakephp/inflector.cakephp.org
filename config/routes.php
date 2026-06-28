<?php
declare(strict_types=1);

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        $builder->connect('/', ['controller' => 'Inflections', 'action' => 'index']);
        $builder->connect(
            '/{string}',
            ['controller' => 'Inflections', 'action' => 'index'],
            ['pass' => ['string']]
        );
    });
};
