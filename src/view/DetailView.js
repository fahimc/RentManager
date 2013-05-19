var DetailView = {
	init : function() {
		this.purgeOverview();
		var index = model.currentPropertyIndex;
		document.getElementById(model.id.propName).innerHTML = propertyData[index].name;
		this.buildDetails();
		this.changeTab(0);
	},
	backToList : function() {
		this.purgeOverview();
		Controller.navClick(0);
	},
	buildDetails : function() {
		var data = propertyData[model.currentPropertyIndex];
		document.getElementById('pd_address').innerHTML = "";
		document.getElementById('pd_post').innerHTML = "";
		document.getElementById('pd_rent').innerHTML = "";
		document.getElementById('pd_mort').innerHTML = "";
		document.getElementById('pd_other').innerHTML = "";

		document.getElementById('pd_address').innerHTML = data.address;
		document.getElementById('pd_post').innerHTML = data.postcode;
		document.getElementById('pd_rent').innerHTML = model.currency + data.rent;
		document.getElementById('pd_mort').innerHTML = model.currency + data.mortgage;
		document.getElementById('pd_other').innerHTML = model.currency + data.other;
	},
	changeTab : function(index) {
		this.purgeOverview();
		var current = model.currentPropertyTab;
		switch(current) {
			case 0:
				break;
			case 1:
				this.closeTenantClicked();
				break;
		}
		document.getElementById("pdNav_" + current).className = document.getElementById("pdNav_" + current).className.replace("selected", "");
		document.getElementById("pdNav_" + index).className += " selected";
		model.currentPropertyTab = index;

		document.getElementById("pdTab-" + current).style.display = "none";
		document.getElementById("pdTab-" + index).style.display = "block";

		switch(index) {
			case 0:
				break;
			case 1:
				this.buildTenantList();
				break;
			case 2:
				this.buildOverview();
				break;
		}
	},
	addTenantClicked : function() {
		document.getElementById(model.id.tenantHolder).style.display = "none";
		document.getElementById(model.id.addTenantButton).style.display = "none";
		document.getElementById(model.id.closeAddTenantButton).style.display = "block";
		document.getElementById(model.id.newTenant).style.display = "block";
	},
	closeTenantClicked : function() {
		document.getElementById(model.id.tenantHolder).style.display = "block";
		document.getElementById(model.id.addTenantButton).style.display = "block";
		document.getElementById(model.id.closeAddTenantButton).style.display = "none";
		document.getElementById(model.id.newTenant).style.display = "none";
	},
	fieldFocus : function(obj) {
		obj.className = obj.className.replace("error", "");
	},
	addNewClicked : function() {
		document.getElementById('t_error').style.display = "none";
		var f = {};
		f.fname = document.getElementById('t_fname');
		f.lname = document.getElementById('t_lname');
		f.jday = document.getElementById('t_joindate_day');
		f.jmon = document.getElementById('t_joindate_month');
		f.jyr = document.getElementById('t_joindate_year');
		f.rday = document.getElementById('t_rentdate_day');
		f.rent = document.getElementById('t_rent');
		f.duration = document.getElementById('t_duration');

		var empty = false;
		for (var field in f) {

			if (f[field].value == "" || f[field].value == " ") {
				f[field].className += " error";
				if (field != "other")
					empty = true;
			}
		}

		if (empty) {
			document.getElementById('t_error').style.display = "block";
		} else {

			document.getElementById('t_email').value = userEmail;
			document.getElementById('t_pid').value = propertyData[model.currentPropertyIndex].id;
			document.getElementById('newTenantForm').submit();
		}
	},
	buildTenantList : function() {
		var holder = document.getElementById('tenantHolder');
		holder.innerHTML = "";
		for (var a = 0; a < propertyData[model.currentPropertyIndex].tenants.length; a++) {
			var tenant = propertyData[model.currentPropertyIndex].tenants[a];
			var li = document.createElement("LI");
			li.innerHTML = "<p>" + tenant.firstname + " " + tenant.lastname + "</p><div class='greenbutton' onclick='DetailView.viewTenant(" + a + ")'>View</div";
			li.setAttribute("index", a);
			holder.appendChild(li);
		}
	},
	onPropertyStored : function(data) {
		propertyData = data;
		console.log(propertyData);
		this.buildTenantList();
		this.closeTenantClicked();
	},
	viewTenant : function(index) {
		model.currentTenantIndex = index;
		TenantView.init();
		Controller.navClick(2);

	},
	buildOverview : function() {

		var tenants = propertyData[model.currentPropertyIndex].tenants;
		if(tenants.length==0)return;
		// get starting date
		var yr = 0;
		var mon = 0;
		for (var a = 0; a < tenants.length; a++) {
			var tenant = tenants[a];
			var dateArray = tenant.joindate.split("/");
			if (dateArray[2] > yr) {
				yr = Int(dateArray[2]);
				if (dateArray[1] > mon)
					mon = Int(dateArray[1]) - 1;
			}
		}
		
		//build date from today
		var totalMonths = this.buildMoths(yr, mon);
		// loop tenants and add rent paid
		var totalRent=0;
		for (var a = 0; a < tenants.length; a++) {
			var payments = tenants[a].payments;
			for (var b = 0; b < payments.length; b++) {
				var pArray = payments[b].paiddate.split("-");
				var paidYear = Int(pArray[0]);
				var paidMonth = Int(pArray[1]) - 1;
				if (model.overviewMonths[paidYear] && model.overviewMonths[paidYear][paidMonth]) {
					var data = model.overviewMonths[paidYear][paidMonth];
					data.rentpaid += Number(payments[b].total);
					totalRent+=Number(payments[b].total);
				}
			}
		}
		//build view
		this.createOverviewMonths();
		
		//fill totals
		var totalMort = (totalMonths * Number(propertyData[model.currentPropertyIndex].mortgage));
		document.getElementById(model.id.overviewMort).innerHTML = model.currency+totalMort;
		document.getElementById(model.id.overviewRent).innerHTML = model.currency+totalRent;
		document.getElementById(model.id.overviewProfit).innerHTML = model.currency+(totalRent-totalMort);
	},
	buildMoths : function(yr, mon) {
		var d = new Date();
		var m = d.getMonth();
		var y = d.getFullYear();

		var totalMonths=0;
		var currentYear = yr;
		var currentMonth = mon;
		model.overviewMonths = [];
		var done = false;
		while (!done) {

			if (currentMonth >= 12) {
				currentMonth = 0;
				currentYear++;

			}
			if (currentYear > y || currentYear == y && currentMonth > m) {
				done = true;
				break;
			}
			if (!model.overviewMonths[currentYear])
				model.overviewMonths[currentYear] = [];
			model.overviewMonths[currentYear][currentMonth] = {
				rentpaid : 0
			};
			totalMonths++;
			currentMonth++;

		}
		return totalMonths;
	},
	createOverviewMonths : function() {
		var house = propertyData[model.currentPropertyIndex];
		var str="";
		for (var yearName in model.overviewMonths) {
			var year = model.overviewMonths[yearName];
			for (var monthName in year) {
				var data = year[monthName];
				
				var obj = model.overviewPaymentStr;
				obj = obj.replace("[m]",model.months[Int(monthName)]+" "+yearName);
				obj = obj.replace("[r]",model.currency+house.rent);
				obj = obj.replace("[rp]",model.currency+data.rentpaid);
				var outstanding = Number(house.rent)-Number(data.rentpaid);
				obj = obj.replace("[o]",model.currency+(outstanding>0?outstanding:0));
				str=obj+str;
			}
		}
		document.getElementById(model.id.overview_payments).innerHTML=str;
	},
	purgeOverview:function()
	{
		document.getElementById(model.id.overviewMort).innerHTML = "";
		document.getElementById(model.id.overviewRent).innerHTML = "";
		document.getElementById(model.id.overviewProfit).innerHTML = "";
		document.getElementById(model.id.overview_payments).innerHTML="";
	}
}
