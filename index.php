<html>
<head>
<title>Prevent Form Double Submit using jQuery</title>
<style>
#btn-submit{padding: 10px 20px;background: #555;border: 0;color: #FFF;display:inline-block;cursor: pointer;}
.validation-error {color:#FF0000;}
.input-control{padding:10px;width:400px;}
.input-group{margin-top:10px;}
#submit-control{margin-top:15px;}
</style>
</head>
<body>
<h1>Prevent Form Double Submit using jQuery</h1>
<form id="frm" method="post">
   <div class="input-group">Title <span class="title-validation validation-error"></span></div>
   <div>
        <input type="text" name="title" id="title" class="input-control" />
   </div>
    
   <div class="input-group">Description </div>
   <div>
		<textarea rows="5" name="description" id="description" class="input-control"></textarea>
   </div>

   <div id="submit-control">
        <input type="button" name="btn-submit" id="btn-submit" value="submit" onClick="ajaxSubmit();"/>
    </div>
</form>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script>
function ajaxSubmit() {	
	var valid = true;
	valid = checkEmpty($("#title"));
	if(valid) {
		var title = $("#title").val();
		var description = $("#description").val();
		$.ajax({
			url: "process-ajax.php",
			data:'title='+title+'&description='+description,
			type: "POST",
			beforeSend: function(){
				$('#submit-control').html("<img src='LoaderIcon.gif' /> Ajax Request is Processing!");
			},
			success: function(data){
				$('#submit-control').html("Form submited Successfully!");
			}
		});
	}
}
function checkEmpty(obj) {
	var name = $(obj).attr("name");
	$("."+name+"-validation").html("");	
	$(obj).css("border","");
	if($(obj).val() == "") {
		$(obj).css("border","#FF0000 1px solid");
		$("."+name+"-validation").html("Required");
		return false;
	}	
	return true;	
}
</script>		
</body>
</html>