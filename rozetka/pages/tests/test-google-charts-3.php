<?php

if (isset($_GET['json'])){

$reviews = db_query("SELECT reviews,COUNT(*) as count FROM products WHERE reviews > 0 GROUP BY reviews ");


// pa($reviews);
$diagram_data = [];
$max_value = $reviews[count($reviews) - 1]['reviews'];
foreach ($reviews as $product) {

    for ($a = 1; $a < $max_value; $a += 10) { 
        $b = $a+9;
        if(!isset($diagram_data["$a - $b"]))  $diagram_data["$a - $b"] = 0;
        if($product['reviews'] >= $a && $product['reviews'] <= $b) {
            $diagram_data["$a - $b"] = $diagram_data["$a - $b"] + $product['count'];
    
        }
    }

}


// pa($product);

$max_count = max($diagram_data);


$max = 0;
foreach ($diagram_data as $value) {
    if ($value > $max) {
        $max = $value;
    }
}

// pa($diagram_data);
// pa($value);

$counter = 0;
$to_json_arr = [];
foreach ($diagram_data as $key => $value) {
    $to_json_arr[] = [$key, $value];

    if($counter++ > 4) break;
}
// pa($to_json_arr);
echo json_encode($to_json_arr, 128);
// pa($max);

// pa($max_count);

return;

}
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

$.get('http://php-lessons.loc/rozetka/ajax.php?action=tests/test-google-charts-3&json', function(json){
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data_arr = [
        // ["Element", "Density", { role: "style" } ],
        ["Element", "Density" ], 
      ]
      for (var i = 0; i < json.length; i++) {
                data_arr.push(json[i])
      }

      var data = google.visualization.arrayToDataTable(data_arr);
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" }
                       ]);

      var options = {
        title: "Density of Precious Metals, in g/cm^3",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
    }
  }, 'json')
  </script>
<div id="barchart_values" style="width: 900px; height: 300px;"></div>