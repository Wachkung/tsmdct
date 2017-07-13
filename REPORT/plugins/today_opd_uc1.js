// JavaScript Document

$(document).ready(function () {
            var url = "query/today_opd_uc.php";
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
            $("#showdivopduc").jqxGrid(
            {
           width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'รหัสสิทธิ์', dataField: 'icd10'  },
                     { text: ' ชื่อสิทธิ์  ', dataField: 'icd10name' },
			    { text: 'จำนวน', dataField: 'can' }
			    ]
            });

 $("#excelExportopduc").click(function () {
                $("#showdivopduc").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            
            


        });
	   