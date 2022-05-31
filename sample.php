<?php

require 'cURLManager.php';
use thecodeisbae\cURLManager;

function debug($args) : void
{
    echo '<pre>',print_r($args,1),'</pre>';
    die;
}

debug(cURLManager::call("https://catfact.ninja/fact",'GET'));
