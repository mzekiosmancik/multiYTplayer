<?php
$path = '';
$langpath = '';
if (isset($_GET["cn"]) && isset($_GET["cs"])) {
    $chanels = array_combine($_GET["cn"], $_GET["cs"]);
} else {
    $chanels = [
        "NTV" => "XEJM4Hcgd3M",
        "FOX" => "njp2SpI39pE",
        "Habertürk" => "SqHIO2zhxbA",
        "Haber Global" => "UVPejgEw21c",
        "TRT Haber" => "Rc5qrxlJZzc",
        "TV 100" => "sd94keSra6A",
        "Halk TV" => "L0aI7O5KrVU",
        "A Haber" => "g4QA9Sh_g_8",
        "24 TV" => "TPbdeNMaAZY",
        "TGRT Haber" => "8YPC2IV7ve0",
        "KRT TV" => "3QDiWPZ2D_k",
        "TELE 1" => "mRK3wXGdsLk",
        "Bengü Türk" => "7su_1By-cBk",
        "Baku TV" => "bK36kMciHAE",
        "Ulusal Kanal" => "SdCJquYL-CQ",
        "Artı TV" => "xpoetRCJKqY",
        "TVNET" => "dkRT6x7EfmY",
        "Ülke TV" => "Fk8MmJCLJvw",
    ];

    $chanelseng = [
        "NBC" => "tmlVHNyoEY8",
        "FOX" => "azemOY5MJJw",
        "CBS News" => "JLMUPDLJU-A",
        "CNN 18" => "Hr2YrJLP178",
        "CNBC" => "9NyxcX3rhQs",
        "Sky News" => "9Auq9mYxFEE",
        "DW" => "ammKkVgtIHw",
        "Al Jazeera" => "GEumHK0hfdo",
        "ABC News" => "w_Ma8oQLmSM",
        "NHK World Japan" => "f0lYkdA-Gtw",
        "ABC 7 News" => "XObsOutMlh8",
        "NewsMax" => "GDQpYIsxKCw",
        "Times NOW" => "6lr9dtvK9D4",
        "WION" => "yw6jyDlCAlU",
        "TRT World" => "AEZa1BtbPok",
        "EuroNews" => "pykpO5kQJ98",
        "CNBC" => "9NyxcX3rhQs",
        "Canada CHCH" => "ZZWz3L6bWcU",
        "ABC Australia" => "vOTiJkg1voo",
    ];
}
/* Language connectionstring reading
if (isset($_GET["lang"]) && $_GET["lang"] == "eng") {
$langpath = "?lang=eng";
$chanels = $chanelseng;
} else {
$langpath = '?';
$chanels = $chanelstr;
}
*/
/*Channel Count Connection String*/
if (isset($_GET["channel"]) && $_GET["channel"] == "16") {
    //$path = "?channel=16&";
    $channel = 16;
    $iframeDivClass = "col-lg-3 col-md-4 col-sm-6 col-xs-12 text-center p-0";
} else {
    //$path = "?";
    $channel = 9;
    $iframeDivClass = "col-md-4 col-sm-6 col-xs-12 text-center p-0";
}

$chanels = array_slice($chanels, 0, $channel);
$autoplay = !isset($_GET["autoplay"]) || $_GET["autoplay"] == "on" ? 1 : 0;
?>
<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multiple Screen Youtube</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta name='referrer' content='no-referrer-when-downgrade' />
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon.ico">
    <style>
        .text-bg-dark {
            background-color: #000 !important;
            color: #FFF !important;
        }

        .msk-container {
            aspect-ratio: 16/9;
            max-height: 100vh;
            max-width: 100vw;
            margin: 0 auto;
        }

        .row div {
            max-height: 33.333vh;
        }

        .row div,
        iframe {
            aspect-ratio: 16/9;
        }

        .msk-optionsButton:hover span {
            display: inline !important;
        }

        .form-control:focus,
        .btn-close:focus {
            outline: none;
            box-shadow: none;
        }

        .btn-fullsc {
            box-sizing: content-box;
            width: 1em;
            height: 1em;
            padding: .25em .25em;
            color: #000;
            background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707zm-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707z'/%3e%3c/svg%3e") center/1em auto no-repeat;
            border: 0;
            border-radius: .375rem;
            opacity: .5;
        }

        .btn-fullsc:hover {
            color: #000;
            text-decoration: none;
            opacity: .75;
        }

        #mySidenav .settings {
            position: absolute;
            right: -80px;
            transition: 0.3s;
            padding: 15px;
            width: 100px;
            text-decoration: none;
            font-size: 20px;
            color: white;
            border-radius: 5px 5px 5px 5px;
        }

        #mySidenav .settings:hover {
            right: 0;
        }

        #settings {
            top: 50%;
            background-color: #04AA6D;
        }

        #about {
            top: 55%;
            background-color: #2196F3;
        }
    </style>
</head>

