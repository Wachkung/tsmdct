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
                       { name: 'namegrdt4', type: 'string'   } ,
					  
                                  { name: 'countdttx4', type: 'string' } ,
                                 { name: 'sumdttx4', type: 'string' }  ,
					 
                         
                           
                         ],
               
                  //  url: url,
               
                   type: "POST",
				  url : "./query/dtnew_dttx4.php",
				//   url: "opd10.php",
                   
				  data:jQuery.parseJSON( '{ "date":"'+date+'","date2":"'+date2+'" }' ),
		  
                
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dtnew_dttx4").jqxGrid(
            {
                  width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     
                     
			  
			           { text: 'ประเภทงาน              ', dataField: 'namegrdt4'   } ,
					    { text: 'จำนวน คน', dataField: 'countdttx4'   },
			    { text: 'จำนวน ซิ้น', dataField: 'sumdttx4'   },
                             
			    
			           
			    ]
            });
       
                 });
        
         });