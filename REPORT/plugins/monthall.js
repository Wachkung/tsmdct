$(document).ready(function () {
            var url = "./query/monthall3.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                      
					 {name: 'yearvstdate', type: 'string' },
					  {name: 'bed', type: 'string' },
                     { name: 'aa', type: 'string' } ,
                    { name: 'bb', type: 'string' }  ,
					{ name: 'cc', type: 'string' } ,
                    { name: 'dd', type: 'string' },   
					 
		            { name: 'ee', type: 'string' }  ,
					{ name: 'ff', type: 'string' } ,
                    { name: 'gg', type: 'string' },   
			  
			  { name: 'hh', type: 'string' }  ,
					{ name: 'ii', type: 'string' } ,
                    { name: 'jj', type: 'string' }, 
					  { name: 'kk', type: 'string' },
					    { name: 'll', type: 'string' } 
						 
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#monthall").jqxGrid(
            {
                width:true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     
                      { text: 'ปี     ', dataField: 'yearvstdate'   },
					   
                       { text: 'be ', dataField: 'bed'   },
			  
			           { text: '10    ', dataField: 'aa'   } ,
					    { text: '11     ', dataField: 'bb'   },
			  
			           { text: '12    ', dataField: 'cc'  } ,
					    { text: '01   ', dataField: 'dd'  } ,
						
						{ text: '02   ', dataField: 'ee'   },
			  
			           { text: '03    ', dataField: 'ff' } ,
					    { text: '04   ', dataField: 'gg'   } ,
						
						{ text: '05   ', dataField: 'hh'  },
			  
			           { text: '06    ', dataField: 'ii'  } ,
					    { text: '07   ', dataField: 'jj'  } ,
						  { text: '08   ', dataField: 'kk'   } ,
						
						  { text: '09    ', dataField: 'll'   }  
						  
						
			  
			    ]
            });
        });
	  
	  
	  