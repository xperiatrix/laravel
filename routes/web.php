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

// One-To-One
//1  http://localhost:8000/employees
//2  http://localhost:8000/employees_name
//3  http://localhost:8000/company
//4  http://localhost:8000/companyList

// One-To-Many
//5  http://localhost:8000/employees/1
//6  http://localhost:8000/employeesList

// Simple Test
//7  http://localhost:8000/home/11

Route::get('/', function () {
   // return view('welcome');

    $array = array(
        'var1' => 'Apple',
        'var2' => 'Blackberry',
        'var3' => 'Nokia',
    );
    return view('Testpage', $array);
    

    // return "hello thoughtworks";
});


Route::get('employees', function () {
    $employees = App\Employees::all();
    return $employees;
});


Route::get('employeesList', function () {
    $employees = App\Employees::all();
    $data = DB::select('select a.*, b.* from employees as a, company as b where a.id = b.employeeid');

    for ($i=0; $i < count($data); $i++) { 
        // Format output Json styles
    }

    return $data;
});

Route::get('employees_name', function () {
//    $employees = App\Employees::where('name', '=', 'tim')->first();
    $employees = App\Employees::where('name', '=', 'tom')->get();
    return $employees;
});


Route::get('company', function () {
    $companies = App\Company::all();
    foreach ($companies as $company) {
//        Solution-A:
//        $empolyee = App\Employees::find($company->employeeid);
//        echo $empolyee->name . ' comes from ' .  $company->companyname . '<br>';   // --> HTML

//        Solution-B:
        echo $company->comesFrom->name . ' comes from ' . $company->companyname . '<br>';
    }
//    return $companyList;  // --> Json Data
});

Route::get('companyList', function () {
    $companies = App\Company::all();
    return $companies;
});


Route::get('employees/{id}', function ($id) {
    $employees = App\Employees::find($id);
//    return $employees ? : "nothing";

    echo $employees->name . ' used to work for' . '<br>';
    echo '<ul>';
    foreach ($employees->workedFor as $company) {
        echo '<li>' . $company->companyname . '</li> <br>';
    }
    echo '</ul>';
});


// parameters
Route::get('/home/{name}', function ($name) {
    return array("1", "2", "3", "4", $name);
});



// RESTful API

Route::post('test', function () {
    return array("1", "2", "3", "4");  // create
});


Route::get('test', function () {  // read
    echo '<form action="test" method="POST">';
    echo '<input type="submit">';
    echo '<input type="hidden" value="' . csrf_token() .'" name="_token">';
    echo '<input type="hidden" value="PUT" name="_method">';
    echo '<input type="hidden" value="DELETE" name="_method">';
    echo '</form>';

    // return array("Hello Laravel");
});


Route::put('test', function () {
    echo 'This method triggers from Put';  // update
});

Route::delete('test', function () {
    echo 'This method triggers from Delete';  // delete
});

