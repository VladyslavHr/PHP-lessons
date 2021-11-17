<?php

if (isset($_GET['json'])){


    $prices = db_query("SELECT price,COUNT(*) as count FROM products WHERE price > 0 GROUP BY price");


    $data_price = [];
    $max_value = $prices[count($prices) - 1]['price'];
    $max_value = 10000;

    foreach ($prices as $product_price) {
        for ($a = 1; $a < $max_value ; $a += 1000) { 
            $b = $a + 999;
            if(!isset($data_price["$a - $b"])) $data_price["$a - $b"] = 0;
            if($product_price['price'] > $a && $product_price['price'] <= $b) {
                $data_price["$a - $b"] = $data_price["$a - $b"] + $product_price['count'];
            }
        }
    }


    
    // $data_price = array_map(function($key, $value)
    // {
    //     return [$key, $value];
    // }, array_keys($data_price), $data_price);

    $to_json_arr = [];
    foreach ($product_price as $key => $value) {
        $to_json_arr[] = [$key, $value];
    }

    echo json_encode($to_json_arr, 128);

    // $max_count = max($data_price);



    return;
}
?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        fetch('http://php-lessons.loc/rozetka/ajax.php?action=tests/test-google-charts-1&json')
            .then((response) => {
                return response.json();
            })
            .then((json) => {


        
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data_arr = [
            ['Task', 'Hours per Day'],
            ]
            for (var i = 0; i < json.length; i++) {
                data_arr.push(json[i])
                
            }
            var data = google.visualization.arrayToDataTable(data_arr);

        var options = {
          title: 'My Daily Activities',
          titleTextStyle: {
              color: 'red',
              
          },
          is3D: true,
        };

        var chart = new google.visualization.LineChart(document.getElementById('LineChart'));
        chart.draw(data, options);
        }

});

    </script>


    <div id="LineChart" style="width: 900px; height: 500px;"></div>