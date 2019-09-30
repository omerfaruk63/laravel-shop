@extends('layouts.apps') @section('content')
    <div class="row top-15">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Sepetiniz</span>
                <span class="badge badge-secondary badge-pill">{{Cart::getContent()->count()}}</span>
            </h4>
            <ul class="list-group mb-3">
                @foreach(Cart::getContent() as $product)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{$product->name}}</h6>
                            <small class="text-muted">{{$product->quantity . ' x ₺' . $product->price}}</small>
                        </div>
                        <span class="text-muted">{{'₺' . $product->price * $product->quantity}}</span>
                    </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <span>Toplam (TL)</span>
                    <strong>{{Cart::getSubTotal()}}</strong>
                </li>
            </ul>
            <form action="{{route('cart.clear')}}" method="POST" class="card p-2">
                @csrf
                <div class="input-group">
                    <div class="input-group">
                        <button type="submit" class="btn btn-danger">Sepeti Temizle</button>
                    </div>
                </div>
            </form>
            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promosyon Kodu">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Uygula</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Fatura Adresi</h4>
            <form class="needs-validation" method="POST" action="{{ route('categoryadd.post') }}" >
              {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Ad</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                           Zorunlu Alan !
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Soyad</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Zorunlu Alan !
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(İsteğe Bağlı)</span></label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        Lütfen gönderim güncellemeleri için geçerli bir e-posta adresi girin.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Adres</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Sok." required>
                    <div class="invalid-feedback">
                        Lütfen teslimat adresinizi girin.
                    </div>
                </div>
                <hr class="mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <label class="custom-control-label" for="same-address">Gönderim adresi, fatura adresimle aynı</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Bilgilerimi kaydet</label>
                </div>
                <hr class="mb-4">

                <h4 class="mb-3">Ödeme</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                        <label class="custom-control-label" for="credit">Kredi Kartı</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="debit">Banka Kartı</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Karttaki İsim</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="" required>
                        <small class="text-muted">Kartta görüntülendiği şekliyle tam ad</small>
                        <div class="invalid-feedback">
                            Karttaki isim gerekli
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Kredi Kartı Numarası</label>
                        <input type="text" class="form-control" id="cc-number" placeholder="" required>
                        <div class="invalid-feedback">
                            Kredi kartı numarası gerekli
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Geçerlilik Tarihi</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                        <div class="invalid-feedback">
                            Geçerlilik Tarihi   gerekli
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-cvv">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                        <div class="invalid-feedback">
                            Güvenlik kodu gerekli
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Ödeme işlemine devam et</button>
            </form>
        </div>
    </div>
{{--    <script type="text/javascript">if (typeof iyziInit == 'undefined') {--}}
{{--            var iyziInit = {--}}
{{--                currency: "TRY",--}}
{{--                token: "0d8119c8-c220-48d1-ac41-7df81f37cc82",--}}
{{--                price: 10.91,--}}
{{--                locale: "tr",--}}
{{--                baseUrl: "https://sandbox-api.iyzipay.com",--}}
{{--                merchantGatewayBaseUrl: "https://sandbox-merchantgw.iyzipay.com",--}}
{{--                registerCardEnabled: true,--}}
{{--                bkmEnabled: true,--}}
{{--                bankTransferEnabled: false,--}}
{{--                bankTransferRedirectUrl: "https://google.com/sonuc.php",--}}
{{--                creditCardEnabled: true,--}}
{{--                bankTransferAccounts: [],--}}
{{--                userCards: [],--}}
{{--                fundEnabled: false,--}}
{{--                memberCheckoutEnabled: false,--}}
{{--                force3Ds: false,--}}
{{--                isSandbox: true,--}}
{{--                storeNewCardEnabled: true,--}}
{{--                paymentWithNewCardEnabled: true,--}}
{{--                enabledApmTypes: ["SOFORT", "IDEAL", "QIWI", "GIROPAY"],--}}
{{--                payWithIyzicoUsed: false,--}}
{{--                buyerName: "Emre",--}}
{{--                buyerSurname: "Fındık",--}}
{{--                merchantInfo: "",--}}
{{--                buyerProtectionEnabled: false,--}}
{{--                hide3DS: true,--}}
{{--                gsmNumber: "",--}}
{{--                email: "email@email.com",--}}
{{--                checkConsumerDetail: {"checkConsumerResult": {"consumerExists": false, "consumerHasCard": false}},--}}
{{--                subscriptionPaymentEnabled: false,--}}
{{--                metadata: {},--}}
{{--                createTag: function () {--}}
{{--                    var iyziJSTag = document.createElement('script');--}}
{{--                    iyziJSTag.setAttribute('src', 'https://sandbox-static.iyzipay.com/checkoutform/v2/bundle.js?v=1569600478579');--}}
{{--                    document.head.appendChild(iyziJSTag);--}}
{{--                }--}}
{{--            };--}}
{{--            iyziInit.createTag();--}}
{{--        }--}}
    </script>
@endsection
