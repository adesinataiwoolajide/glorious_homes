<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth.login')->with('error', 'Please Login with Your Details');
}); 
Route::get('login/github', 'AdministratorController@redirectToProvider');
Route::get('login/github/callback', 'AdministratorController@handleProviderCallback');
Route::post('/upload', "PropertyController@upload_image");
Route::post("/index", "AdministratorController@userlogin")->name("admin.login");
Route::get("/logout", "AdministratorController@logout")->name("admin.logout");
Route::get("/administrator", "AdministratorController@index")->name("admin.index");
// Route::get("/property/{property_type_id}", "PropertyController@preloadSub");

//Website Route Here
Route::get("/", "PageController@index")->name('web.index');
Route::get("/aboutus", "PageController@index")->name('aboutus');
Route::get("agents/agent", "PageController@agent")->name('agent');
Route::get("/agents/agent_details/{email}", "PageController@agentprofile")->name("agent.details");
Route::get("/agent/properties/{agent_id}", "AgentController@properties")->name("agent.properties");
Route::get("/property/properties", "PageController@properties")->name('web.property');
Route::get("/property/property_details/{property_number}", "PageController@details")->name("web.prop.details");
Route::get("/agency/agency", "PageController@index")->name('agency');
Route::get("/property/property_bookings", "PageController@index")->name('bookings');
Route::get("/support/contactus", "PageController@index")->name('contactus');
Route::get("/user/user_login/", "PageController@login")->name('user.login');
Route::get("/user/forgot_password/", "PageController@forgotpassword")->name('user.forgot');
Route::get("/user/update_password/", "PageController@updatepassword")->name('user.updatepassword');

Route::get("/agent/agent_finder/", "PageController@agentFinder")->name('agent.finder');

Route::get("/property/property_categories/{property_category_name}", "PageController@propertycategory")->name("web.prop.cate");

Route::get("/property/sell/property_categories/{property_category_name}", "PageController@propertycategory")->name("web.prop.sell");
Route::get("/property/buy/property_categories/{property_category_name}", "PageController@propertycategory")->name("web.prop.buy");
Route::get("/property/rent/property_categories/{property_category_name}", "PageController@propertycategory")->name("web.prop.rent");
Route::get("/property/lease/property_categories/{property_category_name}", "PageController@propertycategory")->name("web.prop.lease");

Route::post("/agent/contact_agent/", "ContactAgentController@store")->name("contact.agent");
Route::get("/property/request_property/", "PropertyRequestController@index")->name("request.property");
Route::get("/fetchtyping/{property_category_id}", "PropertyRequestController@show ");
// Auth::routes();

Auth::routes(['verify' => true]);

