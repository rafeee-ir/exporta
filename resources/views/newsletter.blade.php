
<!-- Start Shop Newsletter  -->
<section class="shop-newsletter section" id="newsletter">
    <div class="container">
        <div class="inner-top">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    @include('form-alerts')
                    <!-- Start Newsletter Inner -->
                    <div class="inner">
                        <h4>Newsletter</h4>
                        <p> Subscribe to our newsletter and get news of <span>Exportaworld</span></p>
                        <form action="{{route('newsletter.store')}}" method="post" class="newsletter-inner">
                            @csrf
                            <input name="email" placeholder="Your email address" required type="email">
                            <input type="hidden" name="last_url" value="{{url()->previous()}}">
                            <button class="btn" type="submit">Subscribe</button>
                        </form>
                    </div>
                    <!-- End Newsletter Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop Newsletter -->
