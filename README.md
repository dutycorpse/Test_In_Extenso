# Test_Vehicle_Fleet_Parking

## install

`git clone https://github.com/dutycorpse/Test_Vehicle_Fleet_Parking.git Test_Vehicle_Fleet_Parking`

`composer install`

`php bin/console doctrine:database:create`

`php bin/console doctrine:migration:migrate`

## run console commands

`symfony console fleet:create 123`

`symfony console fleet:register-vehicle 123 abc`

`symfony console fleet:geolocate-` to add coordonate to all vehicles
