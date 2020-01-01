<?php
### Example: php 05-scpDownloadFromContainer.php 766594 '/tmp/php' '/tmp/php2/'
### Example: php 05-scpDownloadFromContainer.php 767011 '/tmp/model01.pkl' '/home/ubuntu/git/TWCC-CLI/php/model'
### 導入 Function, containerFunc.php
$dirBin=dirname(__FILE__);
include($dirBin."/00-containerFunc.php");

### 確認是否輸入 container ID
if (isset($argv[1]) && isset($argv[2])){
 ### 輸入 containerID
 $containerID=trim($argv[1]);
 $sshLinking=getContainerDetail($containerID);
 ### 輸入 傳輸位置
 $remoteDir=trim($argv[2]);
 $localDir=trim($argv[3]); 
 $cmdMessage=scpRemote2Local($sshLinking,$remoteDir,$localDir);
 echo $cmdMessage."\n";
}
