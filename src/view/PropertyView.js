var PropertyView = {
	init : function() {
		this.buildPropertyList();
	},
	buildPropertyList : function() {
		var holder = document.getElementById('propertyHolder');
		holder.innerHTML = "";
		for (var a = 0; a < propertyData.length; a++) {
			var li = document.createElement("LI");
			li.innerHTML = "<p>" + propertyData[a].name + "</p><div class='greenbutton' onclick='PropertyView.viewProperty(" + a + ")'>View</div";
			li.setAttribute("index", a);
			holder.appendChild(li);
		}
	},
	addClicked : function() {
		document.getElementById(model.id.newProperty).style.display = "block";
		document.getElementById(model.id.propertyHolder).style.display = "none";
		document.getElementById(model.id.addPropBackButton).style.display = "block";
		document.getElementById(model.id.addPropAddButton).style.display = "none";
	},
	backClicked : function() {
		document.getElementById(model.id.newProperty).style.display = "none";
		document.getElementById(model.id.propertyHolder).style.display = "block";
		document.getElementById(model.id.addPropBackButton).style.display = "none";
		document.getElementById(model.id.addPropAddButton).style.display = "block";
	},
	addNewClicked : function() {
		document.getElementById('p_error').style.display = "none";
		var f = {};
		f.name = document.getElementById('p_name');
		f.address = document.getElementById('p_address');
		f.post = document.getElementById('p_post');
		f.rent = document.getElementById('p_rent');
		f.mort = document.getElementById('p_mort');
		f.other = document.getElementById('p_other');

		var empty = false;
		for (var field in f) {

			if (f[field].value == "" || f[field].value == " ") {
				f[field].className += "error";
				if (field != "other")
					empty = true;
			}
		}

		if (empty) {
			document.getElementById('p_error').style.display = "block";
		} else {

			document.getElementById('p_email').value = userEmail;
			document.getElementById('newPropForm').submit();
		}
	},
	fieldFocus : function(obj) {
		obj.className = obj.className.replace("error", "");
	},
	viewProperty : function(index) {
		model.currentPropertyIndex = index;
		
		Controller.navClick(1);
	},
	onPropertyStored : function(data) {
		propertyData = data;
		this.buildPropertyList();
		this.backClicked();
	}
}
