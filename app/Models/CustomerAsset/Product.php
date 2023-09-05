<?php

namespace App\Models\CustomerAsset;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Sortable;

    protected $table = "cina_products";
    protected $guarded = [];

    // protected $fillable = [
    //         'product_assetID',
    //         'product_newassetID',
    //         'product_equip',
    //         'product_type',
    //         'product_end',
    //         'product_size',
    //         'product_rating',
    //         'product_brand',
    //         'product_valvemodel',
    //         'product_serial',
    //         'product_condi',
    //         'product_actbrand',
    //         'product_acttype',
    //         'product_actsize',
    //         'product_fail',
    //         'product_actcond',
    //         'product_posbrand',
    //         'product_posmodel',
    //         'product_inputsignal',
    //         'product_poscond',
    //         'product_other',
    //         'product_datein',
    //         'product_transfer',
    //         'product_reser',
    //         'product_origin',
    //         'product_sdvin',
    //         'product_sdvout',
    //         'product_station',
    //         'product_requestor',
    //         'product_project',
    //         'product_dateout',
    //         'product_dateoffshore',
    //         'product_tfoffshore',
    //         'product_curloc',
    //         'product_stockin',
    //         'product_stockout',
    //         'product_docin',
    //         'product_docout',
    //         'product_dateout',
    //         'product_stockqty',
    //         'product_uom',
    //         'product_targetpdn',
    //         'product_csrelease',
    //         'product_csnumber',
    //         'product_cenumber',
    //         'product_ronumber',
    //         'product_startdate',
    //         'product_enddate',
    //         'product_price',
    //         'product_remark',
    //         'product_image',
    //         'product_code',
    //         'product_status',
    // ];

    // public $sortable = [
    //     'product_assetID',
    //     'product_newassetID',
    //     'product_equip',
    //     'product_type',
    //     'product_end',
    //     'product_size',
    //     'product_rating',
    //     'product_brand',
    //     'product_valvemodel',
    //     'product_serial',
    //     'product_condi',
    //     'product_actbrand',
    //     'product_acttype',
    //     'product_actsize',
    //     'product_fail',
    //     'product_actcond',
    //     'product_posbrand',
    //     'product_posmodel',
    //     'product_inputsignal',
    //     'product_poscond',
    //     'product_other',
    //     'product_datein',
    //     'product_transfer',
    //     'product_reser',
    //     'product_origin',
    //     'product_sdvin',
    //     'product_sdvout',
    //     'product_station',
    //     'product_requestor',
    //     'product_project',
    //     'product_dateout',
    //     'product_dateoffshore',
    //     'product_tfoffshore',
    //     'product_curloc',
    //     'product_stockin',
    //     'product_stockout',
    //     'product_docin',
    //     'product_docout',
    //     'product_dateout',
    //     'product_stockqty',
    //     'product_uom',
    //     'product_targetpdn',
    //     'product_csrelease',
    //     'product_csnumber',
    //     'product_cenumber',
    //     'product_ronumber',
    //     'product_startdate',
    //     'product_enddate',
    //     'product_price',
    //     'product_remark',
    //     'product_status'
    // ];

    // protected $guarded = [
    //     'id',
    // ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('product_type', 'like', '%' . $search . '%');
        });
    }
}
