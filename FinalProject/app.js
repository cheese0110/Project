window.fn = {};

window.fn.toggleMenu = function () {
  document.getElementById('appSplitter').left.toggle();
};
 
window.fn.loadView = function (index) {
  document.getElementById('appTabbar').setActiveTab(index);
  document.getElementById('sidemenu').close();
};

window.fn.loadLink = function (url) {
  window.open(url, '_blank');
};

window.fn.pushPage = function (page, anim) {
  if (anim) {
    document.getElementById('appNavigator').pushPage(page.id, { data: { title: page.title }, animation: anim });
  } else {
    document.getElementById('appNavigator').pushPage(page.id, { data: { title: page.title } });
  }
};


ons.getScriptPage().addEventListener('prechange', function (event) {
  if (event.target.matches('#appTabbar')) {
      event.currentTarget.querySelector('ons-toolbar .center').innerHTML = event.tabItem.getAttribute('label');
  }
});

$(function(){
     
  // เมื่อ submit form id myform1    
   $("#myform1").on("submit",function(){
          
       // เก็บชุดข้อมูลที่ต้องการส่งทั้งหมดไว้ในตัวแปร str
         var str=$("#myform1").serialize();
         $.post("getdata.php",str,function(data){ // ส่งข้อมูลแบบ post 
            console.log(data); // คืนค่า data จากข้อมูลที่แสดงในไฟล์ getdata.php
         });
         return false;  // ปิดการใช้งานการ submit form แบบปกติ
        
   });
      
 });