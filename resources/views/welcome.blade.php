<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Steadfast IT</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            .ag-format-container {
                width: 1142px;
                margin: 0 auto;
                }


                body {
                background-color: #000;
                }
                .ag-courses_box {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: start;
                -ms-flex-align: start;
                align-items: flex-start;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;

                padding: 50px 0;
                }
                .ag-courses_item {
                -ms-flex-preferred-size: calc(33.33333% - 30px);
                flex-basis: calc(33.33333% - 30px);

                margin: 0 15px 30px;

                overflow: hidden;

                border-radius: 28px;
                }
                .ag-courses-item_link {
                display: block;
                padding: 30px 20px;
                background-color: #121212;

                overflow: hidden;

                position: relative;
                }
                .ag-courses-item_link:hover,
                .ag-courses-item_link:hover .ag-courses-item_date {
                text-decoration: none;
                color: #FFF;
                }
                .ag-courses-item_link:hover .ag-courses-item_bg {
                -webkit-transform: scale(10);
                -ms-transform: scale(10);
                transform: scale(10);
                }
                .ag-courses-item_title {
                min-height: 87px;
                margin: 0 0 25px;

                overflow: hidden;

                font-weight: bold;
                font-size: 30px;
                color: #FFF;

                z-index: 2;
                position: relative;
                }
                .ag-courses-item_date-box {
                font-size: 18px;
                color: #FFF;

                z-index: 2;
                position: relative;
                }
                .ag-courses-item_date {
                font-weight: bold;
                color: #f9b234;

                -webkit-transition: color .5s ease;
                -o-transition: color .5s ease;
                transition: color .5s ease
                }
                .ag-courses-item_bg {
                height: 128px;
                width: 128px;
                background-color: #f9b234;

                z-index: 1;
                position: absolute;
                top: -75px;
                right: -75px;

                border-radius: 50%;

                -webkit-transition: all .5s ease;
                -o-transition: all .5s ease;
                transition: all .5s ease;
                }
                .ag-courses_item:nth-child(2n) .ag-courses-item_bg {
                background-color: #3ecd5e;
                }
                .ag-courses_item:nth-child(3n) .ag-courses-item_bg {
                background-color: #e44002;
                }
                .ag-courses_item:nth-child(4n) .ag-courses-item_bg {
                background-color: #952aff;
                }
                .ag-courses_item:nth-child(5n) .ag-courses-item_bg {
                background-color: #cd3e94;
                }
                .ag-courses_item:nth-child(6n) .ag-courses-item_bg {
                background-color: #4c49ea;
                }



                @media only screen and (max-width: 979px) {
                .ag-courses_item {
                    -ms-flex-preferred-size: calc(50% - 30px);
                    flex-basis: calc(50% - 30px);
                }
                .ag-courses-item_title {
                    font-size: 24px;
                }
                }

                @media only screen and (max-width: 767px) {
                .ag-format-container {
                    width: 96%;
                }

                }
                @media only screen and (max-width: 639px) {
                .ag-courses_item {
                    -ms-flex-preferred-size: 100%;
                    flex-basis: 100%;
                }
                .ag-courses-item_title {
                    min-height: 72px;
                    line-height: 1;

                    font-size: 24px;
                }
                .ag-courses-item_link {
                    padding: 22px 40px;
                }
                .ag-courses-item_date-box {
                    font-size: 16px;
                }
                }
        </style>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="container">

                <div class="ag-format-container">
                    <div class="ag-courses_box">
                      <div class="ag-courses_item">
                        <a href="{{ route('login') }}" class="ag-courses-item_link">
                          <div class="ag-courses-item_bg"></div>

                          <div class="ag-courses-item_title">
                            Data Collection system categorywise <br>Steadfast It
                          </div>

                          <div class="ag-courses-item_date-box">
                            Start:
                            <span class="ag-courses-item_date">
                              24-09-2024 (3.00PM)
                            </span>
                          </div>
                        </a>
                      </div>
                      <div class="ag-courses_item">
                        <a href="{{ route('url.index') }}" class="ag-courses-item_link">
                          <div class="ag-courses-item_bg"></div>

                          <div class="ag-courses-item_title">
                            Url Shorter Software <br>Steadfast It
                          </div>

                          <div class="ag-courses-item_date-box">
                            Start:
                            <span class="ag-courses-item_date">
                              24-09-2024 (3.00PM)
                            </span>
                          </div>
                        </a>
                      </div>

                    </div>
                  </div>
            </div>


        </div>
        <script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </script>
    </body>
</html>
