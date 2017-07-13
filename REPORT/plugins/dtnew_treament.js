// JavaScript Document

$(document).ready(function () {
             
              $("#jqxdatetimeinput").jqxDateTimeInput({ width: '150px', height: '25px', theme: 'summer'  });
        
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
                       { name: 'treatment', type: 'string'   } ,
					  
                                  { name: 'people', type: 'string' } ,
                                 { name: 'visit', type: 'string' }  ,
					{ name: 'total', type: 'string' } ,
                
                         
                           
                         ],
               
                  //  url: url,
               
                   type: "POST",
				  url : "./query/dtnewtreament.php",
				//   url: "opd10.php",
                   
				  data:jQuery.parseJSON( '{ "date":"'+date+'","date2":"'+date2+'" }' ),
		  
                
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dtnew_treament").jqxGrid(
            {
                  width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     
                     
			  
			           { text: 'รายการ              ', dataField: 'treatment'   } ,
					    { text: 'คน', dataField: 'people'   },
			    { text: 'ครั้ง', dataField: 'visit'   },
                              { text: 'ทั้งหมด', dataField: 'total'   },
			     
			           
			    ]
            });
       
                 });
        
         });