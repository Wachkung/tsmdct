// JavaScript Document


      
      $(document).ready(function () {
          $("#jqxdatetimeinput").jqxDateTimeInput({ width: '150px', height: '25px' });
           
        
		
		
		  $("#jqxdatetimeinput2").jqxDateTimeInput({ width: '150px', height: '25px' });
		
		   $("#getDateButton").click(function () {
                     var date = $('#jqxdatetimeinput').jqxDateTimeInput('getText');
                     var date2 = $('#jqxdatetimeinput2').jqxDateTimeInput('getText');
			 
	 //	alert (date);
		   
			  
			  
			//   $.ajax({
		 
		//  success: function(html)
			   var data = generatedata(100);
/*			 				var error = [];
error.push('Error 1');
error.push('Error 2');
		$('.errors').html(
    error.join('<br/>') // "Error 1<br/>Error 2"
);	 
		
	*/	
		
		{
			 var theme = 'classic';
            var source =
            {     
			
			  
                
                datatype: "json",
                datafields: [
					 { name: 'icd10' },
					 { name: 'icd10name' } ,
				 	 { name: 'c5opd' } ,
		 
					
			 
                ],
				
			 	   
				
				
                     type: "POST",
				  
				   url: "opd10.php",
                    
				  data:jQuery.parseJSON( '{ "date":"'+date+'","date2":"'+date2+'" }' ),
		 
			   
		 
             }; 
			 
			
			
			
			
			
            
           var dataAdapter = new $.jqx.dataAdapter(source);
            // initialize jqxGrid
            $("#jqxgrid1").jqxGrid(
            {
                width: 450,
                source: dataAdapter,                
                altrows: true,
                sortable: true,
                selectionmode: 'multiplecellsextended',
                columns: [
                  { text: 'icd10', datafield: 'icd10', width: 50 },
                  { text: 'icd10name', datafield: 'icd10name', width: 350 },
                  { text: 'c5opd', datafield: 'c5opd', width: 50 } 
                 
              
			 
			 
			 
			 
			    ]
            });
			  var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error);} }); 
           
		   
		
		
          var settings = {
                title: "ผู้ป่วยนอก",
                description: "",
                showLegend: true,
                enableAnimations: true,
                padding: { left: 5, top: 0, right: 5, bottom: 0 },
                titlePadding: { left: 90, top: 0, right: 0, bottom: 1 },
                source: dataAdapter,
                categoryAxis:
                    {
                        dataField: 'icd10',
                        showGridLines: true
                    },
                colorScheme: 'scheme01',
                seriesGroups:
                    [
                        {
                            type: 'column',
                            columnsGapPercent: 20,
                         //  columns: 50,
						    valueAxis:
                            {
                                unitInterval: 300,
                                displayValueAxis: true,
                                description: 'จำนวน'
                            },
                            series: [
                                    { dataField: 'c5opd', displayText: 'icd10'},
                                  //  { dataField: 'c5opd', displayText: 'icd10' }
                                ]
                        },
                        {
                            type: 'line',
                            valueAxis:
                            {
                                unitInterval: 5,
                                displayValueAxis: false,
                                description: '% of GDP)'
                            },
                            series: [
                                    { dataField: 'c5opd', displayText: 'จำนวน', opacity:0.2 }
                                ]
                        }

                    ]
           
		   
		   
		   
		    };
			
			$('#chartContainer').jqxChart(settings);
			$("#excelExport").jqxButton({ theme: theme });
		
		$("#excelExport").click(function () {
                $("#jqxgrid1").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
			
		   
           
		        
			  
		}
		
		
		
		
		
		
		});//จบการส่งข้อมูล

	        
	   
	     });
  
   
   
    
   
   
   
   
 
  
      
         
     $(document).ready(function () {
          $("#jqxdatetimeinput").jqxDateTimeInput({ width: '150px', height: '25px' });
           
        
		
		
		  $("#jqxdatetimeinput2").jqxDateTimeInput({ width: '150px', height: '25px' });
		
		   $("#getDateButton").click(function () {
                     var date = $('#jqxdatetimeinput').jqxDateTimeInput('getText');
                     var date2 = $('#jqxdatetimeinput2').jqxDateTimeInput('getText');
			 
	 	 
		   
			  
			  
			//   $.ajax({
		 
		//  success: function(html)
			   var data = generatedata(100);
			 
			 
		{
			 var theme = 'classic';
            var source =
            {     
			
			  
                
                datatype: "json",
                datafields: [
					 { name: 'prediag' },
					 { name: 'prename' } ,
				 	 { name: 'prediagc5opd' } ,
		 
			 
                ],
                     type: "POST",
				  
				   url: "ipt10.php",
                  data:jQuery.parseJSON( '{ "date":"'+date+'","date2":"'+date2+'" }' ),
		 
			   
		 
             }; 
			
			
			
            
           var dataAdapter = new $.jqx.dataAdapter(source);
            // initialize jqxGrid
            $("#iptgrid").jqxGrid(
            {
                width: 450,
                source: dataAdapter,                
                altrows: true,
                sortable: true,
                selectionmode: 'multiplecellsextended',
                columns: [
                   { text: 'prediag', datafield: 'prediag', width: 50 },
                  { text: 'prename', datafield: 'prename', width: 350 },
                  { text: 'prediagc5opd', datafield: 'prediagc5opd', width: 50 },
                 
                ]
            });
     
		 
           
		 
		}
		
		
		var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error);} }); 
           
		   
		   //  var dataadapter = new $.jqx.dataAdapter(source);
		   
		 //  alert(dataAdapter);
		   
		    // prepare jqxChart settings
          var settings = {
                title: "ผู้ป่วยใน",
                description: " ",
                showLegend: true,
                enableAnimations: true,
                padding: { left: 5, top: 0, right: 5, bottom: 0 },
                titlePadding: { left: 90, top: 0, right: 0, bottom: 1 },
                source: dataAdapter,
                categoryAxis:
                    {
                        dataField: 'prediag',
                        showGridLines: true
                    },
                colorScheme: 'scheme01',
                seriesGroups:
                    [
                        {
                            type: 'column',
                            columnsGapPercent: 1,
                         //  columns: 50,
						    valueAxis:
                            {
                                unitInterval: 100,
                                displayValueAxis: true,
                                description: 'จำนวน '
                            },
                            series: [
                                    { dataField: 'prediagc5opd', displayText: 'prediag'},
                                  //  { dataField: 'c5opd', displayText: 'icd10' }
                                ]
                        },
                        {
                            type: 'line',
                            valueAxis:
                            {
                                unitInterval: 5,
                                displayValueAxis: false,
                                description: 'Debt (% of GDP)'
                            },
                            series: [
                                    { dataField: 'prediagc5opd', displayText: 'จำนวน', opacity:0.2 }
                                ]
                        }

                    ]
           
		   
		   
		   
		    };

		
		   $('#chartipt').jqxChart(settings);
		
		
		
		
		
		
		
		
		
		
		
		 
		});//จบการส่งข้อมูล

	        
	   
	     });
  
   
  
    
   
   
   
 
  
  
  
      
           
     
      
        $(document).ready(function () {
          $("#jqxdatetimeinput").jqxDateTimeInput({ width: '150px', height: '25px' });
           
        
		
		
		  $("#jqxdatetimeinput2").jqxDateTimeInput({ width: '150px', height: '25px' });
		
		   $("#getDateButton").click(function () {
                     var date = $('#jqxdatetimeinput').jqxDateTimeInput('getText');
                     var date2 = $('#jqxdatetimeinput2').jqxDateTimeInput('getText');
			 
	 	 
		   
			  
			  
			//   $.ajax({
		 
		//  success: function(html)
			   var data = generatedata(100);
			 
			 
		{
			 var theme = 'classic';
            var source =
            {     
			
			  
                
                datatype: "json",
                datafields: [
					 { name: 'soicd10' },
					 { name: 'soname' } ,
				 	 { name: 'countso' } ,
		 
			 
                ],
                     type: "POST",
				  
				   url: "so10.php",
                  data:jQuery.parseJSON( '{ "date":"'+date+'","date2":"'+date2+'" }' ),
		 
			   
		 
             }; 
			
			
			
            
           var dataAdapter = new $.jqx.dataAdapter(source);
            // initialize jqxGrid
            $("#so10grid").jqxGrid(
            {
                width: 450,
                source: dataAdapter,                
                altrows: true,
                sortable: true,
                selectionmode: 'multiplecellsextended',
                columns: [
                   { text: 'soicd10', datafield: 'soicd10', width: 50 },
                  { text: 'soname', datafield: 'soname', width: 350 },
                  { text: 'countso', datafield: 'countso', width: 50 },
                 
                ]
            });
     
		 
           
		 
		}
		
		
		var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error);} }); 
           
		   
		   //  var dataadapter = new $.jqx.dataAdapter(source);
		   
		 //  alert(dataAdapter);
		   
		    // prepare jqxChart settings
          var settings = {
                title: "ประกันสังคม",
                description: " ",
                showLegend: true,
                enableAnimations: true,
                padding: { left: 5, top: 0, right: 5, bottom: 0 },
                titlePadding: { left: 90, top: 0, right: 0, bottom: 1 },
                source: dataAdapter,
                categoryAxis:
                    {
                        dataField: 'soicd10',
                        showGridLines: true
                    },
                colorScheme: 'scheme01',
                seriesGroups:
                    [
                        {
                            type: 'column',
                            columnsGapPercent: 1,
                         //  columns: 50,
						    valueAxis:
                            {
                                unitInterval: 100,
                                displayValueAxis: true,
                                description: 'จำนวน '
                            },
                            series: [
                                    { dataField: 'countso', displayText: 'soicd10'},
                                  //  { dataField: 'c5opd', displayText: 'icd10' }
                                ]
                        },
                        {
                            type: 'line',
                            valueAxis:
                            {
                                unitInterval: 5,
                                displayValueAxis: false,
                                description: 'Debt (% of GDP)'
                            },
                            series: [
                                    { dataField: 'countso', displayText: 'จำนวน', opacity:0.2 }
                                ]
                        }

                    ]
           
		   
		   
		   
		    };

		
		   $('#chartso').jqxChart(settings);
		
		<!------refer  -->
		
		
		
		
		
		
		
		
		
		
	<!--	$("#excelExport2").jqxButton({ theme: theme }); -->
	  
		
		});//จบการส่งข้อมูล

	        
	   
	     });
  
   
  
    
   
   
          
        
  
  
 
  
  
      
      
      
         <!--refer  -->    
      
      
          
     
      
        $(document).ready(function () {
          $("#jqxdatetimeinput").jqxDateTimeInput({ width: '150px', height: '25px' });
           
        
		
		
		  $("#jqxdatetimeinput2").jqxDateTimeInput({ width: '150px', height: '25px' });
		
		   $("#getDateButton").click(function () {
                     var date = $('#jqxdatetimeinput').jqxDateTimeInput('getText');
                     var date2 = $('#jqxdatetimeinput2').jqxDateTimeInput('getText');
			 
	 	 
		   
			  
			  
			//   $.ajax({
		 
		//  success: function(html)
			   var data = generatedata(100);
			 
			 
		{
			 var theme = 'classic';
            var source =
            {     
			
			  
                
                datatype: "json",
                datafields: [
					 { name: 'cln' },
					 { name: 'namecln' } ,
				 	 { name: 'cvn' } ,
		 
			 
                ],
                     type: "POST",
				  
				   url: "refer10.php",
                  data:jQuery.parseJSON( '{ "date":"'+date+'","date2":"'+date2+'" }' ),
		 
			   
		 
             }; 
			
			
			
            
           var dataAdapter = new $.jqx.dataAdapter(source);
            // initialize jqxGrid
            $("#refer10grid").jqxGrid(
            {
                width: 450,
                source: dataAdapter,                
                altrows: true,
                sortable: true,
                selectionmode: 'multiplecellsextended',
                columns: [
                   { text: 'cln', datafield: 'cln', width: 50 },
                  { text: 'namecln', datafield: 'namecln', width: 350 },
                  { text: 'cvn', datafield: 'cvn', width: 50 },
                 
                ]
            });
     
		 
           
		 
		}
		
		
		var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error);} }); 
           
		   
		   //  var dataadapter = new $.jqx.dataAdapter(source);
		   
		 //  alert(dataAdapter);
		   
		    // prepare jqxChart settings
          var settings = {
                title: "REFER",
                description: " ",
                showLegend: true,
                enableAnimations: true,
                padding: { left: 5, top: 0, right: 5, bottom: 0 },
                titlePadding: { left: 90, top: 0, right: 0, bottom: 1 },
                source: dataAdapter,
                categoryAxis:
                    {
                        dataField: 'cln',
                        showGridLines: true
                    },
                colorScheme: 'scheme01',
                seriesGroups:
                    [
                        {
                            type: 'column',
                            columnsGapPercent: 1,
                         //  columns: 50,
						    valueAxis:
                            {
                                unitInterval: 100,
                                displayValueAxis: true,
                                description: 'จำนวน '
                            },
                            series: [
                                    { dataField: 'cvn', displayText: 'cln'},
                                  //  { dataField: 'c5opd', displayText: 'icd10' }
                                ]
                        },
                        {
                            type: 'line',
                            valueAxis:
                            {
                                unitInterval: 5,
                                displayValueAxis: false,
                                description: 'Debt (% of GDP)'
                            },
                            series: [
                                    { dataField: 'cvn', displayText: 'จำนวน', opacity:0.2 }
                                ]
                        }

                    ]
           
		   
		   
		   
		    };

		
		   $('#chartrefer').jqxChart(settings);
		
		<!------refer  -->
		
		
		
		
		
		
		
		
		
		
	<!--	$("#excelExport2").jqxButton({ theme: theme }); -->
	  
		
		});//จบการส่งข้อมูล

	        
	   
	     });
  
  
  
   
     <!----refer ward   -->
           
     
      
        $(document).ready(function () {
          $("#jqxdatetimeinput").jqxDateTimeInput({ width: '150px', height: '25px' });
           
        
		
		
		  $("#jqxdatetimeinput2").jqxDateTimeInput({ width: '150px', height: '25px' });
		
		   $("#getDateButton").click(function () {
                     var date = $('#jqxdatetimeinput').jqxDateTimeInput('getText');
                     var date2 = $('#jqxdatetimeinput2').jqxDateTimeInput('getText');
			 
	 	 
		   
			  
			  
			//   $.ajax({
		 
		//  success: function(html)
			   var data = generatedata(100);
			 
			 
		{
			 var theme = 'classic';
            var source =
            {     
			
			  
                
                datatype: "json",
                datafields: [
					 { name: 'ward' },
					 { name: 'nameward' } ,
				 	 { name: 'cvnward' } ,
		 
			 
                ],
                     type: "POST",
				  
				   url: "referward10.php",
                  data:jQuery.parseJSON( '{ "date":"'+date+'","date2":"'+date2+'" }' ),
		 
			   
		 
             }; 
			
			
			
            
           var dataAdapter = new $.jqx.dataAdapter(source);
            // initialize jqxGrid
            $("#referward10grid").jqxGrid(
            {
                width: 450,
                source: dataAdapter,                
                altrows: true,
                sortable: true,
                selectionmode: 'multiplecellsextended',
                columns: [
                   { text: 'ward', datafield: 'ward', width: 50 },
                  { text: 'nameward', datafield: 'nameward', width: 350 },
                  { text: 'cvnward', datafield: 'cvnward', width: 50 },
                 
                ]
            });
     
		 
           
		 
		}
		
		
		var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error);} }); 
           
		   
		   //  var dataadapter = new $.jqx.dataAdapter(source);
		   
		 //  alert(dataAdapter);
		   
		    // prepare jqxChart settings
          var settings = {
                title: "REFER_WARD",
                description: " ",
                showLegend: true,
                enableAnimations: true,
                padding: { left: 5, top: 0, right: 5, bottom: 0 },
                titlePadding: { left: 90, top: 0, right: 0, bottom: 1 },
                source: dataAdapter,
                categoryAxis:
                    {
                        dataField: 'ward',
                        showGridLines: true
                    },
                colorScheme: 'scheme01',
                seriesGroups:
                    [
                        {
                            type: 'column',
                            columnsGapPercent: 1,
                         //  columns: 50,
						    valueAxis:
                            {
                                unitInterval: 100,
                                displayValueAxis: true,
                                description: 'จำนวน '
                            },
                            series: [
                                    { dataField: 'cvnward', displayText: 'ward'},
                                  //  { dataField: 'c5opd', displayText: 'icd10' }
                                ]
                        },
                        {
                            type: 'line',
                            valueAxis:
                            {
                                unitInterval: 5,
                                displayValueAxis: false,
                                description: 'Debt (% of GDP)'
                            },
                            series: [
                                    { dataField: 'cvnward', displayText: 'จำนวน', opacity:0.2 }
                                ]
                        }

                    ]
           
		   
		   
		   
		    };

		
		   $('#chartreferward').jqxChart(settings);
		
		<!------refer  -->
		
		
		
		
		
		
		
		
		
		
	<!--	$("#excelExport2").jqxButton({ theme: theme }); -->
	  
		
		});//จบการส่งข้อมูล

	        
	   
	     });
  
  
  
   
  
  
  <!-- medwm10   -->
  
  
     
     
      
        $(document).ready(function () {
          $("#jqxdatetimeinput").jqxDateTimeInput({ width: '150px', height: '25px' });
           
        
		
		
		  $("#jqxdatetimeinput2").jqxDateTimeInput({ width: '150px', height: '25px' });
		
		   $("#getDateButton").click(function () {
                     var date = $('#jqxdatetimeinput').jqxDateTimeInput('getText');
                     var date2 = $('#jqxdatetimeinput2').jqxDateTimeInput('getText');
			 
	 	 
		   
			  
			  
			//   $.ajax({
		 
		//  success: function(html)
			   var data = generatedata(100);
			 
			 
		{
			 var theme = 'classic';
            var source =
            {     
			
			  
                
                datatype: "json",
                datafields: [
					 { name: 'prediag' },
					 { name: 'medman' } ,
				 	 { name: 'cdiag' } ,
		 
			 
                ],
                     type: "POST",
				  
				   url: "medwm10.php",
                  data:jQuery.parseJSON( '{ "date":"'+date+'","date2":"'+date2+'" }' ),
		 
			   
		 
             }; 
			
			
			
            
           var dataAdapter = new $.jqx.dataAdapter(source);
            // initialize jqxGrid
            $("#med10grid").jqxGrid(
            {
                width: 450,
                source: dataAdapter,                
                altrows: true,
                sortable: true,
                selectionmode: 'multiplecellsextended',
                columns: [
                   { text: 'prediag', datafield: 'prediag', width: 50 },
                  { text: 'medman', datafield: 'medman', width: 350 },
                  { text: 'cdiag', datafield: 'cdiag', width: 50 },
                 
                ]
            });
     
		 
           
		 
		}
		
		
		var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error);} }); 
           
		   
		   //  var dataadapter = new $.jqx.dataAdapter(source);
		   
		 //  alert(dataAdapter);
		   
		    // prepare jqxChart settings
          var settings = {
                title: "TOP10 MED",
                description: " ",
                showLegend: true,
                enableAnimations: true,
                padding: { left: 5, top: 0, right: 5, bottom: 0 },
                titlePadding: { left: 90, top: 0, right: 0, bottom: 1 },
                source: dataAdapter,
                categoryAxis:
                    {
                        dataField: 'prediag',
                        showGridLines: true
                    },
                colorScheme: 'scheme01',
                seriesGroups:
                    [
                        {
                            type: 'column',
                            columnsGapPercent: 1,
                         //  columns: 50,
						    valueAxis:
                            {
                                unitInterval: 100,
                                displayValueAxis: true,
                                description: 'จำนวน '
                            },
                            series: [
                                    { dataField: 'cdiag', displayText: 'prediag'},
                                  //  { dataField: 'c5opd', displayText: 'icd10' }
                                ]
                        },
                        {
                            type: 'line',
                            valueAxis:
                            {
                                unitInterval: 5,
                                displayValueAxis: false,
                                description: 'Debt (% of GDP)'
                            },
                            series: [
                                    { dataField: 'cdiag', displayText: 'จำนวน', opacity:0.2 }
                                ]
                        }

                    ]
           
		   
		   
		   
		    };

		
		   $('#chartremed').jqxChart(settings);
		
		<!------refer  -->
		
		
		
		
		
		
		
		
		
		
	<!--	$("#excelExport2").jqxButton({ theme: theme }); -->
	  
		
		});//จบการส่งข้อมูล

	        
	   
	     });
  
  
  
    
  
  
  
  
  
  
  
  
   <!-- gensur10   -->
    
     
      
        $(document).ready(function () {
          $("#jqxdatetimeinput").jqxDateTimeInput({ width: '150px', height: '25px' });
           
        
		
		
		  $("#jqxdatetimeinput2").jqxDateTimeInput({ width: '150px', height: '25px' });
		
		   $("#getDateButton").click(function () {
                     var date = $('#jqxdatetimeinput').jqxDateTimeInput('getText');
                     var date2 = $('#jqxdatetimeinput2').jqxDateTimeInput('getText');
			 
	 	 
		   
			  
			  
			//   $.ajax({
		 
		//  success: function(html)
			   var data = generatedata(100);
			 
			 
		{
			 var theme = 'classic';
            var source =
            {     
			
			  
                
                datatype: "json",
                datafields: [
					 { name: 'prediag' },
					 { name: 'medman' } ,
				 	 { name: 'cdiag' } ,
		 
			 
                ],
                     type: "POST",
				  
				   url: "gensur10.php",
                  data:jQuery.parseJSON( '{ "date":"'+date+'","date2":"'+date2+'" }' ),
		 
			   
		 
             }; 
			
			
			
            
           var dataAdapter = new $.jqx.dataAdapter(source);
            // initialize jqxGrid
            $("#gensurgrid").jqxGrid(
            {
                width: 450,
                source: dataAdapter,                
                altrows: true,
                sortable: true,
                selectionmode: 'multiplecellsextended',
                columns: [
                   { text: 'prediag', datafield: 'prediag', width: 50 },
                  { text: 'medman', datafield: 'medman', width: 350 },
                  { text: 'cdiag', datafield: 'cdiag', width: 50 },
                 
                ]
            });
     
		 
           
		 
		}
		
		
		var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error);} }); 
           
		   
		   //  var dataadapter = new $.jqx.dataAdapter(source);
		   
		 //  alert(dataAdapter);
		   
		    // prepare jqxChart settings
          var settings = {
                title: "ศัลยกรรมทั่วไป",
                description: " ",
                showLegend: true,
                enableAnimations: true,
                padding: { left: 5, top: 0, right: 5, bottom: 0 },
                titlePadding: { left: 90, top: 0, right: 0, bottom: 1 },
                source: dataAdapter,
                categoryAxis:
                    {
                        dataField: 'prediag',
                        showGridLines: true
                    },
                colorScheme: 'scheme01',
                seriesGroups:
                    [
                        {
                            type: 'column',
                            columnsGapPercent: 1,
                         //  columns: 50,
						    valueAxis:
                            {
                                unitInterval: 100,
                                displayValueAxis: true,
                                description: 'จำนวน '
                            },
                            series: [
                                    { dataField: 'cdiag', displayText: 'prediag'},
                                  //  { dataField: 'c5opd', displayText: 'icd10' }
                                ]
                        },
                        {
                            type: 'line',
                            valueAxis:
                            {
                                unitInterval: 5,
                                displayValueAxis: false,
                                description: 'Debt (% of GDP)'
                            },
                            series: [
                                    { dataField: 'cdiag', displayText: 'จำนวน', opacity:0.2 }
                                ]
                        }

                    ]
           
		   
		   
		   
		    };

		
		   $('#chartgensur').jqxChart(settings);
		
		<!------refer  -->
		
		
		
		
		
		
		
		
		
		
	<!--	$("#excelExport2").jqxButton({ theme: theme }); -->
	  
		
		});//จบการส่งข้อมูล

	        
	   
	     });
  
  
  
   
  <!---  ortho    -->
    
     
      
        $(document).ready(function () {
          $("#jqxdatetimeinput").jqxDateTimeInput({ width: '150px', height: '25px' });
           
        
		
		
		  $("#jqxdatetimeinput2").jqxDateTimeInput({ width: '150px', height: '25px' });
		
		   $("#getDateButton").click(function () {
                     var date = $('#jqxdatetimeinput').jqxDateTimeInput('getText');
                     var date2 = $('#jqxdatetimeinput2').jqxDateTimeInput('getText');
			 
	 	 
		   
			  
			  
			//   $.ajax({
		 
		//  success: function(html)
			   var data = generatedata(100);
			 
			 
		{
			 var theme = 'classic';
            var source =
            {     
			
			  
                
                datatype: "json",
                datafields: [
					 { name: 'prediag' },
					 { name: 'medman' } ,
				 	 { name: 'cdiag' } ,
		 
			 
                ],
                     type: "POST",
				  
				   url: "orthosur10.php",
                  data:jQuery.parseJSON( '{ "date":"'+date+'","date2":"'+date2+'" }' ),
		 
			   
		 
             }; 
			
			
			
            
           var dataAdapter = new $.jqx.dataAdapter(source);
            // initialize jqxGrid
            $("#orthosurgrid").jqxGrid(
            {
                width: 450,
                source: dataAdapter,                
                altrows: true,
                sortable: true,
                selectionmode: 'multiplecellsextended',
                columns: [
                   { text: 'prediag', datafield: 'prediag', width: 50 },
                  { text: 'medman', datafield: 'medman', width: 350 },
                  { text: 'cdiag', datafield: 'cdiag', width: 50 },
                 
                ]
            });
     
		 
           
		 
		}
		
		
		var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error);} }); 
           
		   
		   //  var dataadapter = new $.jqx.dataAdapter(source);
		   
		 //  alert(dataAdapter);
		   
		    // prepare jqxChart settings
          var settings = {
                title: "ศัลยกรรมกระดูก",
                description: " ",
                showLegend: true,
                enableAnimations: true,
                padding: { left: 5, top: 0, right: 5, bottom: 0 },
                titlePadding: { left: 90, top: 0, right: 0, bottom: 1 },
                source: dataAdapter,
                categoryAxis:
                    {
                        dataField: 'prediag',
                        showGridLines: true
                    },
                colorScheme: 'scheme01',
                seriesGroups:
                    [
                        {
                            type: 'column',
                            columnsGapPercent: 1,
                         //  columns: 50,
						    valueAxis:
                            {
                                unitInterval: 100,
                                displayValueAxis: true,
                                description: 'จำนวน '
                            },
                            series: [
                                    { dataField: 'cdiag', displayText: 'prediag'},
                                  //  { dataField: 'c5opd', displayText: 'icd10' }
                                ]
                        },
                        {
                            type: 'line',
                            valueAxis:
                            {
                                unitInterval: 5,
                                displayValueAxis: false,
                                description: 'Debt (% of GDP)'
                            },
                            series: [
                                    { dataField: 'cdiag', displayText: 'จำนวน', opacity:0.2 }
                                ]
                        }

                    ]
           
		   
		   
		   
		    };

		
		   $('#chartgenortho').jqxChart(settings);
		
		<!------refer  -->
		
		
		
		
		
		
		
		
		
		
	<!--	$("#excelExport2").jqxButton({ theme: theme }); -->
	  
		
		});//จบการส่งข้อมูล

	        
	   
	     });
  
  
  
   
  
  
   <!---  ped   -->
   
     
     
      
        $(document).ready(function () {
          $("#jqxdatetimeinput").jqxDateTimeInput({ width: '150px', height: '25px' });
           
        
		
		
		  $("#jqxdatetimeinput2").jqxDateTimeInput({ width: '150px', height: '25px' });
		
		   $("#getDateButton").click(function () {
                     var date = $('#jqxdatetimeinput').jqxDateTimeInput('getText');
                     var date2 = $('#jqxdatetimeinput2').jqxDateTimeInput('getText');
			 
	 	 
		   
			  
			  
			//   $.ajax({
		 
		//  success: function(html)
			   var data = generatedata(100);
			 
			 
		{
			 var theme = 'classic';
            var source =
            {     
			
			  
                
                datatype: "json",
                datafields: [
					 { name: 'prediag' },
					 { name: 'medman' } ,
				 	 { name: 'cdiag' } ,
		 
			 
                ],
                     type: "POST",
				  
				   url: "ped10.php",
                  data:jQuery.parseJSON( '{ "date":"'+date+'","date2":"'+date2+'" }' ),
		 
			   
		 
             }; 
			
			
			
            
           var dataAdapter = new $.jqx.dataAdapter(source);
            // initialize jqxGrid
            $("#pedgrid").jqxGrid(
            {
                width: 450,
                source: dataAdapter,                
                altrows: true,
                sortable: true,
                selectionmode: 'multiplecellsextended',
                columns: [
                   { text: 'prediag', datafield: 'prediag', width: 50 },
                  { text: 'medman', datafield: 'medman', width: 350 },
                  { text: 'cdiag', datafield: 'cdiag', width: 50 },
                 
                ]
            });
     
		 
           
		 
		}
		
		
		var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error);} }); 
           
		   
		   //  var dataadapter = new $.jqx.dataAdapter(source);
		   
		 //  alert(dataAdapter);
		   
		    // prepare jqxChart settings
          var settings = {
                title: "เด็ก",
                description: " ",
                showLegend: true,
                enableAnimations: true,
                padding: { left: 5, top: 0, right: 5, bottom: 0 },
                titlePadding: { left: 90, top: 0, right: 0, bottom: 1 },
                source: dataAdapter,
                categoryAxis:
                    {
                        dataField: 'prediag',
                        showGridLines: true
                    },
                colorScheme: 'scheme01',
                seriesGroups:
                    [
                        {
                            type: 'column',
                            columnsGapPercent: 1,
                         //  columns: 50,
						    valueAxis:
                            {
                                unitInterval: 100,
                                displayValueAxis: true,
                                description: 'จำนวน '
                            },
                            series: [
                                    { dataField: 'cdiag', displayText: 'prediag'},
                                  //  { dataField: 'c5opd', displayText: 'icd10' }
                                ]
                        },
                        {
                            type: 'line',
                            valueAxis:
                            {
                                unitInterval: 5,
                                displayValueAxis: false,
                                description: 'Debt (% of GDP)'
                            },
                            series: [
                                    { dataField: 'cdiag', displayText: 'จำนวน', opacity:0.2 }
                                ]
                        }

                    ]
           
		   
		   
		   
		    };

		
		   $('#chartped').jqxChart(settings);
		
		<!------refer  -->
		
		
		
		
		
		
		
		
		
		
	<!--	$("#excelExport2").jqxButton({ theme: theme }); -->
	  
		
		});//จบการส่งข้อมูล

	        
	   
	     });
  
  
  
    
    
   <!--GYN    -->
   
   
    
     
      
        $(document).ready(function () {
          $("#jqxdatetimeinput").jqxDateTimeInput({ width: '150px', height: '25px' });
           
        
		
		
		  $("#jqxdatetimeinput2").jqxDateTimeInput({ width: '150px', height: '25px' });
		
		   $("#getDateButton").click(function () {
                     var date = $('#jqxdatetimeinput').jqxDateTimeInput('getText');
                     var date2 = $('#jqxdatetimeinput2').jqxDateTimeInput('getText');
			 
	 	 
		   
			  
			  
			//   $.ajax({
		 
		//  success: function(html)
			   var data = generatedata(100);
			 
			 
		{
			 var theme = 'classic';
            var source =
            {     
			
			  
                
                datatype: "json",
                datafields: [
					 { name: 'prediag' },
					 { name: 'medman' } ,
				 	 { name: 'cdiag' } ,
		 
			 
                ],
                     type: "POST",
				  
				   url: "gyn10.php",
                  data:jQuery.parseJSON( '{ "date":"'+date+'","date2":"'+date2+'" }' ),
		 
			   
		 
             }; 
			
			
			
            
           var dataAdapter = new $.jqx.dataAdapter(source);
            // initialize jqxGrid
            $("#gyngrid").jqxGrid(
            {
                width: 450,
                source: dataAdapter,                
                altrows: true,
                sortable: true,
                selectionmode: 'multiplecellsextended',
                columns: [
                   { text: 'prediag', datafield: 'prediag', width: 50 },
                  { text: 'medman', datafield: 'medman', width: 350 },
                  { text: 'cdiag', datafield: 'cdiag', width: 50 },
                 
                ]
            });
     
		 
           
		 
		}
		
		
		var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error);} }); 
           
		   
		   //  var dataadapter = new $.jqx.dataAdapter(source);
		   
		 //  alert(dataAdapter);
		   
		    // prepare jqxChart settings
          var settings = {
                title: "สูตินารีเวช",
                description: " ",
                showLegend: true,
                enableAnimations: true,
                padding: { left: 5, top: 0, right: 5, bottom: 0 },
                titlePadding: { left: 90, top: 0, right: 0, bottom: 1 },
                source: dataAdapter,
                categoryAxis:
                    {
                        dataField: 'prediag',
                        showGridLines: true
                    },
                colorScheme: 'scheme01',
                seriesGroups:
                    [
                        {
                            type: 'column',
                            columnsGapPercent: 1,
                         //  columns: 50,
						    valueAxis:
                            {
                                unitInterval: 100,
                                displayValueAxis: true,
                                description: 'จำนวน '
                            },
                            series: [
                                    { dataField: 'cdiag', displayText: 'prediag'},
                                  //  { dataField: 'c5opd', displayText: 'icd10' }
                                ]
                        },
                        {
                            type: 'line',
                            valueAxis:
                            {
                                unitInterval: 5,
                                displayValueAxis: false,
                                description: 'Debt (% of GDP)'
                            },
                            series: [
                                    { dataField: 'cdiag', displayText: 'จำนวน', opacity:0.2 }
                                ]
                        }

                    ]
           
		   
		   
		   
		    };

		
		   $('#chartgyn').jqxChart(settings);
		
		<!------refer  -->
		
		
		
		
		
		
		
		
		
		
	<!--	$("#excelExport2").jqxButton({ theme: theme }); -->
	  
		
		});//จบการส่งข้อมูล

	        
	   
	     });
  
  
  
 