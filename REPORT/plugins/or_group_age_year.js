	$(document).ready(function() {
					 $("#YearButton").click(function () {
						  var year = $("#year_by option:selected" ).val();
            			  var type_by = $("#type_by option:selected" ).val();
			 
			 var plus = "543";
			 var x = parseInt( plus ); 		  	
			 var y = parseInt( year ); 
		     var yearthaifull = y+x; 
			 var yearthaishort = yearthaifull.toString().substr(2, 2);

              var aa = "1";
             var neg1  = parseInt( aa  ); 
               var bb = "2";
             var neg2 = parseInt( bb  ); 
               var cc = "3";
             var neg3  = parseInt( cc  ); 
               var dd = "4";
             var neg4 = parseInt( dd  ); 
          

              var yearthaishort1 = yearthaishort-neg1;
              var yearthaishort2 = yearthaishort-neg2;
              var yearthaishort3 = yearthaishort-neg3;
              var yearthaishort4 = yearthaishort-neg4;
             

            var source =
            {
                datatype: "json",
                datafields: [       
{ name: 'agegroup', type: 'string' }  ,   
{ name: 'Y1', type: 'string' }  ,          
{ name: 'Y2', type: 'string' }  ,
{ name: 'Y3', type: 'string' }  ,
{ name: 'Y4', type: 'string' } ,
{ name: 'Y5', type: 'string' }  
			    ],
               
                  type: "POST",
				  url : "./query/or_group_age_year_query.php",
                   
				  data:jQuery.parseJSON( '{ "year":"'+year+'" }' ),
                
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdiv").jqxGrid(
            {
                width: 1000,
                source: dataAdapter,
                columnsresize: true,
                autorowheight: true,
                autoheight: true,
                altrows: true,
                	   
			   
			    columns: [
			    	{ text: 'กลุ่มอายุ', dataField: 'agegroup', },  
                    { text: 'ปี'+yearthaishort4+'', dataField: 'Y1', },    
                    { text: 'ปี'+yearthaishort3+'', dataField: 'Y2', },	
                    { text: 'ปี'+yearthaishort2+'', dataField: 'Y3', },                   
                    { text: 'ปี'+yearthaishort1+'', dataField: 'Y4', },  
                    { text: 'ปี'+yearthaishort+'', dataField: 'Y5', },                    
                                 				
					   			    ]
            


            });

	      });   
		  
	

  $("#excelExport").click(function () {
                $("#showdiv").jqxGrid('exportdata', 'xls', 'รายงาน_OR_ผู้มารับบริการผ่าตัดตามกลุ่มอายุ5 ปีย้อนหลัง');           
            });
         
        });
	  