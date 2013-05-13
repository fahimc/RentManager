var Controller=
{
	init:function()
	{
		
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
	}
};
