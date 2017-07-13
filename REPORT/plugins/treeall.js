// JavaScript Document

$(document).ready(function () {
            var url = "./query/yearopd3.php";
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
            $("#yearopd3").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'ปี พ.ศ', dataField: 'yearvst' },
                      { text: 'คน', dataField: 'hn'},
					  { text: 'ครั้ง', dataField: 'vn' } 
                        
			  
			    ]
            });
        });
	  
	  $(document).ready(function () {
            var url = "./query/orssum3.php";
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
                width: true,
                source: dataAdapter,
                columnsresize: true,
                  autorowheight: true,
                autoheight: true,
                altrows: true,
				
				columns: [
                  { text: 'รหัสหน่วยงาน', dataField: 'ward' },
                      { text: 'ชื่อหน่วยงาน', dataField: 'nameidpm'},
					  
					     { text: '2013คน', dataField: 'aaa'},
						   { text: '2014คน', dataField: 'bbb' },
						   { text: '2015คน', dataField: 'ccc'},
						   { text: '2016คน', dataField: 'ddd' }
						 
                ]
            });


           $("#excelExport").click(function () {
                $("#yearopd3").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            $("#excelExport2").click(function () {
                $("#orssum3").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });


        });
	  