# twcccliphp

  
  sudo apt install build-essential python2.7 python2.7-dev
  
  conda create -n twcccli -c conda-forge python=2.7 jupyter notebook jupyter_contrib_nbextensions
  
  conda activate twcccli
  
  pip install pipenv
  
  mkdir git 
  
  cd git
  
  git clone https://github.com/TW-NCHC/TWCC-CLI
  
  cd TWCC-CLI/
  
  pipenv install
  
  pipenv run python src/test/gpu_cntr.py
  
  git clone https://github.com/c00cjz00/twcccliphp.git
  
  edit twcccliphp/php/00-containerFunc.php 
  
  B. 自動連線

cd ~/
ssh-keygen
create a container
ssh-copy-id -i ~/.ssh/id_rsa.pub c00cjz00@203.145.219.140 -p 57031
ssh -p 57031 c00cjz00@203.145.219.140
C. PHP code 連線

cd php
編輯configure file joe 00-containerFunc.php $twccCliBinPath="/home/ubuntu/git/TWCC-CLI";
建立容器 php 01-createContainer.php mytensorflow 1 TensorFlow 'tensorflow-19.11-tf2-py3:latest'
列出啟動內容 php 02-listContainer.php
ssh 連線派送指令 php 03-ssh2Container.php 766468 'pwd;date;ls;pwd;'
上傳檔案至container php 04-scpUploadToContainer.php 766594 '/home/c00cjz00/pythonCode' '/tmp/'
從container下載檔案 php 05-scpDownloadFromContainer.php 767011 '/tmp/model01.pkl' '/home/ubuntu/git/TWCC-CLI/php/model'
刪除容器 php 04-delContainer.php 766468
總和指令 mkdir -p /home/ubuntu/git/TWCCCLI2/model/ php demo.php mytorch 1 TensorFlow 'tensorflow-19.11-tf2-py3:latest'
'sudo -i pip install --upgrade pip; sleep 2; sudo -i pip install fastai; sleep 3; ipython ~/fastaiDemo/00-firstClass-TrainingSimple.ipynb;'
'/tmp/model01.pkl'
'/home/ubuntu/git/TWCCCLI2/model/'

