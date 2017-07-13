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
                       { name: 'namegrdt', type: 'string'   } ,
					  
                                  { name: 'aaa5', type: 'string' } ,
                               
					{ name: 'bbb5', type: 'string' } ,
                
			   
			   { name: 'ccc5', type: 'string' } ,
			   
                          { name: 'ccan', type: 'string' } ,
                         
                           
                         ],
               
                  //  url: url,
               
                   type: "POST",
				  url : "./query/dtnew_2.php",
				//   url: "opd10.php",
                   
				  data:jQuery.parseJSON( '{ "date":"'+date+'","date2":"'+date2+'" }' ),
		  
                
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dtnew_2").jqxGrid(
            {
                  width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     
                     
			  
			           { text: 'ประเภทงาน              ', dataField: 'namegrdt'   } ,
					    { text: 'เด็ก 0-2 ครั้ง', dataField: 'aaa5'   },
			   
                              { text: 'เด็ก 3-5 ปี ครั้ง', dataField: 'bbb5'   },
			  
                            { text: 'เด็ก 6-14 ปี    ครั้ง', dataField: 'ccc5'   },
			    { text: 'รวม ', dataField: 'ccan'   },
			           
			    ]
            });
       
                 });
        
         });