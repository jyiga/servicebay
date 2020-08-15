$(function(){
    //alert('Hello')
    $.post('../../categorys/getContent',{},function(data){
        $('#productId').html(data)

    })
})