var Controller=
{
	init:function()
	{
		this.showPropertyPage();
	},
	navClick:function(index)
	{
		//remove current view
		document.getElementById("view-"+model.currentPageIndex).style.display="none";
		//set the new index
		model.currentPageIndex = index;
		//show the next view
		document.getElementById("view-"+model.currentPageIndex).style.display="block";
		window.scrollTo(1,1);
		switch(index)
		{
			case 0:
			this.showPropertyPage();
			break;
			case 1:
			DetailView.init();
			break;
		}
	},
	showPropertyPage:function()
	{
		View.hideNav();
	}
};
