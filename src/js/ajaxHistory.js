jQuery.noConflict();
jQuery(document).ready(function(){
    //alert('tes');

    jQuery("#textfilter").hide(0);

    jQuery("#filter").change(function(){

        if(jQuery("#filter").val()==-999)
            {
                jQuery("#textfilter").val('');
                jQuery("#textfilter").hide(500);

                location.reload();
            }
        else
            {
                jQuery("#textfilter").val('');
                jQuery("#textfilter").hide(10);
                jQuery("#textfilter").show(500);
            }
        //alert(jQuery("#filter").val());
    });

    jQuery('#textfilter').change(function(){
        var user,dokumen,ajax;
        //alert('tes');
        //alert(jQuery('#unitkerja').val());
        if(jQuery("#textfilter").val()!=null && jQuery("#textfilter").val()!='')
            {
                if(jQuery("#filter").val()==1)
                    {
                        user = 1;
                        dokumen = 0;
                        ajax=1;
                    }
                 else if(jQuery("#filter").val()==2)
                     {
                        user = 0;
                        dokumen = 1;
                        ajax=1;
                     }
                // alert(ajax);
                jQuery.ajax({
                    type: 'POST',
                    url: 'http://localhost/web/control/index.php/cHistory',
                    datatype: 'html',
                    data: {
                        cari : jQuery('#textfilter').val(),
                        ajaxx: ajax,
                        userx: user,
                        dokumenx:dokumen
                    },
                    success : function(data){
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
            }
        
    });
    return true;
});