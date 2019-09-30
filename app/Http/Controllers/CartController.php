<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Config\MenuConfig;
use Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{




    public function add(Request $request){
        $product = Product::find($request->id);

        Cart::add($product->id, $product->name, $product->price, 1, array());

        return back()->with("$product->name alışveriş sepetine başarıyla eklendi!");;
    }

    public function cart(){
        $params = [
            'title' => 'Ödeme',
        ];

        $config = new MenuConfig();

        $config->title = 'Foo';
        $config->body = 'Bar';
        $config->buttonText = 'Baz';
        $config->cancellable = true;

        $this->createMenu($config);

//dd(Cart::getContent());
        return view('cart')->with($params);
    }

    public function clear(){
        Cart::clear();

        return back()->with('success',"Sepete Eklendi!");;
    }


    /**
     * @param MenuConfig $config
     */
    function createMenu(MenuConfig $config): void
    {

//        dd($config->title);
    }

    function iyzicoTest1()
    {

      /*$options = new \Iyzipay\Options();
      $options->setApiKey("sandbox-OZ5dHrbh47XH5aC5o7dsRs4EP9euOo98");
      $options->setSecretKey("sandbox-oo1WKMwM6JNgpuCrKKemwhheVzHnFRdW");
      $options->setBaseUrl("https://sandbox-api.iyzipay.com");

      $request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
      $request->setLocale(\Iyzipay\Model\Locale::TR);
      $request->setConversationId("123456789");
      $request->setToken($req->input('token'));
# make request
      $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, $options);
# print result
      print_r($checkoutForm);*/
    }


    function iyzicoTest()
    {

        $options = new \Iyzipay\Options();
        $options->setApiKey("sandbox-OZ5dHrbh47XH5aC5o7dsRs4EP9euOo98");
        $options->setSecretKey("sandbox-oo1WKMwM6JNgpuCrKKemwhheVzHnFRdW");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");




        # create request class
        $request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1");
        $request->setPaidPrice("1.2");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setBasketId("B67832");
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $request->setCallbackUrl("http://127.0.0.1:8000/test2");
        $request->setEnabledInstallments(array(2, 3, 6, 9));
        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId("BY789");
        $buyer->setName("John");
        $buyer->setSurname("Doe");
        $buyer->setGsmNumber("+905350000000");
        $buyer->setEmail("email@email.com");
        $buyer->setIdentityNumber("74300864791");
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $buyer->setIp("85.34.78.112");
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkey");
        $buyer->setZipCode("34732");
        $request->setBuyer($buyer);
        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName("Jane Doe");
        $shippingAddress->setCity("Istanbul");
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $shippingAddress->setZipCode("34742");
        $request->setShippingAddress($shippingAddress);
        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName("Jane Doe");
        $billingAddress->setCity("Istanbul");
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $billingAddress->setZipCode("34742");
        $request->setBillingAddress($billingAddress);
        $basketItems = array();

         /*foreach (Cart::getContent() as $value) {
            $item = new \Iyzipay\Model\BasketItem();
            $item->setId($value->id);
            $item->setName($value->name);
            $item->setCategory1("Collectibles");
            $item->setCategory2("Accessories");
            $item->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
            $item->setPrice($value->price);
            array_push($basketItems,$item);

              print_r($basketItems);


          }*/


     $firstBasketItem = new \Iyzipay\Model\BasketItem();
        $firstBasketItem->setId("BI101");
        $firstBasketItem->setName("Binocular");
        $firstBasketItem->setCategory1("Collectibles");
        $firstBasketItem->setCategory2("Accessories");
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice("0.3");
        $basketItems[0] = $firstBasketItem;
        $secondBasketItem = new \Iyzipay\Model\BasketItem();
        $secondBasketItem->setId("BI102");
        $secondBasketItem->setName("Game code");
        $secondBasketItem->setCategory1("Game");
        $secondBasketItem->setCategory2("Online Game Items");
        $secondBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
        $secondBasketItem->setPrice("0.5");
        $basketItems[1] = $secondBasketItem;
        $thirdBasketItem = new \Iyzipay\Model\BasketItem();
        $thirdBasketItem->setId("BI103");
        $thirdBasketItem->setName("Usb");
        $thirdBasketItem->setCategory1("Electronics");
        $thirdBasketItem->setCategory2("Usb / Cable");
        $thirdBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $thirdBasketItem->setPrice("0.2");
        $basketItems[2] = $thirdBasketItem;
        print_r($basketItems);

        $request->setBasketItems($basketItems);
        # make request
        $checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, $options);
        # print result
      echo $checkoutFormInitialize->getCheckoutFormContent();
      echo ' <!--checkoutFromContent ile birlikte-->
<div id="iyzipay-checkout-form" class="responsive"></div>';


    }




}
