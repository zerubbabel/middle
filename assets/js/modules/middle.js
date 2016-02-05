/*
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

];*/

//debugger
/*
function reloadPie(){
    var events=$('.event');
    for(var i=0;i<events.length;i++){
        pieData[i].value=parseInt($(events[i]).find('.badge').text());
    }
    var ctx = document.getElementById("chart-area").getContext("2d");
    window.myPie = new Chart(ctx).Pie(pieData);
}  */ 
//window.onload=reloadPie();
var team=null;
var question=null;
var q_index=-1;
var clock=null;
function clearTeamBg(){
    $.each($(".team"),function(){
        this.style["background-color"]='#fff'
    });
}

$(".team").click(function(){    
    team=this.id;
    clearTeamBg();
    this.style["background-color"]='#1ff'
    $("#hid_userid").val(team);
    next();
});
$("#start_rush").click(function(){
    clearTeamBg();
    start_rush();
})
$("#next").click(function(){
    next();
    clearAns();
})
$("#showAns").click(function(){
    showAns();
});
$("#right").click(function(){
    var point=1;//questions_collection[q_index][2];
    var datas={'userid':team,'point':point};
    //right(datas);

})
$("#wrong").click(function(){
    wrong();
})

function getAjax(method,datas=null){
    var ans;
    $.ajax({
        type:'post',
        url:'middle/middle_ajax/'+method,     
        async:false,
        data:{'data':datas},
        success:function(data){
            if(data!=null){         
                ans=eval(data);
                return eval(data);
            }
        },
        error:function(){
            ans=-1;
            return -1;
        }
    });
    return ans;
}

function right(point){
    getAjax('right',point);
}

function start_rush(){
    var r=getAjax('start_rush');
    $('#rush_modal').modal();
    clock=setInterval(check_rush,1000);    
}

function clearAns(){
    $(".ans").remove();
}
function showAns(){
    if(q_index!=-1){
        question_ans=question=questions_collection[q_index][1];
        clearAns();
        var html="<p class='ans'>"+question_ans+"</p>";
        $("#A_container").append(html);
    }
}

function next(){
    $("#right_div").show();
    clearAns();
    select();
    if(q_index!=-1){
        $(".content").remove();
        question=questions_collection[q_index][0];
        var html="<p class='content'>"+question+"</p>";
        $("#Q_container").append(html);
    }
}
function recount(ele){
    var userid=ele.id;
    var count = parseInt($('#'+userid).find('.badge').text());
    $('#'+userid).find('.badge').text(count + 1);
}
function select() {
        var i;
        if(over()){
            i=-1;
            question="game over!";
        }
        else{
            i=random();
            while (flag[i]){
                i=random();
            }

            flag[i]=true;
            q_index=i;
            //question=questions_collection[i][0];
        }
    }

function over(){
    for(var j=0;j<questions_collection.length;j++){
        if (!flag[j]){
            return false
        }   
    }
    return true;
}

function check_rush(){
    
    var r=getAjax('check_rush');
    if (r!=0){
        stop();
        clearTeamBg();
        $("#"+r)[0].style["background-color"]="#1ff";
        $('#rush_modal').modal('hide');
    }
}

function stop(){
    clearInterval(clock);
}

