<?php
### Example: php 03-ssh2Container.php 766468 'sudo -i pip install fastai'
### Example: php 03-ssh2Container.php 767011 'ipython ~/fastaiDemo/00-firstClass-TrainingSimple.ipynb'

### 導入 Function, containerFunc.php
$dirBin=dirname(__FILE__);
include($dirBin."/00-containerFunc.php");

### 確認是否輸入 container ID
if (isset($argv[1]) && isset($argv[2])){
 ### 輸入 containerID
 $containerID=trim($argv[1]);
 $sshLinking=getContainerDetail($containerID);
 ### 輸入 command
 $myCmd=trim($argv[2]);
 $cmdMessage=sshCmd($sshLinking,$myCmd);
 echo $cmdMessage."\n";
}
