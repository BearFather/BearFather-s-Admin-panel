#!/bin/bash
# check for root
FILE="/tmp/out.$$"
GREP="/bin/grep"
if [[ $EUID -ne 0 ]]; then
   echo "This script must be run as root" 1>&2
   exit 1
else
#-----------------------------
#Install starts here.
#Checking for rdiff, and unrar/rar
check="$(dpkg -l | grep rdiff-backup)"
if [ -z "$check" ];
then
        echo "its not installed"
        apt-get install -y rdiff-backup
else
        echo "its installed"
        echo $check
fi
check=""
check="$(dpkg -l | grep unrar)"
if [ -z "$check" ];
then
        echo "its not installed"
        apt-get install -y unrar
else
        echo "its installed"
        echo $check
fi
check=""
check="$(dpkg -l | grep rar)"
if [ -z "$check" ];
then
        echo "its not installed"
        apt-get install -y rar
else
        echo "its installed"
        echo $check
fi

#run time!

clear
run=1
ps1='Option:'
que="Type 'Install' to continue with install."
strt=1
while [ $run = 1 ]; do
echo -e "                         \E[1;31mBearFather's Web Installer"
echo -e "\E[1;31m=============================================================================="
tput sgr0
echo -e "This is a simple install script.  It will ask you a few questions about your"
echo -e "setup of your software installed on your computer.  This is for linux, and if"
echo -e "you got this far on windows congrars.  If at any time you don't know enter is"
echo -e "you best choice."
echo -e ""
echo -e "I hope you enjoy."
echo -e ""
echo -e "If you find a bug you can email me at:"
echo -e "BearFather@gmail.com"
echo -e "Subject line 'MCscript'"
echo -e ""
echo -e ""
echo -e ""
echo -e ""
echo -e "$info"
echo -e "$info2"
echo -e ""
echo -e ""
echo -e $que
read awn

if [ "$awn" == "stop" ]; then
  run=0
fi

if [ "$awn" == "install" ] || [ "$awn" == "Install" ] || [ "$awn" == "INSTALL" ] || [ "$awn" == "Install " ]; then
 if [ "$strt" -eq "1" ]; then
  spot="install"
  rm set.temp
  rm web.temp
  strt=0
 fi
fi

if [ "$db" -eq "1" ]; then
 if [ "$awn" == "yes" ] || [ "$awn" == "Yes" ] || [ "$awn" == "YES" ]; then
 spot="dbque"
 dbq="dbtloc"
 dbon="true"
  que="Where to put temp files for dropbox?"
  db=2
  clear
 elif [ "$awn" == "no" ] || [ "$awn" == "No" ] || [ "$awn" == "NO" ]; then
  spot="dbque"
  dbq="w1"
  dbon="false"
  dbtloc="none"
  dbloc="none"
  dbploc="none"
  info="This section you can list up to 9 worlds, the scripts will backup and restore"
  info2="these worlds only.  Leave the name blank for no more worlds."
  que="Name of your first world? 'w1'"
  db=0
  clear
 else
 spot="blah"
 fi
fi


