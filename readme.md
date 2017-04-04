##Laravel 5.4 Videos

1) Installing
--------------

###Install project (*recommended*)
```sh
    - composer create-project laravel/laravel --prefer-dist name_project
    - Or download a specific version:
    - composer create-project laravel/laravel --prefer-dist name_project "5.*.*"
``` 

### Cloning the repository
```sh
    - git clone git clone git clone adress_to_project.git
    - php composer self-udpate
    - php composer install
```     
    
2) Creating virtual host
------------------------
```sh
    #Fedora
    /etc/httpd/conf.d/
    sudo vi localhost.conf

    #Ubuntu
    /etc/apache2/sites-available
    sudo vi localhost.com.conf
```
* Server configuration
```sh
    <VirtualHost *:80>
        ServerAdmin videos.dev
        ServerName videos.dev
        ServerAlias www.videos.dev
        DocumentRoot /var/www/html/lacc_videos/public
              <Directory "/var/www/html/lacc_videos/public">
                      DirectoryIndex index.php
                      AllowOverride All
                      Order allow,deny
                      Allow from all
              </Directory>
    </VirtualHost>
```    
###Fedora e Ubuntu
```sh
    - /etc  
    - sudo vi hosts
    - 127.0.0.1 videos.dev
```    
    
###Restart server
```sh    
    - sudo service httpd restart
```

###Dependencies
```sh
    - npm install
    - gulp | gulp --production | gulp watch
```    

### Version
1.0.    

### Developer:
Luis Alberto Concha Curay - luisconchacuray@gmail.com    