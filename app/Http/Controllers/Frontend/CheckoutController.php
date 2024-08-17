<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyPlan;
use App\Models\Order;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
  public function index($planId)
  {
    if (!isCompanyProfileCompleted()) {
      return redirect()->route('company.profile.index')->with("error", "Vui lòng cập nhật đầy đủ thông tin doanh nghiệp trước.");
    }

    $plan = Plan::findOrFail($planId);

    return view('frontend.pages.checkout', compact('plan'));
  }

  public function vnpayPayment(Request $request)
  {
    $plan = Plan::findOrFail($request->plan_id);

    $orderId = 'jobsnow_' . Str::random(10);

    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = route("company.payment.success", $plan->id);
    $vnp_TmnCode = "7J9G8CEK"; //Mã website tại VNPAY 
    $vnp_HashSecret = "BTZ16L8JDJVFD7E2YBGUCCLD05CFM33O"; //Chuỗi bí mật

    $vnp_TxnRef = $orderId; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = "Thanh toán đơn hàng " . $orderId . " với số tiền " . number_format($plan->price) . "đ";
    $vnp_OrderType = "Đơn hàng JobsNOW";
    $vnp_Amount = $plan->price * 100;
    $vnp_Locale = "vn";
    $vnp_BankCode = "NCB";
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

    $inputData = array(
      "vnp_Version" => "2.1.0",
      "vnp_TmnCode" => $vnp_TmnCode,
      "vnp_Amount" => $vnp_Amount,
      "vnp_Command" => "pay",
      "vnp_CreateDate" => date('YmdHis'),
      "vnp_CurrCode" => "VND",
      "vnp_IpAddr" => $vnp_IpAddr,
      "vnp_Locale" => $vnp_Locale,
      "vnp_OrderInfo" => $vnp_OrderInfo,
      "vnp_OrderType" => $vnp_OrderType,
      "vnp_ReturnUrl" => $vnp_Returnurl,
      "vnp_TxnRef" => $vnp_TxnRef,
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
      $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
      $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }

    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
      if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
      } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
      }
      $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
      $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
      $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array(
      'code' => '00',
      'message' => 'success',
      'data' => $vnp_Url
    );
    if (isset($_POST['redirect'])) {
      header('Location: ' . $vnp_Url);
      die();
    } else {
      echo json_encode($returnData);
    }
    // vui lòng tham khảo thêm tại code demo
  }

  public function paymentSuccess(Request $request, $planId)
  {
    $company = Company::where('user_id', auth()->user()->id)->first();
    $plan = Plan::findOrFail($planId);

    if ($request->vnp_ResponseCode == "00") {

      $order = new Order();
      $order->order_id = $request->vnp_TxnRef;
      $order->company_id = $company->id;
      $order->plan_id = $planId;
      $order->plan_name = $plan->label;
      $order->price = $plan->price;
      $order->transaction_id = $request->vnp_TransactionNo;
      $order->method = "VNPAY";
      $order->currency_name = "VND";
      $order->status = "paid";
      $order->job_count = $plan->job_count;
      $order->featured_job_count = $plan->featured_job_count;
      $order->company_featured_show = $plan->company_featured_show;
      $order->company_verified_show = $plan->company_verified_show;
      $order->save();

      $company->limit_post = $company->limit_post + $plan->job_count;
      $company->limit_featured_post = $company->limit_featured_post + $plan->featured_job_count;
      if ($plan->company_featured_show == 1) {
        $company->visibility = 1;
      }
      if ($plan->company_verified_show == 1) {
        $company->is_profile_verified = 1;
      }
      $company->save();

      return view("frontend.pages.payment-success");
    }

    flash()->addError("Thanh toán không thành công! Vui lòng kiểm tra lại thông tin và thử lại sau.", "Không thành công");

    return redirect()->route("company.checkout", $planId);
  }
}
