// JavaScript Document

$(document).ready(function () {
            var url = "./query/dttyear3sum.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                      
					 {name: 'aaaa', type: 'string' },
					 
                     { name: 'ddd', type: 'string' } ,
                    { name: 'ddd1', type: 'string' }  ,
					{ name: 'ddd2', type: 'string' } 
                     
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dttyear3sum").jqxGrid(
            {
                 width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     
                      { text: 'ปี    ', dataField: 'aaaa'  },
					   
                       { text: 'ipt', dataField: 'ddd'  },
			  
			           { text: 'opd', dataField: 'ddd1'  } ,
					    { text: 'referout', dataField: 'ddd2'  } 
			  
			           
			  
			    ]
            });
        });
	  // JavaScript Document

 
	  
	  $(document).ready(function () {
            var url = "dttdtx1_6.php";
            // prepare the data
            var source =
            {
				   
                datatype: "json",
                datafields: [
                      
					    {name: 'namegrdt', type: 'string' },
					 
					   
					 {name: 'aaa', type: 'string' },
					 
                     { name: 'aaa1', type: 'string' } ,
                    { name: 'aaa2', type: 'string' }  ,
					{ name: 'aaa3', type: 'string' } ,
                     
			        { name: 'aaa4', type: 'string' } ,
                    { name: 'aaa5', type: 'string' }  ,
					
					   
					 {name: 'bbb', type: 'string' },
					 
                     { name: 'bbb1', type: 'string' } ,
                    { name: 'bbb2', type: 'string' }  ,
					{ name: 'bbb3', type: 'string' } ,
                     
			        { name: 'bbb4', type: 'string' } ,
                    { name: 'bbb5', type: 'string' }   
					
					  
					 
					
					
					
					
					
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dttdtx1_6").jqxGrid(
            {
                 width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
				   
                     { text: 'ประเภทงาน     ', dataField: 'namegrdt'  },
                      { text: 'ตั้งครรภ์ 55คน', dataField: 'aaa'  },
					   
                       { text: 'ครั้ง', dataField: 'aaa1'  },
			  
			           { text: 'ตั้งครรภ์ 56คน', dataField: 'aaa2'  } ,
					    { text: 'ครั้ง', dataField: 'aaa3'  } ,
			  
			           { text: 'ตั้งครรภ์ 57คน', dataField: 'aaa4'  },
			  
			           { text: 'ครั้ง', dataField: 'aaa5'  } ,
					  
					 { text: '0-12 55คน', dataField: 'bbb'  },
			  
			           { text: 'ครั้ง', dataField: 'bbb1'  } ,
					    { text: '0-12 56คน', dataField: 'bbb2'  } ,
			  
			           { text: 'ครั้ง', dataField: 'bbb3'  },
			  
			           { text: '0-12 57คน', dataField: 'bbb4'  } ,
					  
					 { text: 'ครั้ง', dataField: 'bbb5'  }  
					   
			  
			    ]
            });
        });
	  
	  
	  
	  $(document).ready(function () {
            var url = "dttdtx1_6_2.php";
            // prepare the data
            var source =
            {
				   
                datatype: "json",
                datafields: [
                      
					    {name: 'namegrdt', type: 'string' },
					 
					 
					
					  
					 {name: 'ccc', type: 'string' },
					 
                     { name: 'ccc1', type: 'string' } ,
                    { name: 'ccc2', type: 'string' }  ,
					{ name: 'ccc3', type: 'string' } ,
                     
			        { name: 'ccc4', type: 'string' } ,
                    { name: 'ccc5', type: 'string' }  ,
					
					{name: 'ddd', type: 'string' },
					 
                     { name: 'ddd1', type: 'string' } ,
                    { name: 'ddd2', type: 'string' }  ,
					{ name: 'ddd3', type: 'string' } ,
                     
			        { name: 'ddd4', type: 'string' } ,
                    { name: 'ddd5', type: 'string' }  
					
					
					
					
					
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dttdtx1_6_2").jqxGrid(
            {
                 width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
				 
                     { text: 'ประเภทงาน   ', dataField: 'namegrdt'  },
                      
					{ text: '3-5 55คน', dataField: 'ccc'  },
			  
			           { text: 'ครั้ง', dataField: 'ccc1'  } ,
					    { text: '3-5 56คน', dataField: 'ccc2'  } ,
			  
			           { text: 'ครั้ง', dataField: 'ccc3'  },
			  
			           { text: '3-5 57คน', dataField: 'ccc4'  } ,
					  
					 { text: 'ครั้ง', dataField: 'ccc5'  } ,
					{ text: '6-14 55คน', dataField: 'ddd'  },
			  
			           { text: 'ครั้ง', dataField: 'ddd1'  } ,
					    { text: '6-14 56คน', dataField: 'ddd2'  } ,
			  
			           { text: 'ครั้ง', dataField: 'ddd3'  },
			  
			           { text: '6-14 57คน', dataField: 'ddd4'  } ,
					  
					 { text: 'ครั้ง', dataField: 'ddd5'  } 
					
					
					   
			  
			    ]
            });
        });
	  
	  
	  
	    $(document).ready(function () {
            var url = "dttdtx7_9.php";
            // prepare the data
            var source =
            {
				   
                datatype: "json",
                datafields: [
                      
					    {name: 'namegrdt', type: 'string' },
					 
					   
					 {name: 'aaa', type: 'string' },
					 
                   
                    { name: 'aaa2', type: 'string' }  ,
					 
					   
					 {name: 'bbb', type: 'string' },
					 
                   
                    { name: 'bbb2', type: 'string' }  ,
					 
					
					  
					 {name: 'ccc', type: 'string' },
					 
                     
                    { name: 'ccc2', type: 'string' }  
					 
					
					 
					
					
					
					
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dttdtx7_9").jqxGrid(
            {
                 width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
				 
                     { text: 'ประเภทงาน', dataField: 'namegrdt'  },
                      { text: 'ปี55 คน', dataField: 'aaa'  },
					   
                      
			  
			           { text: 'ครั้ง', dataField: 'aaa2'  } ,
					  
					 { text: 'ปี56คน', dataField: 'bbb'  },
			  
			        
					    { text: 'ครั้ง', dataField: 'bbb2'  } ,
			  
			          
					{ text: 'ปี57คน', dataField: 'ccc'  },
			  
			         
					    { text: 'ครั้ง', dataField: 'ccc2'  }  
					 
			          
					
					   
			  
			    ]
            });
        });
	   $(document).ready(function () {
            var url = "dttdtx10_16.php";
            // prepare the data
            var source =
            {
				   
                datatype: "json",
                datafields: [
                      
					    {name: 'namegrdt', type: 'string' },
					 
					   
					 {name: 'aaa', type: 'string' },
					 
                   
                    { name: 'aaa2', type: 'string' }  ,
					 
					   
					 {name: 'bbb', type: 'string' },
					 
                   
                    { name: 'bbb2', type: 'string' }  ,
					 
					
					  
					 {name: 'ccc', type: 'string' },
					 
                     
                    { name: 'ccc2', type: 'string' }   
					 
					 
				 
					
					
					
					
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dttdtx10_16").jqxGrid(
            {
                 width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   columns: [
				 
                     { text: 'ประเภทงาน', dataField: 'namegrdt'  },
                      { text: 'ปี55 คน', dataField: 'aaa'  },
					   
                      
			  
			           { text: 'ครั้ง', dataField: 'aaa2'  } ,
					  
					 { text: 'ปี56คน', dataField: 'bbb'  },
			  
			        
					    { text: 'ครั้ง', dataField: 'bbb2'  } ,
			  
			          
					{ text: 'ปี57คน', dataField: 'ccc'  },
			  
			         
					    { text: 'ครั้ง', dataField: 'ccc2'  }  
					 
			          
					
					   
			  
			    ]
            });
        });
	   $(document).ready(function () {
            var url = "dttdtx17_22.php";
            // prepare the data
            var source =
            {
				   
                datatype: "json",
                datafields: [
                      
					    {name: 'namegrdt', type: 'string' },
					 
					   
					 {name: 'aaa', type: 'string' },
					 
                   
                    { name: 'aaa2', type: 'string' }  ,
					 
					   
					 {name: 'bbb', type: 'string' },
					 
                   
                    { name: 'bbb2', type: 'string' }  ,
					 
					
					  
					 {name: 'ccc', type: 'string' },
					 
                     
                    { name: 'ccc2', type: 'string' }   
					 
					 
				 
					
					
					
					
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dttdtx17_22").jqxGrid(
            {
                 width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
				 
                     { text: 'ประเภทงาน', dataField: 'namegrdt'  },
                      { text: 'ปี55 คน', dataField: 'aaa'  },
					   
                      
			  
			           { text: 'ครั้ง', dataField: 'aaa2'  } ,
					  
					 { text: 'ปี56คน', dataField: 'bbb'  },
			  
			        
					    { text: 'ครั้ง', dataField: 'bbb2'  } ,
			  
			          
					{ text: 'ปี57คน', dataField: 'ccc'  },
			  
			         
					    { text: 'ครั้ง', dataField: 'ccc2'  }  
					 
			  
			    ]
            });
        });
	  