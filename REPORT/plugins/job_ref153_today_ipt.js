$(document).ready(function () {
            var url = "./query/job_ref153_today_ipt.php";
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
            $("#showdivref153").jqxGrid(
            {
           width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   columns: [
                     { text: '  เวลา  ', dataField: 'icd10'  },
                     { text: '  ชื่อโรค ่  ', dataField: 'icd10name' },
                { text: '  สถานที่', dataField: 'can' }
                ]
            });

 $("#excelExportref153").click(function () {
                $("#showdivref153").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            
            


        });
	   