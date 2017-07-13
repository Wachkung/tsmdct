// JavaScript Document

$(document).ready(function () {
            var url = "query/today_case_emer.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
                      {name: 'inscl', type: 'string' },
                      {name: 'icd10name', type: 'string' },
                       {name: 'can', type: 'string' }, 
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdivcaseemer").jqxGrid(
            {
           width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'เวลา', dataField: 'icd10'  },
                      { text: 'รห้ส', dataField: 'inscl'  },
                     { text: ' ชื่อโรค  ', dataField: 'icd10name' },
			    { text: 'สถานะ', dataField: 'can' }
			    ]
            });

 $("#excelExportallemer").click(function () {
                $("#showdivcaseemer").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            
            


        });
	   