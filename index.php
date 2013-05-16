<?php
require_once 'lib/com/google/account/const.php';
require_once 'lib/com/rentmanager/rentmanager.php';
session_start();
if (!isset($_SESSION['identity']))
	header('Location:' . $LOGIN_URL);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>index</title>
		<meta name="author" content="fahim.chowdhury" />
		<!-- Date: 2013-05-13 -->
		<link type="text/css" rel="stylesheet" href="resource/css/style.css" />
		<script type="text/javascript" src="lib/com/fahimchowdhury/toolkit/toolkitMax-v1014-compressed.js"></script>
		<script type="text/javascript" src="src/controller/Controller.js"></script>
		<script type="text/javascript" src="src/model/Model.js"></script>
		<script type="text/javascript" src="src/view/view.js"></script>
		<script type="text/javascript" src="src/view/PropertyView.js"></script>
		<script type="text/javascript" src="src/view/DetailView.js"></script>
		<script type="text/javascript" src="src/RentManager.js"></script>
		<script type="text/javascript" src="src/Main.js"></script>
		<script type="text/javascript">var userEmail = "<?php echo $_SESSION['identity']; ?>";<?php $rentManager = new RentManager();
	$data = $rentManager -> getProperties();
?>var propertyData =<?php echo $data; ?>
	;
		</script>
	</head>
	<body>
		<ul id="nav">
			<li onclick="Controller.navClick(0)">
				red
			</li>
			<li  onclick="Controller.navClick(1)">
				blue
			</li>
			<li onclick="Controller.navClick(2)">
				green
			</li>
			<li class="clearBoth"></li>
		</ul>
		<div id="view-0">
			<div class="menubar">
				<h1 class="menuTitle">Your Properties</h1>
				<ul class="menuHolder">
					<li>
						<div id="addPropAddButton" class="greenbutton" onclick="PropertyView.addClicked()">
							Add
						</div>
					</li>
					<li>
						<div id="addPropBackButton" class="blueButton" onclick="PropertyView.backClicked()">
							Back
						</div>
					</li>
				</ul>
			</div>
			<div id="newProperty">

				<p class="title">
					Add A Property
				</p>
				<form id="newPropForm" action="lib/com/rentmanager/addproperty.php" method="POST" target="dataFrame">
					<p>
						Name:
					</p>
					<input id="p_name" name="p_name" type="text" onfocus="PropertyView.fieldFocus(this)">
					<br>
					<p>
						Address:
					</p>
					<textarea id="p_address" name="p_address" onfocus="PropertyView.fieldFocus(this)"></textarea>
					<br>
					<p>
						Postcode:
					</p>
					<input id="p_post" name="p_post" type="text" onfocus="PropertyView.fieldFocus(this)">
					<p>
						Rent PCM:
					</p>
					<input id="p_rent" name="p_rent" type="text" onfocus="PropertyView.fieldFocus(this)">
					<p>
						Mortgage PCM:
					</p>
					<input id="p_mort" name="p_mort" type="text" onfocus="PropertyView.fieldFocus(this)">
					<p>
						Other Costs (Total) PCM:
					</p>
					<input id="p_other" name="p_other" type="text" onfocus="PropertyView.fieldFocus(this)">
					<div id="addPropertyButton" class="greenbutton" onclick="PropertyView.addNewClicked()">
						Add
					</div>
					<p id="p_error" >
						Please fill in all fields
					</p>
					<input type="hidden" name="p_email" id="p_email" />
				</form>
				<div class="clearBoth"></div>
			</div>
			<ul id="propertyHolder">

			</ul>
		</div>
		<div id="view-1">
			<div class="menubar">
				<h1 class="menuTitle" id="propName"></h1>
				<ul class="menuHolder">
					<li>
						<div id="backToPropertListButton" class="blueButton" onclick="DetailView.backToList()">
							Back
						</div>
					</li>
				</ul>
			</div>
			<ul id="propertyNav">
				<li id="pdNav_0" class="selected" onclick="DetailView.changeTab(0)">
					<p>
						Info
					</p>
				</li>
				<li id="pdNav_1" onclick="DetailView.changeTab(1)">
					<p>
						Tenants
					</p>
				</li>
				<li id="pdNav_2" class="last" onclick="DetailView.changeTab(2)">
					<p>
						Overview
					</p>
				</li>
			</ul>
			<div id="pdTab-0">
				<p class="title">
					address:
				</p>
				<p id="pd_address"></p>
				<hr>
				<p class="title">
					postcode:
				</p>
				<p id="pd_post"></p>
				<hr>
				<p class="title">
					rent:
				</p>
				<p id="pd_rent"></p>
				<hr>
				<p class="title">
					mortgage:
				</p>
				<p id="pd_mort"></p>
				<hr>
				<p class="title">
					other:
				</p>
				<p id="pd_other"></p>
				<hr>
			</div>
		</div>
		<div id="view-2" class="last"></div>
		<div class="clearBoth"></div>
		<iframe id="dataFrame" name="dataFrame"></iframe>
	</body>

