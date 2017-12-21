// var leave = document.getElementById("leave_group");

// if(leave){
// 	console.log("success");
// 	leave.addEventListener("click", leaveGroup);
// }
// function leaveGroup(){
// 	alert("leave group clicked");
// 	var groupName = leave.getAttribute("name");
// 	if(confirm("Leave this group?") == true){
// 		//Leave group
// 		var ajaxurl = '../php/leave_group_handler.php';
// 		var data = {'name': groupName};	
// 		$.post(ajaxurl, data, function(response){
// 			window.location.href = "../php/load_group.php";
// 		});
		
// 	} else {
// 		//do nothing?
	
// 	}	
// }

$(document).ready(function(){
	$('.button').click(function(){
		if(confirm("Leave this group?") == true){
			var clickBtnName = $(this).attr('name');
			var ajaxurl = '/php/leave_group.php';
			var data = {'name': clickBtnName};
			//alert(data['name']);
			$.post(ajaxurl, data, function(response){
				window.location.href="/content/manage_groups.php";
			});
		}
	});

});

