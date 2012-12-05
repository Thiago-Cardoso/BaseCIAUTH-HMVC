<?php
/**
*
* @author     Everlon Passos <dev@everlon.com.br>
* @link       http://www.everlon.com.br Página pessoal do Autor
* @version    1.0-dev
* @copyright  2012-2013 Everlon Passos
*
*/
      function data_to_db($data) { return implode('', array_reverse(explode('-', $data))); }

      function data_br($data)
      {
            if(strpos($data, '-')){ 
                return implode('/', array_reverse(explode('-', $data)));
            }
            else{ return $data; }
      }

      function formata_CNPJ($numero)
      {
          $numero = preg_replace("[' '-./ t]", '', $numero);
          $valor  = str_pad(preg_replace('[^0-9]', '', $numero), 14, '0', STR_PAD_LEFT);
          return preg_replace('/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/', '$1.$2.$3/$4-$5', $valor);
      }

      function formata_CEP($numero)
      {
          $numero = preg_replace("[' '-./ t]", '', $numero);
          $valor  = str_pad(preg_replace('[^0-9]', '', $numero), 7, '0', STR_PAD_LEFT);
          return preg_replace('/^(\d{2})(\d{3})(\d{3})$/', '$1.$2-$3', $valor);
      }

      function valida_Email($email)
      {
          $string = strtolower($email);
          if (preg_match( '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $string))
          { 
                return $string;
          }
      }

      function formata_TEL($numero)
      {
          $numero = preg_replace("[' '-./ t]", '', $numero);
          $valor  = str_pad(preg_replace('[^0-9]', '', $numero), 10, '0', STR_PAD_LEFT);
          return preg_replace('/^(\d{2})(\d{4})(\d{4})$/', '($1) $2-$3', $valor);
      }

      function formatarCPF_CNPJ($campo, $formatado=TRUE)
      {
            # retira formato
            $codigoLimpo = preg_replace("[' '-./ t]", '', $campo);
            
            # pega o tamanho da string menos os digitos verificadores
            $tamanho = (strlen($codigoLimpo) -2);
            
            # verifica se o tamanho do código informado é válido
            if ($tamanho != 9 && $tamanho != 12)
            {
                return FALSE;
            }
 
            if ($formatado)
            {
                # seleciona a máscara para cpf ou cnpj
                $mascara = ($tamanho == 9) ? '###.###.###-##' : '##.###.###/####-##';
 
                $indice = -1;
                for ($i=0; $i < strlen($mascara); $i++)
                {
                    if ($mascara[$i]=='#') $mascara[$i] = $codigoLimpo[++$indice];
                }
                
                #retorna o campo formatado
                $retorno = $mascara;
            }
            else
            {
                //se não quer formatado, retorna o campo limpo
                $retorno = $codigoLimpo;
            }
            return $retorno;
 
      } # formatarCPF_CNPJ

      function moeda_br($campo=NULL, $mask=NULL)
      {
        if(isset($campo))
        { 
          $campo_n = 'R$ ' . number_format((int)$campo, 2, ',', '.'); # retorna no formato R$ 100.000,50
          $mask = 'decimal';
          return array($campo_n, $mask);
        }
        
        else{ return FALSE; }
      }

      function cria_senha()
      {
        $pwd = sha1(uniqid(time(), true));
        $pwd = substr($pwd, 0, 8);
        return $pwd;
      }

      function objeto2Array($objeto)
      {
          $arr = array();
          for($i = 0; $i < count($objeto); $i++)
          {
              $arr[] = get_object_vars( $objeto[$i] );
          }
          return $arr;
      }

      function zeroAleft($campo=NULL, $zeros=1)
      {
        # Define a quantidade de números preenchendo a esquerda com zeros
        if ( isset($campo) ) { return str_pad( $campo, (int)$zeros, "0", STR_PAD_LEFT ); }
        else { return FALSE; }
      }

      function Debug($value)
      {
        /*
        * Formas de uso
        * @ Debug($_POST);
        * @ Debug($_GET);
        * @ Debug($_REQUEST);
        */
          echo "<pre>";
          print_r($value);
          echo "<pre>";

          exit(); # You shall not pass!
     }

/* End of file funcoes_helper.php */
/* Location: helpers/funcoes_helper.php */