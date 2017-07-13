// JavaScript Document

$(document).ready(function () {
            var url = "query/today_opd_dx.php";
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
            $("#showdiv11").jqxGrid(
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

 $("#excelExport11").click(function () {
                $("#showdiv11").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            
            


        });
	   