window.onload = function () {

    var chartPorDia = new CanvasJS.Chart("chartPorDia", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Instalações no Ultimos 7 Dias"
        },
        axisY:{
            includeZero: false
        },
        data: [{        
            type: "line",       
            dataPoints: [
                { y: 5 , label:'30/07/2019'},
                { y: 4 ,label:' 31/07/2019'},
                { y: 9 , label:'01/08/2019'},
                { y: 4 , label:'02/08/2019'},
                { y: 3 , label:'03/08/2019'},
                { y: 4 , label:'04/08/2019'},
                { y: 6 , label:'05/08/2019'}
            ]
        }]
    });
    chartPorDia.render();

    var chartPizza = new CanvasJS.Chart("chartPizza", {
        animationEnabled: true,
        title: {
            text: "Tipos de Procedimento Realizados: (Luiz Antonio)"
        },
        data: [{
            type: "pie",
            startAngle: 2400,
            yValueFormatString: "##0.00\"%\"",
            indexLabel: "{label} {y}",
            dataPoints: [
                {y: 55.45, label: "Ativação"},
                {y: 30.31, label: "Manutenção"},
                {y: 14.24, label: "mud. de Endereco"},
                {y: 1.00, label: "Retirada"},
                
            ]
        }]
    });
    chartPizza.render();


    var nome = " Luiz Antonio"
    var chartContainer = new CanvasJS.Chart("chartContainer", {
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        animationEnabled: true,
        title:{
            text: "Media de Instalação Mensal: (Luiz Antonio)"   
        },
        axisX: {
            interval: 1,
            intervalType: "month",
            valueFormatString: "MMM"
        },
        axisY:{
            title: "Instalações",
            valueFormatString: "#0"
        },
        data: [{        
            type: "line",
            markerSize: 12,
            xValueFormatString: "MMM, YYYY",
            yValueFormatString: "###.#",
            dataPoints: [        
                { x: new Date(2019, 00, 1), y: 20.5,     },
                { x: new Date(2019, 01, 1), y: 30.76,    },
                { x: new Date(2019, 02, 1) , y: 30.9,    },
                { x: new Date(2019, 03, 1) , y: 32.2,   },
                { x: new Date(2019, 04, 1) , y: 40.55,  },
                { x: new Date(2019, 05, 1) , y: 60.78,  },
                { x: new Date(2019, 06, 1) , y: 68.55,  },
                { x: new Date(2019, 07, 1) , y: 28.99,  },
                { x: new Date(2019, 08, 1) , y: 34.96,  },
                { x: new Date(2019, 09, 1) , y: 24.69,  },
                { x: new Date(2019, 10, 1) , y: 44.64,  },
                { x: new Date(2019, 11, 1) , y: 34.55,  }
            ]
        }]
    });

    chartContainer.render();

    var chartQtde = new CanvasJS.Chart("chartQtde", {
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title:{
            text: "Qtde. Instalações tecnico ("+nome+")"
        },
        axisY: {
            title: "Qauantidade"
        },
        data: [{        
            type: "column",  
            legendMarkerColor: "grey",
            legendText: "MMbbl = one million barrels",
            dataPoints: [      
                { y: 150, label: "Jan." },
                { y: 80, label: "Fev." },
                { y: 90, label: "Mar." },                
                { y: 40,  label: "Abr." },
                { y: 162,  label: "Mai." },
                { y: 158,  label: "Jun." },
                { y: 142,  label: "Jul." },
                { y: 101, label: "Ago." },
                { y: 178,  label: "Set." },
                { y: 100,  label: "Nov" },
                { y: 278,  label: "Dez." },
            ]
        }]
    });

    chartQtde.render();
    
    }