
// PIE CHART
google.charts.load('current', {'packages':['corechart','line']}); 
google.charts.setOnLoadCallback(drawChart); 
				
function drawChart() { 
	var jsonData = $.ajax({ 
		url      : "<?php echo base_url() . 'admin/get_pie' ?>", 
        dataType : "json", 
        async    : false 
	}).responseText; 
						
	var data  = new google.visualization.DataTable(jsonData); 
	var chart = new google.visualization.PieChart(document.getElementById('chart_div')); 
	
	chart.draw(data, {width: 470, height: 300});
}