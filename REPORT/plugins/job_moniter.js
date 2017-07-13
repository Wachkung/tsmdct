$(document).ready(function () {
setInterval(function(){
            var url = "./query/job_moniter_query.php";
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
          

          var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"job_moniter_query.php",
                data:"rev=1",
                async:false,
                success:function(getData){
                    $("div#showTime").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }

        }).responseText; 

          },1000);  
    
     });
    
    


  
