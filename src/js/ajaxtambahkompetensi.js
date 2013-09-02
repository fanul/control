jQuery.noConflict();
jQuery(document).ready(function(){
    //alert('tes');
    jQuery('#maskom_id').change(function(){
        //alert('tes');
        //alert(jQuery('#unitkerja').val());
        jQuery.ajax({
            type: 'POST',
            url: 'http://localhost/web/control/index.php/cTambahkompetensi/pilihmasterkompetensi',
            datatype: 'html',
            data: {
                maskom_id : jQuery('#maskom_id').val()
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