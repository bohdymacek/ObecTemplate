<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute musí být přijat.',
    'accepted_if' => ':attribute musí být přijat, pokud :other je :value.',
    'active_url' => ':attribute není platná URL adresa.',
    'after' => ':attribute musí být datum po :date.',
    'after_or_equal' => ':attribute musí být datum po nebo rovno :date.',
    'alpha' => ':attribute smí obsahovat pouze písmena.',
    'alpha_dash' => ':attribute smí obsahovat pouze písmena, číslice, pomlčky a podtržítka.',
    'alpha_num' => ':attribute smí obsahovat pouze písmena a číslice.',
    'array' => ':attribute musí být pole.',
    'ascii' => ':attribute smí obsahovat pouze jednoznakové alfanumerické znaky a symboly.',
    'before' => ':attribute musí být datum před :date.',
    'before_or_equal' => ':attribute musí být datum před nebo rovno :date.',
    'between' => [
        'array' => ':attribute musí obsahovat mezi :min a :max položkami.',
        'file' => ':attribute musí mít velikost mezi :min a :max kilobajty.',
        'numeric' => ':attribute musí být mezi :min a :max.',
        'string' => ':attribute musí mít mezi :min a :max znaky.',
    ],
    'boolean' => 'Pole :attribute musí být pravda nebo nepravda.',
    'confirmed' => 'Potvrzení :attribute se neshoduje.',
    'current_password' => 'Heslo je nesprávné.',
    'date' => ':attribute není platné datum.',
    'date_equals' => ':attribute musí být datum rovné :date.',
    'date_format' => ':attribute neodpovídá formátu :format.',
    'decimal' => ':attribute musí mít :decimal desetinných míst.',
    'declined' => ':attribute musí být odmítnut.',
    'declined_if' => ':attribute musí být odmítnut, pokud :other je :value.',
    'different' => ':attribute a :other musí být odlišné.',
    'digits' => ':attribute musí mít :digits číslic.',
    'digits_between' => ':attribute musí mít mezi :min a :max číslicemi.',
    'dimensions' => ':attribute má neplatné rozměry obrázku.',
    'distinct' => 'Pole :attribute obsahuje duplicitní hodnotu.',
    'doesnt_end_with' => ':attribute nesmí končit jedním z následujících: :values.',
    'doesnt_start_with' => ':attribute nesmí začínat jedním z následujících: :values.',
    'email' => ':attribute musí být platná e-mailová adresa.',
    'ends_with' => ':attribute musí končit jedním z následujících: :values.',
    'enum' => 'Vybraný :attribute je neplatný.',
    'exists' => 'Vybraný :attribute je neplatný.',
    'file' => ':attribute musí být soubor.',
    'filled' => 'Pole :attribute musí být vyplněno.',
    'gt' => [
        'array' => ':attribute musí mít více než :value položek.',
        'file' => ':attribute musí být větší než :value kilobajtů.',
        'numeric' => ':attribute musí být větší než :value.',
        'string' => ':attribute musí mít více než :value znaků.',
    ],
    'gte' => [
        'array' => ':attribute musí mít alespoň :value položek.',
        'file' => ':attribute musí být větší nebo rovno :value kilobajtů.',
        'numeric' => ':attribute musí být větší nebo rovno :value.',
        'string' => ':attribute musí mít alespoň :value znaků.',
    ],
    'image' => ':attribute musí být obrázek.',
    'in' => 'Vybraný :attribute je neplatný.',
    'in_array' => 'Pole :attribute neexistuje v :other.',
    'integer' => ':attribute musí být celé číslo.',
    'ip' => ':attribute musí být platná IP adresa.',
    'ipv4' => ':attribute musí být platná IPv4 adresa.',
    'ipv6' => ':attribute musí být platná IPv6 adresa.',
    'json' => ':attribute musí být platný JSON řetězec.',
    'lowercase' => ':attribute musí být malými písmeny.',
    'lt' => [
        'array' => ':attribute musí mít méně než :value položek.',
        'file' => ':attribute musí být menší než :value kilobajtů.',
        'numeric' => ':attribute musí být menší než :value.',
        'string' => ':attribute musí mít méně než :value znaků.',
    ],
    'lte' => [
        'array' => ':attribute nesmí mít více než :value položek.',
        'file' => ':attribute musí být menší nebo rovno :value kilobajtů.',
        'numeric' => ':attribute musí být menší nebo rovno :value.',
        'string' => ':attribute nesmí mít více než :value znaků.',
    ],
    'mac_address' => ':attribute musí být platná MAC adresa.',
    'max' => [
        'array' => ':attribute nesmí mít více než :max položek.',
        'file' => ':attribute nesmí být větší než :max kilobajtů.',
        'numeric' => ':attribute nesmí být větší než :max.',
        'string' => ':attribute nesmí být delší než :max znaků.',
    ],
    'max_digits' => ':attribute nesmí mít více než :max číslic.',
    'mimes' => ':attribute musí být soubor typu: :values.',
    'mimetypes' => ':attribute musí být soubor typu: :values.',
    'min' => [
        'array' => ':attribute musí mít alespoň :min položek.',
        'file' => ':attribute musí mít alespoň :min kilobajtů.',
        'numeric' => ':attribute musí být alespoň :min.',
        'string' => ':attribute musí mít alespoň :min znaků.',
    ],
    'min_digits' => ':attribute musí mít alespoň :min číslic.',
    'multiple_of' => ':attribute musí být násobkem :value.',
    'not_in' => 'Vybraný :attribute je neplatný.',
    'not_regex' => 'Formát :attribute je neplatný.',
    'numeric' => ':attribute musí být číslo.',
    'password' => [
        'letters' => ':attribute musí obsahovat alespoň jedno písmeno.',
        'mixed' => ':attribute musí obsahovat alespoň jedno velké a jedno malé písmeno.',
        'numbers' => ':attribute musí obsahovat alespoň jedno číslo.',
        'symbols' => ':attribute musí obsahovat alespoň jeden symbol.',
        'uncompromised' => 'Zadané :attribute bylo nalezeno v úniku dat. Zvolte jiné :attribute.',
    ],
    'present' => 'Pole :attribute musí být přítomné.',
    'prohibited' => 'Pole :attribute je zakázáno.',
    'prohibited_if' => 'Pole :attribute je zakázáno, pokud :other je :value.',
    'prohibited_unless' => 'Pole :attribute je zakázáno, pokud :other není v :values.',
    'prohibits' => 'Pole :attribute zakazuje přítomnost :other.',
    'regex' => 'Formát :attribute je neplatný.',
    'required' => 'Pole :attribute je povinné.',
    'required_array_keys' => 'Pole :attribute musí obsahovat záznamy pro: :values.',
    'required_if' => 'Pole :attribute je povinné, pokud :other je :value.',
    'required_if_accepted' => 'Pole :attribute je povinné, pokud je :other přijat.',
    'required_unless' => 'Pole :attribute je povinné, pokud :other není v :values.',
    'required_with' => 'Pole :attribute je povinné, pokud :values je přítomno.',
    'required_with_all' => 'Pole :attribute je povinné, pokud :values jsou přítomny.',
    'required_without' => 'Pole :attribute je povinné, pokud :values není přítomno.',
    'required_without_all' => 'Pole :attribute je povinné, pokud žádné z :values nejsou přítomny.',
    'same' => ':attribute a :other se musí shodovat.',
    'size' => [
        'array' => ':attribute musí obsahovat :size položek.',
        'file' => ':attribute musí mít :size kilobajtů.',
        'numeric' => ':attribute musí být :size.',
        'string' => ':attribute musí mít :size znaků.',
    ],
    'starts_with' => ':attribute musí začínat jedním z následujících: :values.',
    'string' => ':attribute musí být řetězec.',
    'timezone' => ':attribute musí být platná časová zóna.',
    'unique' => ':attribute již byl použit.',
    'uploaded' => 'Nahrání :attribute selhalo.',
    'uppercase' => ':attribute musí být velkými písmeny.',
    'url' => ':attribute musí být platná URL adresa.',
    'ulid' => ':attribute musí být platný ULID.',
    'uuid' => ':attribute musí být platné UUID.',


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
