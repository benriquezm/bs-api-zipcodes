<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ZipCodes;
use App\Resources\ZipCodesResource;
use Illuminate\Http\Request;

class ZipCodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $zipCodes = ZipCodes::all();
        return response()->json($zipCodes, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ZipCodes  $zipCode
     * @return \Illuminate\Http\Response
     */
    public function show($zipCode)
    {
        //
        $zipCodesLocated = ZipCodes::where('d_codigo', '=', $zipCode)->get();
        $settlements = array();
        $objZipCode = (object) array();
        $objFederalEntity = (object) array();
        $objSettlement = (object) array();
        $objMunicipality = (object) array();
        $dCodigo = 0;
        $dCiudad = "No City";
        $message = "";

        /** get each zip code from array $zipCodes */
        foreach ($zipCodesLocated as $zipCode) {
            /** object for federal entity */
            $objFederalEntity->key = $zipCode->c_estado;
            $objFederalEntity->name = strtoupper($zipCode->d_estado);
            $objFederalEntity->code = !empty($zipCode->c_cp) ? $zipCode->c_cp : null;
            /** array of settlements for zip code */
            $objSettlement = (object) array(
                'key'=>$zipCode->id_asenta_cpcons,
                'name'=>strtoupper($zipCode->d_asenta),
                'zone_type'=>strtoupper($zipCode->d_zona),
                'settlement_type'=>(object) array('name'=>$zipCode->d_tipo_asenta),
            );
            array_push($settlements, $objSettlement);
            /** object for municipality */
            $objMunicipality->key = $zipCode->c_mnpio;
            $objMunicipality->name = strtoupper($zipCode->d_mnpio);
            $dCodigo = $zipCode->d_codigo;
            $dCiudad = strtoupper($zipCode->d_ciudad);
        }
        $objZipCode = [
            'zip_code' => $dCodigo,
            'locality' => $dCiudad,
            'federal_entity' => $objFederalEntity,
            'settelements' => $settlements,
            'municipality' => $objMunicipality,
        ];
        //$objZipCode->zip_code = $dCodigo;
        //$objZipCode->locality = $dCiudad;
        //$objZipCode->federal_entity = $objFederalEntity;
        //$objZipCode->settlements = $settlements;
        //$objZipCode->municipality = $objMunicipality;
        //dd($objZipCode->zip_code);
        //print_r($objZipCode);
        if (count($zipCodesLocated) === 0) {
            $message = "Not found records for zip code $zipCode";
            $objZipCode = [
                'message' => $message,
            ];
        }
        
        return response()->json($objZipCode, count($zipCodesLocated) > 0 ? 200 : 404);
    }
}
