#!/bin/sh

##############################################################################
#
# Script: backup.sh
# Description:
#   This script will create both a quick database backup and a filesystem
#   backup of the configured website. The completed tarball will be created
#   within the defined backups directory. The point of this is script is to
#   simply create a fast and easy way to make a backup of the current site
#   and it's data (which is useful when you don't have a net connection)
#   and would like to commit the files to a subversion or git repo.
#
# Date: 2012-08-12 - August 12th, 2012
#
# Things to do:
#   - Add the ability to add / commit files to GIT (but prompt the user first)
#

#-------------------------------------------------------------------------
# SCRIPT CONFIGURATION
#-------------------------------------------------------------------------
dateNow=$(date +"%Y-%m-%d_%s")
siteName="html5"
rootDirectory="/www/html5"
backupsDirectory="/home/rladd/backups"
backupFilename="${siteName}_${dateNow}.tar.gz"
commandTar="/bin/tar"
commandMysqldump="/usr/bin/mysqldump"
commandBzip2="/usr/bin/bzip2"
commandGit="/usr/bin/git"
commandGitAddFiles="${commandGit} add ${rootDirectory} "
commandGitCommitFiles="${commandGit} commit  "
commandGitPushFiles="${commandGit} push origin master"
commandClear="/usr/bin/clear"
commandTput="/usr/bin/tput sgr0"
repoName="html5"
databaseHost="localhost"
databaseName="tenacious"
databaseUser="tenacious"
databasePass="tenacious"
releaseAuthor="Ross Ladd"
releaseVersion="1.2a"
releaseDate="2012-05-05"

#-------------------------------------------------------------------------
# Color Definition
#-------------------------------------------------------------------------
colorBlack='\E[30;40m'
colorRed='\E[31;40m'
colorGreen='\E[0;92m'
colorYellow='\E[33;47m'
colorBlue='\E[34;40m'
colorBlueWhite='\E[34;47m'
colorMagenta='\E[35;47m'
colorCyan='\E[36;1m'
colorWhite='\E[37;40m'
colorWhiteBold='\e[1;97m'
colorBackgroundWhite="\e[47m"
colorBackgroundBlack="\e[40m"
colorClear="\e[0m"
colorBoldMenu="\e[1;47m"
colorTitle="\e{1;37m"

#-------------------------------------------------------------------------
# Script Variables
#-------------------------------------------------------------------------
exitStatus="0"

#-------------------------------------------------------------------------
# Screen Initialization
#-------------------------------------------------------------------------
${commandClear}
echo -e ${colorBacakgroundWhite}
echo -e "${colorBlack} ${colorBackgroundWhite} -------------------------------------------------------------------- ${colorClear} "
echo -e " ${colorBackgroundWhite}  ${colorBlueWhite}${siteName} - Website Backup Script${colorBackgroundWhite}                                   ${colorClear} "
echo -e "${colorBlack} ${colorBackgroundWhite} -------------------------------------------------------------------- ${colorClear} "
echo -e "${colorBlack} ${colorBackgroundWhite}  ${colorBoldMenu}Author${colorBlack}${colorBackgroundWhite}: ${releaseAuthor}                                                   ${colorClear} "
echo -e "${colorBlack} ${colorBackgroundWhite}  Date: ${releaseDate}                                                    ${colorClear} "
echo -e "${colorBlack} ${colorBackgroundWhite}  Version: ${releaseVersion}                                                       ${colorClear} "
echo -e "${colorBlack} ${colorBackgroundWhite}  Copyright: (c) 2012 Element63                                       ${colorClear} "
echo -e "${colorBlack} ${colorBackgroundWhite} -------------------------------------------------------------------- ${colorClear} "
echo -e ${colorClear}
${commandTput}

#-------------------------------------------------------------------------
# Build our commands for database extraction and backup / compression
#-------------------------------------------------------------------------
commandTarball="${commandTar} czfP ${backupsDirectory}/${backupFilename} ${rootDirectory}/*"

#-------------------------------------------------------------------------
# Confirm Script Execution
#-------------------------------------------------------------------------
echo -e "${colorClear}${colorWhiteBold}"
read -p "  Would you like to begin the backup procedure? [Y/n] "
echo -e ${colorClear} ${colorWhite}
if [[ $REPLY == "y" || $REPLY == "Y" || $REPLY == "" ]]; then
	echo -e "${colorCyan}    Beginning the backup process. ${colorClear} ${colorWhite} "
else
	exit 0
	echo
fi
${commandTput}

#-------------------------------------------------------------------------
# Script Execution - Time to run the commands!
#-------------------------------------------------------------------------
echo
echo -e "    ${colorWhite}[${colorGreen}*${colorWhite}] Creating database backup."
# Removed temporarily so that we can make just one file...
$commandMysqldump -h $databaseHost --user="$databaseUser" --password="$databasePass" $databaseName > ./database/${databaseName}_${dateNow}.sql
$commandBzip2 ./database/${databaseName}_${dateNow}.sql

echo
#echo -e "${colorClear}${colorBackgroundBlack}"
echo -e "    ${colorWhite}[${colorGreen}*${colorWhite}] Creating website backup / tarball."
$commandTarball
#echo -e "${colorClear}"

#-------------------------------------------------------------------------
# Commit to GIT repo?? Ask the user...
#-------------------------------------------------------------------------
echo
echo -e "${colorClear}${colorWhiteBold}"
read -p "  Commit current source tree to repo? [Y/n] "
echo -e ${colorClear} ${colorWhite}
$commandTput
if [[ $REPLY == "y" || $REPLY == "Y" || $REPLY == "" ]]; then

	echo -e "${colorCyan}    Sending code to repository. ${colorClear} ${colorWhite} "

	#echo "    - Adding files to GitHub repo."
	${commandGit} add ./*
	${commandGit} commit -q -m "Automated backup"
	${commandGit} push -q origin master
	echo ""

else [ $REPLY == "q" ];

	echo -e "${colorYellow}  Aborting Script ${colorClear} "
	echo -e "${colorWhite}${colorClear} "
	exit 0

fi
${commandTput}

#-------------------------------------------------------------------------
# Send end script output
#-------------------------------------------------------------------------
echo
echo -e " ${colorBlack}${colorBackgroundWhite} -------------------------------------------------------------------- ${colorClear} "
echo -e " ${colorBlue}${colorBackgroundWhite}  Script Complete.                                                    ${colorClear} "
echo -e " ${colorBlack}${colorBackgroundWhite} -------------------------------------------------------------------- ${colorClear} "
${commandTput}
echo
echo

exit 0
