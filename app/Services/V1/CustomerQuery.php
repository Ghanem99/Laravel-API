<?php 

namespace App\Services\V1;

use Illuminate\Http\Request;

class CustomerQuery {
    protected $safeParams = [
        'postalCode' => ['eq', 'gt', 'lt'], 
        'type' => ['eq'], 
        'email' => ['eq'], 
        'address' => ['eq'], 
        'city' => ['eq'], 
        'state' => ['eq'], 
        'postalCode' => ['eq', 'gt', 'lt']
    ];

    protected $columnMap = [
        'postalCode' => 'postal_code'
    ];

    protected $operatorMap = [
        'eq' => '=', 
        'lt' => '<', 
        'gt' => '>', 
        'gte' => '>=', 
        'lte' => '<=', 
    ];

    public function transform(Request $request) {
        $eloQuery = [];

        foreach ($this->safeParams as $parm => $operators) {
            $query = $request->query($parm);

            if(!isset($query)) {
                continue;
            } 

            $columnMap = $this->columnMap[$parm] ?? $parm;

            foreach ($operators as $operator) {
                if(isset($query[$operator])) {
                    $eloQuery[] = [$columnMap, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }

}