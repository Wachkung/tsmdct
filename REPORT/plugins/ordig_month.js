	$(document).ready(function() {
					 $("#YearButton").click(function () {
						  var year = $("#date_by option:selected" ).val();
            
			 var plus = "543";
			 var x = parseInt( plus ); 		  	
			 var y = parseInt( year ); 
		     var yearthaifull = y+x; 
			 var yearthaishort = yearthaifull.toString().substr(2, 2);
					
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [                   
{ name: 'cname', type: 'string' } ,
{ name: 'M1', type: 'string' }  ,
{ name: 'M2', type: 'string' } ,
{ name: 'M3', type: 'string' } ,			   
{ name: 'M4', type: 'string' } ,
{ name: 'M5', type: 'string' } ,
{ name: 'M6', type: 'string' } ,
{ name: 'M7', type: 'string' } ,
{ name: 'M8', type: 'string' } ,
{ name: 'M9', type: 'string' } ,
{ name: 'M10', type: 'string' } ,
{ name: 'M11', type: 'string' } ,
{ name: 'M12', type: 'string' } ,
{ name: 'total', type: 'string' } ,
			    ],
               
                  //  url: url,
               
                  type: "POST",
				  url : "./query/ordig_month1.php",
				
                   
				  data:jQuery.parseJSON( '{ "year":"'+year+'" }' ),
		
                
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dtpttype").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
			           { text: 'ชื่อโรค', dataField: 'cname'} ,
					    { text: 'มค'+yearthaishort+'', dataField: 'M1'},			  
			           { text: 'กพ'+yearthaishort+'', dataField: 'M2'} ,					    
			          { text: 'มีค'+yearthaishort+'', dataField: 'M3'} ,
                      { text: 'เมษ'+yearthaishort+'', dataField: 'M4'} ,
					  { text: 'พค'+yearthaishort+'', dataField: 'M5'} ,
					  { text: 'มิย'+yearthaishort+'', dataField: 'M6'} ,
					  { text: 'กค'+yearthaishort+'', dataField: 'M7'} ,
					  { text: 'สค'+yearthaishort+'', dataField: 'M8'} ,
					  { text: 'กย'+yearthaishort+'', dataField: 'M9'} ,
					  { text: 'ตค'+yearthaishort+'', dataField: 'M10'} ,
					  { text: 'พย'+yearthaishort+'', dataField: 'M11'} ,
					  { text: 'ธค'+yearthaishort+'', dataField: 'M12'} ,
					   { text: 'รวม', dataField: 'total'} ,
			    ]
            

            });

	      });   
		  
	

  $("#excelExport").click(function () {
                $("#dtpttype").jqxGrid('exportdata', 'xls', 'รายงานผ่าตัดรายโรคแยกตามรายเดือน');           
            });
         
        });
	  