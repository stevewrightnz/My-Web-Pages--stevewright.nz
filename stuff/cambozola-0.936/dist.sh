#!/bin/sh

APP=cambozola
VERSION=0.936

APPREF=$APP-$VERSION

JAVA_HOME=c:/apps/java/jdk1.8
DISTDIR=~andyw/webMirror/charlieMouse/docroot/code/$APP
#
# To create certificate
#
#keytool -genkey -alias cambozola
#keytool -selfcert -alias cambozola

##################################################################
## Build & Clean
##################################################################

#ant clean
#ant compile
#ant dist 

ant clean signdeploy -Dkeystore.password=wibble

##################################################################
## Release
##################################################################

#cp deploy/$APPREF.zip    	  $DISTDIR/
#cp deploy/$APPREF.tar.gz 	  $DISTDIR/

#rm $DISTDIR/$APP-latest.zip
#rm $DISTDIR/$APP-latest.tar.gz

#ln -s $DISTDIR/$APPREF.zip	$DISTDIR/$APP-latest.zip
#ln -s $DISTDIR/$APPREF.tar.gz	$DISTDIR/$APP-latest.tar.gz

#cp deploy/index.html $DISTDIR/index.html

#cp webdoc/config.html $DISTDIR/config.html
#cp webdoc/config1.gif $DISTDIR/config1.gif
#cp webdoc/config2.gif $DISTDIR/config2.gif
#cp webdoc/config3.gif $DISTDIR/config3.gif


###sitecopy --update externalweb
###rsync -avL $DISTDIR/ buffy:/home/httpd/replicated/docroot/code/cambozola/
