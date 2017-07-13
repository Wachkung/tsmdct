	  $(document).ready(function () {
            var url = "./query/lrsum3.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     { name: 'lr', type: 'string' },
                  
                        { name: 'aaa', type: 'string' }  ,
						 { name: 'bbb', type: 'string' }  ,
						 { name: 'ccc', type: 'string' }  ,
						 { name: 'ddd', type: 'string' }  
						
                ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#lrsum3").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                  autorowheight: true,
                autoheight: true,
                altrows: true,
				
				columns: [
                  { text: 'รหัสหน่วยงาน', dataField: 'lr' },
                      
					  
					     { text: '2013คน', dataField: 'aaa' },
						   { text: '2014คน', dataField: 'bbb'},
						   { text: '2015คน', dataField: 'ccc'},
						   { text: '2016คน', dataField: 'ddd' }
						 
                ]
            });
        });
	  