case "$spot" in
 "install" )
  que="What dir is your Minecraft installed too?"
  spot="mcdir"
  clear
 ;;
 "mcdir" )
 mcloc=$awn
 que="What dir do you want to install the bash scripts too?"
 spot="scdir"
 clear
 ;;
 "scdir" )
 scloc=$awn
 que="Where do you want to put the backup's?"
 spot="bkdir"
 clear
 ;;
 "bkdir" )
 bkloc=$awn
 que="Where do you want daemon installed too."
 spot="fddir"
 clear
 ;;
 "fddir" )
 fdloc=$awn
 que="How much ram for the MC server?"
 spot="ram"
 clear
 ;;
 "ram" )
 rmamo=$awn
 que="What is the internal IP for the server?(ex: 192.168.1.102)"
 spot="ip"
 clear
 ;;
 "ip" )
 ip=$awn
 que="What do you want for daemon password?"
 spot="ps"
 clear
 ;;
 "ps" )
 ps=$awn
 que="What is the rcon port?"
 spot="rpt"
 clear
 ;;
 "rpt" )
 rpt=$awn
 que="What is the rcon password?"
 spot="rps"
 clear
 ;;
 "rps" )
 rps=$awn
 que="Do you want to use DropBox for backups? 'yes/no'(DISABLED)"
 db=1
 spot="dbque"
 clear
 ;;
 "dbque" )
 spot=$dbq
 ;;
 "dbtloc" )
 dbtloc=$awn
 que="Where is your dropbox location and where in it do you want the backup?"
 spot="dbloc"
 clear
 ;;
 "dbloc" )
 dbloc=$awn
 que="Where is your dropbox.py?"
 spot="dbploc"
 clear
 ;;
 "dbploc" )
 dbploc=$awn
 que="Name of your first world? 'w1'"
 spot="w1"
 clear
 ;;
 "w1" )
 w1=$awn
 que="Name of your second world? 'w2'"
 spot="w2"
 clear
 ;;
 "w2" )
 w2=$awn
 que="Name of your third world? 'w3'"
 spot="w3"
 clear
 ;;
 "w3" )
 w3=$awn
 que="Name of your forth world? 'w4'"
 spot="w4"
 clear
 ;;
 "w4" )
 w4=$awn
 que="Name of your fifth world? 'w5'"
 spot="w5"
 clear
 ;;
 "w5" )
 w5=$awn
 que="Name of your sixth world? 'w6'"
 spot="w6"
 clear
 ;;
 "w6" )
 w6=$awn
 que="Name of your seventh world? 'w7'"
 spot="w7"
 clear
 ;;
 "w7" )
 w7=$awn
 que="Name of your eigth world? 'w8'"
 spot="w8"
 clear
 ;;
 "w8" )
 w8=$awn
 que="Name of your ninth world? 'w9'"
 spot="w9"
 clear
 ;;
 "w9" )
 w9=$awn
 que="Name of your second world? 'w2'"
 run=0
 spot="finish"
 clear
 ;;

 * )
  clear
  echo -e "*Input*$awn*Input*"
  echo -e "*Spot*$spot*Spot*"
  echo -e "\E[1;31m\E[1;5mNo valid option chosen\E[1;0m"
 ;;
esac
done


# Make the config files from the templates.
echo "Creating config files..."
sed -e "s|{sc1}|$scloc/web.cmd|" web.su >web.sudo
#new template system
touch settings.php
touch settings.web
php dinstall.php $ps $mcloc $scloc $fdloc $ip $rpt "'$rps'"
php sinstall.php $scloc $bkloc $mcloc $rmamo $dbon $dbtloc $dbloc $dbtloc $w1 $w2 $w3 $w4 $w5 $w6 $w7 $w8 $w9

# copying files
echo ""
echo ""
echo "Creating directories and copying files....."
mkdir $fdloc
mkdir $scloc
mkdir $bkloc
mkdir $dbtloc
mkdir $dbloc
mkdir $mcloc/uploads
chmod 777 $mcloc/uploads
mkdir $mcloc/logs
unrar x scripts.rar $scloc
unrar x dae.rar $fdloc
mv settings.web $scloc
mv settings.php $fdloc
mv mcdaemon /bin
mv web.sudo /etc/sudoers.d/web
chmod 0440 /etc/sudoers.d/web
/etc/init.d/sudo restart

#Making php uploads to 100M
echo "Making php except bigger files......."
pini=$(find / -name php.ini | grep apache2/php.ini)
echo post_max_size = 100M >> $pini
echo upload_max_filesize = 100M >> $pini
/etc/init.d/apache2 restart

#setting digest account
#echo "Settng up web account........."
#if [ ! -e "/etc/apache2/mods-enabled/auth_digest.load" ]; then
#cp /etc/apache2/mods-available/auth_digest.load /etc/apache2/mods-enabled/auth_digest.load
#/etc/init.d/apache2 restart
#fi
#echo "What username do you want for web access"
#read usern
#sed -e "s|{sc}|$scloc/ht.admin|" -e "s|{un}|$usern|" ht.acc >.htaccess
#mv .htaccess $fdloc
#htdigest -c $scloc/ht.admin admin $usern

echo ""
echo ""
echo "Setup is complete."
echo "Make sure you have Rcon/Query port enabled in server.properties"
echo "enable-query=true"
echo "enable-rcon=true"
echo "query.port=25565"
echo "rcon.port=25575"
echo ""
echo " Need to add a crontab for autobackup.  'crontab -e'"
echo " exp. '*/60 * * * * $scloc/backup.cmd' Would backup once an hr."
echo ""
echo ""
echo "Run 'mcdaemon' to start mc daemon"
echo "It will start in a screen named 'dmc'"
echo ""
echo "GoodBye!"

exit 0
#-------END OF Install
fi
