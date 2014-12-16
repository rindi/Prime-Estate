<?php

/*
@(#)File:           About Us 
@(#)Purpose:        Information about PrimeEstate
@(#)Author:         PrimeEstate
@(#)Product:        PrimeEstate Website 2014
*/

include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>PrimeEstate - About Us</title>

        <!-- Custom styles for this template -->
        <link href="cover.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="http://sfsuswe.com/~f14g03/views/css/index.css" />
        <link rel="stylesheet" href="./views/css/cover.css" />
        <style>
            body, html { 
                overflow-x: hidden; 
                overflow-y: auto;
                padding-bottom: 70px;
            }
            
            #mslinks li{
                width: 100%;
                list-style: none;
                background: rgba(255,255,255,0.3);
                padding: 10px 0 10px 0;
                margin: 20px 0 20px 0;
                border: 2px solid #12cac5;
                text-align: center;
            }
            
            hr{
                border-color: #12cac5;
            }
        </style>


    </head>

    <body style="padding-bottom: 40px">
        <div class="container">
            <div id="paneler" class="panel panel-default" style="text-align: center;color:#12aca5">
                <h1 class="panel-body"><strong>About PrimeEstate</strong></h1>
            </div>

            <div class="site-wrapper">
                <div class="site-wrapper-inner">
                    <div class="cover-container">
                        <div class="inner cover">
                            <div class="panel panel-default">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="clearfix" style="margin: 20px; text-align: center;">
                                            <p>
                                                PrimeEstate is a demo website created for San Francisco State University 
                                                Computer Science's Fall 2014 Section of Software Engineering.  
                                                Our group consists of 5 software engineers.  Below you will find links to 
                                                the website's project specifications, and you will be able 
                                                to review each of the five milestones we have released.  
                                            </p>
                                            <div id="mslinks" class="clearfix">
                                            <li>
                                                <a href="http://sfsuswe.com/~f14g03/views/assets/documents/CSC648-848Fall2014Milestone1Group3.pdf">Milestone #1</a>
                                            </li>
                                            <li>
                                                <a href="http://sfsuswe.com/~f14g03/views/assets/documents/CSC648-848Fall2014Milestone2Group3.pdf">Milestone #2</a>
                                            </li>
                                            <li>
                                                <a href="http://sfsuswe.com/~f14g03/views/assets/documents/CSC648-848Fall2014Milestone3Group3.pdf">Milestone #3</a>
                                            </li>
                                            <li>
                                                <!--Milestone #4-->
                                                <a href="http://sfsuswe.com/~f14g03/views/assets/documents/CSC648-848Fall2014Milestone4Group3.pdf">Milestone #4</a>
                                            </li>
                                            <li>
                                                Milestone #5
                                                <!--<a href="http://sfsuswe.com/~f14g03/views/assets/documents/CSC648-848Fall2014Milestone5Group3.pdf">Milestone #5</a>-->
                                            </li>
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- Three columns of text below the carousel -->
                                        <!--<div class="panel panel-default" style="text-align: center">-->
                                        <div class="well well-padding">
                                            <!--<div class="row" style="padding-top: 60px;">-->
                                            <div class="row" style="text-align: center;">
                                                <h1 >The Team</h1>
                                                <div class="col-md-2 col-xs-offset-1 man">
                                                    <img class="img-circle" src="assets/images/dong.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                                                    <h2>Dong</h2>
                                                    <p>
                                                        Frontend/Scripting 
                                                    </p>
                                                </div><!-- /.col-lg-4 -->
                                                <div class="col-md-2 man">
                                                    <img class="img-circle" src="assets/images/rushab.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                                                    <h2>Rushab</h2>
                                                    <p>
                                                        Frontend Lead/Subversion Administrator  
                                                    </p>
                                                </div><!-- /.col-lg-4 -->
                                                <div class="col-md-2 man">
                                                    <img class="img-circle" src="assets/images/raymond.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                                                    <h2>Yi-Hsien</h2>
                                                    <p>
                                                        Frontend/User Experience 
                                                    </p>
                                                </div><!-- /.col-lg-4 -->
                                                <div class="col-md-2 man">
                                                    <img class="img-circle" src="assets/images/alex_1.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                                                    <h2>Alex</h2>
                                                    <p>
                                                        Backend Lead/Database Specialist
                                                    </p>
                                                </div><!-- /.col-lg-4 -->
                                                <div class="col-md-2 man">
                                                    <img class="img-circle" src="assets/images/jon.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                                                    <h2>Jonathan</h2>
                                                    <p>
                                                        Team Lead/Backend 
                                                    </p>
                                                </div><!-- /.col-lg-4 -->

                                            </div><!-- /.row -->
                                        </div></div></div></div></div></div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <script src="../../assets/js/docs.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
        <script>
            (function () {
                'use strict';
                if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
                    var msViewportStyle = document.createElement('style')
                    msViewportStyle.appendChild(
                            document.createTextNode(
                                    '@-ms-viewport{width:auto!important}'
                                    )
                            )
                    document.querySelector('head').appendChild(msViewportStyle)
                }
            })();
        </script>
    </body>
</html>
