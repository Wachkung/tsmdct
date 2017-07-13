// JavaScript Document

$(document).ready(function () {
            var url = "query/today_or_time.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                    
                     {name: 'icd9name', type: 'string' },
                      {name: 'star', type: 'string' },
                       {name: 'end', type: 'string' }, 
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdivortime").jqxGrid(
            {
           width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                      
                     { text: '    ชื่อหัตถการ    ', dataField: 'icd9name'  },
                     { text: 'เริ่ม', dataField: 'star' },
			    { text: 'สิ้นสุด', dataField: 'end' }
			    ]
            });

 $("#excelExportortime").click(function () {
                $("#showdivortime").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            
            


        });
	   