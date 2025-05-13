<?php
foreach ($detail as $item) {
    $finalDate = date_format(date_create($item->date), "F j, Y H:i:s");
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <base href="{{ asset('/') }}">
    <!--- basic page needs
    ================================================== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Undangan Online / Wedding Invitations" />
    <meta name="keywords" content="undangan online, wedding invitation, undangan digital" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="arrizqyalif" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Wedding Invitations" />
    <meta property="og:site_name" content="Wedding Invitations" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    @foreach ($wedding as $item)
    <title>{{ $item->title }}</title>
    @endforeach

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="assets/undangan/css/vendor.css">
    <link rel="stylesheet" href="assets/undangan/css/styles.css">
    <link rel="stylesheet" href="assets/undangan/css/gallery-grid.css">
    <link rel="stylesheet" href="assets/undangan/css/guest.css">

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="https://www.favicon.cc/logo3d/377601.png" />
    @livewireStyles
</head>

<body id="top" class="ss-preload theme-slides">

    <!-- Audio Player -->
    <div class="audio-controls">
        <button id="playPauseBtn" class="audio-btn" title="Play/Pause Music">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                <path d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
            </svg>
        </button>
        <button id="muteBtn" class="audio-btn" title="Mute/Unmute Music">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-volume-up-fill" viewBox="0 0 16 16">
                <path d="M11.536 14.01A8.473 8.473 0 0 0 14.026 8a8.473 8.486 0 0 0-2.49-6.01l-.708.707A7.476 7.486 0 0 1 13.025 8c0 2.071-.84 3.946-2.197 5.303l.708.707z"/>
                <path d="M10.121 12.596A6.48 6.48 0 0 0 12.025 8a6.48 6.48 0 0 0-1.904-4.596l-.707.707A5.483 5.483 0 0 1 11.025 8c0 2.071-.84 3.946-2.197 5.303l.708.707z"/>
                <path d="M8.707 11.182A4.486 4.486 0 0 0 10.025 8c0-1.19-.51-2.192-1.318-3.182l-.708.707A3.489 3.489 0 0 1 9.025 8c0 .966-.39 1.834-1.025 2.475l.707.707z"/>
                <path d="M6.717 3.55A.5.5 0 0 1 7 4v8a.5.5 0 0 1-.812.39L3.825 10.5H1.5A.5.5 0 0 1 1 10V6a.5.5 0 0 1 .5-.5h2.325l2.363-1.89a.5.5 0 0 1 .529-.06z"/>
            </svg>
        </button>
    </div>

    <audio id="bgMusic" loop controlsList="nodownload" preload="none" oncontextmenu="return false;">
        <source src="assets/undangan/music/wedding-song.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- intro
    ================================================== -->
    <section id="intro" class="s-intro">
        @foreach ($wedding as $item)
        <div class="s-intro__slider swiper-container">
            <div class="swiper-wrapper">
                <div class="s-intro__slide swiper-slide" style="background-image: url('{{ url('/storage/' . $item->hero1) }}');"></div>
                <div class="bg-opacity-50 s-intro__slide swiper-slide" style="background-image: url('{{ url('/storage/' . $item->hero2) }}');"></div>
                <div class="s-intro__slide swiper-slide bg-opacity-10"style="background-image: url('{{ url('/storage/' . $item->hero3) }}');"></div>
            </div>
        </div>

        <div class="row s-intro__content">
            <div class="column">

                <div class="text-pretitle">
                    Perayaan Pernikahan
                </div>


                <h1 class="text-huge-title">
                    {{ $item->name }}
                </h1>

                <div class="text-pretitle">
                    {{ $item->note }}
                    <br>
                    @php
                        $guest_name = ucwords(str_replace(['-', 'and'], [' ', '&'], $to));
                    @endphp
                    <br>Kepada: <span style="text-color:white; font-weight: bold;">{{ $guest_name }}</span>
                    <br>Dengan hormat, kami mengundang Anda untuk menghadiri acara pernikahan kami.
                    <br>
                    <br>
                    <button href="#hidden" class="btn--stroke2 btn--small smoothscroll" style="text-color:white !important;">
                        Open Invitation
                    </button>
                </div>
                @endforeach

                <div class="s-intro__content-bottom">
                    <div class="s-intro__content-bottom-block">
                        <h5>Save the date</h5>

                        <div class="counter">
                            <div class="counter__time">
                                <span class="ss-days">000</span>
                                <span>D</span>
                            </div>
                            <div class="counter__time">
                                <span class="ss-hours">00</span>
                                <span>H</span>
                            </div>
                            <div class="counter__time minutes">
                                <span class="ss-minutes">00</span>
                                <span>M</span>
                            </div>
                            <div class="counter__time">
                                <span class="ss-seconds">00</span>
                                <span>S</span>
                            </div>
                        </div> <!-- end counter -->

                    </div> <!-- end s-intro-content__bottom-block -->
                </div>

            </div>
        </div> <!-- s-intro__content -->

        <div class="s-intro__scroll">
            <a href="#hidden" class="smoothscroll">
                Scroll For More
            </a>
        </div> <!-- s-intro__scroll -->

    </section> <!-- end s-intro -->


    <!-- hidden element
    ================================================== -->
    <div id="hidden" aria-hidden="true" style="opacity: 0;"></div>


    <!-- details
    ================================================== -->
    <section id="details" class="s-details">

        <div class="row">
            <div class="column">
                <nav class="tab-nav">
                    <ul class="tab-nav__list">
                        <li class="active" data-id="tab-couple">
                            <a href="#0">
                                <span>Mempelai</span>
                            </a>
                        </li>
                        <li>
                            <a href="#tab-event">
                                <span>Acara</span>
                            </a>
                        </li>
                        @php
                            // Check if current guest is VIP by looking up in the guest list
                            $isCurrentGuestVIP = false;
                            foreach($guest as $guestItem) {
                                if(strtolower($guestItem->name) == strtolower($guest_name) && $guestItem->isVIP == 1) {
                                    $isCurrentGuestVIP = true;
                                    break;
                                }
                            }
                        @endphp

                        @if($isCurrentGuestVIP)
                        <li>
                            <a href="#tab-guest">
                                <span>Tamu VIP</span>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="#tab-gallery">
                                <span>Gallery</span>
                            </a>
                        </li>
                        <li>
                            <a href="#tab-wishes">
                                <span>Ucapan</span>
                            </a>
                        </li>
                        <li>
                            <a href="#tab-gift">
                                <span>Hadiah</span>
                            </a>
                        </li>
                    </ul>
                </nav> <!-- end tab-nav -->

                <div class="tab-content">

                    <!-- 01 - tab couple -->
                    <div id="tab-couple" class='text-center tab-content__item '>

                        <!-- surah section -->
                        <div class="row">
                            <div class="column">
                                <h2 class="name-bride">We Found Love</h2>
                                <p class="desc">
                                    Dan di antara tanda-tanda (Kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan dia menjadikan diantaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda Kebesaran Allah bagi kaum yang berfikir.
                                </p>
                                <p class="desc">
                                    (QS. Ar-Rum: 21)
                                </p>
                            </div>
                        </div>

                        <!-- Meminta restu -->
                        <div class="row">
                            <div class="column">
                                <h2 class="name-bride">Assalamualaikum Warahmatullahi Wabarakatuh</h2>
                                <p class="desc">
                                    Dengan memohon Rahmat dan Ridho Allah SWT, Kami bermaksud mengundang Bapak/Ibu/Saudara/i. untuk hadir dalam pernikahan kami:
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column">

                                <div class="row">
                                    @foreach ($bride as $item)
                                    <div class="column lg-6 tab-12">
                                        <p class="name-bride">{{ $item->name }}</p>
                                        <a href="{{ $item->instagram }}" target="_blank">
                                            <p class="desc-bride">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                                                </svg>
                                                <b>instagram</b>
                                            </p>
                                        </a>
                                        <br>
                                        <div class="bride-photo-container">
                                            <img src="{{ url('/storage/') }}/{{ $item->photo }}" class="bride-photo" alt="{{ $item->name }}">
                                        </div>
                                        <p class="desc-bride">
                                            {{ $item->child }}
                                        </p>
                                        <p>
                                            {{ $item->name_mother }}
                                            &<br>
                                            {{ $item->name_father }}
                                        </p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div> <!-- end 01 - tab couple -->

                    <!-- 02 - tab event -->
                    <div id="tab-event" class='tab-content__item'>

                        <div class="row tab-content__item-header">
                            <div class="column">
                                <h2>Save the date</h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column">
                                <p class="desc">
                                    Kami sangat berharap anda dapat hadir di moment bahagia ini
                                </p>
                            </div>
                        </div>

                        <div class="row services-list block-lg-one-half block-md-one-half block-tab-whole">
                            @foreach ($detail as $item)
                            <div class="column services-list__item">
                                <div class="services-list__item-content">
                                    <h4 class="item-title">{{ $item->type }}</h4>
                                    <p class="desc-bride">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                            <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                                            <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                        </svg>
                                        {{ date_format(date_create($item->date),"d F Y");  }}
                                        <br>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                        </svg>
                                        {{ date_format(date_create($item->date),"H:i:s");  }}
                                        <br>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        </svg>
                                        {{ $item->address }}
                                        <br>
                                        <br>
                                        <a href="{{ $item->maps }}" class="btn btn--stroke u-fullwidth" target="_blank">Lihat Maps</a>
                                        <a href="{{ $item->calendar }}" class="btn btn--stroke u-fullwidth" target="_blank">Tambahkan ke Calendar</a>
                                    </p>
                                </div>
                            </div>
                            @endforeach

                        </div> <!-- end services-list -->

                    </div> <!-- end 02 - tab event -->

                    <!-- 03 - tab guest -->
                    @if($isCurrentGuestVIP)
                    <div id="tab-guest" class="tab-content__item">
                        <div class="row">
                            <div class="column">
                                <div class="vip-card" id="vip-card-container">
                                    <div class="vip-card-inner">
                                        <h2 class="vip-title">VIP Guest</h2>
                                        <div class="vip-badge">Special Invitation</div>
                                        <h2 class="vip-name">Nama Tamu VIP: <span>{{$guest_name}}</span></h2>
                                        <p class="desc">
                                            Kami sangat berharap Anda dapat hadir di moment bahagia ini.
                                        </p>
                                        <div class="vip-note">
                                            <p>
                                                Tunjukkan undangan ini kepada pagar ayu penerima tamu,
                                                untuk menukar dengan Souvenir VIP yang telah kami sediakan.
                                            </p>
                                        </div>
                                        @foreach ($wedding as $item)
                                        <div class="vip-footer">
                                            <p>
                                                Terima Kasih &hearts; {{ $item->name }}
                                            </p>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="download-button-container text-center" style="margin-top: 20px;">
                                    <button id="download-vip-card" class="btn btn--primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16" style="margin-right: 5px;">
                                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                        </svg>
                                        Download VIP Card
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- end 03 - tab guest -->

                    <!-- 04 - tab gallery -->
                    @foreach ($galery as $item)
                    <div id="tab-gallery" class="tab-content__item">
                        <div class="tz-gallery">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <a class="lightbox" href="{{ url('/storage/') }}/{{ $item->gallery1 }}">
                                        <img src="{{ url('/storage/') }}/{{ $item->gallery1 }}">
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <a class="lightbox" href="{{ url('/storage/') }}/{{ $item->gallery2 }}">
                                        <img src="{{ url('/storage/') }}/{{ $item->gallery2 }}">
                                    </a>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <a class="lightbox" href="{{ url('/storage/') }}/{{ $item->gallery3 }}">
                                        <img src="{{ url('/storage/') }}/{{ $item->gallery3 }}">
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <a class="lightbox" href="{{ url('/storage/') }}/{{ $item->gallery4 }}">
                                        <img src="{{ url('/storage/') }}/{{ $item->gallery4 }}">
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <a class="lightbox" href="{{ url('/storage/') }}/{{ $item->gallery5 }}">
                                        <img src="{{ url('/storage/') }}/{{ $item->gallery5 }}">
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <a class="lightbox" href="{{ url('/storage/') }}/{{ $item->gallery6 }}">
                                        <img src="{{ url('/storage/') }}/{{ $item->gallery6 }}">
                                    </a>
                                </div>
                            </div>
                            <!-- @if (isset($item->video) && $item->video !== '-')
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $item->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            @endif -->
                        </div>
                    </div>
                    @endforeach
                    <!-- end 04 - tab gallery -->

                    <!-- 05 - tab wishes -->
                    <div id="tab-wishes" class="tab-content__item">
                        @foreach ($thank as $item)
                        <p class="desc">{{ $item->note }}</p>
                        @endforeach
                        <br>

                        <div class="row">

                            <div class="column lg-6 tab-12">
                                @livewire('create-wish', ['guestName' => $guest_name])
                            </div>

                            <div class="column lg-6 tab-12" style=" height: 500px; overflow: auto;">
                                <p><b>Ucapan & Doa</p></b>
                                <livewire:list-wish>
                            </div>

                        </div>

                    </div> <!-- end 05 - tab wishes -->

                    <!-- 06 - tab gift -->
                    <div id="tab-gift" class="tab-content__item">
                        <p class="desc">Tanpa mengurangi rasa hormat, bagi anda yang ingin memberikan tanda kasih untuk mempelai dapat melalui: </p>

                        <div class="row">
                            <div class="column">
                                <div class="row">
                                    @foreach ($gift as $item)
                                    <div class="column lg-6 tab-12">
                                        <h5>Alamat {{ $item->name }}</h5>
                                        <p class="desc">
                                            <span id="address_{{ $loop->index }}">{{ $item->address }}</span>
                                            <br>
                                            @if(!$item->note) @else Patokan : {{ $item->note }} @endif
                                            <button class="btn btn--stroke" onclick="copyWithFeedback('address_{{ $loop->index }}', this)">Salin Alamat</button>
                                            <a href="{{ $item->maps }}" class="btn btn--stroke" target="_blank">Lihat Maps</a>
                                        </p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column">
                                <div class="row bank-cards">
                                    @foreach ($bank as $item)
                                    <div class="column lg-6 tab-12">
                                        <div class="atm-card" style="background-color: #FFFFFF; color: #333333;">
                                            <div class="atm-card-inner">
                                                <div class="atm-card-top">
                                                    <img src="{{ url('/storage/') }}/{{ $item->logo }}" class="bank-logo" alt="{{ $item->name }}">
                                                    <div class="chip-icon">
                                                        <svg width="40" height="30" viewBox="0 0 40 30" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="40" height="30" rx="4" fill="#FFDF6E"/>
                                                            <rect x="5" y="5" width="30" height="20" rx="2" fill="#FFD34D"/>
                                                            <rect x="10" y="12" width="20" height="6" fill="#FFCB33"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="atm-card-number">
                                                    <span id="acc_number_{{ $loop->index }}">{{ $item->acc_number }}</span>
                                                </div>
                                                <div class="atm-card-bottom">
                                                    <div class="atm-card-holder">
                                                        <div class="label">CARD HOLDER</div>
                                                        <div class="name">{{ $item->acc_name }}</div>
                                                    </div>
                                                    <div class="atm-card-bank">
                                                        <div class="label">BANK</div>
                                                        <div class="name">{{ $item->bank_name ?? 'Bank' }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn--stroke u-fullwidth copy-bank-btn" type="button" onclick="copyWithFeedback('acc_number_{{ $loop->index }}', this);">
                                            Salin Nomor Rekening
                                        </button>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div> <!-- end 06 - tab gift -->

                </div> <!-- end tab content -->

                <!-- footer  -->
                <footer>
                    <div class="ss-copyright">
                        @foreach ($wedding as $item)
                        <span>Made With &hearts; {{ $item->name }}.</span>
                        @endforeach
                    </div>
                </footer>

            </div>
        </div>

        <div class="ss-go-top">
            <a class="smoothscroll" title="Back to Top" href="#top">
                <span>Back to Top</span>
                <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="26" height="26">
                    <path d="M7.5 1.5l.354-.354L7.5.793l-.354.353.354.354zm-.354.354l4 4 .708-.708-4-4-.708.708zm0-.708l-4 4 .708.708 4-4-.708-.708zM7 1.5V14h1V1.5H7z" fill="currentColor"></path>
                </svg>
            </a>
        </div> <!-- end ss-go-top -->

    </section> <!-- end s-details -->


    <!-- Java Script
    ================================================== -->
    <script src="assets/undangan/js/plugins.js"></script>
    <script src="assets/undangan/js/main.js"></script>
    <script>
        // Create toast notification function
        function showToast(message) {
            // Create toast element
            const toast = document.createElement('div');
            toast.className = 'copy-toast';

            // Create toast content
            const toastContent = document.createElement('div');
            toastContent.className = 'copy-toast-content';

            // Add check icon
            const checkIcon = document.createElement('span');
            checkIcon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/></svg>';
            checkIcon.className = 'copy-toast-icon';

            // Add message
            const messageSpan = document.createElement('span');
            messageSpan.textContent = message;

            // Assemble toast
            toastContent.appendChild(checkIcon);
            toastContent.appendChild(messageSpan);
            toast.appendChild(toastContent);

            // Add to DOM
            document.body.appendChild(toast);

            // Trigger animation
            setTimeout(() => toast.classList.add('show'), 10);

            // Remove after animation
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => document.body.removeChild(toast), 300);
            }, 3000);
        }

        function copyWithFeedback(elementId, buttonElement) {
            // Get the text to copy
            const text = document.getElementById(elementId).innerText;

            // Create temporary textarea element
            const textarea = document.createElement('textarea');
            textarea.value = text;
            textarea.setAttribute('readonly', '');
            textarea.style.position = 'absolute';
            textarea.style.left = '-9999px';
            document.body.appendChild(textarea);

            // Try to copy the text
            let success = false;
            try {
                // Select the text and copy
                textarea.select();
                textarea.setSelectionRange(0, 99999); // For mobile devices
                success = document.execCommand('copy');

                if (success) {
                    // Show success state
                    const originalHTML = buttonElement.innerHTML;
                    buttonElement.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/></svg> Berhasil';
                    buttonElement.classList.add('copy-success');

                    // Show toast notification
                    showToast(text);

                    // Reset button after delay
                    setTimeout(() => {
                        buttonElement.innerHTML = originalHTML;
                        buttonElement.classList.remove('copy-success');
                    }, 2000);
                } else {
                    showToast("Failed to copy. Please try again.");
                }
            } catch (err) {
                console.error('Failed to copy text', err);
                showToast("Failed to copy. Please try again.");
            } finally {
                document.body.removeChild(textarea);
            }
        }

        function fallbackCopy(text, buttonElement) {
            // Create temporary textarea element
            const textarea = document.createElement('textarea');
            textarea.value = text;
            textarea.setAttribute('readonly', '');
            textarea.style.position = 'absolute';
            textarea.style.left = '-9999px';
            document.body.appendChild(textarea);

            try {
                // Select the text and copy
                textarea.select();
                const success = document.execCommand('copy');

                if (success) {
                    showCopySuccess(buttonElement, text);
                } else {
                    showToast("Failed to copy. Please try again.");
                }
            } catch (err) {
                console.error('Failed to copy text', err);
                showToast("Failed to copy. Please try again.");
            } finally {
                document.body.removeChild(textarea);
            }
        }

        function showCopySuccess(buttonElement, text) {
            // Original button content
            const originalHTML = buttonElement.innerHTML;

            // Change button to success state
            buttonElement.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/></svg> Berhasil';
            buttonElement.classList.add('copy-success');

            // Show toast message
            showToast(text);

            // Reset button after delay
            setTimeout(() => {
                buttonElement.innerHTML = originalHTML;
                buttonElement.classList.remove('copy-success');
            }, 2000);
        }

        // Add scroll fade effect functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Get all ATM cards and their buttons
            const atmCards = document.querySelectorAll('.atm-card');
            const copyButtons = document.querySelectorAll('.copy-bank-btn');

            // Function to handle scroll events
            function handleScroll() {
                const scrollY = window.scrollY || window.pageYOffset;

                // Check each ATM card and its button
                atmCards.forEach((card, index) => {
                    const rect = card.getBoundingClientRect();
                    const button = copyButtons[index];

                    // Calculate the visibility based on the card's position
                    const visibility = calculateVisibility(rect);

                    // Apply opacity to both card and button
                    card.style.opacity = visibility;
                    button.style.opacity = visibility;

                    // Disable button if nearly invisible
                    if (visibility < 0.3) {
                        button.style.pointerEvents = 'none';
                    } else {
                        button.style.pointerEvents = 'auto';
                    }
                });
            }

            // Calculate visibility based on element position
            function calculateVisibility(rect) {
                const windowHeight = window.innerHeight;

                // Element is above the viewport
                if (rect.bottom < 0) return 0;

                // Element is below the viewport
                if (rect.top > windowHeight) return 0;

                // Element is partially visible at the top
                if (rect.top < 0) {
                    return Math.min(1, rect.bottom / windowHeight);
                }

                // Element is partially visible at the bottom
                if (rect.bottom > windowHeight) {
                    return Math.min(1, (windowHeight - rect.top) / windowHeight);
                }

                // Element is fully visible
                return 1;
            }

            // Add scroll event listener
            window.addEventListener('scroll', handleScroll);

            // Initial check
            handleScroll();
        });
    </script>
    <Script>
        (function(html) {

            'use strict';

            html.className = html.className.replace(/\bno-js\b/g, '') + 'js';

            const cfg = {

                // Countdown Timer Final Date
                finalDate: '<?php echo $finalDate; ?>',
                // MailChimp URL
                mailChimpURL: 'https://facebook.us1.list-manage.com/subscribe/post?u=1abf75f6981256963a47d197a&amp;id=37c6d8f4d6'

            };

            /* Countdown Timer
             * ------------------------------------------------------ */
            const ssCountdown = function() {

                const finalDate = new Date(cfg.finalDate).getTime();
                const daysSpan = document.querySelector('.counter .ss-days');
                const hoursSpan = document.querySelector('.counter .ss-hours');
                const minutesSpan = document.querySelector('.counter .ss-minutes');
                const secondsSpan = document.querySelector('.counter .ss-seconds');
                let timeInterval;

                if (!(daysSpan && hoursSpan && minutesSpan && secondsSpan)) return;

                function timer() {

                    const now = new Date().getTime();
                    let diff = finalDate - now;

                    if (diff <= 0) {
                        if (timeInterval) {
                            clearInterval(timeInterval);
                        }
                        return;
                    }

                    let days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    let hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
                    let minutes = Math.floor((diff / 1000 / 60) % 60);
                    let seconds = Math.floor((diff / 1000) % 60);

                    if (days <= 99) {
                        if (days <= 9) {
                            days = '00' + days;
                        } else {
                            days = '0' + days;
                        }
                    }

                    hours <= 9 ? hours = '0' + hours : hours;
                    minutes <= 9 ? minutes = '0' + minutes : minutes;
                    seconds <= 9 ? seconds = '0' + seconds : seconds;

                    daysSpan.textContent = days;
                    hoursSpan.textContent = hours;
                    minutesSpan.textContent = minutes;
                    secondsSpan.textContent = seconds;

                }

                timer();
                timeInterval = setInterval(timer, 1000);
            };

            /* Initialize
             * ------------------------------------------------------ */
            (function ssInit() {
                ssCountdown();

            })();

        })(document.documentElement);
    </Script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.tz-gallery');
    </script>

    <!-- Download VIP Guest -->
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the download button
        const downloadBtn = document.getElementById('download-vip-card');
        const downloadBtnContainer = document.querySelector('.download-button-container');

        if (downloadBtn) {
            downloadBtn.addEventListener('click', function() {
                // Show loading state
                downloadBtn.textContent = 'Processing...';
                downloadBtn.disabled = true;

                // Target the VIP card container
                const cardElement = document.getElementById('vip-card-container');

                // Add a temporary class for better rendering
                cardElement.classList.add('screenshot-mode');

                // Hide the download button container before taking screenshot
                downloadBtnContainer.style.display = 'none';

                // Use html2canvas to convert the card to an image
                html2canvas(cardElement, {
                    scale: 2, // Higher resolution
                    backgroundColor: null,
                    logging: false,
                    useCORS: true
                }).then(function(canvas) {
                    // Remove the temporary class
                    cardElement.classList.remove('screenshot-mode');

                    // Show the download button container again
                    downloadBtnContainer.style.display = 'block';

                    // Convert canvas to data URL
                    const imgData = canvas.toDataURL('image/png');

                    // Create a download link
                    const downloadLink = document.createElement('a');
                    downloadLink.href = imgData;
                    downloadLink.download = 'VIP-Invitation-{{$guest_name}}.png';

                    // Trigger download
                    document.body.appendChild(downloadLink);
                    downloadLink.click();
                    document.body.removeChild(downloadLink);

                    // Restore button state
                    downloadBtn.textContent = 'Download VIP Card';
                    downloadBtn.disabled = false;
                }).catch(function(error) {
                    // Show the download button container again in case of error
                    downloadBtnContainer.style.display = 'block';

                    console.error('Error generating image:', error);
                    alert('Failed to generate image. Please try again.');

                    // Restore button state
                    downloadBtn.textContent = 'Download VIP Card';
                    downloadBtn.disabled = false;
                    cardElement.classList.remove('screenshot-mode');
                });
            });
        }
    });
    </script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const audioElement = document.getElementById('bgMusic');
    const playPauseBtn = document.getElementById('playPauseBtn');
    const muteBtn = document.getElementById('muteBtn');
    let isPlaying = false;
    let isMuted = false;

    // Set initial volume to 80%
    audioElement.volume = 0.8;

    // Update button icons based on state
    function updatePlayPauseIcon() {
        if (isPlaying) {
            playPauseBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z"/>
                </svg>
            `;
            playPauseBtn.classList.add('playing');
            playPauseBtn.classList.remove('paused');
        } else {
            playPauseBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
                </svg>
            `;
            playPauseBtn.classList.remove('playing');
            playPauseBtn.classList.add('paused');
        }
    }

    function updateMuteIcon() {
        if (isMuted) {
            muteBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M6.717 3.55A.5.5 0 0 1 7 4v8a.5.5 0 0 1-.812.39L3.825 10.5H1.5A.5.5 0 0 1 1 10V6a.5.5 0 0 1 .5-.5h2.325l2.363-1.89a.5648.5 0 0 1 .529-.06zM11 7.983c0-1.187-.762-2.038-1.562-2.038-1.26 0-2.184 1.058-2.184 2.38 0 1.312.916 2.379 2.184 2.379.8 0 1.562-.85 1.562-2.037V7.983z"/>
                </svg>
            `;
            muteBtn.classList.add('muted');
        } else {
            muteBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2016/18" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11.536 14.01A8.473 8.473 0 0 0 14.026 8a8.486 8.486 0 0 0-2.49-6.01l-.708.707A7.476 7.476 0 0 1 13.025 8c0 2.071-.84 3.074-2.197 5.303l.708.707z"/>
                    <path d="M10.121 12.596A6.48 6.48 0 0 0 12.025 8a6.48 6.48 0 0 0-1.904-4.596l-.708.707A5.483 5.483 0 0 1 11.025 8a5.483 5.483 0 0 1-1.61 3.89l.708.708z"/>
                    <path d="M8.707 11.182A4.486 4.486 0 0 0 10.025 8c0-1.19-.798-2.192-1.318-3.182l-.708.708A3.489 3.489 0 0 1 9.025 8c0 .966-.39 1.834-1.025 2.475l.707.707z"/>
                    <path d="M6.717 3.55A.5.5 0 0 1 7 4v8a.5.5 0 0 1-.812.39L3.825 10.5H1.5A.5.5 0 0 1 1 10V6a.5.5 0 0 1 .5-.5h2.325l2.363-1.89a.5.5 0 0 1 .529-.06z"/>
                </svg>
            `;
            muteBtn.classList.remove('muted');
        }
    }

    // Handle play/pause functionality
    playPauseBtn.addEventListener('click', function() {
        if (isPlaying) {
            audioElement.pause();
            isPlaying = false;
        } else {
            // Try to play and handle any autoplay restrictions
            audioElement.play()
                .then(function() {
                    isPlaying = true;
                })
                .catch(function(error) {
                    console.error('Error playing audio:', error);
                    // Fallback: Let the user know they need to interact with the page first
                    alert('Please click anywhere on the page to enable audio playback.');
                });
        }
        updatePlayPauseIcon();
    });

    // Handle mute/unmute functionality
    muteBtn.addEventListener('click', function() {
        isMuted = !isMuted;
        audioElement.muted = isMuted;
        updateMuteIcon();
        updateVolumeIcon();
    });

    // Function to update mute icon based on volume
    function updateVolumeIcon() {
        if (isMuted) {
            muteBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M6.717 3.55A.5.5 0 0 1 7 4v8a.5.5 0 0 1-.812.39L3.825 10.5H1.5A.5.5 0 0 1 1 10V6a.5.5 0 0 1 .5-.5h2.325l2.363-1.89a.5.5 0 0 1 .529-.06z"/>
                    <path d="M11.5 5.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1 0-1h4z" fill="currentColor"/>
                </svg>
            `;
        }
    }

    // Start with initial state
    updatePlayPauseIcon();
    updateMuteIcon();

    // Try to auto-play the music if the browser allows it
    // (most browsers block autoplay, so this might not work)
    function tryAutoplay() {
        audioElement.volume = 0.8; // Set volume to 80%
        audioElement.play()
            .then(function() {
                isPlaying = true;
                updatePlayPauseIcon();
            })
            .catch(function(error) {
                console.log('Autoplay was prevented; user interaction required.');
                // We'll wait for user interaction
            });
    }

    // Try to auto-play on page load
    tryAutoplay();

    // Also try to play when user clicks anywhere on the page
    // (helps get around autoplay restrictions)
    document.addEventListener('click', function initAudio() {
        // Only try once
        document.removeEventListener('click', initAudio);

        if (!isPlaying) {
            tryAutoplay();
        }
    }, { once: true });

    // Autoplay on the intro button click
    // The intro button should already have a click event that calls smoothScroll
    const introButton = document.querySelector('.btn--stroke2.btn--small.smoothscroll');
    if (introButton) {
        // Add an event to also play music when the intro button is clicked
        introButton.addEventListener('click', function() {
            if (!isPlaying) {
                tryAutoplay();
            }
        });
    }

    // Apply intro button interactions with the audio player
    document.querySelectorAll('.smoothscroll').forEach(function(button) {
        button.addEventListener('click', function() {
            if (!isPlaying) {
                tryAutoplay();
            }
        });
    });

    // Add HTML5 Page Visibility API to pause music when user leaves the page
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            // Page is not visible, maybe pause the music
            if (isPlaying) {
                //audioElement.pause();
                // Not actually pausing on tab change as it might be annoying
                // Just noting the possibility here
            }
        } else {
            // Page is visible again, maybe resume music
            if (isPlaying && audioElement.paused) {
                //audioElement.play();
                // Not actually playing on tab return as it might be annoying
                // Just noting the possibility here
            }
        }
    });

    // Initialize HTML5 Audio API Media Session for better media controls
    if ('mediaSession' in navigator) {
        navigator.mediaSession.metadata = new MediaMetadata({
            title: 'Wedding Invitation',
            artist: 'Wedding Music',
            album: 'Wedding Soundtrack',
            artwork: [
                { src: 'assets/undangan/music/cover.png', sizes: '512x512', type: 'image/png' }
            ]
        });

        // Add media session controls
        navigator.mediaSession.setActionHandler('play', function() {
            audioElement.play();
            isPlaying = true;
            updatePlayPauseIcon();
        });

        navigator.mediaSession.setActionHandler('pause', function() {
            audioElement.pause();
            isPlaying = false;
            updatePlayPauseIcon();
        });
    }
});
</script>
    @include('sweetalert::alert')
    @livewireScripts
</body>

</html>
