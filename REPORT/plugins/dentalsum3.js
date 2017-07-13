// JavaScript Document

$(document).ready(function () {
            var url = "./query/dttsum.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'yearvst', type: 'string' },
					 { name: 'vn', type: 'string' },
                    { name: 'hn', type: 'string' }  
                    
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dentalsum3").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'ปี พ.ศ', dataField: 'yearvst'},
                      { text: 'คน', dataField: 'hn' },
					  { text: 'ครั้ง', dataField: 'vn'  } 
                        
			  
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
	  