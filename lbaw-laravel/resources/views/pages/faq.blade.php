@extends('layouts.app')

@section('content')
<section id="faq">
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-center"><span>FAQ</span></h2>
            <div class="col-md-8 offset-md-2 mb-5">
                <div class="bd-example" data-example-id="">
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <div class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        <h3>What shipping method does Tech4U use?</h3>
                                    </a>

                                </div>
                            </div>
                            <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="">
                                <div class="card-block">
                                    We have three shipping methods, they are Flat Rate Shipping, Standard Shipping and Expedited Shipping. For a detailed explanation about each shipping method, destinations and approximate delivery times.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                                <div class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        <h3>What Countries Does GearBest Deliver to?</h3>
                                    </a>

                                </div>
                            </div>
                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
                                <div class="card-block">
                                    We can deliver orders to most countries in the world. Goods are sent from our warehouse by courier, and delivered direct to your door (home or company address).
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <div class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        <h3>Can couriers deliver to remote areas?</h3>
                                    </a>

                                </div>
                            </div>
                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
                                <div class="card-block">
                                    Yes, wherever you are, we will be able to deliver the products to you.
                                    FedEx or DHL might in some cases apply a nominal "remote area charge". This is very rare but can happen when your delivery address is too far from the main logistics centers.

                                    If your address is located in a remote area for the courier of your choice, we will contact you to discuss the issue. You will need to pay an extra 30€ to cover the remote shipping fees from FedEx or DHL. However, if you do not want to pay any additional fees, we would suggest that you ship your order with EMS (Standard Shipping) or Flat Rate Shipping. We will refund you the difference in shipping fee.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <div class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        <h3>If there is some problem receiving the delivery due to Customs</h3>
                                    </a>

                                </div>
                            </div>

                            <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="">
                                <div class="card-block">
                                    <p>
                                        Usually, when you import goods from Tech4U, the packet will be inspected by your local Customs office.
                                    </p>

                                    <p>
                                        <span class="category">There's usually no reason to worry because:</span>
                                    </p>

                                    <p>
                                        1. Tech4U provides all the necessary paperwork for your shipment;
                                    </p>
                                    <p>
                                        2. In most countries it's pretty easy to import most kinds of consumer electronics;
                                    </p>
                                    <p>
                                        3. The actual process of customs clearance is usually handled completely by the delivery company (e.g. UPS, FedEx, DHL);
                                    </p>
                                    <p>
                                        4. If there is any duty (import tax) or other charges to pay, the courier will usually pay it first and deliver the products to you, and you pay the costs later.
                                    </p>

                                    <p>
                                        5. We keep track of all our deliveries. In the event that an order is delayed in customs or experiencing other issues, please feel free to contact us and we will contact the shipping agent on your behalf.
                                    </p>
                                    <br />
                                    <p>
                                        <span class="category">Customs Liability</span>
                                    </p>
                                    <p>
                                        1. If, for any reason, the products cannot be delivered to you due to a Customs problem, we will discuss with you case by case about how best to handle the issue(s).
                                    </p>
                                    <p>
                                        4. If goods cannot be delivered due to restrictions in your own country, this is solely your responsibility. For example, if you decided to try to import an Android phone, but this technology is illegal or restricted due to local laws in the delivery destination country, that is your responsibility to know about before you order from Tech4U. If the delivery failed for that reason, we cannot offer any compensation, because as the importer it's your job to know about the local regulations. Another situation in which you must accept liability is where your country requires you to have a licence to import commercial goods: in this case, it is your responsibility to know about this before you place an order on Tech4U, and in the case of a failed delivery, we cannot offer any compensation.
                                    </p>
                                    <p>
                                        3. As the importer you hold sole legal responsibility for responding to questions about imported goods delivered to yourself. Import duties, sales tax, and any other customs charges and fees, are your sole responsibility, as described in our terms and conditions. If a delivery fails because you do not respond in time to Customs communications, or you refuse to pay the applicable charges, we cannot offer any compensation.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                                <div class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        <h3>If your item is delivered missing some of its parts</h3>
                                    </a>

                                </div>
                            </div>
                            <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
                                <div class="card-block">
                                    <p>
                                        <span class="category">If a key part of your product is missing on delivery, here is how we can solve the problem for you:</span>
                                    </p>
                                    <p>
                                        1. Contact us first, with your order number and product code; we will help to clarify what part is missing.
                                    </p>
                                    <p>
                                        2. For major, expensive and integral product parts we may need to follow it up as a "lost/stolen in delivery"
                                    </p>
                                    <p>
                                        3. If the part is small or an accessory, we will most likely be able to help you by simply re-sending it.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
