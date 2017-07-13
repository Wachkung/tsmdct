// JavaScript Document

$(document).ready(function () {
            var url = "./query/wardsum4.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                      
					 {name: 'ward', type: 'string' },
					  {name: 'nameidpm', type: 'string' },
                     { name: 'aaa1', type: 'string' } ,
                    { name: 'bbb1', type: 'string' }  ,
					{ name: 'ccc1', type: 'string' } ,
                    { name: 'ddd1', type: 'string' }   
					 
		   
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#wardsum4").jqxGrid(
            {
                 
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     
                      { text: 'ward', dataField: 'ward'  },
					   
                       { text: 'nameidpm', dataField: 'nameidpm'  },
			  
			           { text: '2012vv', dataField: 'aaa1'  } ,
					    { text: '2013nn', dataField: 'bbb1'  },
			  
			           { text: '2013nn', dataField: 'bbb1' } ,
					    { text: '2014nn', dataField: 'ddd1'  } 
			  
			    ]
            });
        });
	  
	  
	  