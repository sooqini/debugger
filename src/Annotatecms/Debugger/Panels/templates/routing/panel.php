<?php

/** @var \Illuminate\Routing\Route[] $routes */
use Tracy\Dumper;

$routes = Route::getRoutes();
/** @var \Illuminate\Routing\Route $currentRoute */
$currentRoute = Route::getCurrentRoute();
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
                    <?php echo implode("|", $route->getMethods()); ?>
                </td>
                <td>
                    <?php echo $route->getPath(); ?>
                </td>
                <td>
                    <?php echo Dumper::toHtml($route->getParameters(), array(Dumper::COLLAPSE => TRUE)); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>