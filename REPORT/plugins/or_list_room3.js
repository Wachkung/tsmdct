$(document).ready(function () {
 setInterval(function(){
            var url = "./query/or_list_room_query3.php";
            var req =1;
            var source =
            {
                datatype: "json",
                datafields: [
           
            { name: 'id', type: 'string' }  ,  
            { name: 'fullname', type: 'string' }  ,
            { name: 'age', type: 'string' }  , 
            { name: 'icd10', type: 'string' } ,           
            { name: 'icd9name', type: 'string' } ,
            { name: 'docname', type: 'string' }  , 
             { name: 'ansx', type: 'string' } , 
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
            $("#showdiv3").jqxGrid(
            {
                width: true,
                source: dataAdapter,
                columnsresize: true,
                 autorowheight: true,
                autoheight: true,
                altrows: true,
                
             
            
               
                columns: [
                    
   
                    { text: 'No.', dataField: 'id', width:'5%', cellclassname: "bigfont1", renderer: columnsrenderer3, cellsrenderer: cellsrenderer3, },                         
                     { text: 'Name', dataField: 'fullname',  width:'30%' , cellclassname: "bigfont1", renderer: columnsrenderer2, cellsrenderer: cellsrenderer2, }, 
                    { text: 'Age', dataField: 'age',  width:'5%' , cellclassname: "bigfont1" , renderer: columnsrenderer3, cellsrenderer: cellsrenderer3,},   
                    { text: 'DX', dataField: 'icd10',  width:'5%' , cellclassname: "bigfont1", renderer: columnsrenderer, cellsrenderer: cellsrenderer,  }  ,
                     { text: 'Operation', dataField: 'icd9name',  width:'40%' , cellclassname: "bigfont1", renderer: columnsrenderer2, cellsrenderer: cellsrenderer2, }, 
                      { text: 'Dr', dataField: 'docname',  width:'10%' , cellclassname: "bigfont1", renderer: columnsrenderer2, cellsrenderer: cellsrenderer2, }, 
                       { text: 'Anes', dataField: 'ansx',  width:'5%' , cellclassname: "bigfont1", renderer: columnsrenderer, cellsrenderer: cellsrenderer,  }  
                        
           
              
                ]
            });





          var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"getTime.php",
                data:"rev=1",
                async:false,
                success:function(getData){
                    $("div#showTime").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText; 

         },1000);  
       
     });
 


  
