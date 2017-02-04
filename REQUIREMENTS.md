# Some configuration requirements 

Some values you must set before running SCWT website

## General aspects

Be carefull about directory permission related with sessions, temp files, cache, uploads...

Set www-data as owner of directories: uploads, assets/imgs, assets/pdfs, captcha...



## Apache

TODO



## Nginx

Installed packages:

* nginx
* nginx-common
* nginx-doc
* nginx-full





## PHP

Check this values in php.ini configuration file

- enable GD extension used for generate captchas

- display_errors = On  in production

- post_max_size = 20M  for uploading images and PDF files

- upload_max_filesize = 20M for uploading images and PDF files

- max_file_uploads = 5 for uploading several images or PDF files in a single post, but take into consideration upload_max_filesize and post_max_size

  ​