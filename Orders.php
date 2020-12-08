<html>
    <?php
        include 'Session.php';
    ?>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            * {
                box-sizing: border-box;
            }

            .row::after {
                content: "";
                clear: both;
                display: block;
            }

            [class*="col-"] {
                float: left;
                padding: 15px;
            }
            .col-1 {width: 8.33%;}
            .col-2 {width: 16.66%;}
            .col-3 {width: 25%;}
            .col-4 {width: 33.33%;}
            .col-5 {width: 41.66%;}
            .col-6 {width: 50%;}
            .col-7 {width: 58.33%;}
            .col-8 {width: 66.66%;}
            .col-9 {width: 75%;}
            .col-10 {width: 83.33%;}
            .col-11 {width: 91.66%;}
            .col-12 {width: 100%;}

            html {
                font-family: "Arial Black", sans-serif;
            }

            .header {
                background-color: crimson;
                color: ghostwhite;
                padding: 15px;
            }

            .menu ul {
                ist-style-type: none;
                margin: 0;
                padding: 0;
            }

            .menu li {
                padding: 8px;
                margin-bottom: 7px;
                background-color: aqua;
                color: ghostwhite;
                box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            }

            .menu li:hover {
                background-color: ghostwhite;
            }

        </style>
    </head>

    <body>

        <form method="get" action="Welcome.php">
            <button type="submit">Home</button>
        </form>
        
        <div class="header">
            <h1>Orders</h1>
        </div>

        <style class="row">
            <div class="col-3 menu"></div>
                <style= "overflow: auto;">
                    table, th, td { border: 1px solid black;}
                </style>
                Quote Database:
                <table>
                    <?php
                        include 'Functions.php';

                        $salesId = 1;   // TODO: get this id from session
                        getOrders($salesId);
                    ?>

                </table>
            </div>
    </body>
</html>
