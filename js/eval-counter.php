var counter = 0;
// var toteval = 20;
//var toteval = '<?php echo $startupnumber; ?>;'

function init () {
	console.log("initialising counter")
	$("#totevalcount").text(toteval)
	$("input:checkbox").click(countSelected)
}


function countSelected () {
	console.log("counting selected evals")
	counter = $(':checkbox:checked').length;
	updateCounter()
}

function updateCounter () {
	console.log("updating selected evals")
	$('#evalcount').text(counter)
}

init();
