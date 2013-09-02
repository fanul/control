jQuery.noConflict();
jQuery(document).ready(function(){
    //alert('tes');
    jQuery("#boxcari").change(function(){
        jQuery.ajax({
            type: 'POST',
            url: 'http://localhost/web/control/index.php/cCariUser/docari/',
            datatype: 'html',
            data: {
                boxcari: jQuery("#boxcari").val()
            },
            success : function(data){
                 //alert(data);
                 jQuery('#listini').hide(500);
                 jQuery('#listini').empty();
                 jQuery('#listini').append(data);
                 jQuery('#listini').show(500);
                },
            error : function(XMLHttpRequest, textStatus, errorThrown){
                //alert('error');
                alert(XMLHttpRequest.responseText);
            }
        });
    });
    return false;
});