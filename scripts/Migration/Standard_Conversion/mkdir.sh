<<<<<<< HEAD
#!/bin/bash
=======
#!/usr/bin/env bash
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
# Observium to LibreNMS conversion

####################### SCRIPT DESCRIPTION ########################
# A simple script to create needed directories on LibreNMS server #
###################################################################

########################### DIRECTIONS ############################
# Enter values for NODELIST, L_RRDPATH. The default should work if# 
# you put the files in the same location.                         #
###################################################################

############################# CREDITS #############################             
# LibreNMS work is done by a great group - http://librenms.org    #
# Script Written by - Dan Brown - http://vlan50.com               #
###################################################################

# Enter path to node list text file
NODELIST=/tmp/nodelist.txt
# Enter path to LibreNMS RRD directories
L_RRDPATH=/opt/librenms/rrd/

# This loop enters the RRD folder and creates dir based on contents of node list text file
while read line 
	do mkdir -p $L_RRDPATH"${line%/*}"
<<<<<<< HEAD
done < $NODELIST
=======
done < $NODELIST
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
