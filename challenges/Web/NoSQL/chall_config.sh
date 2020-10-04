#!/bin/bash
echo "configuring NoSQL on port 8011..."; docker-compose up -d;
docker exec -it $(docker ps -aqf "name=nosql_php_1") chown -R www-data:www-data /var/www/
docker exec -it $(docker ps -aqf "name=nosql_php_1") chmod -R g+rw /var/www/
