(function(window, undefined) {
    
})(window);
$("#btn_submit").click(function(){
    $("#msg").hide();
    $('#qd').show();
    $('#main').hide(); 
    $('#hid_userid').val($('#userid').val());
})

function showResult(result){
    if(result){
        $("#msg").show();
    }    
}