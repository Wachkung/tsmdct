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
					  
                                  { name: 'aaas', type: 'string' } ,
                                  { name: 'aaas1', type: 'string' } ,
					{ name: 'bbbs', type: 'string' } ,
                                    { name: 'bbbs1', type: 'string' } ,
			   
			   { name: 'cccs', type: 'string' } ,
			   
                            { name: 'cccs1', type: 'string' } ,
                         
                           
                         ],
               
                  //  url: url,
               
                   type: "POST",
				  url : "./query/dtnew_2_1.php",
				//   url: "opd10.php",
                   
				  data:jQuery.parseJSON( '{ "date":"'+date+'","date2":"'+date2+'" }' ),
		  
                
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dtnew_2_1").jqxGrid(
            {
                  width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     
                     
			  
			           { text: 'ประเภทงาน              ', dataField: 'namegrdt'   } ,
					    { text: 'เด็ก 0-2 ครั้ง', dataField: 'aaas'   },
			      { text: 'เด็ก 0-2 ซี่', dataField: 'aaas1'   },
                              { text: 'เด็ก 3-5 ปี ครั้ง', dataField: 'bbbs'   },
			    { text: 'เด็ก 3-5 ปี ซี่', dataField: 'bbbs1'   },
                            { text: 'เด็ก 6-14 ปี    ครั้ง', dataField: 'cccs'   },
			   
			              { text: 'เด็ก 6-14 ปี    ซี่', dataField: 'cccs1'   },
			    ]
            });
       
                 });
        
         });