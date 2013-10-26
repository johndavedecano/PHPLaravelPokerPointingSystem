jQuery(document).ready(function(){
   
    /*
    * Initilialize Datepicker
    */ 
    jQuery('input.datepicker').Zebra_DatePicker();
    /*
     * Datatable
     */
    if(jQuery('.dynamic_table').length > 0) {
    	jQuery('.dynamic_table').dataTable({
    		"sPaginationType": "full_numbers",
    		"aaSortingFixed": [[0,'asc']],
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
                url:'/users/delete',
                data:'id='+id,
                success:function(data){
                    if(data == 'success')
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