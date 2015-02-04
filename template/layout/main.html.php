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

        <link href="http://alexgorbatchev.com/pub/sh/current/styles/shThemeEclipse.css" rel="stylesheet" type="text/css" />
        <script src="http://alexgorbatchev.com/pub/sh/current/scripts/shCore.js" type="text/javascript"></script>
        <script src="http://alexgorbatchev.com/pub/sh/current/scripts/shAutoloader.js" type="text/javascript"></script>
        <script type="text/javascript" src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushPhp.js"></script>

        <style>

            h2 {
                font-size : 1.2em;
            }

            body {
                font-size: 10pt;
            }

            .sub-header {
                padding-bottom: 10px;
                border-bottom: 1px solid #eee;
            }

            .huge {
                font-weight: bold;
                font-size : 80pt;
                text-align: right;
            }

            blockquote.smaller {
                font-size : 0.9em;
                margin : 0px;
            }

            .sidebar {
                position: fixed;
                top: 1px;
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
                color : #000;
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

            .mma-table td, .mma-table th {
                text-align: center;
            }

            .mma-table th .super {
                font-size: 50pt;
            }

            /* code highlighting */

            code {
                background : none;
            }

            .code .container {
                width : 100%;
            }

            .syntaxhighlighter table {
                width : 100%;
            }

            .syntaxhighlighter .line.highlighted.alt1, .syntaxhighlighter .line.highlighted.alt2 {
                background-color : #F2DEDE !important;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 sidebar">
                    <ul class="nav nav-sidebar" id="nav-sidebar">
                        <li><a href="index.html">Index</a></li>
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

        <script type="text/javascript">
            $(document).ready(function() {

                $.get('code-report.json', function (data) {
                    data = jQuery.parseJSON(data);
                    $.each(data.reports, function(name, details){
                        $('#nav-sidebar').append('<li><a href="'+details['file']+'">'+name+'</a></li>');
                    });
                });

                SyntaxHighlighter.defaults['gutter'] = true;
                SyntaxHighlighter.all();
            });

        </script>
    </body>
</html>
