window.onload = function () {
    
    


var chartsProced = new CanvasJS.Chart("chartproced", {
	theme:"light2",
	animationEnabled: true,
	
	axisY :{
		includeZero: false,
		title: "Quantidade",
		
	},
	toolTip: {
		shared: "true"
	},
	legend:{
		cursor:"pointer",
		itemclick : toggleDataSeries
    },
    axisX:{      
        valueFormatString: "DD-MMM" },
	data: [{
		type: "line",
		visible: true,
		showInLegend: true,
		yValueFormatString: "#,###",
		name: "Gabriel Zabine",
		dataPoints: [
            { x: new Date(2019, 07, 1), y: 45},       
            { x: new Date(2019, 07, 3), y: 20 }, 
            { x: new Date(2019, 07, 6), y: 30 }, 
            { x: new Date(2019, 07, 9), y:  30}, 
            { x: new Date(2019, 07, 12), y: 51}, 
            { x: new Date(2019, 07, 15), y: 50} ,
            { x: new Date(2019, 07, 18), y: 75}, 
            { x: new Date(2019, 07, 21), y: 60},
            { x: new Date(2019, 07, 24), y: 42},
            { x: new Date(2019, 07, 27), y: 35}, 
            { x: new Date(2019, 07, 30), y: 27}, 
             ]
	},
	{
		type: "line", 
		showInLegend: true,
		visible: true,
		yValueFormatString: "#,##",
		name: "Alex",
		dataPoints: [
            { x: new Date(2019, 07, 1), y: 20},       
            { x: new Date(2019, 07, 3), y: 30 }, 
            { x: new Date(2019, 07, 6), y: 40 }, 
            { x: new Date(2019, 07, 9), y:  50}, 
            { x: new Date(2019, 07, 12), y: 40}, 
            { x: new Date(2019, 07, 15), y: 50} ,
            { x: new Date(2019, 07, 12), y: 60}, 
            { x: new Date(2019, 07, 4), y: 70},
            { x: new Date(2019, 07, 0), y: 50},
            { x: new Date(2019, 07, 13), y: 35}, 
            { x: new Date(2019, 07, 16), y: 47}, 
            { x: new Date(2019, 07, 18), y: 50}, 
            { x: new Date(2019, 07, 21), y: 42}, 
            { x: new Date(2019, 07, 24), y: 65}, 
            { x: new Date(2019, 07, 26), y: 67}, 
            { x: new Date(2019, 07, 28), y: 30} ]
	}
	]
});
chartsProced.render();

function toggleDataSeries(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	chartsProced.render();
}





var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: ""
    },
    
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        //indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        indexLabelPlacement: "outside",
        dataPoints: [
            {label: 'Gabriel Zabine', x: 5, y: 300 },
            {label: 'Alex', x: 1 , y: 251 },
           
        ]
    }]
});
chart.render();






}