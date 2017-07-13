// JavaScript Document

$(document).ready(function () {
            var url = "./query/depsum3.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                      
					 {name: 'namecln', type: 'string' },
					     { name: '2011a', type: 'string' } ,
                    { name: '2011b', type: 'string' }  ,
                     { name: '2012a', type: 'string' } ,
                    { name: '2012b', type: 'string' }  ,
					{ name: '2013a', type: 'string' } ,
                    { name: '2013b', type: 'string' }  ,
					{ name: '2014a', type: 'string' } ,
                    { name: '2014b', type: 'string' }   
              
		   
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#depsum3").jqxGrid(
            {
                 width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     
                      { text: 'namecln', dataField: 'namecln'  },
					   
                    
            
                              
                                  { text: '2013', dataField: '2011a'  },
			  
			           { text: '2013', dataField: '2011b'  } ,
                                { text: '2014', dataField: '2012a'  },
			  
			           { text: '2014', dataField: '2012b'  } ,
					    { text: '2015', dataField: '2013a'  },
			  
			           { text: '2015', dataField: '2013b' } ,
					    { text: '2016', dataField: '2014a'  },
			  
			           { text: '2016', dataField: '2014b'  } 
			  
			    ]
            });
        });
	  
	  
	  