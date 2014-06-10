<?php $this->extend('layout/main'); ?>

<h1 class="page-header">PHP LOC</h1>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-fullscreen"></span> Size
            <span class="pull-right">
                <span class="label label-default"><?php echo $data['directories'];?> Directories</span>
                <span class="label label-default"><?php echo $data['files'];?> Files</span>
            </span>
        </h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3 stat-block">
                <div class="super">
                    <span class="glyphicon glyphicon-align-justify"></span> <?php echo $data['size']['loc'];?>
                </div>
                <div class="sub">
                    Lines of Code (LOC)<br />
                    <?php echo $data['size']['lloc'];?> <abbr title="Logical Lines of Code">LLOC</abbr>
                </div>
            </div>
            <div class="col-md-9">
                <div class="progress" style="margin: 30px 0px 0px 0px">
                    <div class="progress-bar progress-bar-success" style="width: <?php echo number_format($data['size']['ncloc'] / $data['size']['loc'] * 100, 2);?>%">
                        <?php echo $data['size']['ncloc'];?> NCLOC (<?php echo number_format($data['size']['ncloc'] / $data['size']['loc'] * 100, 2);?>%)
                    </div>
                    <div class="progress-bar progress-bar-info" style="width:<?php echo number_format($data['size']['cloc'] / $data['size']['loc'] * 100, 2);?>%">
                        <?php echo $data['size']['cloc'];?> CLOC (<?php echo number_format($data['size']['cloc'] / $data['size']['loc'] * 100, 2);?>%)
                    </div>
                </div>
                <div class="progress" style="margin: 40px 0px 0px 0px">
                    <div class="progress-bar progress-bar-success" style="width: <?php echo number_format($data['size']['classes'] / $data['size']['lloc'] * 100, 2);?>%">
                        Classes (<?php echo number_format($data['size']['classes'] / $data['size']['lloc'] * 100, 2);?>%)
                    </div>
                    <div class="progress-bar progress-bar-info" style="width:<?php echo number_format($data['size']['functions'] / $data['size']['lloc'] * 100, 2);?>%">
                        Functions (<?php echo number_format($data['size']['functions'] / $data['size']['lloc'] * 100, 2);?>%)
                    </div>
                    <div class="progress-bar progress-bar-warning" style="width:<?php echo number_format($data['size']['other'] / $data['size']['lloc'] * 100, 2);?>%">
                        Others  (<?php echo number_format($data['size']['other'] / $data['size']['lloc'] * 100, 2);?>%)
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr class="active">
                        <th colspan="3">
                            <span class="glyphicon glyphicon-stats"></span> Class Statistics <span class="pull-right"><span class="label label-default"><?php echo $data['size']['classes'];?> LLOC</span></span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width : 15%">Average Length</th>
                        <td><span class="label label-primary"><?php echo $data['size']['class_length']['avg'];?> Lines</span></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th style="width : 15%">Smallest</th>
                        <td><span class="label label-primary"><?php echo $data['size']['class_length']['min'];?> Lines</span></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th style="width : 15%">Biggest</th>
                        <td><span class="label label-primary"><?php echo $data['size']['class_length']['max'];?> Lines</span></td>
                        <td></td>
                    </tr>
                </table>
                <table class="table">
                    <tr class="active">
                        <th colspan="3"><span class="glyphicon glyphicon-stats"></span> Method Statistics</th>
                    </tr>
                    <tr>
                        <th style="width : 15%">Average Length</th>
                        <td><span class="label label-primary"><?php echo $data['size']['method_length']['avg'];?> Lines</span></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th style="width : 15%">Smallest</th>
                        <td><span class="label label-primary"><?php echo $data['size']['method_length']['min'];?> Lines</span></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th style="width : 15%">Biggest</th>
                        <td><span class="label label-primary"><?php echo $data['size']['method_length']['max'];?> Lines</span></td>
                        <td></td>
                    </tr>
                </table>
                <table class="table">
                    <tr class="active">
                        <th colspan="3"><span class="glyphicon glyphicon-stats"></span> Function Statistics <span class="pull-right"><span class="label label-default"><?php echo $data['size']['functions'];?> LLOC</span></span></th>

                    </tr>
                    <tr>
                        <th style="width : 15%">Average Length</th>
                        <td><span class="label label-primary"><?php echo $data['size']['function_length']['avg'];?> Lines</span></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-random"></span> Complexity
        </h3>
    </div>
    <div class="panel-body">
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-transfer"></span> Dependencies
        </h3>
    </div>
    <div class="panel-body">
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-tasks"></span> Structures
        </h3>
    </div>
    <div class="panel-body">
    </div>
</div>