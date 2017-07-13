	$(document).ready(function() {
					 $("#YearButton").click(function () {
						  var year = $("#year_by option:selected" ).val();
            			  var limit = $("#limit option:selected" ).val();
			 
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
{ name: 'id', type: 'string' }  ,               
{ name: 'icd10', type: 'string' }  ,
{ name: 'human_a', type: 'string' }  ,
{ name: 'visit_a', type: 'string' } ,
{ name: 'human_b', type: 'string' }  ,
{ name: 'visit_b', type: 'string' } ,
{ name: 'human_c', type: 'string' }  ,
{ name: 'visit_c', type: 'string' } ,
{ name: 'human_d', type: 'string' }  ,
{ name: 'visit_d', type: 'string' } ,
{ name: 'human_e', type: 'string' }  ,
{ name: 'visit_e', type: 'string' } ,
{ name: 'human_f', type: 'string' }  ,
{ name: 'visit_f', type: 'string' } ,
{ name: 'human_g', type: 'string' }  ,
{ name: 'visit_g', type: 'string' } ,
{ name: 'human_h', type: 'string' }  ,
{ name: 'visit_h', type: 'string' } ,
{ name: 'human_i', type: 'string' }  ,
{ name: 'visit_i', type: 'string' } ,
{ name: 'human_j', type: 'string' }  ,
{ name: 'visit_j', type: 'string' } ,
{ name: 'human_k', type: 'string' }  ,
{ name: 'visit_k', type: 'string' } ,
{ name: 'human_l', type: 'string' }  ,
{ name: 'visit_l', type: 'string' } ,
{ name: 'human_total', type: 'string' }  ,
{ name: 'visit_total', type: 'string' } 
			    ],
               
                  type: "POST",
				  url : "./query/old_icd10_year_query.php",
				
				  data:jQuery.parseJSON( '{ "year":"'+year+'","limit":"'+limit+'" }' ),
		
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdiv").jqxGrid(
            {
                width: 1000, 
                columns:true,             
                source: dataAdapter,
                columnsresize: true,
                autorowheight: true,
                autoheight: true,
                altrows: true,
                	   
			    columns: [
			    	 { text: 'ลำดับ', dataField: 'id', } ,
			         { text: 'icd10', dataField: 'icd10', } , 	
					 { text: 'คน', columnGroup: 'ตค', dataField: 'human_a', },
                     { text: 'ครั้ง', columnGroup: 'ตค', dataField: 'visit_a', },	
			         { text: 'คน', columnGroup: 'พย', dataField: 'human_b', },
                     { text: 'ครั้ง', columnGroup: 'พย', dataField: 'visit_b', },	
			         { text: 'คน', columnGroup: 'ธค', dataField: 'human_c', },
                     { text: 'ครั้ง', columnGroup: 'ธค', dataField: 'visit_c', },	
			         { text: 'คน', columnGroup: 'มค', dataField: 'human_d', },
                     { text: 'ครั้ง', columnGroup: 'มค', dataField: 'visit_d', },		
			         { text: 'คน', columnGroup: 'กพ', dataField: 'human_e', },
                     { text: 'ครั้ง', columnGroup: 'กพ', dataField: 'visit_e', },	
			         { text: 'คน', columnGroup: 'มีค', dataField: 'human_f', },
                     { text: 'ครั้ง', columnGroup: 'มีค', dataField: 'visit_f', },	
			         { text: 'คน', columnGroup: 'เมษ', dataField: 'human_g', },
                     { text: 'ครั้ง', columnGroup: 'เมษ', dataField: 'visit_g', },	
			         { text: 'คน', columnGroup: 'พค', dataField: 'human_h', },
                     { text: 'ครั้ง', columnGroup: 'พค', dataField: 'visit_h', },		
			         { text: 'คน', columnGroup: 'มิย', dataField: 'human_i', },
                     { text: 'ครั้ง', columnGroup: 'มิย', dataField: 'visit_i', },	
			        { text: 'คน', columnGroup: 'กค', dataField: 'human_j', },
                     { text: 'ครั้ง', columnGroup: 'กค', dataField: 'visit_j', },	
			        { text: 'คน', columnGroup: 'สค', dataField: 'human_k', },
                     { text: 'ครั้ง', columnGroup: 'สค', dataField: 'visit_k', },	
			          { text: 'คน', columnGroup: 'กย', dataField: 'human_l', },
                     { text: 'ครั้ง', columnGroup: 'กย', dataField: 'visit_l', },	
			         { text: 'คน', columnGroup: 'รวม', dataField: 'human_total', },
                     { text: 'ครั้ง', columnGroup: 'รวม', dataField: 'visit_total', },						    
			      
					   			    ],
                columnGroups: [
                    { text: 'ตค'+yearthaishort2+'', name: 'ตค' },
                    { text: 'พย'+yearthaishort2+'', name: 'พย' },
                    { text: 'ธค'+yearthaishort2+'', name: 'ธค' },
                    { text: 'มค'+yearthaishort+'', name: 'มค' },
                    { text: 'กพ'+yearthaishort+'', name: 'กพ' },
                    { text: 'มีค'+yearthaishort+'', name: 'มีค' },
                    { text: 'เมษ'+yearthaishort+'', name: 'เมษ' },
                    { text: 'พค'+yearthaishort+'', name: 'พค' },
                    { text: 'มิย'+yearthaishort+'', name: 'มิย' },
                    { text: 'กค'+yearthaishort+'', name: 'กค' },
                    { text: 'สค'+yearthaishort+'', name: 'สค' },
                    { text: 'กย'+yearthaishort+'', name: 'กย' },
                    { text: 'รวม', name: 'รวม' },
                    

                ]
            


            });

	      });   
		  
	

  $("#excelExport").click(function () {
                $("#showdiv").jqxGrid('exportdata', 'xls', 'รายงานอันดับโรคผู้สูงอายุคน-ครั้ง');           
            });
         
        });
	  