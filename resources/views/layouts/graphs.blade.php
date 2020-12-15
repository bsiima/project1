<link rel="stylesheet" href="{{asset('design/css/mdb.min.css')}}">
<div class="row">
    <div class="card">
       <canvas id="lineChart"></canvas>
    </div>
 </div>

 <script type="text/javascript" src="{{asset('design/js/mdb.min.js')}}"></script>
 <script>
    //line
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
type: 'line',
data: {
labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
datasets: [{
label: "Average Temperature",
data: {!! $temperature_readings !!},
backgroundColor: [
'rgba(105, 0, 132, .2)',
],
borderColor: [
'rgba(200, 99, 132, .7)',
],
borderWidth: 2
},
{
label: "Moisture",
data: {!! $moisture_readings !!},
backgroundColor: [
'rgba(0, 137, 132, .2)',
],
borderColor: [
'rgba(0, 10, 130, .7)',
],
borderWidth: 2
}
]
},
options: {
responsive: true
}
});
 </script>
 