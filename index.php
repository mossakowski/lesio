<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>LESIO- Lekki elegancki skrypt identyfikujący ONU</title>
    <link rel="stylesheet" href="node_modules/normalize.css/normalize.css">
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>LESIO- Lekki elegancki skrypt identyfikujący ONU</h1>
        <img id="nasz-mistrz" class="animated" src="nasz-mistrz.png">
    </header>
    <main>
        <section>
            <h2>1. Znajdź końcówkę, którą podłączyłeś do systemu rurek światłowodowych</h2>
            <button class="patrick btn" data-clipboard-text="show onu unauthentication">Szukaj zagubionej w systemie rurek ONU</button>
        </section>

        <section>
            <h2>2. Jeśli znalazłeś ONU wpisz numer karty oraz pon:</h2>
            <form id="getCardPon">
                <b>epon-olt_0/</b><input class="setLocalizationOnu" id="card_number" type="number" value="1" min="1" max="10"><b>/</b><input class="setLocalizationOnu" id="pon_number" type="number" value="1" min="1" max="4">
            </form>
        </section>

        <section>
            <h2>3. Znajdź wolne miejsce na ponie</h2>
            <button class="patrick btn" id="button-search-free-space" data-clipboard-text="show onu all-status epon-olt_0/1/1">Szukaj miejsca</button>
        </section>

        <section>
            <h2>4. Usuń koncówkę! (jeśli chcesz podmienić)</h2>
            <form id="form-delete-onu">
                <label>Podaj nr onu</label>
                <input type="number" min="1" max="64" value="1">
            </form>
            <button id="button-remove-onu" class="patrick btn" data-clipboard-text="no onu 1">usuń onu</button>
        </section>

        <section>
            <h2>Dodanie onu do bazy</h2>
            <form id="form-add-onu">
                nr onu <input type="number" min="1" max="64" value="1">
                typ
                <select>
                    <option value="ZTE-F401" selected="selected">Jedno port</option>
                    <option value="ZTE-F420">Cztero port</option>
                </select>
                mac <input type="text">
            </form>
            <button id="button-add-onu" class="patrick btn" data-clipboard-text="onu 1 type ZTE-F401 mac 0000.0000.0000 ip-cfg  static">Dodaj onu</button>
        </section>

        <section id="section-one-port-onu">
            <h2>Konfiguracja ONU 1 port</h2>
            <form id="form-one-port-onu">
                <label>Telewizja?</label>
                <input type="checkbox">
                <label><a href="#" id="a-select-vlan"><u>Wybierz vlan</u></a></label>
                <input id="input-vlan-id" type="number" min="1" max="900" value="1">
                <label>Nazwa klienta</label>
                <input type="text">
                <label>SLA</label>
                <input type="number" min="1" max="524288" value="524288">

            </form>
        </section>

        <div id="div-vlan-list">
            <a id="vlan-list-close" href="#">X</a>
            <div class="vlan-list">
                <h2>lista vlanów</h2>

                <?php

	$json_data = file_get_contents('vlan.txt');
	$rekord = json_encode($json_data);

    $re_vlanId = '/\[(.*?)\]/';
    $re_vlanName = '/[A-z0-9_-]*(?i)/';
    $vlanList = explode('\n', $rekord);
    $j=0;
    
    echo '<div class="container">';
    echo '<div class="col">';
    
    for($i=0;$i<count($vlanList);$i++) {
        $j++;
        if($j == 80) {
            echo '</div>';
            echo '<div class="col">';
            $j=0;
        }
        preg_match_all($re_vlanId, $vlanList[$i], $vlanId);
        preg_match_all($re_vlanName, $vlanList[$i], $vlanName);
        echo '<a href="#" data-vlan-id="' . $vlanId[1][0] . '">'. join('',$vlanName[0]) . '</a>';      
        echo "</br>";
    }
        
                
        echo '</div>';

?>


            </div>
        </div>

        <section id="section-four-port-onu">
            <h2>Konfiguracja ONU 4 port</h2>

        </section>


    </main>
    <script src="main.js"></script>
    <script src="node_modules/clipboard/dist/clipboard.min.js"></script>
    <script>
        new ClipboardJS('.btn');

    </script>
</body>

</html>
