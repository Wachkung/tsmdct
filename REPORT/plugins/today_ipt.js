// JavaScript Document

$(document).ready(function () {
            var url = "query/today_ipt_query.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'nameidpm', type: 'string' },
					  {name: 'ans2', type: 'string' } 
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdiv2").jqxGrid(
            {
                 
			   width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true, 
			   
			    columns: [
                     { text: '     ตึก     ', dataField: 'nameidpm'  },
                     { text: 'จำนวน', dataField: 'ans2' }
			 
			    ]
            });

 $("#excelExport2").click(function () {
                $("#showdiv2").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            
            


        });
	   