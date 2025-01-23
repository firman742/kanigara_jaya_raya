<?php

namespace App;

enum EnumInspectionChecklist: string
{
    case BAIK = "baik";
    case RUSAK = "rusak";
    case HILANG = "hilang";
    case TIDAK_ADA = "tidak ada";
}
