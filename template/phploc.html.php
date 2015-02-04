<?php $this->extend('layout/main'); ?>


<h1 class="page-header">PHP LOC</h1>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-fullscreen"></span> Size
            <span class="pull-right">
                <span class="label label-default"><?php echo $data->last('directories');?> Directories</span>
                <span class="label label-default"><?php echo $data->last('files');?> Files</span>
            </span>
        </h3>
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <div class="huge">
                </span><?php echo $data->last('loc');?> LOC
            </div>
        </div>
        <div class="col-md-12">
            <table class="table">
                 <tr>
                    <td style="width : 15%"><abbr title="Non-Comment Lines of Code">NCLOC</abbr></td>
                    <td style="width : 10%">
                        <span class="label label-default">
                            <?php echo $data->last('ncloc');?>
                        </span>
                    </td>
                    <td>
                        <div class="progress" style="margin: 5px 0px 0px 0px">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $view['math']->pcnt($data->last('ncloc'), $data->last('loc'));?>%"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width : 15%"><abbr title="Comment Lines of Code">CLOC</abbr></td>
                    <td style="width : 10%">
                        <span class="label label-default">
                            <?php echo $data->last('cloc');?>
                        </span>
                    </td>
                    <td>
                        <div class="progress" style="margin: 5px 0px 0px 0px">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $view['math']->pcnt($data->last('cloc'), $data->last('loc'));?>%"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width : 15%"><abbr title="Logical Lines of Code">LLOC</abbr></td>
                    <td>
                        <span class="label label-default">
                            <?php echo $data->last('lloc');?>
                        </span>
                    </td>
                    <td>
                        <div class="progress" style="margin: 5px 0px 0px 0px">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $view['math']->pcnt($data->last('lloc'), $data->last('loc'));?>%"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width : 15%">Class LLOC</td>
                    <td>
                        <span class="label label-default">
                            <?php echo $data->last('llocClasses');?>
                        </span>
                    </td>
                    <td>
                        <div class="progress" style="margin: 5px 0px 0px 0px">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $view['math']->pcnt($data->last('llocClasses'), $data->last('loc'));?>%"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width : 15%">Function LLOC</td>
                    <td>
                        <span class="label label-default">
                            <?php echo $data->last('llocFunctions');?>
                        </span>
                    </td>
                    <td>
                        <div class="progress" style="margin: 5px 0px 0px 0px">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $view['math']->pcnt($data->last('llocFunctions'), $data->last('loc'));?>%"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width : 15%">Global LLOC</td>
                    <td>
                        <span class="label label-default">
                            <?php echo $data->last('llocGlobal');?>
                        </span>
                    </td>
                    <td>
                        <div class="progress" style="margin: 5px 0px 0px 0px">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $view['math']->pcnt($data->last('llocGlobal'), $data->last('loc'));?>%"></div>
                        </div>
                    </td>
                </tr>
            </table>
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
            <div class="col-md-6">
                <strong>Complexity by LLOC</strong>
                <?php echo $view->render(
                    'partial/mmatable',
                    array(
                        'tl' => number_format($data->last('ccnByLloc'), 3), 'tr' => 'Avg.',
                        'bl' => '-',
                        'br' => '-'
                    )
                ); ?>
            </div>
            <div class="col-md-6">
                <strong>Complexity by Num. Methods</strong>
                <?php echo $view->render(
                    'partial/mmatable',
                    array(
                        'tl' => number_format($data->last('ccnByNom'), 3), 'tr' => 'Avg.',
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
            <span class="glyphicon glyphicon-transfer"></span> Dependencies
        </h3>
    </div>
    <div class="panel-body">
        <div class="col-md-3">
            <img src="http://chartspree.io//pie.svg?_style=CleanStyle&Constants=<?php echo $view['math']->pcnt($data->last('globalConstantAccesses'), $data->last('globalAccesses'));?>&Vars=<?php echo $view['math']->pcnt($data->last('globalVariableAccesses'), $data->last('globalAccesses'));?>&Super=<?php echo $view['math']->pcnt($data->last('superGlobalVariableAccesses'), $data->last('globalAccesses'));?>" style="width : 100%; height : 200px"/>
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
                        <span class="label label-<?php echo $data->last('globalConstantAccesses') > 0 ? 'warning' : 'success';?>">
                            <?php echo $data->last('globalConstantAccesses');?>
                        </span>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="width : 15%">Variables</td>
                    <td>
                        <span class="label label-<?php echo $data->last('globalVariableAccesses') > 0 ? 'danger' : 'success';?>">
                            <?php echo $data->last('globalVariableAccesses');?>
                        </span>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="width : 15%">Super Globals</td>
                    <td>
                        <span class="label label-<?php echo $data->last('superGlobalVariableAccesses') > 2 ? 'warning' : 'success';?>">
                            <?php echo $data->last('superGlobalVariableAccesses');?>
                        </span>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th style="width : 15%">Total</th>
                    <td>
                        <span class="label label-<?php echo $data->last('globalAccesses') > 2 ? 'warning' : 'success';?>">
                            <?php echo $data->last('globalAccesses');?>
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
            <img src="http://chartspree.io//pie.svg?_style=CleanStyle&Static=<?php echo $view['math']->pcnt($data->last('staticAttributeAccesses'), $data->last('Attribute Accesses'));?>&Nonstatic=<?php echo $view['math']->pcnt($data->last('instanceAttributeAccesses'), $data->last('attributeAccesses'));?>" style="width : 100%; height : 200px"/>
        </div>
        <div class="col-md-9">
            <table class="table">
                <tr class="active">
                    <th colspan="3">
                        <span class="glyphicon glyphicon-stats"></span> Attributes Accessed
                    </th>
                </tr>
                <tr>
                    <td style="width : 15%">Instance Attributes</td>
                    <td>
                        <span class="label label-primary">
                            <?php echo $data->last('instanceAttributeAccesses');?>
                        </span>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="width : 15%">Static Attributes</td>
                    <td>
                        <span class="label label-primary">
                            <?php echo $data->last('staticAttributeAccesses');?>
                        </span>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th style="width : 15%">Total</th>
                    <td>
                        <span class="label label-primary">
                            <?php echo $data->last('attributeAccesses');?>
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
            <img src="http://chartspree.io//pie.svg?_style=CleanStyle&Static=<?php echo $view['math']->pcnt($data->last('staticMethodCalls'), $data->last('methodCalls'));?>&Instance=<?php echo $view['math']->pcnt($data->last('instanceMethodCalls'), $data->last('methodCalls'));?>" style="width : 100%; height : 200px"/>
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
                            <?php echo $data->last('instanceMethodCalls');?>
                        </span>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="width : 15%">Static</td>
                    <td>
                        <span class="label label-primary">
                            <?php echo $data->last('staticMethodCalls');?>
                        </span>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th style="width : 15%">Total</th>
                    <td>
                        <span class="label label-primary">
                            <?php echo $data->last('methodCalls');?>
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
                    'tl'=>$data->last('classes'),
                    'bl'=>$data->last('abstractClasses').' Abstract',
                    'br'=>$data->last('concreteClasses').' Concrete'
                )
            ); ?>
        </div>
        <div class="col-md-2">
            <strong>Interfaces</strong>
            <?php echo $view->render('partial/mmatable', array('tl' => $data->last('interfaces'), 'bl' => '-', 'br' => '-')); ?>
        </div>
        <div class="col-md-2">
            <strong>Namespaces</strong>
            <?php echo $view->render('partial/mmatable', array('tl' => $data->last('namespaces'), 'bl' => '-', 'br' => '-')); ?>
        </div>
        <div class="col-md-2">
            <strong>Traits</strong>
            <?php echo $view->render('partial/mmatable', array('tl' => $data->last('traits'), 'bl' => '-', 'br' => '-')); ?>
        </div>
        <div class="col-md-3">
            <strong>Functions</strong>
            <?php echo $view->render(
                'partial/mmatable',
                array(
                    'tl'=>$data->last('functions'),
                    'bl'=>$data->last('namedFunctions').' Named',
                    'br'=>$data->last('anonymousFunctions').' Anonymous'
                )
            ); ?>
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
                            <?php echo $data->last('staticMethods');?>
                        </span>
                    </td>
                    <td>
                        <div class="progress" style="margin: 5px 0px 0px 0px">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $view['math']->pcnt($data->last('staticMethods'), $data->last('methods'));?>%"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width : 15%">Non Static</td>
                    <td style="width : 10%">
                        <span class="label label-primary">
                            <?php echo $data->last('nonStaticMethods');?>
                        </span>
                    </td>
                    <td>
                        <div class="progress" style="margin: 5px 0px 0px 0px">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $view['math']->pcnt($data->last('nonStaticMethods'), $data->last('methods'));?>%"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width : 15%">Public</td>
                    <td>
                        <span class="label label-primary">
                            <?php echo $data->last('publicMethods');?>
                        </span>
                    </td>
                    <td>
                        <div class="progress" style="margin: 5px 0px 0px 0px">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $view['math']->pcnt($data->last('publicMethods'), $data->last('methods'));?>%"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width : 15%">Private / Protected</td>
                    <td>
                        <span class="label label-primary">
                            <?php echo $data->last('nonPublicMethods');?>
                        </span>
                    </td>
                    <td>
                        <div class="progress" style="margin: 5px 0px 0px 0px">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $view['math']->pcnt($data->last('nonPublicMethods'), $data->last('methods'));?>%"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th style="width : 15%">Total</th>
                    <td>
                        <span class="label label-primary">
                             <?php echo $data->last('methods');?>
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
            <span class="glyphicon glyphicon-tasks"></span> Tests
        </h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <strong>Test Classes</strong>
                <?php echo $view->render(
                    'partial/mmatable',
                    array(
                        'tl'=>$data->last('testClasses'),
                        'bl'=>'-',
                        'br'=>'-',
                    )
                ); ?>
            </div>
            <div class="col-md-6">
                <strong>Test Methods</strong>
                <?php echo $view->render(
                    'partial/mmatable',
                    array(
                        'tl'=>$data->last('testMethods'),
                        'bl'=>'-',
                        'br'=>'-',
                    )
                ); ?>
            </div>
        </div>
    </div>
</div>