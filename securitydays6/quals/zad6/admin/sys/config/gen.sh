#! /bin/bash
# coded by Niedzielny Koder <niedzielny@labs.ts.sec>

echo -n "LOGIN: "
read -e LOGIN

echo -n "$LOGIN:" >> passwd
echo -n "GENERATING KEY: "
KEY=`./genpass`
echo -n $KEY | md5sum | awk {'print $1'} >> passwd

echo "Login: $LOGIN Key: $KEY"
echo "Done!"
