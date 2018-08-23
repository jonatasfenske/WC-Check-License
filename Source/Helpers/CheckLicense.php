<?php
/**
 * Created by PhpStorm.
 * User: jonatasfenske
 * Date: 23/08/2018
 * Time: 10:46
 */

namespace Source\Helpers;


class CheckLicense
{

    /*
     * Attr REST
     */
    private $url;
    private $endPoint;
    private $cpf;
    private $params;
    private $callback;


    public function __construct()
    {
        /*
         * API URL
         */
        $this->url = 'https://pro.workcontrol.com.br';
    }

    /*
     * @method string cleanCpf()        Método que realiza a remoção de pontos, traços e espaços no CPF
     * @param string $cpf               Informe um CPF, utilizando pontos, traços ou simplesmente números
     * @return string $slashCpf         Retorna uma STRING limpa com os números do CPF
     * */
    function cleanCpf($cpf)
    {
        $trimCpf = trim($cpf);
        $dotCpf = str_replace('.', '', $trimCpf);
        $slashCpf = str_replace('-', '', $dotCpf);
        return $slashCpf;
    }

    /*
     * @method string verifyLicense()   Método que realiza a verificação de licenciamento do Work Control
     * @param string $cpf               Informe um CPF, utilizando pontos, traços ou simplesmente números
     * @return bool                     Retorna TRUE ou FALSE
     * */
    public function verifyLicense($cpf)
    {
        $this->cpf = $this->cleanCpf($cpf);
        $this->endPoint = '/_cdn/wc.php';
        $this->params = [
            'user_search' => $this->cpf
        ];
        $this->post();
        if (isset($this->callback->success)) {
            /* Caso o CPF informado seja de um aluno licenciado retorna TRUE */
            return TRUE;
        }
    }

    /********************************
     ******** METHOD REST ***********
     *******************************/
    private function post()
    {
        $url = $this->url . $this->endPoint;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->params));
        curl_setopt($ch, CURLOPT_HTTPHEADER, []);
        $this->callback = json_decode(curl_exec($ch));
        curl_close($ch);
    }

}