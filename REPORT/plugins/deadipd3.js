// JavaScript Document

$(document).ready(function () {
            var url = "./query/deadward3.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'idpm', type: 'string' },
					  {name: 'nameidpm', type: 'string' },
					 
					 { name: 'aaa', type: 'string' },
                    { name: 'bbb', type: 'string' } ,
                     { name: 'ccc', type: 'string' } ,
                    { name: 'ddd', type: 'string' }  
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#deadward3").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'idpm', dataField: 'idpm'  },
                     { text: 'nameidpm', dataField: 'nameidpm' },
					  { text: '2013', dataField: 'aaa'},
					  { text: '2014', dataField: 'bbb'},
                       { text: '2015', dataField: 'ccc' },
			  
			           { text: '2016', dataField: 'ddd' } 
			  
			    ]
            });

 $("#excelExport8").click(function () {
                $("#deadward3").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            
            


        });
	   