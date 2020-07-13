# Codeigniter4 example how to run.

```bash
# Docker command
docker run -p 8080:8080 -v ${PWD}:/app -it composer bash

# Inside docker
$ apk add icu-dev
$ docker-php-ext-install intl

# Inside root of the examples/codeigniter4
$ composer update
$ php spark serve

# Run this curl command to execute the background job in other tab
$ curl  http://localhost:8080/backgroundrunner/

```

# Codeigniter3 example how to run

```bash
# Docker command
$ docker run -p 8086:80 -v ${PWD}:/www -it cswl/xampp bash

# Inside root of the examples/codeigniter4
$ composer update

$ rm /opt/lampp/lib/libldap_r-2.4.so.2
$ ln -s /usr/lib/x86_64-linux-gnu/libldap_r-2.4.so.2.10.8 /opt/lampp/lib/libldap_r-2.4.so.2

$ rm /opt/lampp/lib/libldap_r-2.4.so.2
$ ln -s /usr/lib/x86_64-linux-gnu/libldap_r-2.4.so.2.10.8 /opt/lampp/lib/libldap_r-2.4.so.2

$ rm /opt/lampp/lib/liblber-2.4.so.2
$ ln -l /usr/lib/x86_64-linux-gnu/liblber-2.4.so.2.10.8 /opt/lampp/lib/liblber-2.4.so.2

# Run this curl command to execute the background job in other tab
$ curl http://localhost/www/index.php/welcome/background
```
