	$(document).ready(function() {
					 $("#YearButton").click(function () {
						  var year = $("#year_by option:selected" ).val();
            			  var date = $("#date_by option:selected" ).val();
			 
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
{ name: 'icd10name', type: 'string' }  ,            
{ name: 'icd', type: 'string' }  ,
{ name: 'scan', type: 'string' }  ,
 
			    ],
               
                  //  url: url,
               
                  type: "POST",
				  url : "./query/referopd_10oct.php",
				
                   
				  data:jQuery.parseJSON( '{ "year":"'+year+'" }' ),
		
                
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdiv3").jqxGrid(
            {
                width: 950,
                source: dataAdapter,
                columnsresize: true,
                autorowheight: true,
                autoheight: true,
                altrows: true,
                	   
			   
			    columns: [
			    	 
                    { text: 'ชื่อโรค', dataField: 'icd10name', }, 	
                    { text: 'รหัสโรค', dataField: 'icd', },	
                 
                    { text: 'รวม', dataField: 'scan', },
                    					    
			      
					   			    ]
            


            });

	      });   
		  
	

  $("#excelExport3").click(function () {
                $("#showdiv3").jqxGrid('exportdata', 'xls', 'รายงานรายปี');           
            });
         
        });
	  