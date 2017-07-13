	  $(document).ready(function () {
            var url = "./query/resultrefer.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     { name: 'rfrcs', type: 'string' },
                    { name: 'namerfrcs', type: 'nameidpm' }    ,
					 
                        { name: 'aaa', type: 'string' }  ,
						 { name: 'bbb', type: 'string' }  ,
						 { name: 'ccc', type: 'string' }  ,
						 { name: 'ddd', type: 'string' }  
						
                ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#resultrefer").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                  autorowheight: true,
                autoheight: true,
                altrows: true,
				
				columns: [
                  { text: 'รหัสหน่วยงาน', dataField: 'rfrcs'  },
                      { text: 'ชื่อหน่วยงาน', dataField: 'namerfrcs' },
					  
					     { text: '2011คน', dataField: 'aaa' },
						   { text: '2012คน', dataField: 'bbb' },
						   { text: '2013คน', dataField: 'ccc'},
						   { text: '2014คน', dataField: 'ddd' }
						 
                ]
            });
        });
	  