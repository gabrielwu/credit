
	var provinceList = new Array();
	var cityList     = new Array();
	var countyList   = new Array();
	$("#province option[value!='']").each(function (){
		var id         = $(this).val();
		var name       = $(this).text();
		var provinceID = $(this).attr("class");
		var obj = new Array(3);
		obj[0] = id;
		obj[1] = name;
		obj[2] = provinceID;
		provinceList.push(obj);
	})
	$("#city option[value!='']").each(function (){
		var id       = $(this).val();
		var name     = $(this).text();
		var cityID   = $(this).attr("class");
		var fatherID = $(this).attr("title");
		var obj = new Array(4);
		obj[0] = id;
		obj[1] = name;
		obj[2] = cityID;
		obj[3] = fatherID;
		cityList.push(obj);
	})
	$("#county option[value!='']").each(function (){
		var id       = $(this).val();
		var name     = $(this).text();
		var countyID = $(this).attr("class");
		var fatherID = $(this).attr("title");
		var obj = new Array(4);
		obj[0] = id;
		obj[1] = name;
		obj[2] = countyID;
		obj[3] = fatherID;
		cityList.push(obj);
		countyList.push(obj);
	})
	if ($("#province").val() == "") {
		$("#city option[value!='']").remove();
		$("#county option[value!='']").remove();
	} else {
		var provinceIDSelected = $("#province").find("option:selected").attr("class");
		$("#city option[value!='']").each(function (){
			if ($(this).attr("title") != provinceIDSelected) {
				$(this).remove();
			}
		});
		if ($("#city").val() == "") {
			$("#county option[value!='']").remove();
		} else {
			var cityIDSelected = $("#city").find("option:selected").attr("class");
			$("#county option[value!='']").each(function (){
				if ($(this).attr("title") != cityIDSelected) {
					$(this).remove();
				}
			});
		}
	}
	$("#province").change(function () {
		$("#city option[value!='']").remove();
		$("#county option[value!='']").remove();
		if ($("#province").val() != "") {
			var IDSelected = $("#province").find("option:selected").attr("class");
			for (var i = 0; i < cityList.length; i++) {
				if (cityList[i][0] == "" || cityList[i][3] == IDSelected) {
					var id       = cityList[i][0];
					var name     = cityList[i][1];
					var cityID   = cityList[i][2];
					var fatherID = cityList[i][3];
					var option = "<option value='"+id+"' class='"+cityID+"' title='"+fatherID+"'>"+name+"</option>";
					$("#city").append(option);
				}
			}
			$("#city").find("option[value='']").attr("selected",true);
		} else {
		}
    });
	$("#city").change(function () {
		$("#county option[value!='']").remove();
		if ($("#city").val() != "") {
			var IDSelected = $("#city").find("option:selected").attr("class");
			for (var i = 0; i < countyList.length; i++) {
				if (countyList[i][0] == "" || countyList[i][3] == IDSelected) {
					var id       = countyList[i][0];
					var name     = countyList[i][1];
					var cityID   = countyList[i][2];
					var fatherID = countyList[i][3];
					var option = "<option value='"+id+"' class='"+cityID+"' title='"+fatherID+"'>"+name+"</option>";
					$("#county").append(option);
				}
			}
			$("#county").find("option[value='']").attr("selected",true);
		} else {
			$("#county option[value!='']").remove();
		}
    });