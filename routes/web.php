<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogfeedbackController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClasesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ParentfeedbackController;
use App\Http\Controllers\RouteingController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;

//homw Route
Route::get("/",[HomeController::class,"home"])->name("home.index");
Route::get("/about",[HomeController::class,"about"])->name("home.about");
Route::get("/clases",[HomeController::class,"clases"])->name("home.clases");
Route::get("/teach",[HomeController::class,"teacher"])->name("home.teacher");
Route::get("/joinclass/{id}",[HomeController::class,"joinClass"])->name("home.joinclass");
Route::get("/gallary",[HomeController::class,"gallery"])->name("home.gallery");
Route::post("/parent/feedback",[ParentfeedbackController::class,"store"])->name("parent.store");
Route::resource("blogfeedback",BlogfeedbackController::class);
Route::get("/blogs",[HomeController::class,"blog"])->name("home.blog");
Route::get("/blogs/{id}",[BlogController::class,"show"])->name("home.show");
Route::match(["POST","GET"],"/student",[StudentController::class,"store"])->name("student");
Route::match(["POST","GET"],"/online/payment",[HomeController::class,"onlinePayment"])->name("online.payment");
Route::post("/online-payment/make-payment",[HomeController::class,"makePayment"])->name("makePayment");
Route::post("/online-payment/call-back",[HomeController::class,"paymentCallback"])->name("paymentcallback");
Route::post("/select/login",[AuthController::class,"selectLogin"])->name('select.login');
//Student Route
Route::prefix("viewstudent")->group(function(){
       Route::get("/",[StudentController::class,"studentDashboard"])->name("student.dashboard")->middleware("studentAuth");
       Route::get("/login",[StudentController::class,"login"]);
       Route::post("/login",[AuthController::class,"studentLogin"])->name("student.login");
       Route::get("/logout",[AuthController::class,"studentLogout"])->name("student.logout");
       Route::get("/view/homework",[HomeworkController::class,"studentHomeWork"])->name("stud.homework")->middleware("studentAuth");
});
//Staff Route
Route::prefix("viewstaff")->group(function(){
     Route::get("/",[StaffController::class,"staffDashboard"])->name("staff.dashboard")->middleware("staffAuth");
     Route::get("/login",[StaffController::class,"login"]);
     Route::post("/login",[AuthController::class,"staffLogin"])->name("staff.login");
     Route::get("/logout",[AuthController::class,"staffLogout"])->name("staff.logout");
});
//Teacher Route
Route::prefix("teachers")->group(function(){
       Route::get("/login",[TeacherController::class,"login"]);
       Route::post("/login",[AuthController::class,"teacherLogin"])->name("teacher.login");
       Route::get("/",[TeacherController::class,"teacherDashboard"])->name("teacher.dashboard")->middleware("teacherAuth");
       Route::get("/routings/view",[TeacherController::class,"viewRouting"])->name("teacher.viewrouting")->middleware("teacherAuth");
       Route::get("/logout",[AuthController::class,"teacherLogout"])->name("teacher.logout");
       Route::resource("homework",HomeworkController::class)->middleware("teacherAuth");
       Route::resource("teacherattendance",AttendanceController::class)->middleware("teacherAuth");
       Route::get("/class/attendance/{roll}",[AttendanceController::class,"viewAttendance"])->name("teacher.viewattendance")->middleware("teacherAuth");
       Route::post("/class/form/attendance/{roll}",[AttendanceController::class,"makeAttendanceForm"])->name("teacher.makeattendanceform")->middleware("teacherAuth");
       Route::get("/class/attendance/{roll}/{id}",[AttendanceController::class,"makeAttendance"])->name("teacher.makeattendance")->middleware("teacherAuth");
      // Route::get("/home/create",[HomeworkController::class,"create"])->name('homework.create')->middleware("teacherAuth");
});


//Admin Route
Route::prefix("admin")->middleware(["auth","userType"])->group(function(){
    Route::get("/",[AdminController::class,"home"])->name('admin.dashboard');
    Route::resource("clases",ClasesController::class);
    Route::resource("teacher",TeacherController::class);
    Route::resource("staff",StaffController::class);
    Route::resource("routing",RouteingController::class);
    Route::resource("attendance",AttendanceController::class);
    Route::resource("blog",BlogController::class);
    Route::resource("gallery",GalleryController::class);
    Route::resource("notice",NoticeController::class);
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
    Route::post("/routings/{clases_id}",[RouteingController::class,"store"])->name('routings.store');
});



 Route::get('/dashboard', function () {
     return view('dashboard');
 })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
