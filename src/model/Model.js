var model = new Model(
	{
		currentPageIndex:0,
		currentPropertyIndex:0,
		currentPropertyTab:0,
		currentTenantTab:0,
		currentTenantIndex:0,
		currency:"£",
		months:["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
		overviewMonths:[],
		id:
		{
			nav:"nav",
			newProperty:"newProperty",
			addPropBackButton:"addPropBackButton",
			addPropAddButton:"addPropAddButton",
			backToPropertListButton:"backToPropertListButton",
			propertyDetails:"pdTab-0",
			propName:"propName",
			tenantName:"tenantName",
			newTenant:"newTenant",
			tenantHolder:"tenantHolder",
			addTenantButton:"addTenantButton",
			closeAddTenantButton:"closeAddTenantButton",
			addRentButton:"addRentButton",
			closeAddRentButton:"closeAddRentButton",
			rentHolder:"rentHolder",
			newRent:"newRent",
			overview_payments:"overview_payments",
			overviewMort:"overviewMort",
			overviewRent:"overviewRent",
			overviewProfit:"overviewProfit",
			propertyHolder:"propertyHolder"
		},
		overviewPaymentStr:'<div class="monthHolder"> <h1>[m]</h1> <ul> <li> Rent </li> <li class="right"> [r] </li> <li class="clearBoth"></li> </ul> <ul> <li> Rent Paid </li> <li class="right"> [rp] </li> <li class="clearBoth"></li> </ul> <ul> <li> Outstanding </li> <li class="right"> [o] </li> <li class="clearBoth"></li> </ul> </div>'
	}
);
