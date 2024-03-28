<?php
// include 'class-list-util.php';

class DataTableApi
{
    public $columnsDefault = [
        'RecordID'         => true,
        'OrderID'          => true,
        'Name'             => true,
        'Country'          => true,
        'CountryCode'      => true,
        'City'             => true,
        'Company'          => true,
        'Address'          => true,
        'Email'            => true,
        'Currency'         => true,
        'Notes'            => true,
        'Department'       => true,
        'Website'          => true,
        'Latitude'         => true,
        'Longitude'        => true,
        'Datetime'         => true,
        'TimeZone'         => true,
        'Money'            => true,
        'Gender'           => true,
        'CreditCardNumber' => true,
        'CreditCardType'   => true,
    ];

    public function __construct()
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');
    }

    public function init()
    {
        if (isset($_REQUEST['columnsDef']) && is_array($_REQUEST['columnsDef'])) {
            foreach ($_REQUEST['columnsDef'] as $field) {
                $columnsDefault[$field] = true;
            }
        }

        // get all raw data
        $alldata = $this->getJsonDecode();

        $data = [];
        

        echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function filterArray($array, $allowed = [])
    {
        return array_filter(
            $array,
            function ($val, $key) use ($allowed) { // N.b. $val, $key not $key, $val
                return isset($allowed[$key]) && ($allowed[$key] === true || $allowed[$key] === $val);
            },
            ARRAY_FILTER_USE_BOTH
        );
    }

    public function filterKeyword($data, $search, $field = '')
    {
        $filter = '';
        if (isset($search['value'])) {
            $filter = $search['value'];
        }
        if (!empty($filter)) {
            if (!empty($field)) {
                if (strpos(strtolower($field), 'date') !== false) {
                    // filter by date range
                    $data = $this->filterByDateRange($data, $filter, $field);
                } else {
                    // filter by column
                    $data = array_filter($data, function ($a) use ($field, $filter) {
                        return (boolean) preg_match("/$filter/i", $a[$field]);
                    });
                }

            } else {
                // general filter
                $data = array_filter($data, function ($a) use ($filter) {
                    return (boolean) preg_grep("/$filter/i", (array) $a);
                });
            }
        }

        return $data;
    }

    public function filterByDateRange($data, $filter, $field)
    {
        // filter by range
        if (!empty($range = array_filter(explode('|', $filter)))) {
            $filter = $range;
        }

        if (is_array($filter)) {
            foreach ($filter as &$date) {
                // hardcoded date format
                $date = date_create_from_format('m/d/Y', stripcslashes($date));
            }
            // filter by date range
            $data = array_filter($data, function ($a) use ($field, $filter) {
                // hardcoded date format
                $current = date_create_from_format('m/d/Y', $a[$field]);
                $from    = $filter[0];
                $to      = $filter[1];
                if ($from <= $current && $to >= $current) {
                    return true;
                }

                return false;
            });
        }

        return $data;
    }

    public function getJsonDecode(): mixed
    {
        return json_decode(file_get_contents('customers.json'), true);
    }

    /**
     * @param  array  $data
     *
     * @return array
     */
    public function reformat($data): array
    {
        return array_map(function ($item) {
            // hide credit card number
            $item['CreditCardNumber'] = '**** '.substr($item['CreditCardNumber'], -4);

            $item['CreditCardType'] = $item['CreditCardType'] === 'americanexpress' ? 'american-express' : $item['CreditCardType'];

            // reformat datetime
            $item['Datetime'] = date('d M Y, g:i a', strtotime($item['Datetime']));

            return $item;
        }, $data);
    }

    public function arraySearch($array, $keyword)
    {
        return array_filter($array, function ($a) use ($keyword) {
            return (boolean) preg_grep("/$keyword/i", (array) $a);
        });
    }

}

$api = new DataTableApi;
$api->init();