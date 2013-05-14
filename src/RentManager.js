var RentManager=
{
	init:function()
	{
		this.setDebug();
		Controller.init();
	},
	setDebug:function()
	{
		if(window.DEBUG && window.console)console.log(this);
	}
};
