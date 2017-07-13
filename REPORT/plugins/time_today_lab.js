// JavaScript Document

$(document).ready(function () {
            var url = "./query/time_today_lab.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'namecln', type: 'string' },
                      {name: 'evening', type: 'string' },
                       {name: 'morning', type: 'string' },
                        
                         {name: 'afternoon', type: 'string' },
                          {name: 'total', type: 'string' },
					  {name: 'total', type: 'string' }
					  
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdivlab").jqxGrid(
            {
           width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: '     ชื่อlab       ', dataField: 'namecln'  },
                     { text: 'ดึก 00:00-07:59', dataField: 'evening' },
			    { text: 'เช้า 08:00-15:59', dataField: 'morning' },
                             
                                  { text: 'บ่าย 16:00-23:59', dataField: 'afternoon' },
			     { text: '      รวม      ', dataField: 'total' }
			    ]
            });

 $("#excelExportlab").click(function () {
                $("#showdivlab").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            
            


        });
	   