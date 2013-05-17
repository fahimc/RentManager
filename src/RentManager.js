var RentManager=
{
	init:function()
	{
		this.setDebug();
		Controller.init();
		PropertyView.init();
	},
	setDebug:function()
	{
		if(window.DEBUG && window.console){
			console.log(this);
			console.log(propertyData);
		}
	}
};
