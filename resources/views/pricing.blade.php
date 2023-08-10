@extends('layouts.main')
@section('css')
    <style>
        .card-box {
            -webkit-box-shadow: 0px 5px 30px -10px rgba(0, 0, 0, 0.1);
            box-shadow: 0px 5px 30px -10px rgba(0, 0, 0, 0.1);
            padding: 35px 50px;
            border-radius: 20px;
            position: relative;
        }

        .card-box .plan {
            font-size: 34px;
        }

        .pricing-badge {
            position: absolute;
            top: 0;
            z-index: 999;
            right: 0;
            width: 100%;
            display: block;
            font-size: 15px;
            padding: 0;
            overflow: hidden;
            height: 100px;
        }

        .pricing-badge .badge {
            float: right;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            right: -67px;
            top: 17px;
            position: relative;
            text-align: center;
            width: 200px;
            font-size: 13px;
            margin: 0;
            padding: 7px 10px;
            font-weight: 500;
            color: #ffffff;
            background: #fb7179;
        }

        .mb-2,
        .my-2 {
            margin-bottom: .5rem !important;
        }

        p {
            line-height: 1.7;
        }
    </style>
@endsection
@section('main')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Profile</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Profile
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section id="pricing" class="pricing-content section-padding">
                    <section class="section" id="pricing">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card-box mt-4">
                                        <i class="mdi mdi-account h1"></i>
                                        <h4 class="text-blue">Starter</h4>

                                        <div class="mt-4 pt-2">
                                            <p class="mb-2 f-18">Features</p>

                                            <p class="mb-2"><i
                                                    class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>Unlimited</b>
                                                Target Audience</p>
                                            <p class="mb-2"><i
                                                    class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>1</b>
                                                User Account</p>
                                            <p class="mb-2"><i
                                                    class="mdi mdi-close-circle text-danger f-18 mr-2"></i><b>100+</b>
                                                Video Tuts</p>
                                            <p class="mb-2"><i
                                                    class="mdi mdi-close-circle text-danger f-18 mr-2"></i><b>Public</b>
                                                Displays
                                            </p>
                                        </div>
                                        <p class="mt-4 pt-2 text-muted">Semper urna veal tempus pharetra elit habisse platea
                                            dictumst.
                                        </p>
                                        <div class="pricing-plan mt-4 pt-2">
                                            <h4 class="text-muted"><s> $9.99</s> <span class="plan pl-3 text-dark">$8.99
                                                </span></h4>
                                            <p class="text-muted mb-0">Per Month</p>
                                        </div>
                                        <div class="text-center mt-3">
                                            <a href="" class="btn btn-primary btn-rounded">Purchase Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card-box mt-4">
                                        <div class="pricing-badge">
                                            <span class="badge">Featured</span>
                                        </div>
                                        <i class="mdi mdi-account-multiple h1 text-primary"></i>
                                        <h4 class="f-20 text-primary">Personal</h4>
                                        <div class="mt-4 pt-2">
                                            <p class="mb-2 f-18">Features</p>
                                            <p class="mb-2"><i
                                                    class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>Unlimited</b>
                                                Target Audience</p>
                                            <p class="mb-2"><i
                                                    class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>1</b>
                                                User Account</p>
                                            <p class="mb-2"><i
                                                    class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>100+</b>
                                                Video Tuts</p>
                                            <p class="mb-2"><i
                                                    class="mdi mdi-close-circle text-danger f-18 mr-2"></i><b>Public</b>
                                                Displays
                                            </p>
                                        </div>

                                        <p class="mt-4 pt-2 text-muted">Semper urna veal tempus pharetra elit habisse platea
                                            dictumst.
                                        </p>

                                        <div class="pricing-plan mt-4 pt-2">
                                            <h4 class="text-muted"><s> $19.99</s> <span class="plan pl-3 text-dark">$18.99
                                                </span></h4>
                                            <p class="text-muted mb-0">Per Month</p>
                                        </div>

                                        <div class="text-center mt-3">
                                            <a href="" class="btn btn-primary btn-rounded">Purchase Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card-box mt-4">
                                        <i class="mdi mdi-account-multiple-plus h1"></i>
                                        <h4 class="f-20 text-blue">Ultimate</h4>
                                        <div class="mt-4 pt-2">
                                            <p class="mb-2 f-18">Features</p>

                                            <p class="mb-2"><i
                                                    class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>Unlimited</b>
                                                Target Audience</p>
                                            <p class="mb-2"><i
                                                    class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>1</b>
                                                User Account</p>
                                            <p class="mb-2"><i
                                                    class="mdi mdi-checkbox-marked-circle  f-18 mr-2"></i><b>100+</b>
                                                Video Tuts</p>
                                            <p class="mb-2"><i
                                                    class="mdi mdi-checkbox-marked text-success f-18 mr-2"></i><b>Public</b>
                                                Displays
                                            </p>
                                        </div>
                                        <p class="mt-4 pt-2 text-muted">Semper urna veal tempus pharetra elit habisse platea
                                            dictumst.
                                        </p>

                                        <div class="pricing-plan mt-4 pt-2">
                                            <h4 class="text-muted"><s> $29.99</s> <span class="plan pl-3 text-dark">$28.99
                                                </span></h4>
                                            <p class="text-muted mb-0">Per Month</p>
                                        </div>

                                        <div class="text-center mt-3">
                                            <a href="" class="btn btn-primary btn-rounded">Purchase Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
                <div class="container px-0">
                    <h4 class="mb-30 text-blue h4">Pricing Table Style 1</h4>
                    <div class="row">
                        <div class="col-md-4 mb-30">
                            <div class="card-box pricing-card mt-30 mb-30">
                                <div class="pricing-icon">
                                    <img src="vendors/images/icon-Cash.png" alt="" />
                                </div>
                                <div class="price-title">Beginner</div>
                                <div class="pricing-price"><sup>$</sup>49<sub>/mo</sub></div>
                                <div class="text">
                                    Card servicing<br />
                                    for 1month
                                </div>
                                <div class="cta">
                                    <a href="#" class="btn btn-primary btn-rounded btn-lg">Order Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-30">
                            <div class="card-box pricing-card mt-30 mb-30">
                                <div class="pricing-icon">
                                    <img src="vendors/images/icon-debit.png" alt="" />
                                </div>
                                <div class="price-title">expert</div>
                                <div class="pricing-price"><sup>$</sup>199<sub>/mo</sub></div>
                                <div class="text">
                                    Card servicing<br />
                                    for 6month
                                </div>
                                <div class="cta">
                                    <a href="#" class="btn btn-primary btn-rounded btn-lg">Order Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-30">
                            <div class="card-box pricing-card mt-30 mb-30">
                                <div class="pricing-icon">
                                    <img src="vendors/images/icon-online-wallet.png" alt="" />
                                </div>
                                <div class="price-title">experience</div>
                                <div class="pricing-price"><sup>$</sup>599<sub>/yr</sub></div>
                                <div class="text">
                                    Card servicing<br />
                                    for 1year
                                </div>
                                <div class="cta">
                                    <a href="#" class="btn btn-primary btn-rounded btn-lg">Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-30 mt-30 text-blue h4">Pricing Table Style 2</h4>
                    <div class="row">
                        <div class="col-md-4 mb-30">
                            <div class="card-box pricing-card-style2">
                                <div class="pricing-card-header">
                                    <div class="left">
                                        <h5>Standard</h5>
                                        <p>For small businesses</p>
                                    </div>
                                    <div class="right">
                                        <div class="pricing-price">€10<span>/month</span></div>
                                    </div>
                                </div>
                                <div class="pricing-card-body">
                                    <div class="pricing-points">
                                        <ul>
                                            <li>2 TB of space</li>
                                            <li>120 days of file recovery</li>
                                            <li>Smart Sync</li>
                                            <li>Dropbox Paper admin tools</li>
                                            <li>Granular sharing permissions</li>
                                            <li>User and company-managed groups</li>
                                            <li>Live chat support</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="cta">
                                    <a href="#" class="btn btn-primary btn-rounded btn-lg">Get Started</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-30">
                            <div class="card-box pricing-card-style2">
                                <div class="pricing-card-header">
                                    <div class="left">
                                        <h5>Advanced</h5>
                                        <p>For big businesses</p>
                                    </div>
                                    <div class="right">
                                        <div class="pricing-price">€15<span>/month</span></div>
                                    </div>
                                </div>
                                <div class="pricing-card-body">
                                    <div class="pricing-points">
                                        <ul>
                                            <li>Everything in Standard</li>
                                            <li>As much space as needed</li>
                                            <li>Advanced admin controls</li>
                                            <li>Dropbox Showcase</li>
                                            <li>Tiered admin roles</li>
                                            <li>Advanced user management tools</li>
                                            <li>Domain verification</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="cta">
                                    <a href="#" class="btn btn-primary btn-rounded btn-lg">Get Started</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-30">
                            <div class="card-box pricing-card-style2">
                                <div class="pricing-card-header">
                                    <div class="left">
                                        <h5>Enterprise</h5>
                                        <p>For enterprises</p>
                                    </div>
                                    <div class="right">
                                        <div class="pricing-price">€25<span>/month</span></div>
                                    </div>
                                </div>
                                <div class="pricing-card-body">
                                    <div class="pricing-points">
                                        <ul>
                                            <li>Everything in Advanced</li>
                                            <li>Account Capture</li>
                                            <li>Network control</li>
                                            <li>Enterprise management support</li>
                                            <li>Domain Insights</li>
                                            <li>Advanced training for end users</li>
                                            <li>24/7 phone support</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="cta">
                                    <a href="#" class="btn btn-primary btn-rounded btn-lg">Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
