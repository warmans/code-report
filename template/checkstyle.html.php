<?php $this->extend('layout/main'); ?>

<h1 class="page-header">Checkstyle (<?php echo count($data); ?> files have violations)</h1>

<?php foreach($data as $file) { ?>
    <?php foreach ($file as $violation) { ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <span class="label label-<?php echo ($violation['severity'] == 'error') ? 'danger' : 'warning'?> pull-right"><?php echo $violation['severity'];?></span>
                <?php echo (string)$violation['message'];?> on line <?php echo (string)$violation['line'];?> (column <?php echo (string)$violation['column'];?>)
            </h3>
        </div>
        <div class="panel-body">
            <pre class="brush: php; toolbar: false; highlight: <?php echo (string)$violation['line'];?>; first-line:<?php echo (((int)$violation['line'] - 3) > 0 ? (int)$violation['line'] - 3 : 0 )?>;">
                <?php foreach($view['code']->getLine((string)$file['name'], (string)$violation['line'], 3) as $line) { ?>
<?php echo $view->escape($line); ?>
                <?php } ?>
            </pre>
        </div>
        <div class="panel-footer">
            <?php echo $file['name'];?>
        </div>
    </div>
    <?php } ?>
<?php } ?>