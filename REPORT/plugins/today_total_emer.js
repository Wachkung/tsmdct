// JavaScript Document

$(document).ready(function () {
            var url = "query/today_total_emer.php";
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
            $("#showdivallemer").jqxGrid(
            {
           width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'สาเหตุ', dataField: 'icd10'  },
                      { text: 'รห้ส', dataField: 'inscl'  },
                     { text: ' ชื่อโรค  ', dataField: 'icd10name' },
			    { text: 'จำนวน', dataField: 'can' }
			    ]
            });

 $("#excelExportallemer").click(function () {
                $("#showdivallemer").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            
            


        });
	   