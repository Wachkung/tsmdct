// JavaScript Document

$(document).ready(function () {
            var url = "query/today_ipd_dead.php";
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
            $("#showdivipddead").jqxGrid(
            {
           width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'เวลา', dataField: 'icd10'  },
                     { text: '  ชื่อโรค  ', dataField: 'icd10name' },
			    { text: ' ตึก ', dataField: 'can' }
			    ]
            });

 $("#excelExportipddead").click(function () {
                $("#showdivipddead").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            
            


        });
	   