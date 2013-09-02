jQuery.noConflict();
jQuery(document).ready(function(){
    //alert('tes');
    jQuery('#unitkerja').change(function(){
        //alert('tes');
        //alert(jQuery('#unitkerja').val());
        jQuery.ajax({
            type: 'POST',
            url: 'http://localhost/web/control/index.php/cCategori',
            datatype: 'html',
            data: {
                unit_id : jQuery('#unitkerja').val()
            },
            success : function(data){
                 //alert(data);
                 jQuery('#listini').hide(500);
                 jQuery('#listini').empty();
                 jQuery('#listini').append(data);
                 jQuery('#listini').show(500);
                },
            error : function(XMLHttpRequest, textStatus, errorThrown){
                alert('error');
            }
        });
    });
    return true;
});