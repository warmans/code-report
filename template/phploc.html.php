<?php $this->extend('layout/main'); ?>


<h1 class="page-header">PHP LOC</h1>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-fullscreen"></span> Size
            <span class="pull-right">
                <span class="label label-default"><?php echo $data->first('Directories');?> Directories</span>
                <span class="label label-default"><?php echo $data->first('Files');?> Files</span>
            </span>
        </h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3 stat-block">
                <div class="super">
                    <span class="glyphicon glyphicon-align-justify"></span> <?php echo $data->first('Lines of Code (LOC)');?>
                </div>
                <div class="sub">
                    Lines of Code (LOC)<br />
                    <?php echo $data['size']['lloc'];?> <abbr title="Logical Lines of Code">LLOC</abbr>
                </div>
            </div>
            <div class="col-md-9">
                <div class="progress" style="margin: 30px 0px 0px 0px">
                    <div class="progress-bar progress-bar-success" style="width: <?php echo $view['math']->pcnt($data['Non-Comment Lines of Code (NCLOC)'][0], $data['Lines of Code (LOC)'][0]); ?>%">
                        <?php echo $view['math']->pcnt($data['Non-Comment Lines of Code (NCLOC)'][0], $data['Lines of Code (LOC)'][0]); ?> NCLOC
                    </div>
                    <div class="progress-bar progress-bar-primary" style="width:<?php echo $view['math']->pcnt($data['Comment Lines of Code (CLOC)'][0], $data['Lines of Code (LOC)'][0]); ?>%">
                        <?php echo $view['math']->pcnt($data['Comment Lines of Code (CLOC)'][0], $data['Lines of Code (LOC)'][0]); ?> CLOC
                    </div>
                </div>
                <div class="progress" style="margin: 40px 0px 0px 0px">
                    <div class="progress-bar progress-bar-success" style="width: <?php echo $view['math']->pcnt($data['size']['classes'], $data['size']['lloc']);?>%">
                        Classes (<?php echo $view['math']->pcnt($data['size']['classes'], $data['size']['lloc']);?>%)
                    </div>
                    <div class="progress-bar progress-bar-primary" style="width:<?php echo $view['math']->pcnt($data['size']['functions'], $data['size']['lloc']);?>%">
                        Functions (<?php echo $view['math']->pcnt($data['size']['functions'], $data['size']['lloc']);?>%)
                    </div>
                    <div class="progress-bar progress-bar-warning" style="width:<?php echo $view['math']->pcnt($data['size']['other'], $data['size']['lloc']);?>%">
                        Others  (<?php echo $view['math']->pcnt($data['size']['other'], $data['size']['lloc']);?>%)
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <strong>Class Length</strong>
                <?php echo $view->render(
                    'partial/mmatable',
                    array(
                        'tl' => $data->first('Average Class Length (LLOC)'), 'tr' => 'LOC Avg.',
                        'bl' => '-',
                        'br' => '-',
                    )
                ); ?>
            </div>
            <div class="col-md-4">
                <strong>Method Length</strong>
                <?php echo $view->render(
                    'partial/mmatable',
                    array(
                        'tl' => $data->first('Average Method Length (LLOC)'), 'tr' => 'LOC Avg.',
                        'bl' => '-',
                        'br' => '-',
                    )
                ); ?>
            </div>
            <div class="col-md-4">
                <strong>Function Length</strong>
                <?php echo $view->render(
                    'partial/mmatable',
                    array(
                        'tl' => $data->first('Average Function Length (LLOC)'), 'tr' => 'LOC Avg.',
                        'bl' => '-',
                        'br' => '-',
                    )
                ); ?>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-random"></span> Cyclomatic Complexity
        </h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <strong>LLOC</strong>
                <?php echo $view->render(
                    'partial/mmatable',
                    array(
                        'tl' => number_format($data['Cyclomatic Complexity / Lines of Code'][0], 3), 'tr' => 'Avg.',
                        'bl' => '-',
                        'br' => '-'
                    )
                ); ?>
            </div>
            <div class="col-md-4">
                <strong>Class</strong>
                <?php echo $view->render(
                    'partial/mmatable',
                    array(
                        'tl' => number_format($data['Cyclomatic Complexity / Number of Methods'][0], 3), 'tr' => 'Avg.',
                        'bl' => '-',
                        'br' => '-'
                    )
                ); ?>
            </div>
            <div class="col-md-4">
                <strong>Method</strong>
                <?php echo $view->render(
                    'partial/mmatable',
                    array(
                        'tl' => $data['cyclomatic_complexity']['per_method']['avg'], 'tr' => 'Avg.',
                        'bl' => $data['cyclomatic_complexity']['per_method']['min'].' Min', 'bli'=> 'sort-by-attributes',
                        'br' => $data['cyclomatic_complexity']['per_method']['max'].' Max', 'bri' => 'sort-by-attributes-alt'
                    )
                ); ?>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-transfer"></span> Dependencies
        </h3>
    </div>
    <div class="panel-body">
        <div class="col-md-3">
            <img src="http://charts.brace.io/pie.svg?Constants=<?php echo ($data['dependencies']['global_accesses']['constants'] / $data['dependencies']['global_accesses']['total']) * 100;?>&Vars=<?php echo ($data['dependencies']['global_accesses']['variables'] / $data['dependencies']['global_accesses']['total']) * 100;?>&Super=<?php echo ($data['dependencies']['global_accesses']['super'] / $data['dependencies']['global_accesses']['total']) * 100;?>" style="width : 100%; height : 200px"/>
        </div>
        <div class="col-md-9">
            <table class="table">
                <tr class="active">
                    <th colspan="3">
                        <span class="glyphicon glyphicon-stats"></span> Globals Accessed
                    </th>
                </tr>
                <tr>
                    <td style="width : 15%">Constants</td>
                    <td>
                        <span class="label label-<?php echo $data['dependencies']['global_accesses']['constants'] > 0 ? 'warning' : 'success';?>">
                            <?php echo $data['dependencies']['global_accesses']['constants'];?>
                        </span>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="width : 15%">Variables</td>
                    <td>
                        <span class="label label-<?php echo $data['dependencies']['global_accesses']['variables'] > 0 ? 'danger' : 'success';?>">
                            <?php echo $data['dependencies']['global_accesses']['variables'];?>
                        </span>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="width : 15%">Super Globals</td>
                    <td>
                        <span class="label label-<?php echo $data['dependencies']['global_accesses']['super'] > 0 ? 'warning' : 'success';?>">
                            <?php echo $data['dependencies']['global_accesses']['super'];?>
                        </span>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th style="width : 15%">Total</th>
                    <td>
                        <span class="label label-<?php echo $data['dependencies']['global_accesses']['total'] > 0 ? 'warning' : 'success';?>">
                            <?php echo $data['dependencies']['global_accesses']['total'];?>
                        </span>
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    <hr>
    <div class="panel-body">
        <div class="col-md-3">
            <img src="http://charts.brace.io/pie.svg?Static=<?php echo ($data['dependencies']['attribute_accesses']['static'] / ($data['dependencies']['attribute_accesses']['total'] ?: 1)) * 100;?>&Nonstatic=<?php echo ($data['dependencies']['attribute_accesses']['nonstatic'] / ($data['dependencies']['attribute_accesses']['total'] ?: 1)) * 100;?>" style="width : 100%; height : 200px"/>
        </div>
        <div class="col-md-9">
            <table class="table">
                <tr class="active">
                    <th colspan="3">
                        <span class="glyphicon glyphicon-stats"></span> Attributes Accessed
                    </th>
                </tr>
                <tr>
                    <td style="width : 15%">Non-Static</td>
                    <td>
                        <span class="label label-primary">
                            <?php echo $data['dependencies']['attribute_accesses']['nonstatic'];?>
                        </span>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="width : 15%">Static</td>
                    <td>
                        <span class="label label-primary">
                            <?php echo $data['dependencies']['attribute_accesses']['static'];?>
                        </span>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th style="width : 15%">Total</th>
                    <td>
                        <span class="label label-primary">
                            <?php echo $data['dependencies']['attribute_accesses']['total'];?>
                        </span>
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    <hr>
    <div class="panel-body">
        <div class="col-md-3">
            <img src="http://charts.brace.io/pie.svg?Static=<?php echo ($data['dependencies']['method_calls']['static'] / ($data['dependencies']['method_calls']['total'] ?: 1)) * 100;?>&Nonstatic=<?php echo ($data['dependencies']['method_calls']['nonstatic'] / ($data['dependencies']['method_calls']['total'] ?: 1)) * 100;?>" style="width : 100%; height : 200px"/>
        </div>
        <div class="col-md-9">
            <table class="table">
                <tr class="active">
                    <th colspan="3">
                        <span class="glyphicon glyphicon-stats"></span> Methods Accessed
                    </th>
                </tr>
                <tr>
                    <td style="width : 15%">Non-Static</td>
                    <td>
                        <span class="label label-primary">
                            <?php echo $data['dependencies']['method_calls']['nonstatic'];?>
                        </span>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="width : 15%">Static</td>
                    <td>
                        <span class="label label-primary">
                            <?php echo $data['dependencies']['method_calls']['static'];?>
                        </span>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th style="width : 15%">Total</th>
                    <td>
                        <span class="label label-primary">
                            <?php echo $data['dependencies']['method_calls']['total'];?>
                        </span>
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-tasks"></span> Structures
        </h3>
    </div>
    <div class="panel-body">
        <div class="col-md-3">
            <strong>Classes</strong>
            <?php echo $view->render(
                'partial/mmatable',
                array(
                    'tl'=>$data['structure']['classes']['total'],
                    'bl'=>$data['structure']['classes']['abstract'].' Abstract',
                    'br'=>$data['structure']['classes']['concrete'].' Concrete'
                )
            ); ?>
        </div>
        <div class="col-md-3">
            <strong>Interfaces</strong>
            <?php echo $view->render('partial/mmatable', array('tl' => $data['structure']['interfaces'], 'bl' => '-', 'br' => '-')); ?>
        </div>
        <div class="col-md-3">
            <strong>Namespaces</strong>
            <?php echo $view->render('partial/mmatable', array('tl' => $data['structure']['namespaces'], 'bl' => '-', 'br' => '-')); ?>
        </div>
        <div class="col-md-3">
            <strong>Traits</strong>
            <?php echo $view->render('partial/mmatable', array('tl' => $data['structure']['traits'], 'bl' => '-', 'br' => '-')); ?>
        </div>
    </div>
    <hr>
    <div class="panel-body">
        <div class="col-md-12">
            <table class="table">
                <tr class="active">
                    <th colspan="3">
                        <span class="glyphicon glyphicon-stats"></span> Methods
                    </th>
                </tr>
                <tr>
                    <td style="width : 15%">Static</td>
                    <td>
                        <span class="label label-primary">
                            <?php echo $data['structure']['method']['static'];?>
                        </span>
                    </td>
                    <td>
                        <div class="progress" style="margin: 5px 0px 0px 0px">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $view['math']->pcnt($data['structure']['method']['static'], $data['structure']['method']['total']);?>%"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width : 15%">Non Static</td>
                    <td style="width : 10%">
                        <span class="label label-primary">
                            <?php echo $data['structure']['method']['nonstatic'];?>
                        </span>
                    </td>
                    <td>
                        <div class="progress" style="margin: 5px 0px 0px 0px">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $view['math']->pcnt($data['structure']['method']['nonstatic'], $data['structure']['method']['total']);?>%"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width : 15%">Public</td>
                    <td>
                        <span class="label label-primary">
                            <?php echo $data['structure']['method']['public'];?>
                        </span>
                    </td>
                    <td>
                        <div class="progress" style="margin: 5px 0px 0px 0px">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $view['math']->pcnt($data['structure']['method']['public'], $data['structure']['method']['total']);?>%"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width : 15%">Private / Protected</td>
                    <td>
                        <span class="label label-primary">
                            <?php echo $data['structure']['method']['nonpublic'];?>
                        </span>
                    </td>
                    <td>
                        <div class="progress" style="margin: 5px 0px 0px 0px">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $view['math']->pcnt($data['structure']['method']['nonpublic'], $data['structure']['method']['total']);?>%"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th style="width : 15%">Total</th>
                    <td>
                        <span class="label label-primary">
                            <?php echo $data['structure']['method']['total'];?>
                        </span>
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</div>