<?php namespace Folklore\GraphQL;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GraphQLController extends Controller {
    
    public function query(Request $request)
    {
        $query = $request->get('query');
        $params = $request->get('params');
        
        if(is_string($params))
        {
            $params = json_decode($params, true);
        }
        list($content, $status) = app('graphql')->query($query, $params);
        return response()->json($content, $status);
    }
    
}
