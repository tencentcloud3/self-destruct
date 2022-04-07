#!/bin/bash

# Linux命令参考

# MySQL命令行
mysql -h 127.0.0.1 -u root -p

# 重启Apache
sudo /usr/local/lighthouse/softwares/apache/bin/apachectl restart

# 修改网站文件所在目录的访问权限
sudo chmod -R 666 /home/www/htdocs

# curl -i -d "action=sendMsg&msg=`date`" http://127.0.0.1/Action.php > /dev/null 2>&1
