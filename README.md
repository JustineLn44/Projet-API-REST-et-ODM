# Projet-API et RabbitMQ

### <p>Install BDD :</br> 
php bin/console doctrine:database:create</br>
php bin/console make:migration</br>
php bin/console doctrine:migrations:migrate</p>

### Start the server :
symfony server:start

### Routes :
#### Show all plats : </br>
  - Route : /plats </br>
  - Method : GET </br>
  - Name : app_plats </br>
#### Add new plat : 
  - Route : /plat/add 
  - Method : POST
  - Name : app_plat_new
  - Elements : 
    - statut
#### Show a plat : 
  - Route : /plat/show/{id}
  - Method : GET
  - Name : app_plat_show
#### Delete a plat : 
  - Route : /plat/delete/{id}
  - Method : POST
  - Name : app_plat_delete

