<?php
### Example: php 04-delContainer.php 766468 
### 導入 Function, containerFunc.php
$dirBin=dirname(__FILE__);
include($dirBin."/00-containerFunc.php");

### 確認是否輸入 container ID
if (isset($argv[1])){
 ### 輸入 containerID
 $containerID=trim($argv[1]);
 $delMesssage=delContainer($containerID);
 echo "Delete containerID: ".$containerID.", ".$delMesssage."\n";
}
