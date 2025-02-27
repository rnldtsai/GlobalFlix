# GlobalFlix
ISQA8380 Spring 25

You can find the source codes of my GlobalFlix demo in this repository. The known issues and hints will be posted here as well.

1. Install LAMP in yuor Ubuntu, check the tutorial below. Also check my posted video recording!

  https://www.digitalocean.com/community/tutorials/how-to-install-lamp-stack-on-ubuntu

2. I encountered some errors. How can I check the error message in the system?

Check the apache/PHP error in: "/var/log/apache2/error.log" "/var/log/apache2/access.log"

3. I am unable to upload a larger video file.

You need to update the PHP upload file size using the command: 

  sudo vim /etc/php/8.3/apache2/php.ini

Update the following two settings: 

  post_max_size = 128M
  
  upload_max_filesize = 128M

After the, please restart your apache:

  sudo service apache2 restart
