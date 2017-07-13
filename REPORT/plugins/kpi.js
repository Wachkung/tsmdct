$(document).ready(function () {
            var url = "./query/kpihosp.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'total bed', type: 'string' },
					 { name: 'aaa', type: 'string' },
                    { name: 'bbb', type: 'string' } ,
                     { name: 'ccc', type: 'string' } ,
                    { name: 'ddd', type: 'string' }  
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#kpihosp").jqxGrid(
            {
                width: 750,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'KPI', dataField: 'total bed', width: 350 },
                      { text: '2011', dataField: 'aaa', width: 100},
					  { text: '2012', dataField: 'bbb', width: 100 },
                       { text: '2013', dataField: 'ccc', width: 100 },
			  
			           { text: '2014', dataField: 'ddd', width: 100 } 
			  
			    ]
            });
        });
	  
	  $(document).ready(function () {
            var url = "orssum3.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     { name: 'ward', type: 'string' },
                    { name: 'nameidpm', type: 'nameidpm' }    ,
					 
                        { name: 'aaa', type: 'string' }  ,
						 { name: 'bbb', type: 'string' }  ,
						 { name: 'ccc', type: 'string' }  ,
						 { name: 'ddd', type: 'string' }  
						
                ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#orssum3").jqxGrid(
            {
                width: 750,
                source: dataAdapter,
                columnsresize: true,
                  autorowheight: true,
                autoheight: true,
                altrows: true,
				
				columns: [
                  { text: 'รหัสหน่วยงาน', dataField: 'ward', width: 100 },
                      { text: 'ชื่อหน่วยงาน', dataField: 'nameidpm', width: 250 },
					  
					     { text: '2011คน', dataField: 'aaa', width: 100 },
						   { text: '2012คน', dataField: 'bbb', width: 100 },
						   { text: '2013คน', dataField: 'ccc', width: 100 },
						   { text: '2014คน', dataField: 'ddd', width: 100 }
						 
                ]
            });
        });
	  