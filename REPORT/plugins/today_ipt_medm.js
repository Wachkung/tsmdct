// JavaScript Document

$(document).ready(function () {
            var url = "query/today_ipt_medm.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10m', type: 'string' },
                      {name: 'icd10namem', type: 'string' },
                       {name: 'canm', type: 'string' }, 
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdivmedm").jqxGrid(
            {
           width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10m'  },
                     { text: '  ชื่อโรค  ', dataField: 'icd10namem' },
			    { text: 'จำนวน', dataField: 'canm' }
			    ]
            });

 $("#excelExportmedm").click(function () {
                $("#showdivmedm").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            
            


        });
	   