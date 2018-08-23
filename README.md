# WC-Check-License
Classe que realiza a verificação de licenciamento do Work Control


.


Modo de usar:

    $checkLicense = new Source\Helpers\CheckLicense;

    if ($checkLicense->verifyLicense('57103035008')) {
        echo 'É Licenciado';
    } else {
        echo 'Não é Licenciado';
    }
    

.

Para utilizar no Work Control, sem o autoload do Composer:

1º - Renomeie o arquivo: CheckLicense.php para CheckLicense.class.php

2º - Remova a chamada do namespace na linha 9 [namespace Source\Helpers;]

3º - Salve na pasta Helpers do WC

4º - Chame a classe desta maneira:

    $checkLicense = new CheckLicense;


.


Espero ter ajudado!

#BoraProgramar
