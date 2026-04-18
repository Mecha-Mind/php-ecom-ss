@extends('layouts.app')

@section('title', 'سلة التسوق - المتخصص')
@section('description', 'عرض وإدارة سلة التسوق الخاصة بك')

@section('content')
<div class="container py-4">

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">الرئيسية</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                سلة التسوق
            </li>
        </ol>
    </nav>

    <h1 style="margin-bottom: 30px;">سلة التسوق</h1>

    <div class="row">
        <div class="col-md-8">
            {{-- جدول المنتجات --}}
            <div style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: #f8f9fa; border-bottom: 2px solid #ddd;">
                            <th style="padding: 15px; text-align: right; font-weight: 600;">المنتج</th>
                            <th style="padding: 15px; text-align: center; font-weight: 600;">السعر</th>
                            <th style="padding: 15px; text-align: center; font-weight: 600;">الكمية</th>
                            <th style="padding: 15px; text-align: center; font-weight: 600;">المجموع</th>
                            <th style="padding: 15px; text-align: center; font-weight: 600;">الإجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid #eee;">
                            <td colspan="5" style="padding: 40px; text-align: center; color: #999;">
                                <i class="bi bi-cart-x" style="font-size: 3rem; color: #ccc; display: block; margin-bottom: 15px;"></i>
                                <p style="margin: 0; font-size: 1.1rem;">سلتك فارغة حالياً</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-4">
            {{-- ملخص الطلب --}}
            <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px rgba(102, 126, 234, 0.3);">
                <h3 style="margin-bottom: 20px; font-weight: 700;">ملخص الطلب</h3>

                <div style="display: flex; justify-content: space-between; margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid rgba(255,255,255,0.3);">
                    <span>الإجمالي الفرعي:</span>
                    <span>0.00 ريال</span>
                </div>

                <div style="display: flex; justify-content: space-between; margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid rgba(255,255,255,0.3);">
                    <span>الشحن:</span>
                    <span>مجاني</span>
                </div>

                <div style="display: flex; justify-content: space-between; margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid rgba(255,255,255,0.3); font-size: 1.3rem; font-weight: 700;">
                    <span>الإجمالي:</span>
                    <span>0.00 ريال</span>
                </div>

                <a href="{{ route('checkout') }}" style="display: block; background: white; color: #667eea; padding: 12px; border-radius: 8px; text-align: center; text-decoration: none; font-weight: 700; opacity: 0.5; cursor: not-allowed;">
                    إتمام عملية الشراء
                </a>

                <a href="{{ route('home') }}" style="display: block; background: rgba(255,255,255,0.1); color: white; padding: 12px; border-radius: 8px; text-align: center; text-decoration: none; font-weight: 600; margin-top: 10px; border: 1px solid rgba(255,255,255,0.3);">
                    متابعة التسوق
                </a>
            </div>
        </div>
    </div>

</div>
@endsection
