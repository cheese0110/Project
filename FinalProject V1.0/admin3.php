<!DOCTYPE html> 
<html>
    <head>

        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">        
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="http://code.highcharts.com/stock/highstock.js"></script>
    <script src="http://code.highcharts.com/stock/modules/exporting.js"></script>
  <script>
$(document).ready(function() {
 
 $("#btn1").click(function(){ //อ้างอิงจาก button id = btn1
   year= $("#year").val(); //ตัวแปรวันที่เริ่มต้น เพื่อส่งค่าไป
  $.ajax({  // get ค่า วันที่ ไปที่ไฟล์ test2.php
            type: "GET",
            url: "admin2.php",
   data: "year="+year,
            dataType: "xml",
   beforeSend: function() {
    $("#container").html("<center><img src=\"http://www.jlg.com/images/layout/loadingGif.gif\" alt=\"Loading...\"/></center>");
   },
   success: function(xml) { // รับค่ามาเป็น xml
    // Split the lines
    var $xml = $(xml);
    
    // push categories
    $xml.find('categories item').each(function(i, category) { 
     options.xAxis.categories.push($(category).text());
    });
    
    // push series
    $xml.find('series').each(function(i, series) {
     var seriesOptions = {
      name: $(series).find('name').text(),
      data: []
     };
     
     // push data points
     $(series).find('data point').each(function(i, point) {
      seriesOptions.data.push(
       parseInt($(point).text())
      );
     });
     
     // add it to the options
     options.series.push(seriesOptions);
    });
    var chart = new Highcharts.Chart(options);
    },
     cache: false
   });
   //จบ get ajax
   
   
   //เริ่ม chart
   var options = {
      chart: {
                            renderTo: 'container',
                            type: 'column'
                        },
      
                        title: {
                            text: 'จำนวนอาหารที่ขายดี'
                        },
                        subtitle: {
                            text: ''
                        },
                        xAxis: {
       categories: []
      },
                        yAxis: {
                            title: {
                                text: null
                            },
                            labels: {
                                formatter: function() {
                                    //return (Math.abs(this.value));
                                    return Highcharts.numberFormat(Math.abs(this.value), 0,',');
                                    
                                }
                            },
                        },
         legend: {
                            layout: 'horizontal ',
                            align: 'botton',
                            verticalAlign: 'top',
                            x: -10,
                            y: 100,
                            borderWidth: 0
            },
                        plotOptions: {
                            column: {
                       dataLabels: {
                          enabled: true
                      },
                      enableMouseTracking: true,
     
                  }

                        },
                        tooltip: {
                         enabled: true,
                    formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                          this.x +': '+ this.y +' รายการ';
                   }

                        },
           
                        series: []
   };
  });
 });


        </script>
    </head> 
    <body><center>
    <table><tr><td>ปี : </td><td>
      <select name='year' id='year'>
   <option value='2018'>2561</option>
   <option value='2017'>2560</option>
   <option value='2016'>2559</option>
   <option value='2015'>2558</option>
   <option value='2014'>2557</option>
   <option value='2013'>2556</option>
   <option value='2012'>2555</option>
   <option value='2011'>2554</option>
   <option value='2010'>2553</option>
   <option value='2009'>2552</option>
   <option value='2008'>2551</option>
   <option value='2007'>2550</option>
   <option value='2006'>2549</option>
   <option value='2005'>2548</option>
   <option value='2004'>2547</option>
   <option value='2003'>2546</option>
   <option value='2002'>2545</option>
   <option value='2001'>2544</option>
   <option value='2000'>2543</option>
   <option value='1999'>2542</option>
   <option value='1998'>2541</option>
   <option value='1997'>2540</option>
   <option value='1996'>2539</option>
   <option value='1995'>2538</option>
   <option value='1994'>2537</option>
   <option value='1993'>2536</option>
   <option value='1992'>2535</option></select></td><td><input type='button' id='btn1' name='btn1' value='ประมวลผล'></td></tr></table>
                <div id="container" style="min-width: 320px; height: 500px; margin: 0 auto"></div>
    </center>       
    </body>
</html>