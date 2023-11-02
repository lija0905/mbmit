<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Helper
{

    public static function latinToCyrillic($input) {

        $conversionTable = array(
            "A" => "А", "B" => "Б", "V" => "В", "G" => "Г", "D" => "Д", "Đ" => "Ђ", "E" => "Е", "Ž" => "Ж", "Z" => "З", "I" => "И", "J" => "Ј", "K" => "К", "L" => "Л", "LJ" => "Љ", "Lj" => "Љ", "M" => "М", "N" => "Н", "NJ" => "Њ", "Nj" => "Њ", "O" => "О", "P" => "П", "R" => "Р", "S" => "С", "T" => "Т", "Ć" => "Ћ", "U" => "У", "F" => "Ф", "H" => "Х", "C" => "Ц", "Č" => "Ч", "DŽ" => "Џ", "Š" => "Ш",
            "a" => "а", "b" => "б", "v" => "в", "g" => "г", "d" => "д", "đ" => "ђ", "e" => "е", "ž" => "ж", "z" => "з", "i" => "и", "j" => "ј", "k" => "к", "l" => "л", "lj" => "љ", "m" => "м", "n" => "н", "nj" => "њ", "o" => "о", "p" => "п", "r" => "р",  "s" => "с", "t" => "т", "ć" => "ћ", "u" => "у", "f" => "ф", "h" => "х", "c" => "ц", "č" => "ч", "dž" => "џ", "š" => "ш", " " => " "
        );
        $out = strtr($input, $conversionTable);
        return $out;
    }

    public static function removePhoto($fileName, $type) {

        $filePath = 'public/'.$type.'/'. $fileName;
        if (Storage::exists($filePath)) Storage::delete($filePath);

    }

    public static function storePhoto($photo, $id, $type) {

        $fileName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME).'_'.$id.'.'.$photo->extension();

        $path = $photo->storeAs('public/'.$type.'/',$fileName);

        return $fileName;
    }


}
