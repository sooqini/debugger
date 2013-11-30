<?php

/** @var \Illuminate\Routing\Route[] $routes */
use Tracy\Dumper;

$routes = Route::getRoutes();
/** @var \Illuminate\Routing\Route $currentRoute */
$currentRoute = Route::current();
?>

<style type="text/css">
    tr.bold td {
        font-weight: bold !important;
    }
</style>

<h1>Routing</h1>

<div class="nette-inner">
    <table>
        <thead>
        <tr>
            <th>Method</th>
            <th>Path</th>
            <th>Parameters</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($routes as $route): ?>
            <tr<?php if($route === $currentRoute): ?>
                class="bold"
            <?php endif; ?>>
                <td>
                    <?php echo implode("|", $route->methods()); ?>
                </td>
                <td>
                    <?php echo $route->uri(); ?>
                </td>
                <td>
                    <?php
                    try {
                        echo Dumper::toHtml($route->parameters(), array(Dumper::COLLAPSE => TRUE));
                    } catch(\LogicException $e) {
                        echo Dumper::toHtml(array());
                    }
                     ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
