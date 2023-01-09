<?php include 'db_connect.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
try{
    $sql = mysqli_query($conn, "SELECT * FROM `sales_list`") or die('query failed');
        
    if(mysqli_num_rows($sql) > 0){

        $sales = array();
    
       while($row = mysqli_fetch_assoc($sql)){ ;

        $sales[] = $row['total_amount'];

        }  ;
     
    };


}catch(PDOException $e){
    die("ERROR" . $e->getMessage());
}

        

?>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
<script>
const sales = <?php echo json_encode($sales)?>
</script>



<div>
  <canvas id="myChart"></canvas>
</div>
<button  onclick="timeFrame(this)" value="day" >Day</button>
  <button onclick="timeFrame(this)" value="week">Week</button>
  <button onclick="timeFrame(this)" value="month">Month</button>


<script>



const ctx = document.getElementById('myChart');
  
  const day = [
    { x: Date.parse('2023-1-8 00:00:00 GMT+0800'), y: 18},
    { x: Date.parse('2023-1-9 00:00:00 GMT+0800'), y: 12},
    { x: Date.parse('2023-1-10 00:00:00 GMT+0800'), y: 6},
    { x: Date.parse('2023-1-11 00:00:00 GMT+0800'), y: 9},
    { x: Date.parse('2023-1-12 00:00:00 GMT+0800'), y: 3},
    { x: Date.parse('2023-1-13 00:00:00 GMT+0800'), y: 12},
    { x: Date.parse('2023-1-14 00:00:00 GMT+0800'), y: 3},
  ];

  const week = [
    { x: Date.parse('2022-12-31 00:00:00 GMT+0800'), y: 128},
    { x: Date.parse('2023-1-7 00:00:00 GMT+0800'), y: 122},
    { x: Date.parse('2023-1-14 00:00:00 GMT+0800'), y: 62},
    { x: Date.parse('2023-1-21 00:00:00 GMT+0800'), y: 29},
    { x: Date.parse('2023-1-28 00:00:00 GMT+0800'), y: 32},
    
  ];
  const month = [
    { x: Date.parse('2023-01-1 00:00:00 GMT+0800'), y: 128},
    { x: Date.parse('2023-02-1 00:00:00 GMT+0800'), y: 128},
    { x: Date.parse('2023-03-1 00:00:00 GMT+0800'), y: 128},
    { x: Date.parse('2023-04-1 00:00:00 GMT+0800'), y: 128},
    { x: Date.parse('2023-05-1 00:00:00 GMT+0800'), y: 128},
    { x: Date.parse('2023-06-1 00:00:00 GMT+0800'), y: 128},
  
  ];

  
  new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        label: 'Weekly Sales',
        data: day,
        borderWidth: 1
      }]
    },
    options: {
      scales:{
        x:{
            type: 'time',
            time: {
                unit: 'month'
            }
        },
        y: {
          beginAtZero: true
        }
      }
    }
  });

function timeFrame(period){
    console.log(period.value);
    if(period.value == 'day'){
        myChart.options.scales.x.time.unit = perio.value;
        myChart.data.datasets[0].data = day;
    }
    if(period.value == 'week'){
        myChart.options.scales.x.time.unit = perio.value;
        myChart.data.datasets[0].data = week;
    }
    if(period.value == 'month'){
        myChart.options.scales.x.time.unit = perio.value;
        myChart.data.datasets[0].data = month;
    }

    myChart.update();
}
</script>




</body>
</html>
