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
{ name: 'idpm', type: 'string' }  ,   
{ name: 'vstdate', type: 'string' }  ,          
{ name: 'vsttime', type: 'string' }  ,
{ name: 'icd10name', type: 'string' }  ,
{ name: 'hospcode', type: 'string' } 
			    ],
               
                  //  url: url,
               
                  type: "POST",
				  url : "./query/refer_out_sps_month_query.php",
				
                   
				  data:jQuery.parseJSON( '{ "year_by":"'+year+'","month_by":"'+month+'" }' ),

		
                
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdiv").jqxGrid(
            {
                  width:true,
             source: dataAdapter,
                columnsresize: true,
                autorowheight: true,
                autoheight: true,
                altrows: true, 
                	   
			   
			    columns: [			    	      
                    { text: '  ตึก    ', dataField: 'idpm', align: 'center',},    
                    { text: '  วันที่  ', columnGroup:  'Case_Elective',  dataField: 'vstdate', align: 'center',},	
                    { text: '   เวลา    ', columnGroup: 'Case_Elective',  dataField: 'vsttime', align: 'center',},                   
                    { text: '      ชื่อโรค        ', columnGroup: 'Case_Elective',  dataField: 'icd10name', align: 'center',},  
                    { text: ' สถานที่ส่งไป ', columnGroup: 'Case_Elective',  dataField: 'hospcode', align: 'center',},                    
                     
                                    				
					   			    ],

                      columnGroups: [
                    { text: 'REFER'+","+monthThai+" "+yearthaifull+'', name: 'Case_Elective' ,align: 'center',},
                    { text: 'Case Emergency'+","+monthThai+" "+yearthaifull+'', name: 'Case_Emergency', align: 'center',},
                  
                       ]


            });

	      });   
		  
	

  $("#excelExport").click(function () {
                $("#showdiv").jqxGrid('exportdata', 'xls', 'รายงาน_OR_สรุป Case ผ่าตัด ประจำเดือน');           
            });
         
        });
	  