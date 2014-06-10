<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Code Report</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
            body {
                padding-top: 40px;
            }
            .sub-header {
                padding-bottom: 10px;
                border-bottom: 1px solid #eee;
            }

            blockquote.smaller {
                font-size : 0.9em;
                margin : 0px;
            }

            .sidebar {
                position: fixed;
                top: 51px;
                bottom: 0;
                left: 0;
                z-index: 1000;
                display: block;
                padding: 20px;
                overflow-x: hidden;
                overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
                background-color: #f5f5f5;
                border-right: 1px solid #eee;
            }

            .nav-sidebar {
                margin-right: -21px; /* 20px padding + 1px border */
                margin-bottom: 20px;
                margin-left: -20px;
            }
            .nav-sidebar > li > a {
                padding-right: 20px;
                padding-left: 20px;
            }
            .nav-sidebar > .active > a {
                color: #fff;
                background-color: #428bca;
            }

            .stat-block .super {
                font-size : 50pt;
                text-align: center;
            }

            .stat-block .sub {
                font-size : 10pt;
                text-align: center;
                font-weight: bold;
            }

            .stat-block .super .glyphicon {
                font-size : 0.8em
            }
        </style>
    </head>
    <body>

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-dashboard"></span> Code Report</a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 sidebar">
                    <ul class="nav nav-sidebar">
                        <?php foreach($meta['reports'] as $name => $path) { ?>
                            <li><a href="<?php echo $path;?>"><?php echo $name; ?></a></li>
                        <?php } ?>

                    </ul>
                </div>
                <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-10 col-sm-offset-2 col-xs-9 col-xs-offset-3 main">
                    <?php $view['slots']->output('_content'); ?>
                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    </body>
</html>
