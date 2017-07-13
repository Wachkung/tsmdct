// JavaScript Document

$(document).ready(function () {
            var url = "query/today_resive_ipd.php";
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
            $("#showdivipdre_refer").jqxGrid(
            {
           width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'เวลา', dataField: 'icd10'  },
                      { text: 'จุดที่รับ', dataField: 'inscl'  },
                     { text: ' ชื่อโรค  ', dataField: 'icd10name' },
			    { text: 'สถานที่ส่ง', dataField: 'can' }
			    ]
            });

 $("#excelExportipdre_refer").click(function () {
                $("#showdivipdre_refer").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            
            


        });
	   