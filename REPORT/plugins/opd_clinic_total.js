$(document).ready(function () {
            var url = "./query/opd_clinic_total_query.php";
            var req =1;
            var source =
            {
                datatype: "json",
                datafields: [
           
            { name: 'id', type: 'string' }  ,  
            { name: 'namecln', type: 'string' }  ,
            { name: 'cHN', type: 'string' }              
              
                ],
               
                url: url,
                root: 'data',                
                async:false,  
                data:jQuery.parseJSON( '{ "req":"'+req+'" }' ),

            };
         
           var cellsrenderer = function (row, column, value) {
    return '<div style="text-align: center; margin-top: 5px;">' + value + '</div>';
}
var columnsrenderer = function (value) {
    return '<div style="text-align: center; margin-top: 5px;">' + value + '</div>';
}
           var cellsrenderer2 = function (row, column, value) {
    return '<div style="text-align: left; margin-top: 5px;">' + value + '</div>';
}
var columnsrenderer2 = function (value) {
    return '<div style="text-align: center; margin-top: 5px;">' + value + '</div>';
}
           var cellsrenderer3 = function (row, column, value) {
    return '<div style="text-align: center; margin-top: 5px;">' + value + '</div>';
}
var columnsrenderer3 = function (value) {
    return '<div style="text-align: center; margin-top: 5px;">' + value + '</div>';
}

            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#showdiv").jqxGrid(
            {
                    width: '99%',
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
             
            
               
                columns: [
                    
                    { text: 'ลำดับ', dataField: 'id', width:'10%', cellclassname: "bigfont3", renderer: columnsrenderer3, cellsrenderer: cellsrenderer3, },  
                    { text: 'คลีนิค', dataField: 'namecln',  width:'68%' , cellclassname: "bigfont2", renderer: columnsrenderer2, cellsrenderer: cellsrenderer2, }, 
                    { text: 'จำนวนคน', dataField: 'cHN',  width:'22%' , cellclassname: "bigfont3" , renderer: columnsrenderer3, cellsrenderer: cellsrenderer3,}
                        
                         ]
            });

      
    
     });
