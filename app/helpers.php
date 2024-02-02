<?php

use Illuminate\Support\Facades\Http;

function fecha($fecha)
{
    return $fecha->format('d-m-Y H:i e');
}

function obtenerMes($fecha)
{
    return $fecha->isoFormat('MMMM');
}

function obtenerAnyo($fecha)
{
    return $fecha->isoFormat('YYYY');
}

function obtenerIp()
{
    return Http::get('https://ipinfo.io/ip');
}
