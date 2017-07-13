$(document).ready(function () {
            var url = "./query/today_opd_total.php";
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                     {name: 'namecln', type: 'string' },
					  {name: 'cns2', type: 'string' }
			    ],
                url: url,
                root: 'data'
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdivopdt").jqxGrid(
            {
           width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
			   
			    columns: [
                     { text: 'รวมทั้งสิ้น', dataField: 'namecln'  },
                     { text: 'จำนวน', dataField: 'cns2' }
			    ]
            });

 $("#excelExportopdt").click(function () {
                $("#showdivopdt").jqxGrid('exportdata', 'xls', 'jqxGrid');           
            });
        });