$(document).ready(function () {
            var url = "./query/job_m_today_ipt.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                  
                      {name: 'nameidpm', type: 'string' },
                       {name: 'job_total', type: 'string' },
                          {name: 'job_born', type: 'string' },
                        {name: 'job_add', type: 'string' },
                         {name: 'job_dischg', type: 'string' },
                          {name: 'job_refer', type: 'string' },
					
            {name: 'job_escape', type: 'string' },
                          {name: 'job_dead_au', type: 'string' },
				
             {name: 'job_move_out', type: 'string' },
            
             {name: 'job_move_in', type: 'string' },
            {name: 'job_end_m', type: 'string' }
					  
              
		   
			  
			  
			  
			    ],
               
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdivjobm").jqxGrid(
            {
           width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			   
			    columns: [
                    
                     { text: '    ตึก    ', dataField: 'nameidpm' },
			    { text: 'ยกมา(ช)', dataField: 'job_total' },
                          { text: 'คลอด', dataField: 'job_born' },              
                               { text: 'admitted', dataField: 'job_add' },
                                  { text: 'จำหน่าย', dataField: 'job_dischg' },
			          { text: 'refer', dataField: 'job_refer' },
             { text: 'หนี', dataField: 'job_escape' },
                               { text: 'ตาย', dataField: 'job_dead_au' },
                            { text: 'ย้ายไป', dataField: 'job_move_out' },        
			   
              { text: 'รับย้าย', dataField: 'job_move_in' },    
            { text: '   รวม(ช)   ', dataField: 'job_end_m' }
			    ]
            });

 $("#excelExportjobm").click(function () {
                $("#showdivjobm").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
            
            


        });
	   