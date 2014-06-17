<?php $this->extend('layout/main'); ?>

<h1 class="page-header">PHP Code Sniffer</h1>
<?php foreach($data as $file) { ?>
    <h2><?php echo $file['name'];?></h2>
    <?php foreach ($file as $violation) { ?>
    <div class="panel panel-<?php echo ($violation['severity'] == 'error') ? 'danger' : 'warning'?>">
        <div class="panel-heading">
            <h3 class="panel-title">
                <span class="label label-<?php echo ($violation['severity'] == 'error') ? 'danger' : 'warning'?> pull-right"><?php echo $violation['severity'];?></span> <?php echo (string)$violation['message'];?>
            </h3>
        </div>
        <div class="panel-body">
            <pre class="brush: php; toolbar: false; highlight: <?php echo (string)$violation['line'];?>; first-line:<?php echo (string)$violation['line']-2?>;">
                <?php foreach($view['code']->getLine((string)$file['name'], (string)$violation['line'], 3) as $line) { ?>
<?php echo $view->escape($line); ?>
                <?php } ?>
            </pre>
        </div>
    </div>
    <?php } ?>
<?php } ?>


<?php //try this instead? http://prismjs.com/plugins/line-highlight/#play.50-55,60 ?>