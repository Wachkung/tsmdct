	  $(document).ready(function () {
            var url = "./query/readmittedward.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                    
                    { name: 'nameidpm', type: 'nameidpm' }    ,
					  { name: 'readmitted', type: 'string' },
                        { name: 'aaa', type: 'string' }  ,
						 { name: 'bbb', type: 'string' }  ,
						 { name: 'ccc', type: 'string' }  ,
						 { name: 'ddd', type: 'string' }  
						
                ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#readmittedward").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                  autorowheight: true,
                autoheight: true,
                altrows: true,
				
				columns: [
                
                      { text: 'ชื่อหน่วยงาน', dataField: 'nameidpm'  },
					    { text: 'รหัสหน่วยงาน', dataField: 'readmitted' },
					     { text: '2013คน', dataField: 'aaa' },
						   { text: '2014คน', dataField: 'bbb' },
						   { text: '2015คน', dataField: 'ccc'  },
						   { text: '2016คน', dataField: 'ddd'  }
						 
                ]
            });

   $("#excelExport7").click(function () {
                $("#readmittedward").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            

        });
	  