	$(document).ready(function() {
					 $("#YearButton").click(function () {
						  var year = $("#year_by option:selected" ).val();
            	var month = $("#month_by option:selected" ).val();
			 
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
             

 if(month==01){var monthThai = "ม.ค.";}
else if(month==02){var monthThai = "ก.พ.";}
else if(month==03){var monthThai = "มี.ค.";}
else if(month==04){var monthThai = "เม.ย.";}
else if(month==05){var monthThai = "พ.ค.";}
else if(month==06){var monthThai = "มิ.ย.";}
else if(month==07){var monthThai = "ก.ค.";}
else if(month==08){var monthThai = "ส.ค.";}
else if(month==09){var monthThai = "ก.ย.";}
else if(month==10){var monthThai = "ต.ค.";}
else if(month==11){var monthThai = "พ.ย.";}
else if(month==12){var monthThai = "ธ.ค.";}

            var source =
            {
                datatype: "json",
                datafields: [       
{ name: 'a', type: 'string' }  ,   
{ name: 'b', type: 'string' }  ,          
{ name: 'c', type: 'string' }  ,
{ name: 'd', type: 'string' }  ,
{ name: 'e', type: 'string' } ,
{ name: 'f', type: 'string' }  ,
{ name: 'g', type: 'string' }  ,   
{ name: 'h', type: 'string' }  ,          
{ name: 'i', type: 'string' }  ,
{ name: 'j', type: 'string' }  ,
{ name: 'k', type: 'string' } 
			    ],
               
                  //  url: url,
               
                  type: "POST",
				  url : "./query/or_total_case_month_query.php",
				
                   
				  data:jQuery.parseJSON( '{ "year_by":"'+year+'","month_by":"'+month+'" }' ),

		
                
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdiv").jqxGrid(
            {
                width: 950,
             source: dataAdapter,
                columnsresize: true,
                autorowheight: true,
                autoheight: true,
                altrows: true, 
                	   
			   
			    columns: [			    	      
                    { text: '  ว/ด/ป  ', dataField: 'a', align: 'center',},    
                    { text: ' Major', columnGroup:  'Case_Elective',  dataField: 'b', align: 'center',},	
                    { text: 'Minor', columnGroup: 'Case_Elective',  dataField: 'c', align: 'center',},                   
                    { text: 'ในเวลา', columnGroup: 'Case_Elective',  dataField: 'd', align: 'center',},  
                    { text: 'นอกเวลา', columnGroup: 'Case_Elective',  dataField: 'e', align: 'center',},                    
                    { text: 'รวม', dataField: 'f', align: 'center',},                        
                    { text: 'Major', columnGroup: 'Case_Emergency',  dataField: 'g', align: 'center',}, 
                    { text: 'Minor', columnGroup: 'Case_Emergency',  dataField: 'h',align: 'center', },                   
                    { text: 'ในเวลา', columnGroup: 'Case_Emergency',  dataField: 'i', align: 'center',},  
                    { text: 'นอกเวลา', columnGroup: 'Case_Emergency',  dataField: 'j', align: 'center',},                    
                    { text: 'รวม', dataField: 'k', align: 'center',},
                                    				
					   			    ],

                      columnGroups: [
                    { text: 'Case Elective'+","+monthThai+" "+yearthaifull+'', name: 'Case_Elective' ,align: 'center',},
                    { text: 'Case Emergency'+","+monthThai+" "+yearthaifull+'', name: 'Case_Emergency', align: 'center',},
                  
                       ]


            });

	      });   
		  
	

  $("#excelExport").click(function () {
                $("#showdiv").jqxGrid('exportdata', 'xls', 'รายงาน_OR_สรุป Case ผ่าตัด ประจำเดือน');           
            });
         
        });
	  