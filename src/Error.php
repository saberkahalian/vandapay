<?php

namespace Saber\VandaPay;

class Error
{
    /** @var int */
    private $code;

    public function __construct(int $code)
    {
        $this->code = $code;
    }

    public function code(): int
    {
        return $this->code;
    }

    public function message(): string
    {
                     switch ($this->code) {
                         case 0:
                            return  "مشکلی از سمت بانک رخ داده است.پرداخت انجام نشد";
                            break;
                            case -1:
                            return  "پارامترهای ارسالی برای متد مورد نظر ناقص یا خالی هستند . پارمترهای اجباری باید ارسال گردد";
                            break;
                             case -2:
                            return  "دسترسی api برای شما مسدود است";
                            break;
                             case -6:
                            return  "عدم توانایی اتصال به گیت وی بانک از سمت وبسرویس";
                            break;

                             case -9:
                            return  "خطای ناشناخته";
                            break;

                             case -20:
                            return  "پین نامعتبر";
                            break;
                             case -21:
                            return  "ip نامعتبر";
                            break;

                             case -22:
                            return  "مبلغ وارد شده کمتر از حداقل مجاز میباشد";
                            break;


                            case -23:
                            return  "مبلغ وارد شده بیشتر از حداکثر مبلغ مجاز هست";
                            break;
                            
                              case -24:
                            return  "مبلغ وارد شده نامعتبر";
                            break;
                            
                              case -26:
                            return  "درگاه غیرفعال است";
                            break;
                            
                              case -27:
                            return  "آی پی مسدود شده است";
                            break;
                            
                              case -28:
                            return  "آدرس کال بک نامعتبر است ، احتمال مغایرت با آدرس ثبت شده";
                            break;
                            
                              case -29:
                            return  "آدرس کال بک خالی یا نامعتبر است";
                            break;
                            
                              case -30:
                            return  "چنین تراکنشی یافت نشد";
                            break;
                            
                              case -31:
                            return  "تراکنش ناموفق است";
                            break;
                            
                              case -32:
                            return  "مغایرت مبالغ اعلام شده با مبلغ تراکنش";
                            break;
                         
                            
                              case -35:
                            return  "شناسه فاکتور اعلامی order_id نامعتبر است";
                            break;
                            
                              case -36:
                            return  "پارامترهای برگشتی بانک bank_return نامعتبر است";
                            break;
                                case -38:
                            return  "تراکنش برای چندمین بار وریفای شده است";
                            break;
                            
                              case -39:
                            return  "تراکنش در حال انجام است";
                            break;
                            
                            case 1:
                            return  "پرداخت با موفقیت انجام گردید.";
                            break;

                            default:
                               return  0;
                        }
    }
}
