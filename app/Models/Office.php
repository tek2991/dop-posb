<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = ['name', 'division_id', 'office_type_id'];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function officeType()
    {
        return $this->belongsTo(OfficeType::class);
    }

    // Default Offices
    public static function defaultOffices()
    {
        return [
            'Haflong Sub Division' => [ 'Division' => 'Cachar', 'OfficeType' => 'Sub Division'],
            'Silchar West Sub Division' => [ 'Division' => 'Cachar', 'OfficeType' => 'Sub Division'],
            'Silchar North Sub Division' => [ 'Division' => 'Cachar', 'OfficeType' => 'Sub Division'],
            'Silchar South Sub Division' => [ 'Division' => 'Cachar', 'OfficeType' => 'Sub Division'],
            'Hailakandi Sub Division' => [ 'Division' => 'Cachar', 'OfficeType' => 'Sub Division'],
            'Patherkandi Sub Division' => [ 'Division' => 'Cachar', 'OfficeType' => 'Sub Division'],
            'Karimganj Sub Division' => [ 'Division' => 'Cachar', 'OfficeType' => 'Sub Division'],
            'Mangaldoi Sub Division' => [ 'Division' => 'Darrang', 'OfficeType' => 'Sub Division'],
            'Chariali Sub Division' => [ 'Division' => 'Darrang', 'OfficeType' => 'Sub Division'],
            'Dhekiajuli Sub Division' => [ 'Division' => 'Darrang', 'OfficeType' => 'Sub Division'],
            'Tezpur Sub Division' => [ 'Division' => 'Darrang', 'OfficeType' => 'Sub Division'],
            'Dhemaji Sub Division' => [ 'Division' => 'Dibrugarh', 'OfficeType' => 'Sub Division'],
            'Naharkatia Sub Division' => [ 'Division' => 'Dibrugarh', 'OfficeType' => 'Sub Division'],
            'North Lakhimpur East Sub Division' => [ 'Division' => 'Dibrugarh', 'OfficeType' => 'Sub Division'],
            'North Lakhimpur West Sub Division' => [ 'Division' => 'Dibrugarh', 'OfficeType' => 'Sub Division'],
            'Dibrugarh Sub Division' => [ 'Division' => 'Dibrugarh', 'OfficeType' => 'Sub Division'],
            'Dhubri Sub Division' => [ 'Division' => 'Goalpara', 'OfficeType' => 'Sub Division'],
            'Goalpara Sub Division' => [ 'Division' => 'Goalpara', 'OfficeType' => 'Sub Division'],
            'Kokrajhar Sub Division' => [ 'Division' => 'Goalpara', 'OfficeType' => 'Sub Division'],
            'Bongaigaon Sub Division' => [ 'Division' => 'Goalpara', 'OfficeType' => 'Sub Division'],
            'Bijoynagar Sub Division' => [ 'Division' => 'Guwahati', 'OfficeType' => 'Sub Division'],
            'Guwahati West Sub Division' => [ 'Division' => 'Guwahati', 'OfficeType' => 'Sub Division'],
            'Guwahati East Sub Division' => [ 'Division' => 'Guwahati', 'OfficeType' => 'Sub Division'],
            'Diphu Sub Division' => [ 'Division' => 'Nagaon', 'OfficeType' => 'Sub Division'],
            'Hojai Sub Division' => [ 'Division' => 'Nagaon', 'OfficeType' => 'Sub Division'],
            'Morigaon Sub Division' => [ 'Division' => 'Nagaon', 'OfficeType' => 'Sub Division'],
            'Nagaon East Sub Division' => [ 'Division' => 'Nagaon', 'OfficeType' => 'Sub Division'],
            'Nagaon West Sub Division' => [ 'Division' => 'Nagaon', 'OfficeType' => 'Sub Division'],
            'Nalbari West Sub Division' => [ 'Division' => 'Nalbari', 'OfficeType' => 'Sub Division'],
            'Nalbari East Sub Division' => [ 'Division' => 'Nalbari', 'OfficeType' => 'Sub Division'],
            'Pathsala Sub Division' => [ 'Division' => 'Nalbari', 'OfficeType' => 'Sub Division'],
            'Barpeta Sub Division' => [ 'Division' => 'Nalbari', 'OfficeType' => 'Sub Division'],
            'Jorhat North Sub Division' => [ 'Division' => 'Sivsagar', 'OfficeType' => 'Sub Division'],
            'Jorhat South Sub Division' => [ 'Division' => 'Sivsagar', 'OfficeType' => 'Sub Division'],
            'Golaghat Sub Division' => [ 'Division' => 'Sivsagar', 'OfficeType' => 'Sub Division'],
            'Simaluguri Sub Division' => [ 'Division' => 'Sivsagar', 'OfficeType' => 'Sub Division'],
            'Sibsagar Sub Division' => [ 'Division' => 'Sivsagar', 'OfficeType' => 'Sub Division'],
            'Mariani Sub Division' => [ 'Division' => 'Sivsagar', 'OfficeType' => 'Sub Division'],
            'Tinsukia Sub Division' => [ 'Division' => 'Tinsukia', 'OfficeType' => 'Sub Division'],
            'Doomdooma Sub Division' => [ 'Division' => 'Tinsukia', 'OfficeType' => 'Sub Division'],
            'Guwahati GPO' => [ 'Division' => 'Guwahati', 'OfficeType' => 'Head Office'],
            'Guwahati University HO' => [ 'Division' => 'Guwahati', 'OfficeType' => 'Head Office'],
            'Goalpara HO' => [ 'Division' => 'Goalpara', 'OfficeType' => 'Head Office'],
            'Kokrajhar HO' => [ 'Division' => 'Goalpara', 'OfficeType' => 'Head Office'],
            'Dhubri HO' => [ 'Division' => 'Goalpara', 'OfficeType' => 'Head Office'],
            'Nalbari HO' => [ 'Division' => 'Nalbari', 'OfficeType' => 'Head Office'],
            'Barpeta HO' => [ 'Division' => 'Nalbari', 'OfficeType' => 'Head Office'],
            'Mangaldoi HO' => [ 'Division' => 'Darrang', 'OfficeType' => 'Head Office'],
            'Tezpur HO' => [ 'Division' => 'Darrang', 'OfficeType' => 'Head Office'],
            'Jorhat HO' => [ 'Division' => 'Sivsagar', 'OfficeType' => 'Head Office'],
            'Sivsagar HO' => [ 'Division' => 'Sivsagar', 'OfficeType' => 'Head Office'],
            'Golaghat HO' => [ 'Division' => 'Sivsagar', 'OfficeType' => 'Head Office'],
            'Nagaon HO' => [ 'Division' => 'Nagaon', 'OfficeType' => 'Head Office'],
            'Diphu HO' => [ 'Division' => 'Nagaon', 'OfficeType' => 'Head Office'],
            'DIbrugarh HO' => [ 'Division' => 'Dibrugarh', 'OfficeType' => 'Head Office'],
            'Tinsukia HO' => [ 'Division' => 'Tinsukia', 'OfficeType' => 'Head Office'],
            'North Lakhimpur HO' => [ 'Division' => 'Dibrugarh', 'OfficeType' => 'Head Office'],
            'Silchar HO' => [ 'Division' => 'Cachar', 'OfficeType' => 'Head Office'],
            'Karimganj HO' => [ 'Division' => 'Cachar', 'OfficeType' => 'Head Office'],
            'Hailakandi HO' => [ 'Division' => 'Cachar', 'OfficeType' => 'Head Office'],
        ];
    }
}
