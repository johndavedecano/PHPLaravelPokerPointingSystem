jQuery(document).ready(function(){
    
    if(jQuery('.members_table').length > 0) {
    	jQuery('.members_table').dataTable({
    		"sPaginationType": "full_numbers",
    		"aaSortingFixed": [[1,'asc']],
    		"fnDrawCallback": function(oSettings) {
    		  //jQuery.uniform.update();
    		}
    	});
    }   
    /*
     * Delete Item
     */
     jQuery('.delete-item').click(function(){
        
        var id = jQuery(this).attr('data-id');
        var cf = window.confirm("Are you sure you want to delete this item?");
        
        if(cf){
            jQuery.ajax({
                type:'POST',
                url:'/members/delete',
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