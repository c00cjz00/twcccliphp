<?php
### Example: php 02-listContainer.php  or  php 02-listContainer.php $containerID
### 導入 Function, containerFunc.php
$dirBin=dirname(__FILE__);
include($dirBin."/00-containerFunc.php");

### 確認是否輸入 container ID
if (isset($argv[1])){
 ### 輸入 containerID
 $containerID=trim($argv[1]);
 $sshLinking=getContainerDetail($containerID);
 echo "containerID: ".$containerID." ".$sshLinking."\n";
}else{
 ### list all container
 $containerList=listContainer();
 foreach ($containerList as $containerID => $containerName) {
  $sshLinking=getContainerDetail($containerID);
  echo "containerID: ".$containerID." ".$containerName." ".$sshLinking."\n";
 }
}
