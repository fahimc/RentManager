var DetailView=
{
	init:function()
	{
		var index  = model.currentPropertyIndex;
		document.getElementById(model.id.propName).innerHTML=propertyData[index].name;
	},
	backToList:function()
	{
		Controller.navClick(0);
	}
}
