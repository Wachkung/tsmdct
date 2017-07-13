// JavaScript Document

$(document).ready(function () {
            var url = "tenopd1.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
					 { name: 'icd10name', type: 'string' },
                    { name: 'cns', type: 'string' }  
                    
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#tenallopd1").jqxGrid(
            {
                 width:true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อโรค', dataField: 'icd10name'},
					  { text: 'จำนวน', dataField: 'cns' } 
                        
			  
			    ]
            });
        });
	  
	  
$(document).ready(function () {
            var url = "tenopd2.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
					 { name: 'icd10name', type: 'string' },
                    { name: 'cns', type: 'string' }  
                    
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#tenallopd2").jqxGrid(
            {
                 width:true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อโรค', dataField: 'icd10name'},
					  { text: 'จำนวน', dataField: 'cns' } 
                        
			  
			    ]
            });
        });
	  $(document).ready(function () {
            var url = "tenopd3.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
					 { name: 'icd10name', type: 'string' },
                    { name: 'cns', type: 'string' }  
                    
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#tenallopd3").jqxGrid(
            {
                 width:true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อโรค', dataField: 'icd10name'},
					  { text: 'จำนวน', dataField: 'cns' } 
                        
			  
			    ]
            });
        });
	   $(document).ready(function () {
            var url = "tendeadipt1.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
					 { name: 'icd10name', type: 'string' },
                    { name: 'cns', type: 'string' }  
                    
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#tendeadipt1").jqxGrid(
            {
                 width:true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อโรค', dataField: 'icd10name'},
					  { text: 'จำนวน', dataField: 'cns' } 
                        
			  
			    ]
            });
        });
	  $(document).ready(function () {
            var url = "tendeadipt2.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
					 { name: 'icd10name', type: 'string' },
                    { name: 'cns', type: 'string' }  
                    
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#tendeadipt2").jqxGrid(
            {
                 width:true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อโรค', dataField: 'icd10name'},
					  { text: 'จำนวน', dataField: 'cns' } 
                        
			  
			    ]
            });
        });
	  $(document).ready(function () {
            var url = "tendeadipt3.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
					 { name: 'icd10name', type: 'string' },
                    { name: 'cns', type: 'string' }  
                    
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#tendeadipt3").jqxGrid(
            {
                 width:true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อโรค', dataField: 'icd10name'},
					  { text: 'จำนวน', dataField: 'cns' } 
                        
			  
			    ]
            });
        });
	    $(document).ready(function () {
            var url = "opddeadten1.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
					 { name: 'icd10name', type: 'string' },
                    { name: 'cns', type: 'string' }  
                    
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#opddeadten1").jqxGrid(
            {
                 width:true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อโรค', dataField: 'icd10name'},
					  { text: 'จำนวน', dataField: 'cns' } 
                        
			  
			    ]
            });
        });
	      $(document).ready(function () {
            var url = "opddeadten2.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
					 { name: 'icd10name', type: 'string' },
                    { name: 'cns', type: 'string' }  
                    
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#opddeadten2").jqxGrid(
            {
                 width:true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อโรค', dataField: 'icd10name'},
					  { text: 'จำนวน', dataField: 'cns' } 
                        
			  
			    ]
            });
        });
		
		 $(document).ready(function () {
            var url = "opddeadten3.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
					 { name: 'icd10name', type: 'string' },
                    { name: 'cns', type: 'string' }  
                    
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#opddeadten3").jqxGrid(
            {
                 width:true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อโรค', dataField: 'icd10name'},
					  { text: 'จำนวน', dataField: 'cns' } 
                        
			  
			    ]
            });
        });
		
		 $(document).ready(function () {
            var url = "tenipt1.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
					 { name: 'icd10name', type: 'string' },
                    { name: 'cns', type: 'string' }  
                    
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#tenipt1").jqxGrid(
            {
                 width:true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อโรค', dataField: 'icd10name'},
					  { text: 'จำนวน', dataField: 'cns' } 
                        
			  
			    ]
            });
        });
		
		$(document).ready(function () {
            var url = "tenipt2.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
					 { name: 'icd10name', type: 'string' },
                    { name: 'cns', type: 'string' }  
                    
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#tenipt2").jqxGrid(
            {
                 width:true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อโรค', dataField: 'icd10name'},
					  { text: 'จำนวน', dataField: 'cns' } 
                        
			  
			    ]
            });
        });
		
			$(document).ready(function () {
            var url = "tenipt3.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
					 { name: 'icd10name', type: 'string' },
                    { name: 'cns', type: 'string' }  
                    
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#tenipt3").jqxGrid(
            {
                 width:true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อโรค', dataField: 'icd10name'},
					  { text: 'จำนวน', dataField: 'cns' } 
                        
			  
			    ]
            });
        });
		
		
		
			$(document).ready(function () {
            var url = "tenor1.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
					 { name: 'icd10name', type: 'string' },
                    { name: 'cns', type: 'string' }  
                    
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#tenor1").jqxGrid(
            {
                 width:true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อโรค', dataField: 'icd10name'},
					  { text: 'จำนวน', dataField: 'cns' } 
                        
			  
			    ]
            });
        });
		
		
			$(document).ready(function () {
            var url = "tenor2.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
					 { name: 'icd10name', type: 'string' },
                    { name: 'cns', type: 'string' }  
                    
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#tenor2").jqxGrid(
            {
                 width:true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อโรค', dataField: 'icd10name'},
					  { text: 'จำนวน', dataField: 'cns' } 
                        
			  
			    ]
            });
        });
		
			$(document).ready(function () {
            var url = "tenor3.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
					 { name: 'icd10name', type: 'string' },
                    { name: 'cns', type: 'string' }  
                    
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#tenor3").jqxGrid(
            {
                 width:true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10' },
                      { text: 'ชื่อโรค', dataField: 'icd10name'},
					  { text: 'จำนวน', dataField: 'cns' } 
                        
			  
			    ]
            });
        });