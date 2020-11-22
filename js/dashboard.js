$('.counter-up').counterUp(
    {
        delay:10,
        time:1000
    }
)
let dateArr=['jul 21','jul 20','jul 19','jul 18','jul 17','jul 16','jul 15','jul 14','jul 13','jul 12','jul 11'];
let orderCountArr=[6,4,3,9,8,3,8,4,9,5,2];
let viewerCountArr=[11,15,12,16,19,20,12,22,17,13,25];

let ctx = document.getElementById('myChart').getContext('2d');
let myChart =new Chart(ctx,{
    type: 'line',
    data: {
        labels:dateArr,
        datasets: [
        {
            label: 'Order Count',
            data: orderCountArr,
            backgroundColor: [
                '#007bff30',
            ],
            borderColor: [
                '#007bff',
            ],
            borderWidth: 1,
            tension:0
        },
        {
            label: 'Viewer Count',
            data: viewerCountArr,
            backgroundColor: [
                '#28a74530',
            ],
            borderColor: [
                '#28a745',
            ],
            borderWidth: 1,
            tension:0
        }
    ]
    },
    options: {
        scales: {
            yAxes: [{
                display:false,
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes:[
                {
                    display:false,
                    gridlimes:[
                        {
                            display:false
                        }
                    ]
                }
            ]
        },
        legend:{
            display:true,
            shape:'circle',
            position:'top',
            labels:{
                fontColor:'#222',
                usePointStyle:true
            }
        }
    }
});

let orderFromPlaces=[5,15,4,9,7];
let places=["YGN","MDY","NPY","SHAN","MGW"]

let opp = document.getElementById('op').getContext('2d');
let myPie = new Chart(opp, {
    type: 'doughnut',
    data: {
        labels: places,
        datasets: [{
            label: 'Order From Places',
            data:orderFromPlaces,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                display:false,
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes:[
                {
                    display:false,
                }
            ],
        },
        legend:{
            display:true,
            shape:'circle',
            position:'bottom',
            labels:{
                fontColor:'#222',
                usePointStyle:true
            }
        }
    }
});