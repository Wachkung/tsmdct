// JavaScript Document

$(document).ready(function () {
            var url = "query/today_or.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                    
                     {name: 'icd10', type: 'string' },
                      {name: 'icd10name', type: 'string' },
                       {name: 'icd9name', type: 'string' }, 
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdivor").jqxGrid(
            {
           width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                      
                     { text: 'รหัสโรค', dataField: 'icd10'  },
                     { text: '  ชื่อโรค  ', dataField: 'icd10name' },
			    { text: 'หัตถการ', dataField: 'icd9name' }
			    ]
            });

 $("#excelExportor").click(function () {
                $("#showdivor").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            
            


        });
	   