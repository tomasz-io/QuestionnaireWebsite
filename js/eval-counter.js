var counter = 0;
// var toteval = 20;
// var toteval = <?php echo 15 ?>;

function init () {
	console.log("initialising counter")
	$("#totevalcount").text(toteval)
	$("input:checkbox").click(countSelected)
}


function countSelected () {
	console.log("counting selected evals")
	counter = $(':checkbox:checked').length;
	updateCounter()
	percentCalc()
}

function updateCounter () {
	console.log("updating selected evals")
	$('#evalcount').text(counter)
}

function percentCalc () {
	console.log("calculating percentage")
	var percent = counter/toteval*100
	percent<=100 ? $('#progressbar').width(percent + "%") : null;
	pulse()
	setTimeout(pulse,300)
	percent>=100 ? $('#footersubmit').removeClass("disabledbtn") : $('#footersubmit').addClass("disabledbtn") 

}

function pulse () {
	$('#footer-counter').toggleClass("pulse")
	}
init();
