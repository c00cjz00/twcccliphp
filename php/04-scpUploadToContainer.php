<?php
### Example: php 04-scpUploadToContainer.php 766594 'pythonCode' '/tmp/'
### 導入 Function, containerFunc.php
$dirBin=dirname(__FILE__);
include($dirBin."/00-containerFunc.php");

### 確認是否輸入 container ID
if (isset($argv[1]) && isset($argv[2])){
 ### 輸入 containerID
 $containerID=trim($argv[1]);
 $sshLinking=getContainerDetail($containerID);
 ### 輸入 傳輸位置
 $localDir=trim($argv[2]); 
 $remoteDir=trim($argv[3]);
 $cmdMessage=scpLocal2Remote($sshLinking,$localDir,$remoteDir);
 echo $cmdMessage."\n";
}
