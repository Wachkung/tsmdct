$(document).ready(function () {
            var url = "./query/opdpttypesum3.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     
					
					 {name: 'namepttype', type: 'string' },
			 { name: 'aaa', type: 'string' } ,		 
                    { name: 'bbb', type: 'string' } ,
                     { name: 'ccc', type: 'string' } ,
                    { name: 'ddd', type: 'string' }  
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#opdpttype3").jqxGrid(
            {
                  width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                      
                      { text: 'namepttype', dataField: 'namepttype'  },
					    { text: '2013', dataField: 'aaa'  },
					  { text: '2014', dataField: 'bbb'  },
                       { text: '2015', dataField: 'ccc' },
			  
			           { text: '2016', dataField: 'ddd'  } 
			  
			    ]
            });
        });
	   