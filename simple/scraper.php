<?php
 $url = "";
 if(isset($argv) && isset($argv[1])){
        $url = $argv[1];
 }else{
        $url = "http://www.google.com";
 }
 $doc = new DOMDocument();
 @$doc->loadHTMLFile($url);
 $xpath = new DOMXPath($doc);
// $list = $xpath->evaluate("//div[contains(@class, 'TabbedPanelsContent TabbedPanelsContentVisible')]//td[contai$
 $list = $xpath->evaluate("//td[contains(@style, 'font-size:15px; font-family:Arial; color:#000 font-weight:normal;')]");
 $r = new ReflectionClass($list);
 $line="";
 foreach ($list as $element)
 {
   $line.= $element->nodeValue . ',';
 }
 $file = 'xys.Sd';
 $current = file_get_contents($file);
 $current.= "\n[" . date("Y-m-d") . "]\n" . $line;
 file_put_contents($file, $current);
 ?>

