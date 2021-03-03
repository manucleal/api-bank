## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## My Notes

php artisan serve

php artisan migrate

php artisan db:seed --class=UserSeeder

php artisan db:seed --class=AccountSeeder

php artisan db:seed --class=AccountSeeder

php artisan db:seed --class=CurrencySeeder

## Improvements

- En el getTransactions(): 
    le agregaria una fecha default como límite para el filtrado o le agregaría un limit a la consulta, 
    en el caso que no se envíe el param -> TO y si el FROM o viceversa.
    Con esto limitariamos la cantidad de rows que devuelve la DB.

- La solución que pensaba implementar para ahorrar costo en llamados a la API externa de exchange es: 
    Persistir un file fisico en el storage de la API(laravel) luego de cada request a la API EXCHANGE y consultar la info desde ahí en futuras transferencias.
    Crear una nueva tabla en la base de datos donde se registre la ultima fecha y hora que se llamó a dicha API. 
    En transferencia validar si ya se pasaron X cantidad de horas desde la ultima vez que se realizó el resquest. 
    Con esto estariamos consultando dicha info cada determinado período de tiempo.

- Implementar Rollback si alguna de las insercciones en el proceso de transfer resultó con error. 

- Le implementaria un handler para las exeptions en el folder Exceptions | Implementar try and catch en controller

- Implementar Passport para permisos de usuarios