<body class="text-bg-dark">
    <!--Content Start-->
    <div class="msk-container">
        <div class="row justify-content-around align-items-center m-0">
            <?php foreach ($chanels as $chanel => $slug) {
                echo '
            <div class="' .
                    $iframeDivClass .
                    '">
                <iframe class="d-grid" width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/' .
                    $slug .
                    "?autoplay=" .
                    $autoplay .
                    '&mute=1" title="' .
                    $chanel .
                    '" frameborder="0" gesture="media" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        ';
            } ?>
        </div>
    </div>
    <!--Content End-->

    <div id="mySidenav" class="sidenav">

        <button id="settings"
            class="msk-optionsButton btn btn-dark position-fixed rounded-0 position-absolute end-0 translate-middle-y"
            type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
            aria-label="Settings">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
            </svg>
            <span class="d-none">Settings</span>
        </button>

        <button id="about"
            class="msk-optionsButton btn btn-dark position-fixed rounded-0 position-absolute end-0 translate-middle-y"
            type="button" aria-label="About">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-clipboard-heart" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M5 1.5A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5v-1Zm5 0a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1Z" />
                <path
                    d="M3 1.5h1v1H3a1 1 0 0 0-1 1V14a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V3.5a1 1 0 0 0-1-1h-1v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2Z" />
                <path d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.31 8 6.982Z" />
            </svg>
            <span class="d-none">About</span>
        </button>
    </div>






    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasRight"
        aria-labelledby="offcanvasRightLabel" data-bs-scroll="true">
        <div class="offcanvas-header">
            <h4 class="offcanvas-title" id="offcanvasRightLabel">

                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                </svg>
                <span> Settings</span>
            </h4>
            <div>
                <button type="button" class="btn-fullsc btn-close-white" data-bs-dismiss="offcanvas"
                    onclick="toggle_fullscreen();" aria-label="Full Screen"></button>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
        </div>
        <div class="offcanvas-body">
            <!--
             <h5>Select Language</h5>
            <div class="btn-group w-100" role="group" aria-label="Settings">
                <a type="button" class="btn btn-outline-light rounded-0 <?php echo ($langpath == "?") ? ' active' : ''; ?>" href="<?php echo $path ?>">Turkish</a>
                <a type="button" class="btn btn-outline-light rounded-0  <?php echo ($langpath == "?lang=eng") ? ' active' : ''; ?>" href="<?php echo $path, "lang=eng" ?>">English</a>
            </div>
            -->
            <h5>Channel Count</h5>
            <div class="btn-group w-100" role="group" aria-label="Settings">
                <a type="button" class="btn btn-outline-light rounded-0<?php echo ($channel == 9) ? ' active' : ''; ?>"
                    href=".">9 Channel</a>
                <a type="button" class="btn btn-outline-light rounded-0<?php echo ($channel == 16) ? ' active' : ''; ?>"
                    href="?channel=16">16 Channel</a>
            </div>

            <form methot="get" action="">
                <h5 class="mt-4">Change Channels</h5>
                <span class="form-text">Enter youtube live video extention to the channel address e.g.
                    XEJM4Hcgd3M</span>

                <input type="hidden" aria-label="Channel" placeholder="Channel" name="channel"
                    value="<?php echo $channel; ?>" class="form-control rounded-0">
                <div id="sortable">
                    <?php foreach ($chanels as $cn => $cs) { ?>
                        <div class="input-group mt-1">
                            <input type="text" aria-label="Channel Name" placeholder="Channel Name" name="cn[]"
                                value="<?php echo $cn; ?>" class="form-control rounded-0">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z" />
                                </svg>
                            </span>
                            <input type="text" aria-label="Channel Address" placeholder="Channel Address" name="cs[]"
                                value="<?php echo $cs; ?>" class="form-control rounded-0">
                        </div>
                    <?php } ?>
                </div>
                <button type="submit" class="btn btn-outline-light w-100 rounded-0 mt-2 mb-5">Apply Changes</button>
            </form>
            <div class="mt-2 py-2 text-center position-absolute bottom-0 start-50 translate-middle-x text-bg-dark"
                style="font-size:.78em; width: 368px;">
                Developing by <a href="http://wisoftware.net/" target="_blank"
                    class="link-light text-decoration-none">wisoftware.net</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#sortable").sortable();
        });

        function toggle_fullscreen() {
            if (!document.fullscreenElement && // alternative standard method
                !document.mozFullScreenElement && !document.webkitFullscreenElement) {  // current working methods
                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) {
                    document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
                document.body.setAttribute("fullscreen", "")
            } else {
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                }
                document.body.removeAttribute("fullscreen")
            }
        }
        function check_fullscreen() { // Because users can exit & enter fullscreen differently
            if (document.fullscreenElement || document.webkitIsFullScreen || document.mozFullScreen) {
                document.body.setAttribute("fullscreen", "")
            } else {
                document.body.removeAttribute("fullscreen")
            }
        }
        setInterval(function () { check_fullscreen(); }, 1000);
    </script>
</body>

</html>