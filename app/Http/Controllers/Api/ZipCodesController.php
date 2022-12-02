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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $objZipCode->zip_code = $dCodigo;
        $objZipCode->locality = $dCiudad;
        $objZipCode->federal_entity = $objFederalEntity;
        $objZipCode->settlements = $settlements;
        $objZipCode->municipality = $objMunicipality;
        
        return response()->json($objZipCode, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ZipCodes  $zipCodes
     * @return \Illuminate\Http\Response
     */
    public function edit(ZipCodes $zipCodes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ZipCodes  $zipCodes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ZipCodes $zipCodes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ZipCodes  $zipCodes
     * @return \Illuminate\Http\Response
     */
    public function destroy(ZipCodes $zipCodes)
    {
        //
    }
}
