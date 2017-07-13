// JavaScript Document

	//var $j = jQuery.noConflict();      
	$(document).ready(function() {
			 
    
					 $("#YearButton").click(function () {
                   	      
						  var year = $("#year_by option:selected" ).val();
            			  var date = $("#date_by option:selected" ).val();
			 var plus = "543";
			 var x = parseInt( plus ); 		  	
			 var y = parseInt( year ); 
		     var yearthaifull = y+x; 
			 var yearthaishort = yearthaifull.toString().substr(2, 2);
					
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [                   
{ name: 'id', type: 'string' }  ,
{ name: 'a', type: 'string' }  ,
{ name: 'b', type: 'string' } ,
{ name: 'c', type: 'string' } ,			   
{ name: 'd', type: 'string' } ,
{ name: 'e', type: 'string' } ,
{ name: 'f', type: 'string' } ,
{ name: 'g', type: 'string' } ,
{ name: 'h', type: 'string' } ,
{ name: 'i', type: 'string' } ,
{ name: 'j', type: 'string' } ,
{ name: 'k', type: 'string' } ,
{ name: 'l', type: 'string' } ,

			    ],
               
                  //  url: url,
               
                  type: "POST",
				  url : "./query/cancer_tri_month_query.php",
				
                   
				  data:jQuery.parseJSON( '{ "date":"'+date+'","year":"'+year+'" }' ),
		
                
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dtpttype").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                autorowheight: true,
                autoheight: true,
                altrows: true,
                pageable: true,
                
                		   
			   
			    columns: [
			          { text: 'ลำดับ', dataField: 'id', width:30} , 	
					  { text: 'ชื่อ-นามสกุล', dataField: 'a' , width:150}  ,			  
			          { text: 'อายุ', dataField: 'b', width:50} ,					    
			          { text: 'เพศ', dataField: 'c', width:50} ,
                      { text: 'HN', dataField: 'd', width:80} ,
					  { text: 'ID', dataField: 'e', width:130} ,
					  { text: 'Dx.', dataField: 'f', width:50} ,
					  { text: 'สถานภาพ', dataField: 'g', width:50} ,
					  { text: 'ที่อยู่', dataField: 'h', width:100} ,
					  { text: 'ศาสนา', dataField: 'i', width:50} ,
					  { text: 'ตาย', dataField: 'j' , width:70} ,
					  { text: 'มีชีวิต', dataField: 'k', width:70} ,
					  { text: 'วันที่มาตรวจครั้งสุดท้าย', dataField: 'l', width:120} 
					   
			    ]
            

            });

	      });   
		  
	

  $("#excelExport").click(function () {
                $("#dtpttype").jqxGrid('exportdata', 'xls', 'รายงานมะเร็งรายใหม่');           
            });
         
        });
	  