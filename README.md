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
   echo '<pre>',print_r($args,1),'</pre>';  
*}*  

*cURLManager::call('https://www.boredapi.com/api/activity');*     
