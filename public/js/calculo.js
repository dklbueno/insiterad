$(".region").keyup(function(){
    var val = $(this).val();
    if(isNaN(val)){
         val = val.replace(/[^0-9\.]/g,'');
         if(val.split('.').length>2) 
             val =val.replace(/\.+$/,"");
    }
    $(this).val(val); 
});
$(".bt-calcular").click(function(){
    $(".tr-region").each(function(){
        var input_region = $(this).find('.region');
        var valor = input_region.val();
        var region = input_region.attr('name').replace('mgy[','').replace(']','');        
        var fator = $("input[name='fator["+region+"]']").val();
        var msv = parseFloat(valor*fator).toFixed(2);
        $(this).find("input[name='msv["+region+"]']").val('');
        $(this).find(".msv").html('');
        if(valor) {   
            $(this).find("input[name='msv["+region+"]']").val(msv);
            $(this).find(".msv").html(msv);
        }
    });    
});
$(document).keypress(function(e) {
    if(e.which == 13) {
        $(".bt-calcular").click();
        e.preventDefault();
        return false;
    }
});
function deleteCalculo(id){
    if(confirm('Deseja excluir este registro?')){
        $("#reg_"+id).fadeOut();
        $.ajax({
            url : '/calculo/delete/'+id,
            type : 'get',
            success : function(data){
                //console.log(data);                
            }
        });
    }    
}