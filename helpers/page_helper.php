<?php
 function form_wrap_open(){
   $html="<div style='background-color:#fff;padding:20px;border:.5px solid gray; box-shadow: 3px 7px 12px .5px gray ; border-radius:0px;margin-top:10px'>";
   
   return $html; 
}

 function form_wrap_close(){
   $html="</div>";
   return $html;
 }

 function table_wrap_open(){
    $html="<div style='background-color:rgb(219, 252, 241);padding:10px; border-radius:10px;border:2px solid black;margin-top:10px'>";
    
    return $html; 
 }
 
  function table_wrap_close(){
    $html="</div>";
 
    return $html;
  }
?>