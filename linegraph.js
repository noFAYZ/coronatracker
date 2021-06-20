$(document).ready(function(){
    $.ajax({
      url : "http://localhost/coronatracker/includes/config.php",
      type : "GET",
      success : function(data){
        
  
        var dates = [];
        var tweets = [];
        
  
        for(var i in data) {
            console.log(i);
          dates.push("Dates " + data[i].date);
          tweets.push(data[i].tweets);
        }
  
        var chartdata = {
          labels: dates,
          datasets: [
            {
              label: "Tweets",
              fill: true,
              lineTension: 0.1,
              backgroundColor: "rgba(59, 89, 152, 0.75)",
              borderColor: "rgba(59, 89, 152, 1)",
              pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
              pointHoverBorderColor: "rgba(59, 89, 152, 1)",
              data: tweets
            }
          ]
        };
  
        var ctx = $("#ts");
  
        var LineGraph = new Chart(ctx, {
          type: 'line',
          data: chartdata
        });
      },
      error : function(data) {
  
      }
    });
  });