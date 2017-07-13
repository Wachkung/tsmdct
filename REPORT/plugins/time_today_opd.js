// JavaScript Document

$(document).ready(function () {
            var url = "./query/time_today_opd.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'namecln', type: 'string' },
                      {name: 'evening', type: 'string' },
                       {name: 'morning', type: 'string' },
                        {name: 'bd', type: 'string' },
                         {name: 'afternoon', type: 'string' },
                          {name: 'total', type: 'string' },
					  {name: 'total', type: 'string' }
					  
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdiv10").jqxGrid(
            {
           width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: '       คลินิค       ', dataField: 'namecln'  },
                     { text: 'ดึก 00:00-07:59', dataField: 'evening' },
			    { text: 'เช้า 08:00-15:59', dataField: 'morning' },
                               { text: 'BD 16:00-19:59', dataField: 'bd' },
                                  { text: 'บ่าย 20:00-23:59', dataField: 'afternoon' },
			     { text: '      รวม      ', dataField: 'total' }
			    ]
            });

 $("#excelExport10").click(function () {
                $("#showdiv10").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            
            


        });
	   