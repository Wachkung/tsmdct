// JavaScript Document

$(document).ready(function () {
  var url = "query/today_opd_query.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'namecln', type: 'string' },
					  {name: 'cns2', type: 'string' }
					  
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdiv9").jqxGrid(
            {
           width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			    columns: [
                     { text: 'คลินิค', dataField: 'namecln'  },
                     { text: 'จำนวน', dataField: 'cns2' }
			 
			  
			    ]
            });

 $("#excelExport9").click(function () {
                $("#showdiv9").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            }); 

            
            
 

        });
	   