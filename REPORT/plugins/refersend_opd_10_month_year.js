	$(document).ready(function() {
					 $("#YearButton").click(function () {
						  var year = $("#year_by option:selected" ).val();
            			  var month_by = $("#month_by option:selected" ).val();
			 
			 var plus = "543";
			 var x = parseInt( plus ); 		  	
			 var y = parseInt( year ); 
		     var yearthaifull = y+x; 
			 var yearthaishort = yearthaifull.toString().substr(2, 2);
			 
			 var neg = "1";
			 var x = parseInt( neg  ); 
			 var yearthaishort2 = yearthaishort-neg; 	
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [       
{ name: 'icd', type: 'string' }  ,   
{ name: 'icd10name', type: 'string' }  ,          
 
{ name: 'scan', type: 'string' } 
			    ],
               
                  //  url: url,
               
                  type: "POST",
				  url : "./query/referopd_10_send.php",
				
                   
				  data:jQuery.parseJSON( '{ "year":"'+year+'","month_by":"'+month_by+'"  }' ),
		
                
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdivten2").jqxGrid(
            {
                width: 950,
                source: dataAdapter,
                columnsresize: true,
                autorowheight: true,
                autoheight: true,
                altrows: true,
                	   
			   
			    columns: [
			    	 
                    { text: ' รหัส ', dataField: 'icd', }, 
                    { text: '    ชื่อหัตถการ     ', dataField: 'icd10name', }, 	
                    { text: ' จำนวน ', dataField: 'scan', },	
                     
                    					    
			      
					   			    ]
            


            });

	      });   
		  
	

  $("#excelExportten2").click(function () {
                $("#showdivten2").jqxGrid('exportdata', 'xls', 'รายงาน_OR_ผ่าตัดแยกตามรายศัลยกรรม(ICD9cm)');           
            });
         
        });
	  