var d = new Date();
       var year = d.getFullYear();

	 var plus = "543";
	 var x = parseInt( plus ); 		  	
	var y = parseInt( year ); 
	 var yearthaifull = y+x; 
	var yearthaishort = yearthaifull.toString().substr(2, 2);

              var aa = "1";
             var neg1  = parseInt( aa  ); 
               var bb = "2";
             var neg2 = parseInt( bb  ); 
               var cc = "3";
             var neg3  = parseInt( cc  ); 
               var dd = "4";
             var neg4 = parseInt( dd  ); 
          

              var year4 = yearthaifull;
              var year3 = yearthaifull -neg1;
              var year2 = yearthaifull -neg2;
              var year1 = yearthaifull -neg3;
$(document).ready(function () {
            var url = "./query/referincln.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                      
					 {name: 'cln', type: 'string' },
					  {name: 'namecln', type: 'string' },
                     { name: 'aaa', type: 'string' } ,
                    { name: 'bbb', type: 'string' }  ,
					{ name: 'ccc', type: 'string' } ,
                    { name: 'ddd', type: 'string' }   
					 
		   
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#referincln").jqxGrid(
            {
                  width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                     
                      { text: 'รหัสสถานบริการ', dataField: 'cln'  },
					   
                       { text: 'ชื่อสถานบริการ', dataField: 'namecln'  },
			  
			           { text:''+year1+'', dataField: 'aaa'   } ,
					    { text::''+year2+'',dataField: 'bbb'   },
			  
			           { text::''+year3+'', dataField: 'ccc'   } ,
					    { text::''+year4+'', dataField: 'ddd'   } 
			  
			    ]
            });
        });
	  
	  
	  