Route::group(["prefix" => "administrator", "middleware" => "verified"], function(){

    Route::get("/dashboard", "AdministratorController@index")->name("administrator.dashboard");

    Route::group(["prefix" => "users"], function(){
        Route::get("/index", "UserController@index")->name("user.create");
        Route::post("/save", "UserController@store")->name("user.save");
        Route::get("/edit/{user_id}", "UserController@edit")->name("user.edit");   
        Route::get("/delete/{user_id}", "UserController@destroy")->name("user.delete");
        Route::post("/update/{user_id}", "UserController@update")->name("user.update"); 
        Route::get("/recyclebin", "UserController@bin")->name("user.restore"); 
        Route::get("/restore/{user_id}", "UserController@restore")->name("user.undelete");
        Route::get("/change_password", "UserController@resetpassword")->name("change.pasword");
        Route::post("/update_password/{user_id}", "UserController@updatepassword")->name("update.password");
        Route::get("/profile", "UserController@profile")->name("user.profile");  
        Route::post("/update_profile/{user_id}", "UserController@updateprofile")->name("profile.update"); 
    });

    Route::group(["prefix" => "agent_categories"], function(){
        Route::get("/index", "AgentCategoryController@index")->name("agent.category.create");
        Route::post("/save", "AgentCategoryController@store")->name("agent.category.save");
        Route::get("/edit/{agent_category_id}", "AgentCategoryController@edit")->name("agent.category.edit");   
        Route::get("/delete/{agent_category_id}", "AgentCategoryController@destroy")->name("agent.category.delete");
        Route::post("/update/{agent_category_id}", "AgentCategoryController@update")->name("agent.category.update"); 
        Route::get("/recyclebin", "AgentCategoryController@bin")->name("agent.category.restore"); 
        Route::get("/restore/{agent_category_id}", "AgentCategoryController@restore")->name("agent.category.undelete");  
    });

    Route::group(["prefix" => "property_categories"], function(){
        Route::get("/index", "PropertyCategoryController@index")->name("property.category.create");
        Route::post("/save", "PropertyCategoryController@store")->name("property.category.save");
        Route::get("/edit/{property_category_id}", "PropertyCategoryController@edit")->name("property.category.edit");   
        Route::get("/delete/{property_category_id}", "PropertyCategoryController@destroy")->name("property.category.delete");
        Route::post("/update/{property_category_id}", "PropertyCategoryController@update")->name("property.category.update"); 
        Route::get("/recyclebin", "PropertyCategoryController@bin")->name("property.category.restore"); 
        Route::get("/restore/{property_category_id}", "PropertyCategoryController@restore")->name("property.category.undelete");  
    });

    Route::group(["prefix" => "property_types"], function(){
        Route::get("/index", "PropertyTypesController@index")->name("property.type.create");
        Route::post("/save", "PropertyTypesController@store")->name("property.type.save");
        Route::get("/edit/{property_type_id}", "PropertyTypesController@edit")->name("property.type.edit");   
        Route::get("/delete/{property_type_id}", "PropertyTypesController@destroy")->name("property.type.delete");
        Route::post("/update/{property_type_id}", "PropertyTypesController@update")->name("property.type.update"); 
        Route::get("/recyclebin", "PropertyTypesController@bin")->name("property.type.restore"); 
        Route::get("/restore/{property_type_id}", "PropertyTypesController@restore")->name("property.type.undelete");  
    });

    Route::group(["prefix" => "agent_subscription"], function(){
        Route::get("/index", "AgentSuscriptionController@index")->name("subscription.create");
        Route::post("/save", "AgentSuscriptionController@store")->name("subscription.save");
        Route::get("/edit/{subscription_id}", "AgentSuscriptionController@edit")->name("subscription.edit");   
        Route::get("/delete/{subscription_id}", "AgentSuscriptionController@destroy")->name("subscription.delete");
        Route::post("/update/{subscription_id}", "AgentSuscriptionController@update")->name("subscription.update"); 
        Route::get("/recyclebin", "AgentSuscriptionController@bin")->name("subscription.restore"); 
        Route::get("/restore/{subscription_id}", "AgentSuscriptionController@restore")->name("subscription.undelete");
        
    });

    Route::group(["prefix" => "agents"], function(){
        Route::get("/index", "AgentController@index")->name("agent.create");
        Route::post("/save", "AgentController@store")->name("agent.save");
        Route::get("/edit/{email}", "AgentController@edit")->name("agent.edit");   
        Route::get("/delete/{email}", "AgentController@destroy")->name("agent.delete");
        Route::post("/update/{agent_id}", "AgentController@update")->name("agent.update"); 
        Route::get("/recyclebin", "AgentController@bin")->name("agent.restore"); 
        Route::get("/restore/{agent_id}", "AgentController@restore")->name("agent.undelete");  

        Route::get("/profile/{email}", "AgentController@show")->name("agent.show");
        Route::post("/updateprofile/{email}", "AgentController@updateprofile")->name("agent.pro");
        Route::get("/properties/{email}", "AgentController@properties")->name("agent.properties");
        
    });

    Route::group(["prefix" => "documents"], function(){
        Route::get("/index", "PropertyDocumentController@index")->name("document.create");
        Route::post("/save", "PropertyDocumentController@store")->name("document.save");
        Route::get("/edit/{document_id}", "PropertyDocumentController@edit")->name("document.edit");   
        Route::get("/delete/{document_id}", "PropertyDocumentController@destroy")->name("document.delete");
        Route::post("/update/{document_id}", "PropertyDocumentController@update")->name("document.update"); 
        Route::get("/recyclebin", "PropertyDocumentController@bin")->name("document.restore"); 
        Route::get("/restore/{document_id}", "PropertyDocumentController@restore")->name("document.undelete");  
    });

    Route::group(["prefix" => "properties"], function(){
        Route::get("/all_properties", "PropertyController@index")->name("property.index");
        Route::get("/create", "PropertyController@create")->name("property.create");
        Route::post("/save", "PropertyController@store")->name("property.save");
        Route::post("/upload_image", "PropertyImagesController@store")->name("property.image");
        Route::get("/edit/{property_number}", "PropertyController@edit")->name("property.edit");   
        Route::get("/delete/{property_number}", "PropertyController@destroy")->name("property.delete");
        Route::post("/update/{property_number}", "PropertyController@update")->name("property.update"); 
        Route::post("/updating/{property_number}", "PropertyController@update")->name("property.update"); 

        Route::get("/recyclebin", "PropertyController@bin")->name("property.restore"); 
        Route::get("/restore/{property_number}", "PropertyController@restore")->name("property.undelete");  
        Route::get("/delete_image/{image_id}", "PropertyImagesController@destroy")->name("property.delete.image");
        Route::get("/property_details/{property_number}", "PropertyController@details")->name("property.show");

        Route::get("/booked_properties", "PropertyController@booked")->name("property.booked");
        Route::get("/sold_properties", "PropertyController@sold")->name("property.sold");
        Route::get("/available_properties", "PropertyController@available")->name("property.available");
    });

    Route::group(["prefix" => "facilities"], function(){
        Route::get("/index", "FacilityController@index")->name("facility.create");
        Route::post("/save", "FacilityController@store")->name("facility.save");
        Route::get("/edit/{facility_id}", "FacilityController@edit")->name("facility.edit");   
        Route::get("/delete/{facility_id}", "FacilityController@destroy")->name("facility.delete");
        Route::post("/update/{facility_id}", "FacilityController@update")->name("facility.update"); 
        Route::get("/recyclebin", "FacilityController@bin")->name("facility.restore"); 
        Route::get("/restore/{facility_id}", "FacilityController@restore")->name("facility.undelete");  
    });


});

