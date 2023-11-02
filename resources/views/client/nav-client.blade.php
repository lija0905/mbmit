<div class="container-fluid">
    <div class="row first-nav">
        <nav class="navbar-expand-lg navbar-light w-100 d-flex justify-content-between top-nav-style position-relative align-items-center">
            <div class="col-sm-6">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link nav-link-color" href="http://bg.ac.rs" target="_blank">{{ __('client.top_nav.university') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-color" href="http://etf.bg.ac.rs" target="_blank">{{ __('client.top_nav.faculty') }}</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
                <ul class="navbar-nav">
                    <form id="change-language-form" class="navbar-nav" method="POST" action="{{ route('locale') }}">
                        @csrf
                        @foreach($language_options as $option)
                            <li class="nav-item">
                                <a class="nav-link nav-link-color"><input class="link-lang d-none" type="radio" name="language" id="lang-{{$option->id}}" value="{{$option->code}}"/>
                                    <label for="lang-{{$option->id}}" class="label-cursor-pointer mb-0">{{ $option->name }}</label>
                                </a>
                            </li>
                        @endforeach
                    </form>
                </ul>
            </div>
        </nav>
    </div>
    <div class="row main-nav">
        <nav class="navbar navbar-expand-lg navbar-light w-100 pt-4 pb-4" style="background-color: rgba(255,255,255,0.5);">
            <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="logo-etf">
                    <img src="{{ asset('assets/icons/logos/etf.png') }}" class="logo-header">
                    <svg viewBox="0 0 396 247" data-background-color="#ffffff" preserveAspectRatio="xMidYMid meet" height="92" width="130" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="tight-bounds" transform="matrix(1,0,0,1,0.2400000000000091,-0.09999999999999432)"><svg viewBox="0 0 395.52 247.2" height="247.2" width="395.52"><g><svg></svg></g><g><svg viewBox="0 0 395.52 247.2" height="247.2" width="395.52"><g transform="matrix(1,0,0,1,75.54432,91.3860289360156)"><svg viewBox="0 0 244.43135999999998 64.42794212796876" height="64.42794212796876" width="244.43135999999998"><g><svg viewBox="0 0 244.43135999999998 64.42794212796876" height="64.42794212796876" width="244.43135999999998"><g><svg viewBox="0 0 369.2460153208945 97.32695880789461" height="64.42794212796876" width="244.43135999999998"><g transform="matrix(1,0,0,1,0,1.713668112150586)"><svg viewBox="0 0 244.43135999999998 93.89962258359344" height="93.89962258359344" width="244.43135999999998"><g id="textblocktransform"><svg viewBox="0 0 244.43135999999998 93.89962258359344" height="93.89962258359344" width="244.43135999999998" id="textblock"><g><svg viewBox="0 0 244.43135999999998 64.98998512941178" height="64.98998512941178" width="244.43135999999998"><g transform="matrix(1,0,0,1,0,0)"><svg width="244.43135999999998" viewBox="1.05 -33.05 127.49 33.9" height="64.98998512941178" data-palette-color="#7b1417"><path d="M8.05 0L1.05 0 1.05-1.1 2.05-1.4Q3-1.7 3.35-2.38 3.7-3.05 3.7-4.15L3.7-4.15 3.7-28.9Q3.7-29.9 3.45-30.53 3.2-31.15 2.2-31.5L2.2-31.5 1.05-31.95 1.05-33.05 10.6-33.05 20-8.6 28.85-33.05 38.6-33.05 38.6-31.95 37.8-31.7Q36.85-31.4 36.5-30.78 36.15-30.15 36.15-29.15L36.15-29.15Q36.1-26.25 36.1-23.38 36.1-20.5 36.1-17.55L36.1-17.55 36.1-15.5Q36.1-12.6 36.1-9.7 36.1-6.8 36.15-3.95L36.15-3.95Q36.15-2.9 36.4-2.35 36.65-1.8 37.6-1.45L37.6-1.45 38.6-1.1 38.6 0 26.45 0 26.45-1.1 27.55-1.45Q28.5-1.8 28.73-2.38 28.95-2.95 28.95-3.95L28.95-3.95 28.95-14.8 29.05-28.2 18.85 0 16.05 0 5.3-27.9 5.5-16.5 5.5-4.1Q5.5-3 5.8-2.35 6.1-1.7 7.05-1.45L7.05-1.45 8.05-1.1 8.05 0ZM56.6 0.85L56.6 0.85Q52.85 0.85 49.97-0.5 47.1-1.85 45.47-4.78 43.85-7.7 43.85-12.5L43.85-12.5 43.85-17.9Q43.85-20.7 43.85-23.55 43.85-26.4 43.8-29.3L43.8-29.3Q43.8-31.25 41.95-31.75L41.95-31.75 40.85-32 40.85-33.05 54.35-33.05 54.35-32 52.95-31.7Q51.05-31.25 51.05-29.2L51.05-29.2Q51-26.4 51-23.58 51-20.75 51-17.9L51-17.9 51-11.55Q51-6.7 52.97-4.55 54.95-2.4 58.6-2.4L58.6-2.4Q62.45-2.4 64.62-4.73 66.8-7.05 66.8-11.65L66.8-11.65 66.8-29.05Q66.8-30.05 66.4-30.8 66-31.55 65-31.75L65-31.75 63.8-32 63.8-33.05 71.5-33.05 71.5-32 70.1-31.7Q69.15-31.5 68.8-30.8 68.45-30.1 68.45-29.1L68.45-29.1 68.45-11.95Q68.45-5.75 65.2-2.45 61.95 0.85 56.6 0.85ZM86.25 0L73.7 0 73.7-1.05 74.5-1.3Q75.55-1.7 75.92-2.35 76.3-3 76.3-4.1L76.3-4.1Q76.35-6.95 76.35-9.83 76.35-12.7 76.35-15.6L76.35-15.6 76.35-17.4Q76.35-20.3 76.32-23.18 76.3-26.05 76.3-28.95L76.3-28.95Q76.3-30.15 75.95-30.78 75.6-31.4 74.5-31.75L74.5-31.75 73.7-32 73.7-33.05 87.8-33.05Q93.8-33.05 96.5-30.83 99.2-28.6 99.2-25.2L99.2-25.2Q99.2-22.6 97.3-20.53 95.4-18.45 90.65-17.55L90.65-17.55Q96.15-16.95 98.6-14.7 101.05-12.45 101.05-9.2L101.05-9.2Q101.05-7.6 100.35-5.98 99.65-4.35 97.97-3 96.3-1.65 93.45-0.83 90.6 0 86.25 0L86.25 0ZM83.45-31.6L83.45-17.9 85.8-17.9Q89.2-17.9 90.72-19.43 92.25-20.95 92.25-24.65L92.25-24.65Q92.25-28.5 90.85-30.05 89.45-31.6 86.45-31.6L86.45-31.6 83.45-31.6ZM83.45-16.45L83.45-1.45 86.2-1.45Q89.95-1.45 91.8-3.3 93.65-5.15 93.65-9.25L93.65-9.25Q93.65-13.2 91.87-14.83 90.1-16.45 86.05-16.45L86.05-16.45 83.45-16.45ZM128.19 0L103.39 0 103.39-1.05 104.39-1.4Q105.29-1.65 105.64-2.27 105.99-2.9 106.04-4L106.04-4 106.04-29.15Q105.99-30.2 105.69-30.78 105.39-31.35 104.44-31.65L104.44-31.65 103.39-32 103.39-33.05 127.19-33.05 127.54-25.05 126.14-25.05 124.14-29.55Q123.74-30.5 123.24-31.03 122.74-31.55 121.74-31.55L121.74-31.55 113.24-31.55Q113.19-28.45 113.19-25.18 113.19-21.9 113.19-17.8L113.19-17.8 118.14-17.8Q119.14-17.8 119.67-18.32 120.19-18.85 120.64-19.75L120.64-19.75 121.49-21.65 122.59-21.65 122.59-12.4 121.49-12.4 120.59-14.3Q120.19-15.2 119.69-15.75 119.19-16.3 118.19-16.3L118.19-16.3 113.19-16.3Q113.19-12.7 113.19-10.1 113.19-7.5 113.22-5.48 113.24-3.45 113.24-1.5L113.24-1.5 122.84-1.5Q123.84-1.5 124.39-2.02 124.94-2.55 125.29-3.5L125.29-3.5 127.14-8 128.54-8 128.19 0Z" opacity="1" transform="matrix(1,0,0,1,0,0)" fill="#7b1417" class="wordmark-text-0" data-fill-palette-color="primary" id="text-0"></path></svg></g></svg></g><g transform="matrix(1,0,0,1,0,80.33256085882279)"><svg viewBox="0 0 244.43135999999998 13.56706172477064" height="13.56706172477064" width="244.43135999999998"><g transform="matrix(1,0,0,1,0,0)"><svg width="244.43135999999998" viewBox="0.4 -40.95 980.91 54.45" height="13.56706172477064" data-palette-color="#7b1417"><path d="M4.65-2.6L8.35-34.45 2.8-35 2.8-37.15 14.6-37.15 22.35-14.05 24.2-7.35 25.85-14.05 33.55-37.15 45.25-37.15 45.25-35 39.75-34.45 43.7-2.65 48.25-2.15 48.25 0 34.8 0 34.8-2.15 39.45-2.6 37.15-25.4 36.05-35.4 33.85-28.5 24.8-1.8 22.8-1.8 14.3-25.7 11.05-35.4 10.05-25.4 8-2.6 12.9-2.15 12.9 0 0.4 0 0.4-2.15 4.65-2.6ZM73.8 0.45Q72.5 0.45 71.9 0 71.3-0.45 71.3-1.65L71.3-1.65 71.3-3.6Q69.45-1.95 66.95-0.7 64.45 0.55 61.95 0.55L61.95 0.55Q57.4 0.55 55.47-2 53.55-4.55 53.55-10.3L53.55-10.3 53.55-25 50.6-25.85 50.6-27.7 56.65-28.35 56.7-28.35 57.6-27.75 57.6-10.9Q57.6-7.75 58.05-5.98 58.5-4.2 59.7-3.35 60.9-2.5 63.2-2.5L63.2-2.5Q65.4-2.5 67.4-3.45 69.4-4.4 70.85-5.7L70.85-5.7 70.85-25 67.05-25.85 67.05-27.7 73.7-28.35 73.75-28.35 74.9-27.75 74.9-2.2 78-2.2 77.95-0.3Q77.7-0.25 76.5 0.1 75.3 0.45 73.8 0.45L73.8 0.45ZM86.4-2.55L86.4-37.8 82.15-38.25 82.15-40.1 89.45-40.95 89.5-40.95 90.45-40.3 90.45-2.5 95.15-2.15 95.15 0 82 0 82-2.15 86.4-2.55ZM107.39 0.55Q104.74 0.55 103.39-0.68 102.04-1.9 102.04-5.05L102.04-5.05 102.04-24.8 98.24-24.8 98.24-26.75Q100.74-27.3 101.14-27.55L101.14-27.55Q101.89-27.95 102.24-29.1L102.24-29.1Q102.54-29.85 103.04-31.8 103.54-33.75 103.79-34.85L103.79-34.85 106.09-34.85 106.09-27.75 114.94-27.75 114.94-24.8 106.09-24.8 106.09-8.6Q106.09-5.7 106.29-4.53 106.49-3.35 107.09-3 107.69-2.65 109.19-2.65L109.19-2.65Q110.64-2.65 112.44-3.05 114.24-3.45 115.14-3.9L115.14-3.9 115.79-2Q114.64-1.1 111.99-0.28 109.34 0.55 107.39 0.55L107.39 0.55ZM124.89-33Q122.19-33 122.19-35.85L122.19-35.85Q122.19-37.3 123.04-38.23 123.89-39.15 125.34-39.15L125.34-39.15Q126.84-39.15 127.49-38.33 128.14-37.5 128.14-36.3L128.14-36.3Q128.14-34.75 127.32-33.88 126.49-33 124.94-33L124.94-33 124.89-33ZM123.29-2.55L123.29-24.45 119.39-25.3 119.39-27.55 126.24-28.35 126.34-28.35 127.34-27.55 127.34-2.5 131.69-2.15 131.69 0 118.89 0 118.89-2.15 123.29-2.55ZM135.19 0L135.19-2.15 138.39-2.55 138.39-24.45 134.54-25.3 134.54-27.55 140.89-28.35 141.99-27.55 141.99-25.35 141.94-24.1Q143.79-25.7 146.79-27.05 149.79-28.4 152.24-28.4L152.24-28.4Q154.94-28.4 156.56-27.5 158.19-26.6 159.04-24.7L159.04-24.7Q160.59-26 163.56-27.2 166.54-28.4 169.04-28.4L169.04-28.4Q172.19-28.4 173.91-27.2 175.64-26 176.34-23.5 177.04-21 177.04-16.75L177.04-16.75 177.04-2.55 180.84-2.15 180.84 0 169.64 0 169.64-2.15 173.04-2.55 173.04-16.6Q173.04-19.75 172.59-21.6 172.14-23.45 170.84-24.4 169.54-25.35 167.04-25.35L167.04-25.35Q165.19-25.35 163.16-24.53 161.14-23.7 159.69-22.65L159.69-22.65Q160.19-20.35 160.19-16.65L160.19-16.65 160.19-2.55 163.99-2.15 163.99 0 152.54 0 152.54-2.15 156.14-2.55 156.14-16.7Q156.14-19.9 155.76-21.7 155.39-23.5 154.19-24.4 152.99-25.3 150.64-25.3L150.64-25.3Q148.69-25.3 146.41-24.33 144.14-23.35 142.44-22L142.44-22 142.44-2.55 145.99-2.15 145.99 0 135.19 0ZM184.44-14.05Q184.44-18.4 186.26-21.7 188.09-25 191.06-26.75 194.03-28.5 197.28-28.5L197.28-28.5Q203.59-28.5 206.61-24.4 209.63-20.3 209.63-13.9L209.63-13.9Q209.63-9.55 207.81-6.25 205.99-2.95 203.01-1.2 200.03 0.55 196.78 0.55L196.78 0.55Q190.49 0.55 187.46-3.55 184.44-7.65 184.44-14.05L184.44-14.05ZM197.03-2.05Q200.88-2.05 202.99-5 205.09-7.95 205.09-13.6L205.09-13.6Q205.09-19 203.13-22.45 201.19-25.9 197.09-25.9L197.09-25.9Q193.24-25.9 191.11-22.95 188.99-20 188.99-14.35L188.99-14.35Q188.99-8.9 190.96-5.48 192.94-2.05 197.03-2.05L197.03-2.05ZM225.18 0.55Q222.23 0.55 219.73-0.98 217.23-2.5 215.73-5.6 214.23-8.7 214.23-13.2L214.23-13.2Q214.23-17.5 215.98-20.98 217.73-24.45 220.96-26.48 224.18-28.5 228.48-28.5L228.48-28.5Q231.23-28.5 233.78-27.9L233.78-27.9 233.78-37.8 228.58-38.3 228.58-40.1 236.78-40.95 236.88-40.95 237.83-40.25 237.83-2.25 240.88-2.25 240.88-0.3Q240.63-0.25 239.18 0.1 237.73 0.45 236.08 0.45L236.08 0.45Q234.93 0.45 234.46 0.05 233.98-0.35 233.98-1.7L233.98-1.7 233.98-3.45Q232.43-1.75 230.21-0.6 227.98 0.55 225.18 0.55L225.18 0.55ZM226.83-2.6Q228.98-2.6 230.91-3.63 232.83-4.65 233.78-5.9L233.78-5.9 233.78-24.3Q233.38-25 231.71-25.5 230.03-26 228.13-26L228.13-26Q223.83-26 221.23-22.93 218.63-19.85 218.63-13.6L218.63-13.6Q218.63-8 220.93-5.3 223.23-2.6 226.83-2.6L226.83-2.6ZM245.38-7.3Q245.38-12.15 250.18-14.33 254.98-16.5 262.13-16.65L262.13-16.65 262.13-18.2Q262.13-20.75 261.61-22.23 261.08-23.7 259.78-24.38 258.48-25.05 256.13-25.05L256.13-25.05Q253.58-25.05 251.51-24.28 249.43-23.5 247.48-22.4L247.48-22.4 246.38-24.6Q246.93-25.1 248.68-26 250.43-26.9 252.68-27.6 254.93-28.3 257.03-28.3L257.03-28.3Q260.43-28.3 262.41-27.35 264.38-26.4 265.25-24.3 266.13-22.2 266.13-18.65L266.13-18.65 266.13-2.15 269.23-2.15 269.23-0.3Q266.48 0.45 264.58 0.45L264.58 0.45Q263.38 0.45 262.93 0.08 262.48-0.3 262.48-1.65L262.48-1.65 262.48-3.5Q260.68-1.9 258.56-0.68 256.43 0.55 253.73 0.55L253.73 0.55Q250.13 0.55 247.76-1.45 245.38-3.45 245.38-7.3L245.38-7.3ZM255.23-2.4Q256.63-2.4 258.58-3.3 260.53-4.2 262.13-5.45L262.13-5.45 262.13-14.3Q256.08-14.25 252.96-12.5 249.83-10.75 249.83-7.8L249.83-7.8Q249.83-4.95 251.28-3.68 252.73-2.4 255.23-2.4L255.23-2.4ZM277.03-2.55L277.03-37.8 272.78-38.25 272.78-40.1 280.08-40.95 280.13-40.95 281.08-40.3 281.08-2.5 285.78-2.15 285.78 0 272.63 0 272.63-2.15 277.03-2.55ZM305.77-2.6L305.77-34.45 301.57-35 301.57-37.15 307.82-37.15Q309.47-37.15 312.07-37.35L312.07-37.35Q314.47-37.55 315.62-37.55L315.62-37.55Q322.12-37.55 325.05-35.4 327.97-33.25 327.97-29.15L327.97-29.15Q327.97-25.65 326.05-23.08 324.12-20.5 320.57-19.8L320.57-19.8Q325.27-19.95 327.95-17.55 330.62-15.15 330.62-11.1L330.62-11.1Q330.62-6.1 327.1-2.9 323.57 0.3 315.57 0.3L315.57 0.3Q314.62 0.3 312.52 0.2L312.52 0.2Q309.92 0 307.62 0L307.62 0 301.47 0 301.47-2.15 305.77-2.6ZM309.87-20.65Q310.67-20.6 313.02-20.6L313.02-20.6 316.02-20.6Q319.82-20.6 321.82-22.55 323.82-24.5 323.82-28.2L323.82-28.2Q323.82-31.85 321.85-33.55 319.87-35.25 315.07-35.25L315.07-35.25Q313.27-35.25 311.37-35.05L311.37-35.05Q310.17-34.95 309.87-34.95L309.87-34.95 309.87-20.65ZM309.87-2.5Q311.17-2.1 315.52-2.1L315.52-2.1Q321.12-2.1 323.62-4.23 326.12-6.35 326.12-10.35L326.12-10.35Q326.12-14.35 323.97-16.18 321.82-18 317.02-18L317.02-18 313.32-18Q310.62-18 309.87-17.95L309.87-17.95 309.87-2.5ZM340.67-33Q337.97-33 337.97-35.85L337.97-35.85Q337.97-37.3 338.82-38.23 339.67-39.15 341.12-39.15L341.12-39.15Q342.62-39.15 343.27-38.33 343.92-37.5 343.92-36.3L343.92-36.3Q343.92-34.75 343.1-33.88 342.27-33 340.72-33L340.72-33 340.67-33ZM339.07-2.55L339.07-24.45 335.17-25.3 335.17-27.55 342.02-28.35 342.12-28.35 343.12-27.55 343.12-2.5 347.47-2.15 347.47 0 334.67 0 334.67-2.15 339.07-2.55ZM351.02-14.05Q351.02-18.4 352.84-21.7 354.67-25 357.64-26.75 360.62-28.5 363.87-28.5L363.87-28.5Q370.17-28.5 373.19-24.4 376.22-20.3 376.22-13.9L376.22-13.9Q376.22-9.55 374.39-6.25 372.57-2.95 369.59-1.2 366.62 0.55 363.37 0.55L363.37 0.55Q357.07 0.55 354.04-3.55 351.02-7.65 351.02-14.05L351.02-14.05ZM363.62-2.05Q367.47-2.05 369.57-5 371.67-7.95 371.67-13.6L371.67-13.6Q371.67-19 369.72-22.45 367.77-25.9 363.67-25.9L363.67-25.9Q359.82-25.9 357.69-22.95 355.57-20 355.57-14.35L355.57-14.35Q355.57-8.9 357.54-5.48 359.52-2.05 363.62-2.05L363.62-2.05ZM380.72 0L380.72-2.15 383.92-2.55 383.92-24.45 380.07-25.3 380.07-27.55 386.42-28.35 387.52-27.55 387.52-25.35 387.47-24.1Q389.32-25.7 392.32-27.05 395.32-28.4 397.77-28.4L397.77-28.4Q400.47-28.4 402.09-27.5 403.72-26.6 404.57-24.7L404.57-24.7Q406.12-26 409.09-27.2 412.07-28.4 414.57-28.4L414.57-28.4Q417.72-28.4 419.44-27.2 421.17-26 421.87-23.5 422.57-21 422.57-16.75L422.57-16.75 422.57-2.55 426.37-2.15 426.37 0 415.17 0 415.17-2.15 418.57-2.55 418.57-16.6Q418.57-19.75 418.12-21.6 417.67-23.45 416.37-24.4 415.07-25.35 412.57-25.35L412.57-25.35Q410.72-25.35 408.69-24.53 406.67-23.7 405.22-22.65L405.22-22.65Q405.72-20.35 405.72-16.65L405.72-16.65 405.72-2.55 409.52-2.15 409.52 0 398.07 0 398.07-2.15 401.67-2.55 401.67-16.7Q401.67-19.9 401.29-21.7 400.92-23.5 399.72-24.4 398.52-25.3 396.17-25.3L396.17-25.3Q394.22-25.3 391.94-24.33 389.67-23.35 387.97-22L387.97-22 387.97-2.55 391.52-2.15 391.52 0 380.72 0ZM442.11 0.55Q436.31 0.55 433.19-3.43 430.06-7.4 430.06-14L430.06-14Q430.06-18.25 431.71-21.55 433.36-24.85 436.29-26.68 439.21-28.5 442.86-28.5L442.86-28.5Q447.31-28.5 449.79-25.95 452.26-23.4 452.46-18.6L452.46-18.6Q452.46-15.5 452.16-14.2L452.16-14.2 434.36-14.2Q434.36-8.95 436.74-5.63 439.11-2.3 443.41-2.3L443.41-2.3Q445.51-2.3 447.71-3.05 449.91-3.8 451.11-4.85L451.11-4.85 451.91-3Q450.46-1.5 447.69-0.48 444.91 0.55 442.11 0.55L442.11 0.55ZM434.41-16.55L447.96-16.55Q448.11-17.6 448.11-18.75L448.11-18.75Q448.06-22.05 446.54-24 445.01-25.95 441.86-25.95L441.86-25.95Q435.01-25.95 434.41-16.55L434.41-16.55ZM467.96 0.55Q465.01 0.55 462.51-0.98 460.01-2.5 458.51-5.6 457.01-8.7 457.01-13.2L457.01-13.2Q457.01-17.5 458.76-20.98 460.51-24.45 463.74-26.48 466.96-28.5 471.26-28.5L471.26-28.5Q474.01-28.5 476.56-27.9L476.56-27.9 476.56-37.8 471.36-38.3 471.36-40.1 479.56-40.95 479.66-40.95 480.61-40.25 480.61-2.25 483.66-2.25 483.66-0.3Q483.41-0.25 481.96 0.1 480.51 0.45 478.86 0.45L478.86 0.45Q477.71 0.45 477.24 0.05 476.76-0.35 476.76-1.7L476.76-1.7 476.76-3.45Q475.21-1.75 472.99-0.6 470.76 0.55 467.96 0.55L467.96 0.55ZM469.61-2.6Q471.76-2.6 473.69-3.63 475.61-4.65 476.56-5.9L476.56-5.9 476.56-24.3Q476.16-25 474.49-25.5 472.81-26 470.91-26L470.91-26Q466.61-26 464.01-22.93 461.41-19.85 461.41-13.6L461.41-13.6Q461.41-8 463.71-5.3 466.01-2.6 469.61-2.6L469.61-2.6ZM493.71-33Q491.01-33 491.01-35.85L491.01-35.85Q491.01-37.3 491.86-38.23 492.71-39.15 494.16-39.15L494.16-39.15Q495.66-39.15 496.31-38.33 496.96-37.5 496.96-36.3L496.96-36.3Q496.96-34.75 496.13-33.88 495.31-33 493.76-33L493.76-33 493.71-33ZM492.11-2.55L492.11-24.45 488.21-25.3 488.21-27.55 495.06-28.35 495.16-28.35 496.16-27.55 496.16-2.5 500.51-2.15 500.51 0 487.71 0 487.71-2.15 492.11-2.55ZM503.5-13.7Q503.5-17.75 505.08-21.13 506.66-24.5 509.78-26.5 512.9-28.5 517.4-28.5L517.4-28.5Q519.36-28.5 521.21-28.03 523.06-27.55 524.4-27L524.4-27 524.21-19.85 521.71-19.85 520.65-24.65Q520.36-26.15 516.36-26.15L516.36-26.15Q512.46-26.15 510.13-23.15 507.81-20.15 507.81-14.95L507.81-14.95Q507.81-8.75 510.31-5.55 512.81-2.35 516.81-2.35L516.81-2.35Q518.9-2.35 520.88-3.05 522.86-3.75 524.15-4.65L524.15-4.65 524.96-3Q523.5-1.55 520.96-0.5 518.4 0.55 515.9 0.55L515.9 0.55Q511.95 0.55 509.16-1.33 506.36-3.2 504.93-6.43 503.5-9.65 503.5-13.7L503.5-13.7ZM529.8-7.3Q529.8-12.15 534.6-14.33 539.4-16.5 546.55-16.65L546.55-16.65 546.55-18.2Q546.55-20.75 546.03-22.23 545.5-23.7 544.2-24.38 542.9-25.05 540.55-25.05L540.55-25.05Q538-25.05 535.93-24.28 533.85-23.5 531.9-22.4L531.9-22.4 530.8-24.6Q531.35-25.1 533.1-26 534.85-26.9 537.1-27.6 539.35-28.3 541.45-28.3L541.45-28.3Q544.85-28.3 546.83-27.35 548.8-26.4 549.68-24.3 550.55-22.2 550.55-18.65L550.55-18.65 550.55-2.15 553.65-2.15 553.65-0.3Q550.9 0.45 549 0.45L549 0.45Q547.8 0.45 547.35 0.08 546.9-0.3 546.9-1.65L546.9-1.65 546.9-3.5Q545.1-1.9 542.98-0.68 540.85 0.55 538.15 0.55L538.15 0.55Q534.55 0.55 532.18-1.45 529.8-3.45 529.8-7.3L529.8-7.3ZM539.65-2.4Q541.05-2.4 543-3.3 544.95-4.2 546.55-5.45L546.55-5.45 546.55-14.3Q540.5-14.25 537.38-12.5 534.25-10.75 534.25-7.8L534.25-7.8Q534.25-4.95 535.7-3.68 537.15-2.4 539.65-2.4L539.65-2.4ZM561.45-2.55L561.45-37.8 557.2-38.25 557.2-40.1 564.5-40.95 564.55-40.95 565.5-40.3 565.5-2.5 570.2-2.15 570.2 0 557.05 0 557.05-2.15 561.45-2.55ZM590.19-2.6L590.19-34.45 585.99-35 585.99-37.15 610.74-37.15 611.44-29.8 609.04-29.8 607.69-34.6 594.29-34.85 594.29-20.3 603.49-20.45 604.14-24.6 606.64-24.6 606.64-13.55 604.14-13.55 603.49-17.8 594.29-17.95 594.29-2.55 609.59-2.95 612.14-9.2 614.54-8.45 612.99 0 585.89 0 585.89-2.15 590.19-2.6ZM621.24-2.55L621.24-24.45 617.39-25.3 617.39-27.55 623.74-28.35 623.89-28.35 624.84-27.55 624.84-25.35 624.79-24.1Q626.64-25.7 629.69-27.05 632.74-28.4 635.34-28.4L635.34-28.4Q638.54-28.4 640.27-27.18 641.99-25.95 642.67-23.43 643.34-20.9 643.34-16.65L643.34-16.65 643.34-2.5 647.09-2.15 647.09 0 635.94 0 635.94-2.15 639.29-2.5 639.29-16.7Q639.29-19.85 638.87-21.65 638.44-23.45 637.22-24.38 635.99-25.3 633.64-25.3L633.64-25.3Q631.64-25.3 629.32-24.3 626.99-23.3 625.29-21.95L625.29-21.95 625.29-2.55 628.94-2.15 628.94 0 617.89 0 617.89-2.15 621.24-2.55ZM662.59 13.5Q650.79 13.5 650.79 6L650.79 6Q650.79 3.75 652.16 1.9 653.54 0.05 655.44-1L655.44-1Q653.09-2.25 653.09-5.15L653.09-5.15Q653.09-7 654.14-8.63 655.19-10.25 656.84-11.1L656.84-11.1Q654.49-12.2 653.16-14.23 651.84-16.25 651.84-18.95L651.84-18.95Q651.84-21.85 653.44-24.03 655.04-26.2 657.61-27.35 660.19-28.5 662.99-28.5L662.99-28.5Q667.64-28.5 670.44-26.45L670.44-26.45Q671.19-27.15 672.76-27.83 674.34-28.5 676.14-28.5L676.14-28.5 677.79-28.5 677.79-24.8 672.09-24.8Q673.54-22.8 673.54-19.95L673.54-19.95Q673.54-17 672.04-14.73 670.54-12.45 668.01-11.2 665.49-9.95 662.44-9.95L662.44-9.95Q660.39-9.95 658.69-10.4L658.69-10.4Q657.79-9.7 657.26-8.78 656.74-7.85 656.74-6.9L656.74-6.9Q656.74-5 657.96-4.25 659.19-3.5 662.24-3.5L662.24-3.5 668.14-3.5Q672.79-3.5 675.01-1.7 677.24 0.1 677.24 3.35L677.24 3.35Q677.24 6.05 675.29 8.38 673.34 10.7 669.96 12.1 666.59 13.5 662.59 13.5L662.59 13.5ZM662.94-12.4Q669.29-12.4 669.29-19.4L669.29-19.4Q669.29-26.05 662.69-26.05L662.69-26.05Q656.09-26.05 656.09-19.5L656.09-19.5Q656.09-16.35 657.79-14.38 659.49-12.4 662.94-12.4L662.94-12.4ZM662.84 10.95Q665.54 10.95 667.99 10.18 670.44 9.4 671.94 7.93 673.44 6.45 673.44 4.5L673.44 4.5Q673.44 2.95 672.96 2 672.49 1.05 671.11 0.53 669.74 0 667.14 0L667.14 0 660.94 0Q658.54 0 657.29-0.3L657.29-0.3Q654.84 2.05 654.84 5.2L654.84 5.2Q654.84 8.05 656.64 9.5 658.44 10.95 662.84 10.95L662.84 10.95ZM686.44-33Q683.74-33 683.74-35.85L683.74-35.85Q683.74-37.3 684.59-38.23 685.44-39.15 686.89-39.15L686.89-39.15Q688.39-39.15 689.04-38.33 689.69-37.5 689.69-36.3L689.69-36.3Q689.69-34.75 688.86-33.88 688.04-33 686.49-33L686.49-33 686.44-33ZM684.84-2.55L684.84-24.45 680.94-25.3 680.94-27.55 687.79-28.35 687.89-28.35 688.89-27.55 688.89-2.5 693.24-2.15 693.24 0 680.44 0 680.44-2.15 684.84-2.55ZM699.93-2.55L699.93-24.45 696.08-25.3 696.08-27.55 702.43-28.35 702.58-28.35 703.53-27.55 703.53-25.35 703.48-24.1Q705.33-25.7 708.38-27.05 711.43-28.4 714.03-28.4L714.03-28.4Q717.23-28.4 718.96-27.18 720.68-25.95 721.36-23.43 722.03-20.9 722.03-16.65L722.03-16.65 722.03-2.5 725.78-2.15 725.78 0 714.63 0 714.63-2.15 717.98-2.5 717.98-16.7Q717.98-19.85 717.56-21.65 717.13-23.45 715.91-24.38 714.68-25.3 712.33-25.3L712.33-25.3Q710.33-25.3 708.01-24.3 705.68-23.3 703.98-21.95L703.98-21.95 703.98-2.55 707.63-2.15 707.63 0 696.58 0 696.58-2.15 699.93-2.55ZM741.58 0.55Q735.78 0.55 732.66-3.43 729.53-7.4 729.53-14L729.53-14Q729.53-18.25 731.18-21.55 732.83-24.85 735.76-26.68 738.68-28.5 742.33-28.5L742.33-28.5Q746.78-28.5 749.26-25.95 751.73-23.4 751.93-18.6L751.93-18.6Q751.93-15.5 751.63-14.2L751.63-14.2 733.83-14.2Q733.83-8.95 736.21-5.63 738.58-2.3 742.88-2.3L742.88-2.3Q744.98-2.3 747.18-3.05 749.38-3.8 750.58-4.85L750.58-4.85 751.38-3Q749.93-1.5 747.16-0.48 744.38 0.55 741.58 0.55L741.58 0.55ZM733.88-16.55L747.43-16.55Q747.58-17.6 747.58-18.75L747.58-18.75Q747.53-22.05 746.01-24 744.48-25.95 741.33-25.95L741.33-25.95Q734.48-25.95 733.88-16.55L733.88-16.55ZM768.58 0.55Q762.78 0.55 759.65-3.43 756.53-7.4 756.53-14L756.53-14Q756.53-18.25 758.18-21.55 759.83-24.85 762.75-26.68 765.68-28.5 769.33-28.5L769.33-28.5Q773.78-28.5 776.25-25.95 778.73-23.4 778.93-18.6L778.93-18.6Q778.93-15.5 778.63-14.2L778.63-14.2 760.83-14.2Q760.83-8.95 763.2-5.63 765.58-2.3 769.88-2.3L769.88-2.3Q771.98-2.3 774.18-3.05 776.38-3.8 777.58-4.85L777.58-4.85 778.38-3Q776.93-1.5 774.15-0.48 771.38 0.55 768.58 0.55L768.58 0.55ZM760.88-16.55L774.43-16.55Q774.58-17.6 774.58-18.75L774.58-18.75Q774.53-22.05 773-24 771.48-25.95 768.33-25.95L768.33-25.95Q761.48-25.95 760.88-16.55L760.88-16.55ZM783.63 0L783.63-2.1 787.63-2.4 787.63-24.45 783.78-25.3 783.78-27.55 790.13-28.35 790.23-28.35 791.18-27.55 791.18-26.75 791.08-22.95 791.18-22.95Q791.28-23.05 792.5-24.48 793.73-25.9 796.15-27.2 798.58-28.5 801.03-28.5L801.03-28.5Q801.83-28.5 802.53-28.3L802.53-28.3 802.53-23.9Q802.33-24.05 801.65-24.2 800.98-24.35 800.23-24.35L800.23-24.35Q797.38-24.35 795.38-23.5 793.38-22.65 791.68-21.4L791.68-21.4 791.68-2.45 798.33-2.05 798.33 0 783.63 0ZM811.77-33Q809.07-33 809.07-35.85L809.07-35.85Q809.07-37.3 809.92-38.23 810.77-39.15 812.22-39.15L812.22-39.15Q813.72-39.15 814.37-38.33 815.02-37.5 815.02-36.3L815.02-36.3Q815.02-34.75 814.2-33.88 813.37-33 811.82-33L811.82-33 811.77-33ZM810.17-2.55L810.17-24.45 806.27-25.3 806.27-27.55 813.12-28.35 813.22-28.35 814.22-27.55 814.22-2.5 818.57-2.15 818.57 0 805.77 0 805.77-2.15 810.17-2.55ZM825.27-2.55L825.27-24.45 821.42-25.3 821.42-27.55 827.77-28.35 827.92-28.35 828.87-27.55 828.87-25.35 828.82-24.1Q830.67-25.7 833.72-27.05 836.77-28.4 839.37-28.4L839.37-28.4Q842.57-28.4 844.3-27.18 846.02-25.95 846.7-23.43 847.37-20.9 847.37-16.65L847.37-16.65 847.37-2.5 851.12-2.15 851.12 0 839.97 0 839.97-2.15 843.32-2.5 843.32-16.7Q843.32-19.85 842.9-21.65 842.47-23.45 841.25-24.38 840.02-25.3 837.67-25.3L837.67-25.3Q835.67-25.3 833.35-24.3 831.02-23.3 829.32-21.95L829.32-21.95 829.32-2.55 832.97-2.15 832.97 0 821.92 0 821.92-2.15 825.27-2.55ZM866.62 13.5Q854.82 13.5 854.82 6L854.82 6Q854.82 3.75 856.19 1.9 857.57 0.05 859.47-1L859.47-1Q857.12-2.25 857.12-5.15L857.12-5.15Q857.12-7 858.17-8.63 859.22-10.25 860.87-11.1L860.87-11.1Q858.52-12.2 857.19-14.23 855.87-16.25 855.87-18.95L855.87-18.95Q855.87-21.85 857.47-24.03 859.07-26.2 861.64-27.35 864.22-28.5 867.02-28.5L867.02-28.5Q871.67-28.5 874.47-26.45L874.47-26.45Q875.22-27.15 876.79-27.83 878.37-28.5 880.17-28.5L880.17-28.5 881.82-28.5 881.82-24.8 876.12-24.8Q877.57-22.8 877.57-19.95L877.57-19.95Q877.57-17 876.07-14.73 874.57-12.45 872.04-11.2 869.52-9.95 866.47-9.95L866.47-9.95Q864.42-9.95 862.72-10.4L862.72-10.4Q861.82-9.7 861.29-8.78 860.77-7.85 860.77-6.9L860.77-6.9Q860.77-5 861.99-4.25 863.22-3.5 866.27-3.5L866.27-3.5 872.17-3.5Q876.82-3.5 879.04-1.7 881.27 0.1 881.27 3.35L881.27 3.35Q881.27 6.05 879.32 8.38 877.37 10.7 873.99 12.1 870.62 13.5 866.62 13.5L866.62 13.5ZM866.97-12.4Q873.32-12.4 873.32-19.4L873.32-19.4Q873.32-26.05 866.72-26.05L866.72-26.05Q860.12-26.05 860.12-19.5L860.12-19.5Q860.12-16.35 861.82-14.38 863.52-12.4 866.97-12.4L866.97-12.4ZM866.87 10.95Q869.57 10.95 872.02 10.18 874.47 9.4 875.97 7.93 877.47 6.45 877.47 4.5L877.47 4.5Q877.47 2.95 876.99 2 876.52 1.05 875.14 0.53 873.77 0 871.17 0L871.17 0 864.97 0Q862.57 0 861.32-0.3L861.32-0.3Q858.87 2.05 858.87 5.2L858.87 5.2Q858.87 8.05 860.67 9.5 862.47 10.95 866.87 10.95L866.87 10.95ZM901.16-2.6L901.16-34.45 896.96-35 896.96-37.15 910.26-37.15 910.26-35 905.26-34.45 905.26-2.6 919.51-3 922.31-10.8 924.71-10.4 922.86 0 896.86 0 896.86-2.15 901.16-2.6ZM928.31-7.3Q928.31-12.15 933.11-14.33 937.91-16.5 945.06-16.65L945.06-16.65 945.06-18.2Q945.06-20.75 944.54-22.23 944.01-23.7 942.71-24.38 941.41-25.05 939.06-25.05L939.06-25.05Q936.51-25.05 934.44-24.28 932.36-23.5 930.41-22.4L930.41-22.4 929.31-24.6Q929.86-25.1 931.61-26 933.36-26.9 935.61-27.6 937.86-28.3 939.96-28.3L939.96-28.3Q943.36-28.3 945.34-27.35 947.31-26.4 948.19-24.3 949.06-22.2 949.06-18.65L949.06-18.65 949.06-2.15 952.16-2.15 952.16-0.3Q949.41 0.45 947.51 0.45L947.51 0.45Q946.31 0.45 945.86 0.08 945.41-0.3 945.41-1.65L945.41-1.65 945.41-3.5Q943.61-1.9 941.49-0.68 939.36 0.55 936.66 0.55L936.66 0.55Q933.06 0.55 930.69-1.45 928.31-3.45 928.31-7.3L928.31-7.3ZM938.16-2.4Q939.56-2.4 941.51-3.3 943.46-4.2 945.06-5.45L945.06-5.45 945.06-14.3Q939.01-14.25 935.89-12.5 932.76-10.75 932.76-7.8L932.76-7.8Q932.76-4.95 934.21-3.68 935.66-2.4 938.16-2.4L938.16-2.4ZM953.46-38.25L953.46-40.1 960.76-40.95 960.86-40.95 961.81-40.25 961.81-25.05Q963.36-26.5 965.53-27.5 967.71-28.5 970.36-28.5L970.36-28.5Q973.31-28.5 975.78-27.05 978.26-25.6 979.78-22.55 981.31-19.5 981.31-14.9L981.31-14.9Q981.31-10.6 979.56-7.08 977.81-3.55 974.56-1.5 971.31 0.55 967.06 0.55L967.06 0.55Q963.96 0.55 961.16-0.1 958.36-0.75 957.76-1.35L957.76-1.35 957.76-37.8 953.46-38.25ZM968.71-25.45Q966.61-25.45 964.76-24.45 962.91-23.45 961.81-22.25L961.81-22.25 961.81-3.75Q962.16-2.95 963.78-2.48 965.41-2 967.41-2L967.41-2Q971.71-2 974.31-5.18 976.91-8.35 976.91-14.5L976.91-14.5Q976.91-20 974.58-22.73 972.26-25.45 968.71-25.45L968.71-25.45Z" opacity="1" transform="matrix(1,0,0,1,0,0)" fill="#7b1417" class="slogan-text-1" data-fill-palette-color="secondary" id="text-1"></path></svg></g></svg></g></svg></g></svg></g><g transform="matrix(1,0,0,1,259.773935729411,0)"><svg viewBox="0 0 109.47207959148352 97.32695880789461" height="97.32695880789461" width="109.47207959148352"><g><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0" y="0" viewBox="0.129 1.446 23.742 21.108" enable-background="new 0 0 24 24" xml:space="preserve" height="97.32695880789461" width="109.47207959148352" class="icon-icon-0" data-fill-palette-color="accent" id="icon-0"><path d="M21.88 1.446H2.12c-1.098 0-1.991 0.894-1.991 1.991v17.126c0 1.098 0.894 1.991 1.991 1.991h19.76c1.098 0 1.991-0.894 1.991-1.991V3.437C23.871 2.339 22.978 1.446 21.88 1.446zM10.728 17.242H9.999 9.828c-0.174 0-0.335 0.091-0.426 0.238l-0.318 0.519-0.847-1.774c-0.08-0.168-0.247-0.278-0.433-0.285-0.179-0.007-0.36 0.091-0.452 0.252l-0.852 1.488-0.79-1.131c-0.094-0.134-0.247-0.214-0.41-0.214-0.001 0-0.001 0-0.002 0-0.164 0.001-0.317 0.082-0.41 0.217l-0.474 0.69H1.129V10.55h3.55c0.243 0 0.45-0.175 0.492-0.414l0.135-0.765 0.745 4.173c0.043 0.239 0.25 0.412 0.492 0.412 0.003 0 0.005 0 0.008 0 0.245-0.004 0.451-0.185 0.487-0.428l0.703-4.812 0.792 6.488c0.03 0.248 0.238 0.436 0.487 0.439 0.003 0 0.006 0 0.009 0 0.246 0 0.456-0.179 0.494-0.423l0.732-4.672h1.472 1c0.243 0 0.45-0.175 0.492-0.414l0.273-1.559 1.624 5.032c0.07 0.222 0.271 0.365 0.518 0.345 0.231-0.02 0.419-0.195 0.453-0.426l0.702-4.81 0.792 6.486c0.03 0.248 0.238 0.436 0.487 0.439 0.003 0 0.006 0 0.009 0 0.246 0 0.456-0.179 0.494-0.423l0.732-4.672h3.566v6.691h-3.994c-0.105 0-0.208 0.033-0.293 0.095l-1.313 0.951-0.984-2.063c-0.069-0.146-0.204-0.249-0.362-0.277-0.162-0.026-0.321 0.021-0.437 0.133l-1.821 1.766-0.906-1.297c-0.094-0.134-0.247-0.214-0.41-0.214-0.001 0-0.002 0-0.002 0-0.164 0.001-0.317 0.082-0.41 0.217l-0.474 0.69H10.728zM2.12 2.446h19.76c0.547 0 0.991 0.444 0.991 0.991V9.55h-3.994c-0.246 0-0.456 0.18-0.494 0.423l-0.243 1.55-0.809-6.628c-0.03-0.249-0.239-0.437-0.49-0.439-0.002 0-0.004 0-0.006 0-0.248 0-0.459 0.182-0.495 0.428l-0.931 6.374L13.825 6.35c-0.069-0.22-0.279-0.357-0.51-0.346-0.229 0.017-0.419 0.187-0.458 0.413l-0.55 3.133h-0.58H9.999 9.828c-0.246 0-0.456 0.18-0.494 0.423l-0.243 1.55L8.282 4.895c-0.03-0.249-0.239-0.437-0.49-0.439-0.002 0-0.004 0-0.006 0-0.248 0-0.459 0.182-0.495 0.428l-0.797 5.454L5.793 6.416C5.75 6.177 5.543 6.003 5.301 6.003H5.3c-0.242 0-0.449 0.175-0.491 0.414L4.259 9.55h-3.13V3.437C1.129 2.89 1.573 2.446 2.12 2.446zM21.88 21.554H2.12c-0.547 0-0.991-0.444-0.991-0.991v-2.321h3.55c0.165 0 0.319-0.081 0.412-0.217l0.214-0.312 0.828 1.186c0.098 0.141 0.255 0.225 0.433 0.213 0.171-0.007 0.326-0.103 0.411-0.251l0.77-1.345 0.832 1.743c0.079 0.166 0.242 0.274 0.425 0.284 0.009 0.001 0.018 0.001 0.026 0.001 0.173 0 0.335-0.09 0.426-0.238l0.653-1.064h0.619 1c0.165 0 0.319-0.081 0.412-0.217l0.214-0.313 0.829 1.187c0.084 0.12 0.217 0.197 0.362 0.212 0.153 0.006 0.29-0.037 0.396-0.139l1.743-1.689 0.943 1.977c0.063 0.135 0.184 0.233 0.328 0.27 0.04 0.011 0.082 0.016 0.123 0.016 0.104 0 0.207-0.032 0.293-0.095l1.668-1.208h3.832v2.321C22.871 21.11 22.427 21.554 21.88 21.554z" fill="#e8b657" data-fill-palette-color="accent"></path></svg></g></svg></g></svg></g></svg></g></svg></g><g><path d="M245.816 0c68.262 0 123.6 55.338 123.6 123.6 0 68.262-55.338 123.6-123.6 123.6-55.266 0-102.059-36.272-117.875-86.308h2.037c15.746 48.948 61.656 84.368 115.838 84.368 67.191 0 121.66-54.469 121.66-121.66 0-67.191-54.469-121.66-121.66-121.66-54.182 0-100.092 35.42-115.838 84.368l-2.037 0c15.815-50.036 62.609-86.308 117.875-86.308z" fill="#7b1417" stroke="transparent" data-fill-palette-color="tertiary"></path></g></svg></g><defs></defs></svg><rect width="395.52" height="247.2" fill="none" stroke="none" visibility="hidden"></rect></g></svg>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-8 title-div">
                <ul class="navbar-nav">
                    <li class="nav-item font-medium title-sm">
                        <h5>{{__('client.mune_full')}} - {{ __('client.mune') }}</h5>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="row menu-nav bg-color-blue">
        <nav class="navbar navbar-expand-lg navbar-light p-3 mx-lg-5" >
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto d-flex justify-content-between">
                    <li class="nav-item pr-10">
                        <a class="nav-link second-nav-link" href="{{ route('client.index') }}">{{ __('client.navbar.home') }}</a>
                    </li>
                    <li class="nav-item pr-10">
                        <a class="nav-link second-nav-link" href="{{ route('client.researchers') }}">{{ __('client.navbar.researchers') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('client.navbar.publications') }}
                        </a>
                        <div class="dropdown-menu bg-red-color" aria-labelledby="navbarDropdown">
                            @foreach($publication_types as $type)
                                <a class="dropdown-item dropdown-item-color" href="{{ route('client.publications', str_replace(" ", "_", strtolower($type->type_name_en))) }}">{{ __('client.publications.'.str_replace(' ', '_', strtolower($type->type_name_en))) }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item pr-10">
                        <a class="nav-link second-nav-link" href="{{ route('client.projects') }}">{{ __('client.navbar.projects') }}</a>
                    </li>
                    <li class="nav-item pr-10">
                        <a class="nav-link second-nav-link" href="{{ route('client.student-activities')}}">{{ __('client.navbar.student_activities') }}</a>
                    </li>
                    <li class="nav-item pr-10">
                        <a class="nav-link second-nav-link" href="{{ route('client.disseminations') }}">{{ __('client.navbar.disseminations') }}</a>
                    </li>
                    <li class="nav-item pr-10">
                        <a class="nav-link second-nav-link" href="{{ route('client.alumni') }}">{{ __('client.navbar.alumni') }}</a>
                    </li>
                    <li class="nav-item pr-10">
                        <a class="nav-link second-nav-link" href="{{ route('client.galleries') }}">{{ __('client.galleries.galleries') }}</a>
                    </li>
                    <li class="nav-item pr-10">
                        <a class="nav-link second-nav-link" href="{{ route('client.contact') }}">{{ __('client.navbar.contact') }}</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="row">
        <div class="col-sm-12 languages-responsive" style="font-size: 14px;">
            <form id="change-language-form" method="POST" action="{{ route('locale') }}">
                <ul class="navbar-nav d-flex" style="flex-direction: unset!important;">
                    @csrf
                    @foreach($language_options as $option)
                        <li class="nav-item pr-2">
                            <a class="nav-link language-responsive-link"><input class="link-lang d-none" type="radio" name="language" id="lang-{{$option->id}}" value="{{$option->code}}"/>
                                <label for="lang-{{$option->id}}" class="label-cursor-pointer mb-0">{{ $option->name }}</label>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </form>
        </div>
    </div>
</div>

@if (count(Request::segments()) > 0)
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-9 m-auto">
                <div class="my-4 list-style-none font-size-14">
                    <li class="d-inline"><a class="breadcrumb-link" href="{{ route('client.index') }}">{{ __('client.navbar.homepage') }}</a> &nbsp; > &nbsp;</li>
                    @for($i = 1; $i <= count(Request::segments()); $i++)
                            @if(is_numeric(Request::segment($i)))
                                <li class="d-inline">{{ Request::segment($i) }} @if($i < count(Request::segments())) &nbsp; > &nbsp; @endif</li>
                            @else
                                <li class="d-inline">{{ __('client.'.Request::segment(1).'.'.Request::segment($i)) }} @if($i < count(Request::segments())) &nbsp; > &nbsp; @endif </li>
                            @endif
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endif