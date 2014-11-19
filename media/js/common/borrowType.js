
	var monthList = new Array();
	var typeList  = new Array();
	$("#months option[value!='']").each(function (){
		var obj = new Array(1);
		obj[0] = $(this).val();
		monthList.push(obj);
	})
	$("#type option[value!='']").each(function (){
		var id       = $(this).val();
		var name     = $(this).text();
		var months   = $(this).attr("title");
		var obj = new Array(3);
		obj[0] = id;
		obj[1] = name;
		obj[2] = months;
		typeList.push(obj);
	})
	if ($("#months").val() == "") {
		$("#type option[value!='']").remove();
	} else {
		var monthSelected = $("#months").val();
		$("#type option[value!='']").each(function (){
			if ($(this).attr("title") != monthSelected) {
				$(this).remove();
			}
		});
	}
	$("#months").change(function () {
		$("#type option[value!='']").remove();
		if ($("#months").val() != "") {
			var monthSelected = $("#months").val();
			for (var i = 0; i < typeList.length; i++) {
				if (typeList[i][2] == monthSelected) {
					var id       = typeList[i][0];
					var name     = typeList[i][1];
					var months   = typeList[i][2];
					var option = "<option value='"+id+"' title='"+months+"'>"+name+"</option>";
					$("#type").append(option);
				}
			}
		} else {
		}
    });