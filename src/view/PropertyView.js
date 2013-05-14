var PropertyView=
{
	
	addClicked:function()
	{
		document.getElementById(model.id.newProperty).style.display="block";
		document.getElementById(model.id.addPropBackButton).style.display="block";
		document.getElementById(model.id.addPropAddButton).style.display="none";
	},
	backClicked:function()
	{
		document.getElementById(model.id.newProperty).style.display="none";
		document.getElementById(model.id.addPropBackButton).style.display="none";
		document.getElementById(model.id.addPropAddButton).style.display="block";
	},
	addNewClicked:function()
	{
		var name = document.getElementById('p_name');
		var address = document.getElementById('p_address');
		var post = document.getElementById('p_post');
		var rent = document.getElementById('p_rent');
		var mort = document.getElementById('p_mort');
		var other = document.getElementById('p_other');
	}
}
