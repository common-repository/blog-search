/*------------------------------------------------------------------------------------
 Copyright (C) 2010 Arcgate.	 All rights reserved.	

*   Purpose            :  All Custom javascript put in this file
*   Created Date    	: 20th May 2010
*   Created By      	: Sunil Mahendra
*   Modified Date   	: 20th May 2010
*   Modified By     	: Sunil Mahendra
*   Dependencies   	: NILL
------------------------------------------------------------------------------------*/
jQuery(function($) {

   $('#search').click(function(){
      term=$('#term').val();
      url=$('#url').val();
     $.ajax({
         
         url:url+'get-data.php?term='+term,
         success:function(data)
         {
           $('#result').html(data);   
         }
       });
   });
     
});