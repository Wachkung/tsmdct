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
                      
					  
                                  { name: 'inscl', type: 'string' } ,
                                 { name: 'acd', type: 'string' }  ,
					{ name: 'sumopd', type: 'string' } ,
                 { name: 'sumipt', type: 'string' } ,
			   
			   { name: 'refer', type: 'string' } ,
			    ],
               
                  //  url: url,
               
                   type: "POST",
				  url : "./query/dtpttype2.php",
				//   url: "opd10.php",
                   
				  data:jQuery.parseJSON( '{ "date":"'+date+'","date2":"'+date2+'" }' ),
		  
                
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dtpttype2").jqxGrid(
            {
                  width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     
                     
			  
			           { text: 'รหัส', dataField: 'inscl'   } ,
					    { text: 'ประเภทผู้ป่วย', dataField: 'acd'   },
			  
			           { text: 'ผู้ป่วยนอก', dataField: 'sumopd'   } ,
					    
			            { text: 'ผู้ป่วยใน', dataField: 'sumipt'   } ,
                                     { text: 'refer', dataField: 'refer'   } ,
			    ]
            });
       
                 });
        
         });