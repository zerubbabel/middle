(function(window, undefined) {
    
})(window);
'use strict';
var pieData = [
    {
        value: 0,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Red"
    },
    {
        value: 0,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Green"
    },
    {
        value: 0,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Yellow"
    },
    {
        value: 0,
        color: "#949FB1",
        highlight: "#A8B3C5",
        label: "Grey"
    },
    {
        value: 0,
        color: "#4D5360",
        highlight: "#616774",
        label: "Dark Grey"
    }

];

//debugger
function reloadPie(){
    var events=$('.event');
    for(var i=0;i<events.length;i++){
        pieData[i].value=parseInt($(events[i]).find('.badge').text());
    }
    var ctx = document.getElementById("chart-area").getContext("2d");
    window.myPie = new Chart(ctx).Pie(pieData);
}   
window.onload=reloadPie();