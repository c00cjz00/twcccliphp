<?php
/*
### Example: 
php demo.php mytorch 1 TensorFlow 'tensorflow-19.11-tf2-py3:latest' \
'sudo -i pip install --upgrade pip; sleep 2; sudo -i pip install fastai; sleep 3; ipython ~/fastaiDemo/00-firstClass-TrainingSimple.ipynb;' \
'/tmp/model01.pkl' \
'/home/ubuntu/git/TWCC-CLI/php/model/'
*/
### 建立變數條件 
if (isset($argv[1])) { $containerName=trim($argv[1]); } else { $containerName="mytorch"; }
if (isset($argv[2])) { $containerGpuNum=trim($argv[2]); } else { $containerGpuNum="1"; }
if (isset($argv[3])) { $containerSol=trim($argv[3]); } else { $containerSol="PyTorch"; }
if (isset($argv[4])) { $containerImg=trim($argv[4]); } else { $containerImg="pytorch-19.11-py3:latest"; }
if (isset($argv[5])) { $myCmd=trim($argv[5]); } else { $myCmd="sudo -i pip install --upgrade pip; sleep 2; sudo -i pip install fastai; sleep 3; ipython ~/fastaiDemo/00-firstClass-TrainingSimple.ipynb; "; }
if (isset($argv[6])) { $remoteDir=trim($argv[6]); } else { $remoteDir="/tmp/model01.pkl"; }
if (isset($argv[7])) { $localDir=trim($argv[7]); } else { $localDir="home/ubuntu/git/TWCC-CLI/php/model/"; }


### 導入 Function, containerFunc.php
$dirBin=dirname(__FILE__);
include($dirBin."/00-containerFunc.php");

### 建立 Container, 並取得ID, containerID: 766387
$containerID=createContainer($containerName,$containerGpuNum,$containerSol,$containerImg);
echo "containerID: ".$containerID."\n";

### 取得連線方式內容, c00cjz00@203.145.219.140 -p 51692 
$sshLinking=getContainerDetail($containerID);
echo $sshLinking."\n";

### 輸入 command, 訓練相關指令
$cmdMessage=sshCmd($sshLinking,$myCmd);
echo $cmdMessage."\n";

### 輸入傳輸位置, 取回model 
$cmdMessage=scpRemote2Local($sshLinking,$remoteDir,$localDir);
echo $cmdMessage."\n";

### 刪除 container
$delMesssage=delContainer($containerID);
echo "Delete containerID: ".$containerID.", ".$delMesssage."\n";