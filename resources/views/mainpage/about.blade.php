@extends('layout')

@section('title',"About")

@section('location')
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{asset('images/bg_3.jpg')}});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">
          <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <h1 class="mb-3 mt-5 bread">About Us</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span>About</span></p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('content')

  <section class="ftco-about d-md-flex">
      <div class="one-half img" style="background-image: url({{asset('images/about.jpg')}});"></div>
      <div class="one-half ftco-animate">
          <div class="overlap">
          <div class="heading-section ftco-animate ">
              <span class="subheading">Discover</span>
            <h2 class="mb-4">Our Story</h2>
          </div>
          <div>
                    <p>Our first restaurent was opened in 1999 in small town of Texas, we started here for 3 years then thought
                        that we can serve much more than this to everyone. In next 5 years from then, our origin brand "Raccoon Food"
                        had located in many states of US, but it's doesn't last long. In 2008 our customer left
                        us cause there were many big food brand such as "Mc Donald", "Torna Coffee", "CNN Resaurent",...
                        Our sales down then 50 percents in just a year, and it's enough to realize that we need to change
                        and find a new place to start. Today, we have more than twenty shops in Canada and serve people
                        good food everyday. We'd love to serve you the best meal.</p>
                </div>
            </div>
      </div>
  </section>

  <section class="ftco-section img" id="ftco-testimony" style="background-image: url({{asset('images/bg_1.jpg')}});"  data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
              <span class="subheading">Testimony</span>
            <h2 class="mb-4">Customers Says</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
      </div>
      <div class="container-wrap">
        <div class="row d-flex no-gutters">
          <div class="col-lg align-self-sm-end">
            <div class="testimony">
               <blockquote>
                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small.&rdquo;</p>
                </blockquote>
                <div class="author d-flex mt-4">
                  <div class="image mr-3 align-self-center">
                    <img src="images/person_1.jpg" alt="">
                  </div>
                  <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
                </div>
            </div>
          </div>
          <div class="col-lg align-self-sm-end">
            <div class="testimony overlay">
               <blockquote>
                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
                </blockquote>
                <div class="author d-flex mt-4">
                  <div class="image mr-3 align-self-center">
                    <img src="images/person_2.jpg" alt="">
                  </div>
                  <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
                </div>
            </div>
          </div>
          <div class="col-lg align-self-sm-end">
            <div class="testimony">
               <blockquote>
                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small  line of blind text by the name. &rdquo;</p>
                </blockquote>
                <div class="author d-flex mt-4">
                  <div class="image mr-3 align-self-center">
                    <img src="images/person_3.jpg" alt="">
                  </div>
                  <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
                </div>
            </div>
          </div>
          <div class="col-lg align-self-sm-end">
            <div class="testimony overlay">
               <blockquote>
                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however.&rdquo;</p>
                </blockquote>
                <div class="author d-flex mt-4">
                  <div class="image mr-3 align-self-center">
                    <img src="images/person_2.jpg" alt="">
                  </div>
                  <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
                </div>
            </div>
          </div>
          <div class="col-lg align-self-sm-end">
            <div class="testimony">
              <blockquote>
                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small  line of blind text by the name. &rdquo;</p>
              </blockquote>
              <div class="author d-flex mt-4">
                <div class="image mr-3 align-self-center">
                  <img src="images/person_3.jpg" alt="">
                </div>
                <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  <section class="ftco-section">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-md-6 pr-md-5">
                  <div class="heading-section text-md-right ftco-animate">
                <span class="subheading">Discover</span>
              <h2 class="mb-4">Our Menu</h2>
              <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
              <p><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">View Full Menu</a></p>
            </div>
              </div>
              <div class="col-md-6">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="menu-entry">
                              <a href="#" class="img" style="background-image: url({{asset('images/menu-1.jpg')}});"></a>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="menu-entry mt-lg-4">
                              <a href="#" class="img" style="background-image: url({{asset('images/menu-2.jpg')}});"></a>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="menu-entry">
                              <a href="#" class="img" style="background-image: url({{asset('images/menu-3.jpg')}});"></a>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="menu-entry mt-lg-4">
                              <a href="#" class="img" style="background-image: url({{asset('images/menu-4.jpg')}});"></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url({{asset('images/bg_2.jpg')}});" data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-10">
              <div class="row">
                <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                        <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                        <strong class="number" data-number="100">0</strong>
                        <span>Coffee Branches</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                        <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                        <strong class="number" data-number="85">0</strong>
                        <span>Number of Awards</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                        <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                        <strong class="number" data-number="10567">0</strong>
                        <span>Happy Customer</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                        <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                        <strong class="number" data-number="900">0</strong>
                        <span>Staff</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
    </div>
  </section>
@endsection
{{-- end-content --}}
