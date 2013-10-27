jQuery(document).ready(function(){
   
    /*
    * Initilialize Datepicker
    */ 
    if(jQuery('input.datepicker').length > 0)
    {
        jQuery('input.datepicker').Zebra_DatePicker();
    }
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
     
});