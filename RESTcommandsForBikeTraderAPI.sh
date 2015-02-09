#!/bin/bash

SET THIS UP TO TAKE COMMAND LINE ARGUMENTS FOR EACH
GET
POST
PUT
DELETE

IT WILL BE HARDCODED WITH THE CURRENT DEVELOPMENT URL...
CAN USE THIS TO ELBORATE ON LATER...

curl -X DELETE http://symfonyclassroom/app_dev.php/api/v1/trader/bikes/13

curl -H "Content-Type: application/json" -d '{"name":"bikename","description":"postdescription","type":"road"}' http://symfonyclassroom/app_dev.php/api/v1/trader/bikes

curl -H "Content-Type: application/x-www-form-urlencoded" -X PUT -d name=updatedname -d description=udpateddescription http://symfonyclassroom/app_dev.php/api/v1/trader/bikes/6

clear
read -p "Please enter the name of a fruit: " fruit
if [ $fruit = apple ]
  then echo 'you choose the best fruit'
elif [ $fruit = pear ]
  then echo 'i really do not like pears'
else echo 'you did not choose the right fruit'
fi
clear
echo 'Please enter your firstname'
read name
read -p 'Please enter your age ' age
echo "Your entered firstname is $name and you are $age years old"

# When you use 'read' on its own, the read command now stores a reply into
# the default built-in variable $REPLY
echo 'Please enter 3 colours';
read
echo $REPLY

# The -a option makes the read command to read into an array
echo 'please enter your firstname and surname'
read -a fullName
echo 'Your name as surname, firstname is:' ${fullName[1]}, ${fullName[0]}


#!/bin/bash
clear
#Examples calling functions
echoFunction() {
  echo 'echo was called'
}
fooBar() {
  echo 'foo function was called'
}
echoFunction;
fooBar;
echoFunction;
