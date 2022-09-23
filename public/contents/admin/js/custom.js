//Modal code start
$(document).ready(function(){
	$(document).on("click", "#softDelete", function () {
		 var deleteID = $(this).data('id');
		 $(".modal-body #modal_id").val( deleteID );
	});

	$(document).on("click", "#restore", function () {
		var restoreID = $(this).data('id');
		$(".modal-body #modal_id").val( restoreID );
   });

   $(document).on("click", "#delete", function () {
	var deleteID = $(this).data('id');
	$(".modal-body #modal_id").val( deleteID );
   });
});


//Single Image Upload Script
function mainThambUrl(input){
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e){ 
			$('#mainThmb').attr('src',e.target.result).width(80)
				.height(80);
		};
		reader.readAsDataURL(input.files[0]);
	}
}
function mainThambUrl2(input){
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e){ 
			$('#mainThmb2').attr('src',e.target.result).width(80)
				.height(80);
		};
		reader.readAsDataURL(input.files[0]);
	}
}
function mainThambUrl3(input){
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e){ 
			$('#mainThmb3').attr('src',e.target.result).width(80)
				.height(80);
		};
		reader.readAsDataURL(input.files[0]);
	}
}


//Data Table code start
$(document).ready(function(){
	$('#inexsummary').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"order": [[ 0, "desc" ]],
	});

	$('#seveendayreport').DataTable({
		"paging": false,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": false,
		"autoWidth": false,
		"order": [[ 0, "desc" ]],
	});

	$('#allloanerinfo').DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});

	$('#alltableinfo').DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});

	$('#customerTableinfo').DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": false,
		"autoWidth": false
	});

	$('#loanerstatus').DataTable({
		"paging": false,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": false,
		"autoWidth": false,
		"order": [[ 0, "desc" ]],
	});

	$('#allTableDesc').DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"order": [[ 0, "desc" ]],
		"info": true,
		"autoWidth": false
	});
});