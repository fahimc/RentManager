var DetailView=
{
	init:function()
	{
		var index  = model.currentPropertyIndex;
		document.getElementById(model.id.propName).innerHTML=propertyData[index].name;
		this.buildDetails();
		
	},
	backToList:function()
	{
		Controller.navClick(0);
	},
	buildDetails:function()
	{
		var data  = propertyData[model.currentPropertyIndex];
		document.getElementById('pd_address').innerHTML ="";
		 document.getElementById('pd_post').innerHTML ="";
		document.getElementById('pd_rent').innerHTML ="";
		document.getElementById('pd_mort').innerHTML ="";
		document.getElementById('pd_other').innerHTML ="";
		
		document.getElementById('pd_address').innerHTML =data.address;
		 document.getElementById('pd_post').innerHTML =data.postcode;
		document.getElementById('pd_rent').innerHTML =model.currency+data.rent;
		document.getElementById('pd_mort').innerHTML =model.currency+data.mortgage;
		document.getElementById('pd_other').innerHTML =model.currency+data.other;
	},
	changeTab:function(index)
	{
		var current = model.currentPropertyTab;
		switch(current)
		{
			case 0:
			break;
			case 1:
			this.closeTenantClicked();
			break;
		}
		document.getElementById("pdNav_"+current).className = document.getElementById("pdNav_"+current).className.replace("selected","");
		document.getElementById("pdNav_"+index).className +=" selected"; 
		model.currentPropertyTab=index;
		
		document.getElementById("pdTab-"+current).style.display="none";
		document.getElementById("pdTab-"+index).style.display="block";
		
		switch(index)
		{
			case 0:
			break;
			case 1:
			this.buildTenantList();
			break;
		}
	},
	addTenantClicked:function()
	{
		document.getElementById(model.id.tenantHolder).style.display="none";
		document.getElementById(model.id.addTenantButton).style.display="none";
		document.getElementById(model.id.closeAddTenantButton).style.display="block";
		document.getElementById(model.id.newTenant).style.display="block";
	},
	closeTenantClicked:function()
	{
		document.getElementById(model.id.tenantHolder).style.display="block";
		document.getElementById(model.id.addTenantButton).style.display="block";
		document.getElementById(model.id.closeAddTenantButton).style.display="none";
		document.getElementById(model.id.newTenant).style.display="none";
	},
	fieldFocus : function(obj) {
		obj.className = obj.className.replace("error", "");
	},
	addNewClicked : function() {
		document.getElementById('t_error').style.display = "none";
		var f = {};
		f.fname = document.getElementById('t_fname');
		f.lname= document.getElementById('t_lname');
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
	buildTenantList:function()
	{
		var holder = document.getElementById('tenantHolder');
		holder.innerHTML = "";
		for (var a = 0; a < propertyData[model.currentPropertyIndex].tenants.length; a++) {
			var tenant =propertyData[model.currentPropertyIndex].tenants[a];
			var li = document.createElement("LI");
			li.innerHTML = "<p>" + tenant.firstname +" "+tenant.lastname + "</p><div class='greenbutton' onclick='DetailView.viewTenant(" + a + ")'>View</div";
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
	viewTenant:function(index)
	{
		model.currentTenantIndex=index;
		TenantView.init();
		Controller.navClick(2);
		
	}
}
