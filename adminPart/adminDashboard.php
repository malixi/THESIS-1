<!DOCTYPE html>
<html lang="en">

<head>
    <title>:::iMARKET:::</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--CSS-->
    <link rel="stylesheet" href="../css/adminOnly.css">
    <!--Javascript-->
    <script src="../jsforAdmin/jsAdmin.js"></script>

</head>

<body>

    <?php
        session_start();
        require_once('../connector.php');
    ?>
    <nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
    	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
			MENU
			</button>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="adminDashboard.php">
				Administrator
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			<form class="navbar-form navbar-left" action="adminResults.php" method="POST" role="search">
				<div class="form-group">
					<input type="text" name="search" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
			</form>



			<ul class="nav navbar-nav navbar-right">
				<li><a href="../index.php">Back to main</a></li>
				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						Account
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
              <?php if(isset($_SESSION['email'])&& $_SESSION['userType'] == 'admin'){ ?>
							<li class="dropdown-header">SETTINGS</li>
              <li class="profile-li"><a class="profile-links" href="adminDashboard.php">Admin Dashboard</a></li>
              <li class="profile-li"><a class="profile-links" href="../accountSetting.php">Account Setting</a></li>
              <li class="profile-li"><a class="profile-links" href="#">Change Password </a></li>
              <li class="profile-li"><a class="profile-links" href="../logout.php">logout</a></li>
							<li class="divider"></li>

              <?php }else {
                  header("Location: ../index.php", 404);
                  exit;
               } ?>



						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

<!--Top end-->


<!--Main starts-->



    	<div class="container-fluid main-container">
  		    <div class="col-md-2 sidebar">
  			       <div class="row">
	                <!-- uncomment code for absolute positioning tweek see top comment in css -->
	                 <div class="absolute-wrapper"> </div>
	                  <!-- Menu -->
	                   <div class="side-menu">
		                     <nav class="navbar navbar-default" role="navigation">
			                        <!-- Main Menu -->
			                           <div class="side-menu-container">
				                               <ul class="nav navbar-nav">
					                                    <li class="active"><a href="adminDashboard.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li> <!--Dashboard = main -->


                                                   <li class="panel panel-default" id="dropdown">  <!-- Dropdown for register-->
                                                         <a data-toggle="collapse" href="#dropdown-lvl1">
                                                                <span class="glyphicon glyphicon-user"></span> User list <span class="caret"></span>
                                                        </a>

                                              <!-- Dropdown level 1 -->
                                              <div id="dropdown-lvl1" class="panel-collapse collapse">
                                              <div class="panel-body">
                                              <ul class="nav navbar-nav">
                                              <li><a href="adminViewlist.php">View All List</a></li>
                                              <li><a href="#">Soon to be</a></li>
                                              <li><a href="#">Soon to be</a></li>

                                            </ul>
                                          </div>
                                        </div>
                                      </li><!--End of dropdown for register-->


				                           <li class="panel panel-default" id="dropdown"><!--Dropdown for product-->
			                                   <a data-toggle="collapse" href="#dropdown-lvl2">
		                                            <span class="glyphicon glyphicon-user"></span> Product Settings <span class="caret"></span>
		                                    </a>

						<!-- Dropdown level 1 -->
						<div id="dropdown-lvl2" class="panel-collapse collapse">
							<div class="panel-body">
								<ul class="nav navbar-nav">
                  <li><a href="adminprodAdd.php">Add product</a></li>
                  <li><a href="adminprodEdit.php">Edit product</a></li>
                  <li><a href="adminprodDel.php">Delete product</a></li>


								</ul>
							</div>
						</div>
					</li><!--End of Dropdown for product-->
          <li><a href="adminAnnoun.php"><span class="glyphicon glyphicon-plane"></span> Announcement</a></li>
               <li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Notification</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>

				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>

	</div>
</div>  		</div>
  		<div class="col-md-10 content">

                <div>
                <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span>Sortable Lists
                    <div class="pull-right action-buttons">
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-cog" style="margin-right: 0px;"></span>
                            </button>
                            <ul class="dropdown-menu slidedown">
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span>Edit</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-trash"></span>Delete</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-flag"></span>Flag</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox" />
                                <label for="checkbox">
                                    List group item heading
                                </label>
                            </div>
                            <div class="pull-right action-buttons">
                                <a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="flag"><span class="glyphicon glyphicon-flag"></span></a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox2" />
                                <label for="checkbox2">
                                    List group item heading 1
                                </label>
                            </div>
                            <div class="pull-right action-buttons">
                                <a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="flag"><span class="glyphicon glyphicon-flag"></span></a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox3" />
                                <label for="checkbox3">
                                    List group item heading 2
                                </label>
                            </div>
                            <div class="pull-right action-buttons">
                                <a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="flag"><span class="glyphicon glyphicon-flag"></span></a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox4" />
                                <label for="checkbox4">
                                    List group item heading 3
                                </label>
                            </div>
                            <div class="pull-right action-buttons">
                                <a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="flag"><span class="glyphicon glyphicon-flag"></span></a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox5" />
                                <label for="checkbox5">
                                    List group item heading 4
                                </label>
                            </div>
                            <div class="pull-right action-buttons">
                                <a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="flag"><span class="glyphicon glyphicon-flag"></span></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>
                                Total Count <span class="label label-info">25</span></h6>
                        </div>
                        <div class="col-md-6">
                            <ul class="pagination pagination-sm pull-right">
                                <li class="disabled"><a href="javascript:void(0)">«</a></li>
                                <li class="active"><a href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
                                <li><a href="http://www.jquery2dotnet.com">2</a></li>
                                <li><a href="http://www.jquery2dotnet.com">3</a></li>
                                <li><a href="http://www.jquery2dotnet.com">4</a></li>
                                <li><a href="http://www.jquery2dotnet.com">5</a></li>
                                <li><a href="javascript:void(0)">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
                </div>

              </div>
  		</div>
  	</div>

    <?php include 'adminfooter.php';?>


    </body>

    </html>
