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
 { name: 'namehosp', type: 'string' }  ,
{ name: 'm10', type: 'string' }  ,
 
{ name: 'm11', type: 'string' }  ,
 
{ name: 'm12', type: 'string' }  ,
 
{ name: 'm1', type: 'string' }  ,
 
{ name: 'm2', type: 'string' }  ,
 
{ name: 'm3', type: 'string' }  ,
 
{ name: 'm4', type: 'string' }  ,
 
{ name: 'm5', type: 'string' }  ,
 
{ name: 'm6', type: 'string' }  ,
 
{ name: 'm7', type: 'string' }  ,
 
{ name: 'm8', type: 'string' }  ,
 
{ name: 'm9', type: 'string' }  ,
 
 
{ name: 'total', type: 'string' } 
			    ],
               
                  //  url: url,
               
                  type: "POST",
				  url : "./query/re_outsps_year_query2.php",
				
                   
				  data:jQuery.parseJSON( '{ "year":"'+year+'" }' ),
		
                
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdiv2").jqxGrid(
            {
                width: true, 
                columns:true,             
                source: dataAdapter,
                columnsresize: true,
                autorowheight: true,
                autoheight: true,
                altrows: true,
                	   
			   
			    columns: [
			    	 
			       	{ text: 'ค�  �', columnGroup: '            ตึก          ', dataField: 'namehosp', },
					{ text: 'คน', columnGroup: 'ตค', dataField: 'm10', },
                   
			      { text: 'คน', columnGroup: 'พย', dataField: 'm11', },
                 
			        { text: 'คน', columnGroup: 'ธค', dataField: 'm12', },
                   
			         { text: 'คน', columnGroup: 'มค', dataField: 'm1', },
                   
			     { text: 'คน', columnGroup: 'กพ', dataField: 'm2', },
                   
			          { text: 'คน', columnGroup: 'มีค', dataField: 'm3', },
                   
			        { text: 'คน', columnGroup: 'เมษ', dataField: 'm4', },
                   
			         { text: 'คน', columnGroup: 'พค', dataField: 'm5', },
                   
			         { text: 'คน', columnGroup: 'มิย', dataField: 'm6', },
                 
			        { text: 'คน', columnGroup: 'กค', dataField: 'm7', },
              
			        { text: 'คน', columnGroup: 'สค', dataField: 'm8', },
                  
			          { text: 'คน', columnGroup: 'กย', dataField: 'm9', },
                    
			         
                     { text: 'ครั้ง', columnGroup: 'รวม', dataField: 'total', },						    
			      
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
		  
	

  $("#excelExport2").click(function () {
                $("#showdiv2").jqxGrid('exportdata', 'xls', 'รายงานfallsคลีนิคผู้สูงอายุ');           
            });
         
        });
	  