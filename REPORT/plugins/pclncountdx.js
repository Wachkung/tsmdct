$(document).ready(function () {
            var url = "./query/qclncountdx_hpt.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
					  {name: 'icd10name', type: 'string' },
					 
					 { name: 'c5opd', type: 'string' } 			  
			    ],              
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#shwclncountdx_hpt").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10'  },
                     { text: 'ชื่อโรค', dataField: 'icd10name' },
		     { text: 'จำนวน(ครั้ง)', dataField: 'c5opd'}			  
			    ]
            });
        });
$(document).ready(function () {
            var url = "qclncountdx_hpt_1.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
					  {name: 'icd10name', type: 'string' },
					 
					 { name: 'c5opd', type: 'string' } 			  
			    ],              
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#shwclncountdx_hpt_1").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10'  },
                     { text: 'ชื่อโรค', dataField: 'icd10name' },
		     { text: 'จำนวน(ครั้ง)', dataField: 'c5opd'}			  
			    ]
            });
        });
$(document).ready(function () {
            var url = "qclncountdx_hpt_2.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'icd10', type: 'string' },
					  {name: 'icd10name', type: 'string' },
					 
					 { name: 'c5opd', type: 'string' } 			  
			    ],              
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#shwclncountdx_hpt_2").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,			   
			    columns: [
                     { text: 'รหัสโรค', dataField: 'icd10'  },
                     { text: 'ชื่อโรค', dataField: 'icd10name' },
		     { text: 'จำนวน(ครั้ง)', dataField: 'c5opd'}			  
			    ]
            });
        });
	   