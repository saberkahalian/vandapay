# وندا پرداخت | vanda pardakht

کتابخانه وندا پرداخت برای لاراول 

## روش نصب - Installation

برای نصب و استفاده از این پکیج می توانید از کمپوسر استفاده کنید

## تنظیمات 

Add your api code to .env file

کد api را اضافه کنید.

```dotenv
VANDA_PIN_API=pn-00000
```
## روش استفاده 

### ارسال مشتری به درگاه پرداخت 

```php
$response = vandapay()
    ->merchantId('00000000-0000-0000-0000-000000000000') // تعیین مرچنت کد در حین اجرا - اختیاری
    ->amount(100) // مبلغ تراکنش
    ->request()
    ->description('transaction info') // توضیحات تراکنش
    ->callbackUrl('https://domain.com/verification') // آدرس برگشت پس از پرداخت
    ->mobile('09123456789') // شماره موبایل مشتری - اختیاری
    ->email('name@domain.com') // ایمیل مشتری - اختیاری
    ->send();

if (!$response->success()) {
    return $response->error()->message();
}

// ذخیره اطلاعات در دیتابیس
// $response->authority();

// هدایت مشتری به درگاه پرداخت
return $response->redirect();
```

### بررسی وضعیت تراکنش | Verify payment status

```php
$authority = request()->query('Authority'); // دریافت کوئری استرینگ ارسال شده توسط زرین پال
$status = request()->query('Status'); // دریافت کوئری استرینگ ارسال شده توسط زرین پال

$response = vandapay()
    ->merchantId('00000000-0000-0000-0000-000000000000') // تعیین مرچنت کد در حین اجرا - اختیاری
    ->amount(100)
    ->verification()
    ->authority($authority)
    ->send();

if (!$response->success()) {
    return $response->error()->message();
}

// دریافت هش شماره کارتی که مشتری برای پرداخت استفاده کرده است
// $response->cardHash();

// دریافت شماره کارتی که مشتری برای پرداخت استفاده کرده است (بصورت ماسک شده)
// $response->cardPan();

// پرداخت موفقیت آمیز بود
// دریافت شماره پیگیری تراکنش و انجام امور مربوط به دیتابیس
return $response->referenceId();
```
