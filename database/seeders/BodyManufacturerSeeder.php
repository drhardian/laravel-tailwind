<?php

namespace Database\Seeders;

use App\Models\SiteWalkDown\Dropdown as SiteWalkDownDropdown;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BodyManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteWalkDownDropdown::insert([
            #COV
            [ 'title' => Str::upper('Baumann'), 'alias' => 'BDYMFC', 'device_type' => 'COV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Cci-Drag'), 'alias' => 'BDYMFC', 'device_type' => 'COV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Contek'), 'alias' => 'BDYMFC', 'device_type' => 'COV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Copes Vulcan'), 'alias' => 'BDYMFC', 'device_type' => 'COV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Fisher'), 'alias' => 'BDYMFC', 'device_type' => 'COV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Gulde'), 'alias' => 'BDYMFC', 'device_type' => 'COV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Hammel-Dahl'), 'alias' => 'BDYMFC', 'device_type' => 'COV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Jamesbury'), 'alias' => 'BDYMFC', 'device_type' => 'COV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Masoneilan'), 'alias' => 'BDYMFC', 'device_type' => 'COV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Neles'), 'alias' => 'BDYMFC', 'device_type' => 'COV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Samson'), 'alias' => 'BDYMFC', 'device_type' => 'COV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Valtek'), 'alias' => 'BDYMFC', 'device_type' => 'COV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Yarway'), 'alias' => 'BDYMFC', 'device_type' => 'COV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            #REG
            [ 'title' => Str::upper('Ace'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Adam`s'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Anderson Greenwood'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Argus'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Bailey'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Bauman'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Bestobell'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Cashco'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('CCI'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Contek'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Copes Vulcan'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Dezurik'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Edwards'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('El-O-Matic'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Field Q'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Fisher'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Groth'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Hammel-Dahl'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Hills McCanna'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Honeywell'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Jamesbury'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Keystone'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Kiely Mueller'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Level Pot'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Magnatrol'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Masoneilan'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Mobrey'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Nelles'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Orbit'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Parker'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Peir Sampler'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Posi-Seal'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Research'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Rexroth'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Rockwell'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Saunders'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('TBV'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Trueline Kace'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Tufline'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Valtek'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Valve Concepts'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Vanessa'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Velan'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('WKM'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Xomox'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Yarway'), 'alias' => 'BDYMFC', 'device_type' => 'REG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            #CKV
            [ 'title' => Str::upper('Not Available'), 'alias' => 'BDYMFC', 'device_type' => 'CKV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Unknown'), 'alias' => 'BDYMFC', 'device_type' => 'CKV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            #ISV
            [ 'title' => Str::upper('BAUMANN'), 'alias' => 'BDYMFC', 'device_type' => 'ISV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('CCI-Drag'), 'alias' => 'BDYMFC', 'device_type' => 'ISV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('CONTEK'), 'alias' => 'BDYMFC', 'device_type' => 'ISV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('COPES VULCAN'), 'alias' => 'BDYMFC', 'device_type' => 'ISV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('FISHER'), 'alias' => 'BDYMFC', 'device_type' => 'ISV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('GULDE'), 'alias' => 'BDYMFC', 'device_type' => 'ISV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('HAMMEL-DAHL'), 'alias' => 'BDYMFC', 'device_type' => 'ISV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('JAMESBURY'), 'alias' => 'BDYMFC', 'device_type' => 'ISV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('MASONEILAN'), 'alias' => 'BDYMFC', 'device_type' => 'ISV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('NELES'), 'alias' => 'BDYMFC', 'device_type' => 'ISV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('SAMSON'), 'alias' => 'BDYMFC', 'device_type' => 'ISV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('VALTEK'), 'alias' => 'BDYMFC', 'device_type' => 'ISV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('YARWAY'), 'alias' => 'BDYMFC', 'device_type' => 'ISV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            #PRV
            [ 'title' => Str::upper('A.S.T S.P.A'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Anderson Greenwood'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('BOPP & REUTHER MESSTECHNIK GMBH'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('BROADY FLOW CONTROL LTD.'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('CLA-VAL EUROPE SARL'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('CROSBY'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('DARLING MUESCO INDIA'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('DRESSER'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('FARRIS'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('FUKUI'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('HOPKINSON(WEIR VALVES & CONTROLS UK LTD)'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('J.B ROMBACH'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('LESER'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('MOTOYAMA ENG.WORKS,LTD.'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('NETHERLOCKS SAFETY SYSTEMS BV'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('NUOVO PIGNONE, SPA'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('PARCOL, SPA'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('RSBD(WEIR VALVES & CONTROLS)'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('SAPAC(GEC ALSTHOM)'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('SARASIN(WEIR VALVES & CONTROLS)'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('SEMPELL'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('TAI MILANO S.P.A'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('TECHNICAL S.R.L'), 'alias' => 'BDYMFC', 'device_type' => 'PRV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            #MAV
            [ 'title' => Str::upper('Not Available'), 'alias' => 'BDYMFC', 'device_type' => 'MAV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'title' => Str::upper('Unknown'), 'alias' => 'BDYMFC', 'device_type' => 'MAV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
        ]);
    }
}
