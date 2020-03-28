$("#submit").click(function() {
$.post($("#checkout").attr("action"), $("#checkout :input").serializeArray(),function(info) {$("#checkout").html(info);});
clearInput();
});

$("#checkout").submit(function(){
return false;
});

function clearInput(){
$("#checkout :input").each(function(){
$(this).val('');
});
};
