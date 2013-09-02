jQuery.noConflict();
jQuery(document).ready(function(){
    //alert('tes');
    jQuery("form").submit(function(){
        jQuery.ajax({
            type: 'POST',
            url: 'http://localhost/web/control/index.php/cDocument/seeCategori',
            datatype: 'html',
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