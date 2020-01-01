<?php
### Example: php 01-createContainer.php mytorch 1  PyTorch 'pytorch-19.11-py3:latest'

### 建立變數條件 
if (isset($argv[1])) { $containerName=trim($argv[1]); } else { $containerName="mytorch"; }
if (isset($argv[2])) { $containerGpuNum=trim($argv[2]); } else { $containerGpuNum="1"; }
if (isset($argv[3])) { $containerSol=trim($argv[3]); } else { $containerSol="PyTorch"; }
if (isset($argv[4])) { $containerImg=trim($argv[4]); } else { $containerImg="pytorch-19.11-py3:latest"; }

### 導入 Function, containerFunc.php
$dirBin=dirname(__FILE__);
include($dirBin."/00-containerFunc.php");

### 建立 Container, 並取得ID, containerID: 766387
$containerID=createContainer($containerName,$containerGpuNum,$containerSol,$containerImg);
echo "containerID: ".$containerID."\n";

### 取得連線方式內容, c00cjz00@203.145.219.140 -p 51692 
$containerTable=getContainerDetail($containerID);
echo $containerTable."\n";
