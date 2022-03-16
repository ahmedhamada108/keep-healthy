<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KEEP HEALTHY</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <link rel="stylesheet" href="{{ asset('assets/CSS/style.CSS') }}">
    <!-- Bootstrap CSS -->
</head>

<body>
    <!-- START NAV BAR -->
    <nav>
        <div class="container nav__container">
            <a href="#">
                <h4>KEEP HEALTHY</h4>
            </a>
            <ul class="nav__menu">
                <li> <a href="{{ url('/') }}">Home</a></li>
                <li> <a href="#diet">Diet Plans</a></li>
                <li> <a href="#MultiVitamin">MultiVitamin</a></li>
                <li> <a href="#Contact">Contact</a></li>
            </ul>
            <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
            <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>
    <!-- **END NAV BAR** -->

    <!-- START header section -->
    <header>
        @if ($errors->any())
                    <ul style="background-color:#00968826;text-align-last: center;">
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
        @endif
        @if (session('success'))
        <ul style="background-color:#00968826;text-align-last: center;">
            {{ session('success') }}
        </ul>
        @endif
        @if (session('error'))
            <ul style="background-color:#00968826;text-align-last: center;">
                    {{ session('error') }}
            </ul>
        @endif
        <div class="container header__container" id="Home">
            <div class="header__left">
                <h1>
                    Welcome to our site
                </h1>
                <p>Helping and encouraging all people to take care of their health by following a diet,
                    taking vitamins and exercising.</p>
                <a href="#Contact" class="btn btn-primary">Get started on your diet plan</a>
            </div>
            <div class="herader__right">
                <div class="header__right-images">
                    <img src="{{ asset('assets/images/grilled-salmon-fish-with-seasoning-various-vegetables-black-stone-background_126277-79.jpg') }}"
                        alt="">
                </div>
            </div>
        </div>
    </header>
    <!-- **END header section** -->
    <!-- start diet -->
    <section class="diet">
        <div class="container diet__container" id="diet">
            <div class="diet__left">
                <h1>The basics of your diet plan</h1>
                <p>
                    The main things are counting calories, drinking enough water,
                    exercising and eating healthy food
                </p>
                <a href="#diet" class="btn">Learn More</a>
            </div>
            <div class="diet__right">
                <article class="category">
                    <span class="category__icon"><i class="fa-solid fa-weight-scale"></i></span>
                    <h5>Calories</h5>
                    <p>You should count your calories from food</p>

                </article>

                <article class="category">
                    <span class="category__icon"><i class="fa-solid fa-apple-whole"></i></span>
                    <h5>Healthy food and water</h5>
                    <p>You should eat healthy food and drink enough water for your body</p>

                </article>

                <article class="category">
                    <span class="category__icon"><i class="fa-solid fa-dumbbell"></i></span>
                    <h5>Workouts and exercises</h5>
                    <p>It is very important to exercise in your day</p>

                </article>

                <article class="category">
                    <span class="category__icon"><i class="fa-solid fa-capsules"></i></i></span>
                    <h5>Vitamins</h5>
                    <p>Interested in knowing what your body is missing in calories?</p>

                </article>

                <article class="category">
                    <span class="category__icon"><i class="fa-solid fa-heart-pulse"></i></i></span>
                    <h5>Health sites</h5>
                    <p>Follow the best health sites and follow their advice</p>

                </article>

                <article class="category">
                    <span class="category__icon"><i class="fa-solid fa-square-envelope"></i></i></span>
                    <h5>Private Coach ?</h5>
                    <p>It is possible to follow up with a specialized trainer to help you</p>
                </article>
            </div>
        </div>
    </section>
    <!-- END DIET -->
    <!-- Start Calc calories -->

    <section class="calories">

        <title>Calorie Calculator</title>
        <style>
            #loading,
            #results {
                display: none;
            }

            #loading {
                width: 100%;
            }

        </style>
        </head>

        <body class="bg-dark">
            <div class="container__caloriess">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="card card-body text-center mt-5">
                            <h1 class="heading display-5 pb-3">Calorie Calculator</h1>
                            <form id="calorie-form">

                                <div class="form-group_row">
                                    <label for="age" class="col-sm-2 col-form-label">Age</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="age" placeholder="Ages 15-80">
                                    </div>
                                </div>

                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                        <div class="col-sm-10" id="form-radio">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="male" name="customRadioInline1"
                                                    class="custom-control-input" checked="checked">
                                                <label class="custom-control-label" for="male">Male</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="female" name="customRadioInline1"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="form-group row">
                                    <label for="weight" class="col-sm-2 col-form-label">Weight</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="weight"
                                            placeholder="In kilograms">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="height" class="col-sm-2 col-form-label">Height</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="height"
                                            placeholder="In centimeters">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <legend class="col-form-label col-sm-2 pt-0">Activity</legend>
                                    <select class="custom-select col-sm-10" id="list">
                                        <option selected value="1">Sedentary (little or no exercise)</option>
                                        <option value="2">Lightly active (light exercise/sports 1-3 days/week)</option>
                                        <option value="3">Moderately active (moderate exercise/sports 3-5 days/week)
                                        </option>
                                        <option value="4">Very active (hard exercise/sports 6-7 days a week)</option>
                                        <option value="5">Extra active (very hard exercise/sports & physical job or 2x
                                            training)</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Calculate" class="btn btn-dark btn-block">
                                </div>

                            </form>

                            <div id="loading">
                                <img src="{{ asset('assets/img/Loading.gif') }}" alt="">
                            </div>

                            <div id="results" class="pt-4">
                                <h5>Total Calories</h5>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="total-calories" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
                        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
            </script>
    </section>
    <!-- End Calc calories -->


    <!-- start  The best exercises at home -->

    <section class="exercises">
        <h2>The best exercises at home</h2>
        <div class="container websites__container">
            @foreach($exercises as $exercise)
                <article class="website">
                    <div class="websites__image">
                        <img src="/images/exercises/{{ $exercise->image_path }}">
                    </div>
                    <div class="websites__info">
                        <h4>{{ $exercise->title }}</h4>
                        <p>
                            {{ $exercise->content }}
                        </p>
                        <a href="{{ $exercise->video_url }}"
                            class="btn btn-primary">Workout video</a>
                    </div>
                </article>
            @endforeach

        </div>
    </section>

    <!-- End  The best exercises at home -->

    <!-- start best sites -->


    <section class="websites">
        <h2>The best health websites to help you</h2>
        <div class="container websites__container">
            @foreach($sites as $site)
            <article class="website">
                <div class="websites__image">
                    <img src="/images/sites/{{$site->image_path  }}">
                </div>
                <div class="websites__info">
                    <h4>{{ $site->title }}</h4>
                    <p>{{ $site->content }} </p>
                    <a href="{{ $site->site_url }}" class="btn btn-primary">Browse the site</a>
                </div>
            </article>
            @endforeach
            
        </div>
    </section>

    <!-- End best sites -->
    <!-- Start vitamins -->
    <section class="vitamins" id="MultiVitamin">
        <h2>The most important vitamins your body needs</h2>
        <div class="container vitamins__container">
            @foreach($vitamins as $vitamin)
            <article class="vitamin">
                <div class="vitamin__icon"><i class="fa-solid fa-circle-plus"></i></div>
                <div class="question__answer">
                    <h4> {{ $vitamin->title }} </h4>
                    <p>{{ $vitamin->content }}</p>
                </div>
            </article>
            @endforeach
            

        </div>
    </section>
    <!-- end vitamins -->

    <!-- Start moti -->
    <section class="container motivational__container mySwiper">
        <h2>Motivational Messages For You</h2>
        <div class="swiper-wrapper">
            @foreach($messages as $message)
            <article class="moti swiper-slide">
                <div class="avatar">
                    <img src="/images/motivations/{{ $message->image_path }}" alt="">
                </div>
                <div class="moti__info">
                    <h5>{{ $message->name }}</h5>
                    <small>{{ $message->job }}</small>
                </div>
                <div class="moti__body">
                    <p>{{ $message->content }}</p>
                </div>

            </article>
            @endforeach
            

        </div>
        <div class="swiper-pagination"></div>
    </section>
    <!-- End moti -->

    <!-- start contact section -->
    <section class="Contact">
        <div class="container Contact__container" id="Contact">
            <aside class="Contact__aside">
                <div class="aside__image">
                    <img src="{{ asset('assets/images/New folder/_main2_trainer2.Jpg') }}" alt="">
                </div>
                <h2>Contact Us</h2>
                <p>Get Diet and Fitness Tips In Your Inbox</p>
                <ul class="Contact__details">
                    <li>
                        <i class="uil uil-phone-times"></i>
                        <h5>01090326682</h5>
                    </li>
                    <li>
                        <i class="uil uil-envelope"></i>
                        <h5>muhammedyakout96@gmail.com</h5>
                    </li>
                    <li>
                        <i class="uil uil-location-point"></i>
                        <h5>Alexandria , Egypt</h5>
                    </li>
                </ul>
                <ul class="Contact__socials">
                    <li> <a href="https://www.facebook.com/yakout.74/"><i class="uil uil-facebook-f"></i></a></li>
                    <li> <a href="https://twitter.com/MuhamedYakout74"><i class="uil uil-twitter"></i></a></li>
                </ul>
            </aside>
            
            <form action="{{ route('contact.post') }}" method="POST" class="Contact__form">
                @csrf
                
                <div class="form__name">
                    <input type="text" name="first_name" placeholder="First Name" >
                    <input type="text" name="last_name" placeholder="Last Name" >
                </div>
                <input type="email" name="email" placeholder="Your Email address" >
                <textarea name="content" rows="7" placeholder="Message" ></textarea>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </section>
    <!-- end contact section -->
    <!-- start footer -->
    <footer>
        <div class="container footer__container">
            <div class="footer__1">
                <a href="{{ url('/') }}" class="footer__logo">
                    <h4>KEEP HEALTHY</h4>
                </a>
                <p>Helping and encouraging all people to take care of
                    their health by following a diet,
                    taking vitamins and exercising.</p>
            </div>

            <div class="footer__2">
                <h4>Permalinks</h4>
                <ul class="Permalinks">
                    <li> <a href="{{ url('/') }}">Home</a></li>
                    <li> <a href="#Contact">Contact</a></li>
                    <li><a href="#vitamins">MultiVitamin</a></li>
                    <li><a href="#diet">Diet Plan</a></li>
                </ul>
            </div>


            <div class="footer__3">
                <h4>Primacy</h4>
                <ul class="Privacy">
                    <li> <a href="#">Privacy Polic</a></li>
                    <li> <a href="#">Terms and condition</a></li>
                    <li><a href="#">Refund policy</a></li>
                </ul>
            </div>

            <div class="footer__4">
                <h4>Contact Us</h4>
                <div>
                    <p>01090326682</p>
                    <p>muhammedyakout96@gmail.com</p>
                </div>

                <ul class="footer__socials">
                    <li>
                        <a href="https://www.facebook.com/"><i class="uil uil-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com/"><i class="uil uil-twitter"></i></a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="footer__Copyright">
            <small>Copyright &copy; Muhammed Yakout</small>
        </div>
    </footer>
    <!-- end footer -->






    <!-- cccccccccccc -->


    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="{{asset('assets/main.js')}}"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                600: {
                    slidesPerView: 1,
                }
            }
        });
    </script>



</body>

</html>
