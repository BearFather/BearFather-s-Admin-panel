#!/bin/bash
source settings.web
cd $mcloc
java -server -Xmx$ramamo -Xms$ramamo -jar $mcloc/craftbukkit.jar
