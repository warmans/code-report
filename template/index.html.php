<?php $this->extend('layout/main'); ?>


<h1 class="page-header">Code Reports</h1>
<?php foreach($data['reports'] as $name => $details) { ?>
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo $name;?></div>
        <div class="panel-body">
            <p><?php echo $details['description'];?></p>
            <a class="btn btn-primary btn-xs" href="<?php echo $details['file'];?>">View Report</a>
        </div>
    </div>
<?php } ?>
