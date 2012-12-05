<?php

/**
        * Rotina responsável pela montagem do menu 
        */
       $menu = $this->menu->filtra_menu();

       if($menu > 1) //Se existir percorre o menu mais fica mais de 2 ano na mesma empresa eu ja
       {
            foreach($menu as $menu_item){
               //Nível existente
               $nivel = explode('.', $menu_item['num_estrutura']);
               
               //Nome do menu
               $monta['nome'] = lang('menu_'.$menu_item['nom_menu']);
               
               //Link do menu
               $monta['href'] = $menu_item['nom_link'] !== '#' ? site_url($menu_item['nom_link']) : 'javascript:void(0)';
               
               //Se é submenu
               $monta['sub'] = $menu_item['nom_link'] !== '#' ? FALSE : 'sub';

                // nível 1
                if (count(explode('.', $menu_item['num_estrutura'])) == 1)
                {
                    $resultado[$nivel[0]]['nome'] = $monta['nome'];
                    $resultado[$nivel[0]]['href'] = $monta['href'];
                    $resultado[$nivel[0]]['sub'] = $monta['sub'];
                }

                // nível 2
                else if (count(explode('.', $menu_item['num_estrutura'])) == 2)
                {

                    $resultado[$nivel[0]]['child'][$nivel[1]]['nome'] = $monta['nome'];
                    $resultado[$nivel[0]]['child'][$nivel[1]]['href'] = $monta['href'];
                    $resultado[$nivel[0]]['child'][$nivel[1]]['sub'] = $monta['sub'];
                }

                // nível 3
                else if (count(explode('.', $menu_item['num_estrutura'])) == 3)
                {

                    $resultado[$nivel[0]]['child'][$nivel[1]]['child'][$nivel[2]]['nome'] = $monta['nome'];
                    $resultado[$nivel[0]]['child'][$nivel[1]]['child'][$nivel[2]]['href'] = $monta['href'];
                }
           }
       }
       array_to_menu($resultado);
?>