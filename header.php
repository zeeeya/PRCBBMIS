<!DOCTYPE html>

<html>
    <head>
        <link href="./css/custom_style.css" rel="stylesheet" type="text/css"/>
        <link href="css/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/css/sb-admin.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" type="image/png" href="img/PRClogo.png">
        <link href="css/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <title>Philippine Red Cross Blood Bank Management Information System</title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css"/>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>

	<body>
        <!--HEADER-->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid header">
            	<div class="row" style="margin-top:1%">
            		<div class="col-md-1" style="margin-right:0px">
                        <img src="./img/PRClogo.png" alt="thesis-logo" id="logo"/>
                	</div>
                    <div class="col-md-8">&nbsp;
                		<span style="font-size:42px; letter-spacing: 1px; font-weight: bold">PHILIPPINE RED CROSS</span><br>
                		&nbsp;&nbsp;<span style="font-size:18px;padding-top:0px; letter-spacing: 1px">10th LACSON STREET, BACOLOD CITY, 6100 NEGROS OCCIDENTAL</span>
            		</div>
                    <div class="col-md-12" >
                        <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                         <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="#"><i class="fa fa-gear"></i> User's List</a></li>
                        <li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
                    </ul>
                    </li>
                    </div>
                </div>
            </div>
    	
            <!-- NAV BAR-->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
            <div class="page_title_container" style="margin-top:0px">	
                <div class="collapse navbar-collapse" id="myNavbar"">
                    <ul class="nav navbar-nav">
                        <li class="dropdown menus">
                            <a href="#" data-toggle="dropdown ">PROFILES</a>
                            <ul class="dropdown-menu submenus">
                                <li><a href="donorlist.php">DONOR</a></li>
                                <li><a href="patientlist.php">PATIENT</a></li>
                                            <li><a href="viewbloodbank.php" >BLOOD BANK</a></li>
                                            <li><a href="viewuser.php" >PRC USER</a></li>        
                            </ul>
                        </li>
                        <li class="dropdown menus">
                            <a href="#" data-toggle="dropdown">TRANSACTIONS</a>
                            <ul class="dropdown-menu submenus">
                                <li><a href="viewcollection.php">BLOOD COLLECTION</a></li>
                                <li><a href="viewrequest.php">BLOOD REQUEST</a></li>
                                <li><a href="viewdispensing.php" >DISPENSING</a></li>
                                <li><a href="viewactivityscheduling.php" >ACTIVITY SCHEDULING</a></li>
                                <li><a href="viewtest.php" >BLOOD TEST</a></li>
                            </ul>
                        </li>
                        <li><a href="map.php">MAPS</a></li>
                        <li class="dropdown menus">
                            <a href="#" data-toggle="dropdown">MAINTENANCE</a>
                            <ul class="dropdown-menu submenus">
                			    <li><a href="#">IMPORT</a></li>
                			    <li><a href="#">BACK-UP</a></li>
                            </ul>  
                        </li>
                        <li><a href="#">REPORTS</a></li>
                        <li><a href="./php/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </div>    
        </nav>
    </body>
</html>
