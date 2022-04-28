<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClasesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RouteingController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;


Route::get("/",[HomeController::class,"home"])->name("home");
Route::match(["POST","GET"],"/student",[StudentController::class,"store"])->name("student");
Route::post("/select/login",[AuthController::class,"selectLogin"])->name('select.login');
Route::prefix("teacher")->group(function(){
       Route::get("/login",[TeacherController::class,"login"]);
       Route::post("/login",[AuthController::class,"teacherLogin"])->name("teacher.login");
       Route::get("/",[TeacherController::class,"teacherDashboard"])->name("teacher.dashboard")->middleware("teacherAuth");
       Route::get("/logout",[AuthController::class,"teacherLogout"])->name("teacher.logout");
});

Route::prefix("admin")->middleware("auth")->group(function(){
    Route::get("/",[AdminController::class,"home"])->name('admin.dashboard');
    Route::resource("clases",ClasesController::class);
    Route::resource("teacher",TeacherController::class);
    Route::resource("staff",StaffController::class);
    Route::resource("routing",RouteingController::class);
    Route::resource("attendance",AttendanceController::class);
    Route::get("student/index",[StudentController::class,"index"])->name("student.index");
    Route::resource("subject",SubjectController::class);
    Route::get("/student/newaddmission",[AdminController::class,"newAddmission"])->name("student.newaddmission");
    Route::get("/student/approveAddmissionedit/{id}",[AdminController::class,"approveAddmissionEdit"])->name("student.approveAddmissionedit");
    Route::post("/student/approveAddmission/{id}",[AdminController::class,"approveAddmission"])->name("student.approveAddmission");
    Route::get("/class/student/{clases_id}",[AdminController::class,"viewStudent"])->name("student.viewstudent");
    Route::get("/class/attendance/{roll}",[AttendanceController::class,"viewAttendance"])->name("student.viewattendance");
    Route::post("/class/form/attendance/{roll}",[AttendanceController::class,"makeAttendanceForm"])->name("student.makeattendanceform");
    Route::get("/class/attendance/{roll}/{id}",[AttendanceController::class,"makeAttendance"])->name("student.makeattendance");
    Route::get("/class/routing/{id}",[RouteingController::class,"viewRouting"])->name("class.viewrouting");
    Route::post("/class/student/fetch-student/{id}",[StudentController::class,"fetchStudent"]);
    Route::get("/student/payment",[StudentController::class,"viewPayment"])->name("class.payment");
    Route::get("/student/payment/{roll}",[StudentController::class,"viewPaymentStudent"])->name("class.paymentstudent");
    
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
