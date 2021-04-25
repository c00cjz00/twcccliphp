<?php
$twccCliBinPath="/home/ubuntu/git/TWCC-CLI";

function createContainer($containerName,$containerGpuNum,$containerSol,$containerImg){
 global $twccCliBinPath;
 $containerID="";
 $cmd="cd $twccCliBinPath ; pipenv run python src/test/gpu_cntr.py create-cntr -cntr $containerName -gpu $containerGpuNum -sol $containerSol -img $containerImg";
 $tmp=shell_exec($cmd);
 $tmpArr=explode("Site id: ",$tmp);
 if (count($tmpArr)==2){
  $tmp=trim($tmpArr[1]);
  $tmpArr=explode("is created",$tmp);
  if (count($tmpArr)==2){
   $containerID=trim($tmpArr[0]);
  }
 }
 return $containerID;
}

function getContainerDetail($containerID){
 global $twccCliBinPath;
 $cmd="cd $twccCliBinPath ; pipenv run python src/test/gpu_cntr.py list-cntr -site $containerID -table False";
 $tmp=trim(shell_exec($cmd));
 $tmpArr=explode("\n",$tmp);
 $result=trim($tmpArr[2]);
 return $result;
}
function delContainer($containerID){
 global $twccCliBinPath;
 $cmd="cd $twccCliBinPath ; pipenv run python src/test/gpu_cntr.py del-cntr $containerID";
 $result=trim(shell_exec($cmd));
 return $result;
} 

function sshCmd($sshLinking,$myCmd){
 //-o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null
 $cmd="ssh -o StrictHostKeyChecking=no ".$sshLinking." '".$myCmd."'";
 echo $cmd."\n";
 $result=trim(shell_exec($cmd));
 return $result;
}

function scpLocal2Remote($sshLinking,$localDir,$remoteDir){
 $tmpArr=explode(" -p ",$sshLinking);
 if (count($tmpArr)==2){
  $remoteHost=$tmpArr[0]; $remotePort=$tmpArr[1];
  $cmd="scp -o StrictHostKeyChecking=no -r -P $remotePort $localDir $remoteHost:$remoteDir";
  echo $cmd."\n";
  //exit();
  $result=trim(shell_exec($cmd));
  return $result;
 }
}

function scpRemote2Local($sshLinking,$remoteDir,$localDir){
 $tmpArr=explode(" -p ",$sshLinking);
 if (count($tmpArr)==2){
  $remoteHost=$tmpArr[0]; $remotePort=$tmpArr[1];
  $cmd="scp -o StrictHostKeyChecking=no -r -P $remotePort $remoteHost:$remoteDir $localDir";
  echo $cmd."\n";
  $result=trim(shell_exec($cmd));
  return $result;
 }
}


function listContainer(){
 global $twccCliBinPath;
 $cmd="cd $twccCliBinPath; pwd; pipenv run python src/test/gpu_cntr.py list-cntr -all";
 $tmp=trim(shell_exec($cmd));
 $tmpArr=explode("\n",$tmp);
 for($i=5;$i<(count($tmpArr)-1);$i++){
  $tmp=trim($tmpArr[$i]);
  $smpArr=explode("|",$tmp);
  $containerID=trim($smpArr[1]);
  $containerName=trim($smpArr[2]);
  $containerList[$containerID]=$containerName;
 }
 return $containerList;
}