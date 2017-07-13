	  $(document).ready(function () {
            var url = "./query/iptstaionrefer.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     { name: 'rfrlct', type: 'string' },
                    { name: 'off_name1', type: 'nameidpm' }    ,
					 
                        { name: 'aaa', type: 'string' }  ,
						 { name: 'bbb', type: 'string' }  ,
						 { name: 'ccc', type: 'string' }  ,
						 { name: 'ddd', type: 'string' }  
						
                ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#iptstaionrefer").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                  autorowheight: true,
                autoheight: true,
                altrows: true,
				
				columns: [
                  { text: 'รหัสหน่วยงาน', dataField: 'rfrlct' },
                      { text: 'ชื่อหน่วยงาน', dataField: 'off_name1' },
					  
					     { text: '2012คน', dataField: 'aaa' },
						   { text: '2013คน', dataField: 'bbb' },
						   { text: '2014คน', dataField: 'ccc' },
						   { text: '2015คน', dataField: 'ddd' }
						 
                ]
            });
        });
         $(document).ready(function () {
            var url = "refernameipd.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     { name: 'icd10', type: 'string' },
                    { name: 'icd10name', type: 'nameidpm' }    ,
					 
                        { name: 'nub', type: 'string' }   
						
                ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#refernameipd").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                  autorowheight: true,
                autoheight: true,
                altrows: true,
				
				columns: [
                  { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อหน่วยงาน', dataField: 'icd10name' },
					  
					     { text: 'จำนวน', dataField: 'nub' } 
						 
                ]
            });
        });
        
         $(document).ready(function () {
            var url = "refernameipd2.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     { name: 'icd10', type: 'string' },
                    { name: 'icd10name', type: 'nameidpm' }    ,
					 
                        { name: 'nub', type: 'string' }   
						
                ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#refernameipd2").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                  autorowheight: true,
                autoheight: true,
                altrows: true,
				
				columns: [
                  { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อหน่วยงาน', dataField: 'icd10name' },
					  
					     { text: 'จำนวน', dataField: 'nub' } 
						 
                ]
            });
        });
        
        $(document).ready(function () {
            var url = "refernameipd3.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     { name: 'icd10', type: 'string' },
                    { name: 'icd10name', type: 'nameidpm' }    ,
					 
                        { name: 'nub', type: 'string' }   
						
                ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#refernameipd3").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                  autorowheight: true,
                autoheight: true,
                altrows: true,
				
				columns: [
                  { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อหน่วยงาน', dataField: 'icd10name' },
					  
					     { text: 'จำนวน', dataField: 'nub' } 
						 
                ]
            });
        });
        
        
        $(document).ready(function () {
            var url = "refernameipdout.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     { name: 'icd10', type: 'string' },
                    { name: 'icd10name', type: 'nameidpm' }    ,
					 
                        { name: 'nub', type: 'string' }   
						
                ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#refernameipdout").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                  autorowheight: true,
                autoheight: true,
                altrows: true,
				
				columns: [
                  { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อหน่วยงาน', dataField: 'icd10name' },
					  
					     { text: 'จำนวน', dataField: 'nub' } 
						 
                ]
            });
        });
        
        $(document).ready(function () {
            var url = "refernameipdout2.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     { name: 'icd10', type: 'string' },
                    { name: 'icd10name', type: 'nameidpm' }    ,
					 
                        { name: 'nub', type: 'string' }   
						
                ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#refernameipdout2").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                  autorowheight: true,
                autoheight: true,
                altrows: true,
				
				columns: [
                  { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อหน่วยงาน', dataField: 'icd10name' },
					  
					     { text: 'จำนวน', dataField: 'nub' } 
						 
                ]
            });
        });
        
        
         $(document).ready(function () {
            var url = "refernameipdout3.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     { name: 'icd10', type: 'string' },
                    { name: 'icd10name', type: 'nameidpm' }    ,
					 
                        { name: 'nub', type: 'string' }   
						
                ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#refernameipdout3").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                  autorowheight: true,
                autoheight: true,
                altrows: true,
				
				columns: [
                  { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อหน่วยงาน', dataField: 'icd10name' },
					  
					     { text: 'จำนวน', dataField: 'nub' } 
						 
                ]
            });
        });