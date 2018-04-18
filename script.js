// Our labels along the x-axis
var percentage = [10,20,30,40,50,60,70,80,90,100];
// For drawing the lines
var candidate name = [86,114,106,106,107,111,133,221,783,2478];


var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: years,
    datasets: [
      { 
        data: candidate name,
        label: "PHP",
        borderColor: "#3e95cd",
        fill: false
      },
      
    ]
  }
});