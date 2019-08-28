<?php 
    function UsersDetails($user_id){
        return \DB::table('prop_images')->where([
            "property_number" => $property_number
        ])->get();
    }

    function buy(){
        return \DB::table('properties')->where([
            "purpose" => 'Buy'
        ])->orderBy('property_id', 'desc')->get();
    }

    function lease(){
        return \DB::table('properties')->where([
            "purpose" => 'Lease'
        ])->orderBy('property_id', 'desc')->get();
    }

    function sell(){
        return \DB::table('properties')->where([
            "purpose" => 'Sell'
        ])->orderBy('property_id', 'desc')->get();
    }

    function rent(){
        return \DB::table('properties')->where([
            "purpose" => 'Rent'
        ])->orderBy('property_id', 'desc')->get();
    }

    function listagent(){
        return \DB::table('agents')->orderBy('agent_id', 'desc')->get();
    }

    function prop(){
        return \DB::table('properties')->orderBy('property_id', 'desc')->get();
    }

    function propcategories(){
        return \DB::table('property_categories')->orderBy('property_category_name', 'asc')->get();
    }

    function agentcategories(){
        return \DB::table('agent_categories')->orderBy('agent_category_id', 'asc')->paginate(8);
    }

    function agentlistcategories(){
        return \DB::table('agent_categories')->orderBy('agent_category_id', 'desc')->paginate(6);
    }

?>