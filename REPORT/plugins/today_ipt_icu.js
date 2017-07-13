// JavaScript Document

$(document).ready(function () {
            var url = "query/today_ipt_icu.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
                      {name: 'icd10name', type: 'string' },
                       {name: 'can', type: 'string' }, 
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdivicu").jqxGrid(
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
			    { text: 'จำนวน', dataField: 'can' }
			    ]
            });

 $("#excelExporticu").click(function () {
                $("#showdivicu").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            
            


        });
	   