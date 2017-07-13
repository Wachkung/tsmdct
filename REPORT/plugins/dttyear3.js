// JavaScript Document

$(document).ready(function () {
            var url = "./query/dttyear3.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                      
					 {name: 'nameinscl', type: 'string' },
					 
                     { name: 'ddd', type: 'string' } ,
                    { name: 'ddd1', type: 'string' }  ,
					{ name: 'ddd2', type: 'string' } ,
                    { name: 'sss1', type: 'string' }  ,
					{ name: 'sss2', type: 'string' } ,
                    { name: 'sss3', type: 'string' } ,  
                   { name: 'ssse1', type: 'string' }  ,
					{ name: 'ssse2', type: 'string' } ,
                    { name: 'ssse3', type: 'string' }   
		   
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dttyear3").jqxGrid(
            {
                 width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     
                      { text: 'สิทธืการรักษา    ', dataField: 'nameinscl'  },
					   
                       { text: 'ipt2012', dataField: 'ddd'  },
			  
			           { text: 'ipt2013', dataField: 'ddd1'  } ,
					    { text: 'ipt2014', dataField: 'ddd2'  },
			  
			           { text: 'opd2012', dataField: 'sss1' } ,
					    { text: 'opd2013', dataField: 'sss2'  },
			  
			           { text: 'opd2014', dataField: 'sss3'  } ,
					   
					    {  text: 'referout2012', dataField: 'ssse1' } ,
					    { text: 'referout2013', dataField: 'ssse2'  },
			  
			           { text: 'referout2014', dataField: 'ssse3'  } 
			  
			    ]
            });
        });
	  
	  
	  