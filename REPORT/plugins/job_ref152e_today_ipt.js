$(document).ready(function () {
            var url = "./query/job_ref152e_today_ipt.php";
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
            $("#showdivref152e").jqxGrid(
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

 $("#excelExportref152e").click(function () {
                $("#showdivref152e").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            
            


        });
	   