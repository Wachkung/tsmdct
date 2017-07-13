// JavaScript Document

$(document).ready(function () {
             
              $("#jqxdatetimeinput").jqxDateTimeInput({ width: '150px', height: '25px' });
        
		  $("#jqxdatetimeinput2").jqxDateTimeInput({ width: '150px', height: '25px' });
    
                 $("#getDateButton").click(function () {
                        var date = $('#jqxdatetimeinput').jqxDateTimeInput('getText');
                        var date2 = $('#jqxdatetimeinput2').jqxDateTimeInput('getText');
			 
	 	//alert (date);
     
        
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                      
					  
                                  { name: 'aaa', type: 'string' } ,
                                 { name: 'bbb', type: 'string' }  ,
					{ name: 'ccc', type: 'string' } ,
                 
			   
			  
			    ],
               
                  //  url: url,
               
                   type: "POST",
				  url : "./query/dtnew1.php",
				//   url: "opd10.php",
                   
				  data:jQuery.parseJSON( '{ "date":"'+date+'","date2":"'+date2+'" }' ),
		  
                
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dtnew").jqxGrid(
            {
                  width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     
                     
			  
			           { text: 'aaa', dataField: 'aaa'   } ,
					    { text: 'bbb', dataField: 'bbb'   },
			  
			           { text: 'ccc', dataField: 'ccc'   } ,
					    
			  
			    ]
            });
       
                 });
        
         });