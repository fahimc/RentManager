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
		<script type="text/javascript" src="src/view/TenantView.js"></script>
		<script type="text/javascript" src="src/RentManager.js"></script>
		<script type="text/javascript" src="src/Main.js"></script>
		<script type="text/javascript">var userEmail =    "<?php echo $_SESSION['identity']; ?>";<?php $rentManager = new RentManager();
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
			<ul id="propertyNav" class="menuNav">
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
			<div id="pdTab-1">
				<div class="menubar">
					<h1 class="menuTitle"></h1>
					<ul class="menuHolder">
						<li>
							<div id="addTenantButton"  class="greenbutton" onclick="DetailView.addTenantClicked()">
								Add
							</div>
						</li>
						<li>
							<div id="closeAddTenantButton" class="blueButton" onclick="DetailView.closeTenantClicked()">
								Close
							</div>
						</li>
					</ul>
				</div>
				<div id="newTenant">

					<p class="title">
						Add A Tenant
					</p>
					<form id="newTenantForm" action="lib/com/rentmanager/addtenant.php" method="POST" target="dataFrame">
						<p>
							First Name:
						</p>
						<input id="t_fname" name="t_fname" type="text" onfocus="DetailView.fieldFocus(this)">
						<br>
						<p>
							Last Name:
						</p>
						<input id="t_lname" name="t_lname" type="text" onfocus="DetailView.fieldFocus(this)">
						<br>
						<p>
							Start Date:
						</p>
						<div class="date">
							<input class="day" id="t_joindate_day" name="t_joindate_day" type="text" maxlength="2" onfocus="DetailView.fieldFocus(this)">
							<p class="divider">
								/
							</p>
							<input class="month" id="t_joindate_month" name="t_joindate_month" type="text" maxlength="2" onfocus="DetailView.fieldFocus(this)">
							<p class="divider">
								/
							</p>
							<input class="year" id="t_joindate_year" name="t_joindate_year" type="text" maxlength="4" onfocus="DetailView.fieldFocus(this)">
							<div class="clearBoth"></div>
						</div>
						<br>
						<p>
							Rent Due Date:
						</p>
						<div class="date">
							<input class="day"  id="t_rentdate_day" name="t_rentdate_day" type="text" maxlength="2" onfocus="DetailView.fieldFocus(this)">
							<p class="divider">
								of every month
							</p>
							<div class="clearBoth"></div>
						</div>
						<p>
							Rent PCM:
						</p>
						<input id="t_rent" name="t_rent" type="text" onfocus="DetailView.fieldFocus(this)">
						<p>
							Contract Length (Months):
						</p>
						<input id="t_duration" name="t_duration" type="text" maxlength="2" onfocus="DetailView.fieldFocus(this)">
						<p>
							Other Costs (Total) PCM:
						</p>
						<input id="t_other" name="t_other" type="text" onfocus="DetailView.fieldFocus(this)">
						<div id="addNewTenantButton" class="greenbutton" onclick="DetailView.addNewClicked()">
							Add
						</div>
						<p id="t_error" >
							Please fill in all fields
						</p>
						<input type="hidden" name="t_email" id="t_email" />
						<input type="hidden" name="t_pid" id="t_pid" />
					</form>
					<div class="clearBoth"></div>
				</div>
				<ul id="tenantHolder">

				</ul>
			</div>
			<div id="pdTab-2">
				<div>
					<ul>
						<li>
							<p>Total Mortgage Paid</p>
						</li>
						<li>
							<p id="overviewMort"></p>
						</li>
					</ul>
					<ul>
						<li>
							<p>Total Rent Paid</p>
						</li>
						<li>
							<p id="overviewRent"></p>
						</li>
					</ul>
					<ul>
						<li>
							<p>Current Profit</p>
						</li>
						<li>
							<p id="overviewProfit"></p>
						</li>
					</ul>
					
				</div>
				<div id="overview_payments">
					
				</div>

			</div>
		</div>
		<div id="view-2" class="last">
			<div class="menubar">
				<h1 class="menuTitle" id="tenantName"></h1>
				<ul class="menuHolder">
					<li>
						<div id="backToPropertListButton" class="blueButton" onclick="TenantView.backToList()">
							Back
						</div>
					</li>
				</ul>
			</div>
			<ul class="menuNav">
				<li id="tdNav_0" class="selected" onclick="TenantView.changeTab(0)">
					<p>
						Info
					</p>
				</li>
				<li id="tdNav_1" class="last"  onclick="TenantView.changeTab(1)">
					<p>
						RENT PAID
					</p>
				</li>
			</ul>
			<div id="tdTab-0">
				<p class="title">
					Name:
				</p>
				<p id="td_name"></p>
				<hr>
				<p class="title">
					Join Date:
				</p>
				<p id="td_join"></p>
				<hr>
				<p class="title">
					Rent Due Date:
				</p>
				<p id="td_rentday"></p>
				<hr>
				<p class="title">
					Rent (PCM):
				</p>
				<p id="td_rent"></p>
				<hr>
				<p class="title">
					Contract Length
				</p>
				<p>
					<span id="td_duration"></span> months
				</p>
				<hr>
				<p class="title">
					Other:
				</p>
				<p id="td_other"></p>
				<hr>
			</div>
			<div id="tdTab-1">
				<div class="menubar">
					<h1 class="menuTitle"></h1>
					<ul class="menuHolder">
						<li>
							<div id="addRentButton"  class="greenbutton" onclick="TenantView.addRentClicked()">
								Add
							</div>
						</li>
						<li>
							<div id="closeAddRentButton" class="blueButton" onclick="TenantView.closeRentClicked()">
								Close
							</div>
						</li>
					</ul>
				</div>
				<div id="newRent">
					<p class="title">
						Add Paid Rent
					</p>
					<form id="newRentForm" action="lib/com/rentmanager/addrent.php" method="POST" target="dataFrame">
						<p>
							Description:
						</p>
						<input id="r_desc" name="r_desc" type="text" onfocus="TenantView.fieldFocus(this)">
						<br>
						<p>
							Total Paid(£)
						</p>
						<input id="r_total" name="r_total" type="text" onfocus="TenantView.fieldFocus(this)">
						<br>
						<p>
							Date Paid:
						</p>
						<div class="date">
							<input class="day" id="r_paiddate_day" name="r_paiddate_day" type="text" maxlength="2" onfocus="TenantView.fieldFocus(this)">
							<p class="divider">
								/
							</p>
							<input class="month" id="r_paiddate_month" name="r_paiddate_month" type="text" maxlength="2" onfocus="TenantView.fieldFocus(this)">
							<p class="divider">
								/
							</p>
							<input class="year" id="r_paiddate_year" name="r_paiddate_year" type="text" maxlength="4" onfocus="TenantView.fieldFocus(this)">
							<div class="clearBoth"></div>
						</div>
						<br>
						<div id="addNewRentButton" class="greenbutton" onclick="TenantView.addNewClicked()">
							Add
						</div>
						<p id="r_error" >
							Please fill in all fields
						</p>
						<input type="hidden" name="r_email" id="r_email" />
						<input type="hidden" name="r_tenantid" id="r_tenantid" />
					</form>
					<div class="clearBoth"></div>
				</div>
				<ul id="rentHolder">

				</ul>
			</div>
		</div>
		<div class="clearBoth"></div>
		<iframe id="dataFrame" name="dataFrame"></iframe>
	</body>

