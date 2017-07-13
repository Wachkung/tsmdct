// JavaScript Document

$(document).ready(function () {
            var url = "./query/clnreferout.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                      
					 {name: 'cln', type: 'string' },
					  {name: 'namecln', type: 'string' },
                     { name: 'aaa', type: 'string' } ,
                    { name: 'bbb', type: 'string' }  ,
					{ name: 'ccc', type: 'string' } ,
                    { name: 'ddd', type: 'string' }   
					 
		   
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#clnreferout").jqxGrid(
            {
                  width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     
                      { text: 'รหัสสถานบริการ', dataField: 'cln'   },
					   
                       { text: 'ชื่อสถานบริการ', dataField: 'namecln'   },
			  
			           { text: '2554', dataField: 'aaa'   } ,
					    { text: '2555', dataField: 'bbb'   },
			  
			           { text: '2556', dataField: 'ccc'  } ,
					    { text: '2557', dataField: 'ddd'   } 
			  
			    ]
            });
        });
	  
	  
	  