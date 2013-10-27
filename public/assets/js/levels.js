jQuery(document).ready(function(){
    /*
     * Delete Item
     */
     jQuery('.delete-item').click(function(){
        
        var id = jQuery(this).attr('data-id');
        var cf = window.confirm("Are you sure you want to delete this item?");
        
        if(cf){
            jQuery.ajax({
                type:'POST',
                url:'/levels/delete',
                data:'id='+id,
                success:function(data){
                    if(data == 1)
                    {
                        window.location.reload(true);
                    }else{ alert(data); }
                }
            });
        }else{
            return false;
        } 
     });
    
});