# cURLManager
An simple cURL call manager with PHP

The Class main function is the call function which as 5 overloads :    
  *&ensp;cURLManager::call($link)*  
  *&ensp;cURLManager::call($link,$method)*   
  *&ensp;cURLManager::call($link,$method,$data)*  
  *&ensp;cURLManager::call($link,$method,$data,$headers)*  
  *&ensp;cURLManager::call($link,$method,$data,$headers,$resultFlag)*

Basic Usage

*require_once('vendor\autoload.php');*    
*use thecodeisbae\cURLManager;*    
    
*function debug($args)*    
*{*  
    *&ensp;echo '\<pre\>',print_r($args,1),'\<\/pre\>';*  
*}*  

*debug(*cURLManager::call('https://randomuser.me/api/')*)*;    
