// JavaScript Document

$(document).ready(function () {
            var url = "query/today_refer_ref.php";
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
            $("#showdivipdref").jqxGrid(
            {
           width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'เวลา', dataField: 'icd10'  },
                      { text: 'จุดที่ส่ง', dataField: 'inscl'  },
                     { text: ' ชื่อโรค  ', dataField: 'icd10name' },
			    { text: 'สถานที่ส่ง', dataField: 'can' }
			    ]
            });

 $("#excelExportipdref").click(function () {
                $("#showdivipdref").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            
            


        });
	   