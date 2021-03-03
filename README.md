## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Create DB

Run sql code -> CREATE DATABASE bank;

php artisan migrate

## Run seeders:

php artisan db:seed --class=UserSeeder

php artisan db:seed --class=AccountSeeder

php artisan db:seed --class=AccountSeeder

php artisan db:seed --class=CurrencySeeder

## Improvements

- En el método setTransfer() del controller TransactionController: 
    Utilizaría una validación mas limpia como por ejemplo el VALIDATE de laravel y eliminaría los ifs inecesarios.

- En el método getTransactions() del controller TransactionController: 
    Le agregaría un limit a la consulta, en el caso que no se envíe params.
    Con esto limitariamos la cantidad de rows que devuelve la DB.

- La solución que pensaba implementar para ahorrar costo en requests a la API externa de exchange es: 
    Crear una nueva tabla en la base de datos donde se registre la ultima fecha y hora que se llamó a la API EXTERNA.
    Persistir un file físico en el storage de la API(laravel) con los datosque devuelve la API EXTERNA y consultar la info 
    para las siguientes transacciones desntro de un determinado período de tiempo desde dicho file.
    En futuras transferencia validar si ya se pasaron X cantidad de horas desde la última vez que se realizó el resquest y en
    caso afirmativo volver a sobrescribir el file físico y proseguir con el respectivo flow. 
    Con esto estaríamos consultando dicha info cada determinado período de tiempo y ahorraríamos en costos.

- Implementar Rollback si alguna de las inserciones en el proceso de transfer resultó con error. 

- Implementar un handler para las exeptions en el folder Exceptions

- Implementar try and catch en controllers

- Implementar Passport para permisos de usuarios

- Implementar sistema de envíos de mails en para usuarios y ademas agregarle un atributo "status" a la tabla 
    transactions para confirmar que todo ocurrió bien sino enviar dicho mail.

## Limitations

- Actualmente debido al diseño de la base de datos no se puede tener una ACCOUNT con dos tipos de monedas distintas,
    sino que tendríamos dos ACCOUNTS cada una con su respectiva moneda.    

## Commets 

- Esto fue lo que pude lograr en aproximadamente 5 horas.
