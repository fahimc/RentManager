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
		document.getElementById("pdNav_"+current).className = document.getElementById("pdNav_"+current).className.replace("selected","");
		document.getElementById("pdNav_"+index).className +=" selected"; 
		model.currentPropertyTab=index;
	}
}
