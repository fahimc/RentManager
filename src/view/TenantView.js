var TenantView=
{
	init:function()
	{
		var tenant =propertyData[model.currentPropertyIndex].tenants[model.currentTenantIndex];
		document.getElementById(model.id.tenantName).innerHTML = tenant.firstname+" "+tenant.lastname;
		this.showInfo();
	},
	backToList:function()
	{
		Controller.navClick(1);
	},
	changeTab:function(index)
	{
		var current = model.currentTenantTab;
		switch(current)
		{
			case 0:
			break;
			case 1:
			//this.closeTenantClicked();
			break;
		}
		document.getElementById("tdNav_"+current).className = document.getElementById("tdNav_"+current).className.replace("selected","");
		document.getElementById("tdNav_"+index).className +=" selected"; 
		model.currentPropertyTab=index;
		
		document.getElementById("tdTab-"+current).style.display="none";
		document.getElementById("tdTab-"+index).style.display="block";
		
		switch(index)
		{
			case 0:
			break;
			case 1:
			this.buildTenantList();
			break;
		}
	},
	showInfo:function()
	{
		var tenant =propertyData[model.currentPropertyIndex].tenants[model.currentTenantIndex];
		document.getElementById('td_name').innerHTML ="";
		 document.getElementById('td_join').innerHTML ="";
		document.getElementById('td_rentday').innerHTML ="";
		document.getElementById('td_rent').innerHTML ="";
		document.getElementById('td_other').innerHTML ="";
		
		document.getElementById('td_name').innerHTML =tenant.firstname+" "+tenant.lastname;
		 document.getElementById('td_join').innerHTML =tenant.joindate;
		document.getElementById('td_rentday').innerHTML =tenant.rentdate;
		document.getElementById('td_rent').innerHTML =tenant.rent;
		document.getElementById('td_other').innerHTML =tenant.other;
	}
}
