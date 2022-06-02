<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Clases;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Parentfeedback;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Paytm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function home(){
        $data['clases']=Clases::all();
        $data['teachers']=Teacher::all();
        $data['blogs']=Blog::all();
        $data['notice']=Notice::all();
        $data['parentfeedback']=Parentfeedback::all();
        return view("homepages/index",$data);
    }
    public function about(){
        $data['clases']=Clases::all();
        $data['teachers']=Teacher::all();
        return view("homepages/about",$data);
    }
   public function clases(){
       $data['clases']=Clases::all();
       return view("homepages/clases",$data);
   }
   public function teacher(){
    $data['clases']=Clases::all();
      $data['teachers']=Teacher::all();
      $data['parentfeedback']=Parentfeedback::all();
      return view("homepages/teacher",$data);
   }

   public function gallery(){
    $data['clases']=Clases::all();
       $data['subjects']=Subject::all();
       $data['gallery']=Gallery::all();
       return view("homepages/gallery",$data);
   }

   public function blog(){
    $data['clases']=Clases::all();
       $data['blogs']=Blog::all();
       return view("homepages/blog",$data);
   }
   public function viewBlog(){
      
   }
   public function joinClass($id){
       $data['clases_id']=Clases::find($id);
       $data['clases']=Clases::all();
       return view("homepages/joinclass",$data);
   }
    public function onlinePayment(Request $request){
        $data['payment']=[];
        if($request->method() == "POST"){
            $roll=$request->roll;
            
            $clases_id=$request->clases_id;
            
             $student=Student::where([['roll',$roll],['clases_id',$clases_id]])->first();
                     
                    if($student){
                         $data['payment']=Payment::where("student_id",$student->id)->get();
                         $data['clases']=Clases::all();
                        return view("homepages/payment",$data);
                    }
                    else{
                        echo " first nothing";
                       return redirect()->back();
                    }
        }

        $data['clases']=Clases::all();
        return view("homepages/payment",$data);
    }
    public function makePayment(Request $req)
    {
        $roll=$req->roll;
        $dob=$req->dob;
        $std=Student::where("roll",$roll)->first();
        $pay=Payment::find($req->pay_id);
       
        

          $payment = Paytm::with('receive');
          
          $payment->prepare([
            'order' => $pay->id,
            'user' => $std->id,
            'mobile_number' => $std->contact,
            'email' => $std->email,
            'amount' => $pay->fee,
            'callback_url' => "http://localhost:8000/online-payment/call-back"
          ]);
          return $payment->receive();
      }
  
      /**
       * Obtain the payment information.
       *
       * @return Object
       */
      public function paymentCallback()
      {
          $transaction = Paytm::with('receive');
          
          $response = $transaction->response(); // To get raw response as array
          //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm
          
          if($transaction->isSuccessful()){
            $order_id=$response["ORDERID"];
            $payment_record=Payment::find($order_id);
            $student_record=Student::find($payment_record->student_id);
            AdminController::makeCashPayment($student_record->id,$payment_record->id);
            return redirect()->back();
          }else if($transaction->isFailed()){
            echo "failed";
          }else if($transaction->isOpen()){
            echo "processing"; 
            //Transaction Open/Processing
          }
          $transaction->getResponseMessage(); //Get Response Message If Available
          //get important parameters via public methods
          $transaction->getOrderId(); // Get order id
          $transaction->getTransactionId(); // Get transaction id
  
      }    


   
}
