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
                       { name: 'pregname', type: 'string'   } ,
					  
                                  { name: 'prg1', type: 'string' } ,
                               
                         
                           
                         ],
               
                  //  url: url,
               
                   type: "POST",
				  url : "./query/dtnew_prg.php",
				//   url: "opd10.php",
                   
				  data:jQuery.parseJSON( '{ "date":"'+date+'","date2":"'+date2+'" }' ),
		  
                
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dtnew_prg").jqxGrid(
            {
                  width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     
                     
			  
			           { text: 'ประเภทงาน              ', dataField: 'pregname'   } ,
					    { text: 'หญิงตั้งครรภ์ ครั้ง', dataField: 'prg1'   },
			  
			    
			           
			    ]
            });
       
                 });
        
         });