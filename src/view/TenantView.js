var TenantView = {
	init : function() {
		var tenant = propertyData[model.currentPropertyIndex].tenants[model.currentTenantIndex];
		document.getElementById(model.id.tenantName).innerHTML = tenant.firstname + " " + tenant.lastname;
		this.showInfo();
	},
	backToList : function() {
		Controller.navClick(1);
	},
	changeTab : function(index) {
		var current = model.currentTenantTab;
		switch(current) {
			case 0:
				break;
			case 1:
				//this.closeTenantClicked();
				break;
		}
		document.getElementById("tdNav_" + current).className = document.getElementById("tdNav_" + current).className.replace("selected", "");
		document.getElementById("tdNav_" + index).className += " selected";
		model.currentTenantTab = index;

		document.getElementById("tdTab-" + current).style.display = "none";
		document.getElementById("tdTab-" + index).style.display = "block";

		switch(index) {
			case 0:
				break;
			case 1:
				this.buildRentList();
				break;
		}
	},
	showInfo : function() {
		var tenant = propertyData[model.currentPropertyIndex].tenants[model.currentTenantIndex];
		document.getElementById('td_name').innerHTML = "";
		document.getElementById('td_join').innerHTML = "";
		document.getElementById('td_rentday').innerHTML = "";
		document.getElementById('td_rent').innerHTML = "";
		document.getElementById('td_other').innerHTML = "";
		document.getElementById('td_duration').innerHTML = "";

		document.getElementById('td_name').innerHTML = tenant.firstname + " " + tenant.lastname;
		document.getElementById('td_join').innerHTML = tenant.joindate;
		document.getElementById('td_rentday').innerHTML = tenant.rentdate;
		document.getElementById('td_rent').innerHTML = tenant.rent;
		document.getElementById('td_other').innerHTML = tenant.other;
		document.getElementById('td_duration').innerHTML = tenant.duration;
	},
	addRentClicked : function() {
		document.getElementById(model.id.rentHolder).style.display = "none";
		document.getElementById(model.id.addRentButton).style.display = "none";
		document.getElementById(model.id.closeAddRentButton).style.display = "block";
		document.getElementById(model.id.newRent).style.display = "block";
	},
	addNewClicked : function() {
		document.getElementById('r_error').style.display = "none";
		var f = {};
		f.desc = document.getElementById('r_desc');
		f.total = document.getElementById('r_total');
		f.pday = document.getElementById('r_paiddate_day');
		f.pmon = document.getElementById('r_paiddate_month');
		f.pyr = document.getElementById('r_paiddate_year');

		var empty = false;
		for (var field in f) {

			if (f[field].value == "" || f[field].value == " ") {
				f[field].className += " error";
				if (field != "other")
					empty = true;
			}
		}

		if (empty) {
			document.getElementById('r_error').style.display = "block";
		} else {
			var tenant = propertyData[model.currentPropertyIndex].tenants[model.currentTenantIndex];
			document.getElementById('r_email').value = userEmail;
			document.getElementById('r_tenantid').value = tenant.id;
			document.getElementById('newRentForm').submit();
		}
	},
	onPropertyStored : function(data) {
		propertyData = data;
		console.log(propertyData);
		this.buildRentList();
		this.closeRentClicked();
	},
	closeRentClicked:function()
	{
		document.getElementById(model.id.rentHolder).style.display="block";
		document.getElementById(model.id.addRentButton).style.display="block";
		document.getElementById(model.id.closeAddRentButton).style.display="none";
		document.getElementById(model.id.newRent).style.display="none";
	},
	buildRentList:function()
	{
		var tenant = propertyData[model.currentPropertyIndex].tenants[model.currentTenantIndex];
		var holder = document.getElementById('rentHolder');
		holder.innerHTML = "";
		for (var a = 0; a < tenant.payments.length; a++) {
			var payment =tenant.payments[a];
			var li = document.createElement("LI");
			li.innerHTML = "<p>Description: " + payment.description +"</p>"+"<p>Total Paid: " + payment.total +"</p>"+"<p>Payment Date: " + payment.paiddate +"</p>";
			li.setAttribute("index", a);
			holder.appendChild(li);
		}
	}
}
