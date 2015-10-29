var counter = 0;
var toteval = 20;

function init () {
	$("#totevalcount").text(toteval)
	$("input:radio").click(countSelected)
}


function countSelected () {
	console.log("counting selected evals")
	counter = $(':radio:checked').length;
	updateCounter()
}

function updateCounter () {
	console.log("updating selected evals")
	$('#evalcount').text(counter)
}

init();