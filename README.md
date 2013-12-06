hotel_pwl
=========
database ada di hotel.sql 

1. config database ada di protected ganti dbname dengan nama database-mu dan username dan password root-nya   
     'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=hotel',
            'emulatePrepare' => true,
            'enableProfiling' => true,
            'enableParamLogging' => true,
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ),   
2. dan kalau masuk ke login admin di url : http://url-nya/admin
