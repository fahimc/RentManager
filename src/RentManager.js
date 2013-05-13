var RentManager=
{
	init:function()
	{
		this.setDebug();
	},
	setDebug:function()
	{
		if(window.DEBUG && window.console)console.log(this);
	}
};
