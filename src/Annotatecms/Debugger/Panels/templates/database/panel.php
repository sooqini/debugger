<h1>Database</h1>

<div class="nette-inner">
    <table>
        <thead>
        <tr>
            <th>Time</th>
            <th>SQL</th>
            <th>Bindings</th>
            <?php if($this->connectionsCount > 1): ?>
                <th>Connection</th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php use Tracy\Dumper;

        foreach ($this->queries as $query): ?>
            <tr>
                <td><?php echo $query->time ?> ms</td>
                <td><?php echo SqlFormatter::highlight($query->query); ?></td>
                <td><?php echo Dumper::toHtml($query->bindings, array(Dumper::COLLAPSE => TRUE)); ?></td>
                <?php if($this->connectionsCount > 1): ?>
                    <td><?php echo $query->name ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>