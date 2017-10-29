#!/bin/bash 

# username password comment

#git pull origin master
git add *
git commit -m $3
git push -u origin master << EOF
username
EOF
