<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

/**
 * Description of Helper
 *
 * @author blonder413
 */
class Helper {
    // -------------------------------------------------------------------------------------------------------------------
    // Obtengo los textos limpios para usarlos como url
	public static function limpiaUrl($entra) {
		$traduce = array (
				'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u',
				'Á' => 'A', 'É' => 'E', 'Í' => 'I', 'Ó' => 'O', 'Ú' => 'U',
				'ñ' => 'n', 'Ñ' => 'N',
				'ä' => 'a', 'ë' => 'e', 'ï' => 'i', 'ö' => 'o', 'ü' => 'u',
				'Ä' => 'A', 'Ë' => 'E', 'Ï' => 'I', 'Ö' => 'O', 'Ü' => 'U'
		);
		$sale = strtr ( $entra, $traduce );
		
		$texto = str_replace ( " ", "-", $sale );
		
        $texto = strtolower($texto);
                
		return $texto;
	}
}
