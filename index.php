<!DOCTYPE html>
<html lang="de">
<head>
    <title>Paint My German Spitz</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.png">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div>

    <form action="index.php" method="get">
        <p>E Lokus:
            <select name="eLokus1" id="eLokus1">
                <option value="0">keine Auswahl</option>
                <option value="N">N(E)</option>
                <option value="e1">e1(e)</option>
            </select> | <select name="eLokus2" id="eLokus2">
                <option value="0">keine Auswahl</option>
                <option value="N">N(E)</option>
                <option value="e1">e1(e)</option>
            </select>
        </p>
        <p>K Lokus: <select name="kLokus1" id="kLokus1">
                <option value="0">keine Auswahl</option>
                <option value="Kb">Kb</option>
                <option value="ky">ky</option>
            </select> | <select name="kLokus2" id="kLokus2">
                <option value="0">keine Auswahl</option>
                <option value="Kb">Kb</option>
                <option value="ky">ky</option>
            </select>
        </p>
        <p>A Lokus: <select name="aLokus1" id="aLokus1">
                <option value="0">keine Auswahl</option>
                <option value="DY">DY(Ay)</option>
                <option value="SY">SY(Ay)</option>
                <option value="AG">AG(Aw)</option>
                <option value="BS">BS(at)</option>
                <option value="BB">BB(at)</option>
                <option value="a">a</option>
            </select> | <select name="aLokus2" id="aLokus2">
                <option value="0">keine Auswahl</option>
                <option value="DY">DY(Ay)</option>
                <option value="SY">SY(Ay)</option>
                <option value="AG">AG(Aw)</option>
                <option value="BS">BS(at)</option>
                <option value="BB">BB(at)</option>
                <option value="a">a</option>
            </select>
        </p>
        <p>B Lokus: <select name="bLokus1" id="bLokus1">
                <option value="0">keine Auswahl</option>
                <option value="N">N(B)</option>
                <option value="bd">bd</option>
                <option value="bc">bc</option>
                <option value="bs">bs</option>
            </select> | <select name="bLokus2" id="bLokus2">
                <option value="0">keine Auswahl</option>
                <option value="N">N(B)</option>
                <option value="bd">bd</option>
                <option value="bc">bc</option>
                <option value="bs">bs</option>
            </select>
        </p>
        <p>D Lokus: <select name="dLokus1" id="dLokus1">
                <option value="0">keine Auswahl</option>
                <option value="N">N(D)</option>
                <option value="d1">d1</option>
            </select> | <select name="dLokus2" id="dLokus2">
                <option value="0">keine Auswahl</option>
                <option value="N">N(D)</option>
                <option value="d1">d1</option>
            </select>
        </p>
        <p>I Lokus: <select name="iLokus1" id="iLokus1">
                <option value="0">keine Auswahl</option>
                <option value="I">I</option>
                <option value="i">i</option>
            </select> | <select name="iLokus2" id="iLokus2">
                <option value="0">keine Auswahl</option>
                <option value="I">I</option>
                <option value="i">i</option>
            </select>
        </p>
        <p>S Lokus: <select name="sLokus1" id="sLokus1">
                <option value="0">keine Auswahl</option>
                <option value="N">N</option>
                <option value="S">S</option>
            </select> | <select name="sLokus2" id="sLokus2">
                <option value="0">keine Auswahl</option>
                <option value="N">N</option>
                <option value="S">S</option>
            </select></p>
        <input type="submit" value="absenden" />
    </form>

    <?php
        $aLokiMapAdvanced = [
          'DY' => ['DY' => ['DYDY', 'DYDY'], 'SY' => ['DYSY', 'DYDY'], 'AG' => ['DYAG', 'DYDY'], 'BS' => ['DYBS', 'DYDY'], 'BB' => ['DYBB', 'DYDY'], 'a' => ['DYa', 'DYDY']],
          'SY' => ['DY' => ['DYSY', 'DYDY'], 'SY' => ['SYSY', 'SYSY'], 'AG' => ['SYAG', 'SYSY'], 'BS' => ['SYBS', 'SYSY'], 'BB' => ['SYBB', 'SYSY'], 'a' => ['SYa', 'SYSY']],
          'AG' => ['DY' => ['DYAG', 'DYDY'], 'SY' => ['SYAG', 'SYSY'], 'AG' => ['AGAG', 'AGAG'], 'BS' => ['AGBS', 'AGAG'], 'BB' => ['AGBB', 'AGAG'], 'a' => ['AGa', 'AGAG']],
          'BS' => ['DY' => ['DYBS', 'DYDY'], 'SY' => ['SYBS', 'SYSY'], 'AG' => ['AGBS', 'AGAG'], 'BS' => ['BSBS', 'BSBS'], 'BB' => ['BSBB', 'BSBB'], 'a' => ['BSa', 'BSBB']],
          'BB' => ['DY' => ['DYBB', 'DYDY'], 'SY' => ['SYBB', 'SYSY'], 'AG' => ['AGBB', 'AGAG'], 'BS' => ['BSBB', 'BSBB'], 'BB' => ['BBBB', 'BBBB'], 'a' => ['BBa', 'BBBB']],
          'a'  => ['DY' => ['DYa',  'DYDY'], 'SY' => ['SYa',  'SYSY'], 'AG' => ['AGa',  'AGAG'], 'BS' => ['BSa',  'BSBB'], 'BB' => ['BBa',  'BBBB'], 'a' => ['aa',  'aa']],
             0 => [ 0=> [00, 0]],
        ];
        $rulesKLokus = [
            'Kb' => ['Kb' =>['KbKb', 'KBKB'], 'ky' => ['Kbky', 'KBKB']],
            'ky' => ['Kb' =>['kyKb', 'KBKB'], 'ky' => ['kyky', 'kyky']],
               0 => [ 0=> [00, 0]],
        ];
        $rulesELokus = [
            'e1' =>['e1' =>['e1e1', 'NN'], 'N' => ['e1N', 'NN']],
            'N' =>['e1' =>['Ne1', 'NN'], 'N' =>['NN', 'ee']],
            0 => [ 0=> [00, 0]],
        ];
        $rulesDLokus = [
            'd1' =>['d1' =>['d1d1', 'd1d1'], 'N' =>['d1N', 'NN']],
            'N' =>['d1' =>['Nd1', 'NN'], 'N' =>['NN', 'NN']],
              0 => [ 0=> [00, 0]],
        ];
        $rulesBLokus = [
            'bd' => ['bd' =>['bdbd', 'Brown'], 'bc' =>['bdbc', 'Brown'], 'bs' =>['bdbs', 'Brown'], 'N' =>['bdN', 'NN']],
            'bc' => ['bd' =>['bcbd', 'Brown'], 'bc' =>['bcbc', 'Brown'], 'bs' =>['bcbs', 'Brown'], 'N' =>['bcN', 'NN']],
            'bs' => ['bd' =>['bsbd', 'Brown'], 'bc' =>['bsbc', 'Brown'], 'bs' =>['bsbs', 'Brown'], 'N' =>['bsN', 'NN']],
            'N' => ['bd' =>['Nbd', 'NN'], 'bc' =>['Nbc', 'NN'], 'bs' =>['Nbs', 'NN'], 'N' =>['NN', 'NN']],
              0 => [ 0=> [00, 0]],
        ];
        $rulesILokus = [
            'I' => ['I'=>['II', 'II'], 'i'=>['Ii', 'Ii']],
            'i' => ['I'=>['iI', 'Ii'], 'i' =>['ii', 'ii']],
              0 => [ 0=> [00, 0]],
        ];

        $rulesSLokus = [
            'N' => ['N'=>['NN', 'NN'], 'S'=>['NS', 'NS']],
            'S' => ['N'=>['SN', 'NS'], 'S' =>['SS', 'SS']],
              0 => [ 0=> [00, 0]],
        ];


        $formularWerte = $_GET;
        $formularWerteAufbereitet = [];

        if(!empty($formularWerte) && count($formularWerte)>1){
            $formularWerteAufbereitet = [
                'E' => [$formularWerte['eLokus1'], $formularWerte['eLokus2']],
                'K' => [$formularWerte['kLokus1'], $formularWerte['kLokus2']],
                'A' => [preg_replace('/(\\d+)/','', $formularWerte['aLokus1']), preg_replace('/(\\d+)/','',$formularWerte['aLokus2'])],
                'B' => [$formularWerte['bLokus1'], $formularWerte['bLokus2']],
                'D' => [$formularWerte['dLokus1'], $formularWerte['dLokus2']],
                'I' => [$formularWerte['iLokus1'], $formularWerte['iLokus2']],
                'S' => [$formularWerte['sLokus1'], $formularWerte['sLokus2']],
            ];
        }

        $eLokus = [0, 0];
        $kLokus = [0, 0];
        $aLokus = [0, 0];
        $bLokus = [0, 0];
        $dLokus = [0, 0];
        $iLokus = [0, 0];
        $sLokus = [0, 0];

        if(!empty($formularWerteAufbereitet) && $formularWerteAufbereitet['E'][0] !== '' ){
            $eLokus = $rulesELokus[$formularWerteAufbereitet['E'][0]][$formularWerteAufbereitet['E'][1]];
        }
        if(!empty($formularWerteAufbereitet) && $formularWerteAufbereitet['K'][0] !== ''){
            $kLokus = $rulesKLokus[$formularWerteAufbereitet['K'][0]][$formularWerteAufbereitet['K'][1]];
        }
        if(!empty($formularWerteAufbereitet) && $formularWerteAufbereitet['A'][0] !== ''){
            $aLokus = $aLokiMapAdvanced[$formularWerteAufbereitet['A'][0]][$formularWerteAufbereitet['A'][1]];
        }
        if(!empty($formularWerteAufbereitet) && $formularWerteAufbereitet['B'][0] !== ''){
            $bLokus = $rulesBLokus[$formularWerteAufbereitet['B'][0]][$formularWerteAufbereitet['B'][1]];
        }
        if(!empty($formularWerteAufbereitet) && $formularWerteAufbereitet['D'][0] !== ''){
            $dLokus = $rulesDLokus[$formularWerteAufbereitet['D'][0]][$formularWerteAufbereitet['D'][1]];
        }
        if(!empty($formularWerteAufbereitet) && $formularWerteAufbereitet['I'][0] !== ''){
            $iLokus = $rulesILokus[$formularWerteAufbereitet['I'][0]][$formularWerteAufbereitet['I'][1]];
        }
        if(!empty($formularWerteAufbereitet) && $formularWerteAufbereitet['S'][0] !== ''){
            $sLokus = $rulesSLokus[$formularWerteAufbereitet['S'][0]][$formularWerteAufbereitet['S'][1]];
        }

    ?>

    <?php
        $content = '';

        $noneVisible = [
            'E' => ['e1e1', 'Ne1', 'e1N', 'N', 0],
            'K' => ['kyky', 'N', 'k', 0],
            'A' => ['NN', 'N', 0],
            'B' => ['NN', 'Nbs', 'Nbd', 'Nbc', 'bdN', 'bcN', 'bsN', 'N', 0],
            'D' => ['NN', 'Nd1', 'd1N', 'N', 0],
            'I' => ['N', 'I', 0],
            'S' => ['NN', 'N', 0],
        ];

        $content .= '<br><br>';

        //Ein Ausblenden Checkboxen - Anfang

        foreach($noneVisible as $lokus=>$notVisible){
            $nameVariable = strtolower($lokus).'Lokus';
            $nameToggle = $lokus.'Lokus';
            $value = (is_array(${$nameVariable}))? ${$nameVariable}[0] : ${$nameVariable};

            if(!in_array($value, $notVisible, true)){
                $content .= '
                    <b>'.$lokus.' Lokus '.$value.'</b>  
                    <input type="checkbox" id="toggle'.$nameToggle.'">
                    <label for="toggle'.$nameToggle.'">Ebene ein/ausblenden</label><br>
                ';
            } else {
                if($value === 0){
                    $content .= '<b>'.$lokus.' Lokus</b> - wurde nicht ausgewählt<br>';
                } else {
                    $content .= '<b>'.$lokus.' Lokus '.$value.'</b> - Lokus ist Phänotypisch nicht sichtbar<br>';
                }
            }
        }

        //Ein Ausblenden Checkboxen - Ende

        $noneVisible = array_merge(array_flip(['A', 'K', 'E', 'B', 'D', 'I', 'S']), $noneVisible);
        unset($noneVisible['I']);
        unset($noneVisible['D']);
        unset($noneVisible['B']);

        foreach($noneVisible as $lokus=>$notVisible){
            $nameVariable = strtolower($lokus).'Lokus';

            if(!in_array(${$nameVariable}[0], $notVisible, true)){

                if ($lokus === 'E') {
                    $content .= '
                        <div class="' . $nameVariable . '">
                            <img src="images/' . ${$nameVariable}[1] . '.png" alt="' . $lokus . '-Lokus" style="height:300px;">
                        </div>
                    ';

                    if ($iLokus[1] === 'II') {
                        $content .= '
                            <div class="iLokus">
                                <img src="images/EE_dunkel.png" alt="I-Lokus" style="height:300px;">
                            </div>
                        ';
                    } else if ($iLokus[1] === 'Ii' || $iLokus[1] === 'iI') {
                        $content .= '
                            <div class="iLokus">
                                <img src="images/EE_mittel.png" alt="I-Lokus" style="height:300px;">
                            </div>
                        ';
                    } else if($iLokus[1] === 'ii') {
                        $content .= '
                            <div class="iLokus">
                                <img src="images/EE_hell.png" alt="I-Lokus" style="height:300px;">
                            </div>
                        ';
                    }
                }

                if ($lokus === 'K') {
                    $content .= '
                        <div class="' . $nameVariable . '">
                            <img src="images/' . ${$nameVariable}[1] . '.png" alt="' . $lokus . '-Lokus" style="height:300px;">
                        </div>
                    ';

                    if ($dLokus[1] === 'd1d1') {
                        $content .= '
                            <div class="dLokus">
                                <img src="images/Blue.png" alt="D-Lokus" style="height:300px;">
                            </div>
                        ';
                    }

                    if ($bLokus[1] === 'Brown') {
                        $content .= '
                            <div class="bLokus">
                                <img src="images/' . $bLokus[1] . '.png" alt="B-Lokus" style="height:300px;">
                            </div>
                        ';

                        if ($dLokus[1] === 'd1d1') {
                            $content .= '
                            <div class="dLokus">
                                <img src="images/Isabella.png" alt="D-Lokus" style="height:300px;">
                            </div>
                        ';
                        }
                    }
                }

                if ($lokus === 'A') {
                    $content .= '
                        <div class="' . $nameVariable . '">
                            <img src="images/' . ${$nameVariable}[1] . '.png" alt="' . $lokus . '-Lokus" style="height:300px;">
                        </div>
                    ';

                    if ($iLokus[1] === 'II') {
                        $content .= '
                            <div class="iLokus">
                                <img src="images/' . ${$nameVariable}[1] . '_dunkel.png" alt="I-Lokus" style="height:300px;">
                            </div>
                        ';
                    } else if ($iLokus[1] === 'Ii' || $iLokus[1] === 'iI') {
                        $content .= '
                            <div class="iLokus">
                                <img src="images/' . ${$nameVariable}[1] . '_mittel.png" alt="I-Lokus" style="height:300px;">
                            </div>
                        ';
                    } else if($iLokus[1] === 'ii') {
                        $content .= '
                            <div class="iLokus">
                                <img src="images/' . ${$nameVariable}[1] . '_hell.png" alt="I-Lokus" style="height:300px;">
                            </div>
                        ';
                    }
                }

                if ($lokus === 'S') {
                    if($eLokus[1] === 'ee' ){
                        $content .= '
                            <div class="' . $nameVariable . '">
                                <img src="images/ee.png" alt="' . $lokus . '-Lokus" style="height:300px;">
                            </div>
                        ';
                    } else {
                        $content .= '
                            <div class="' . $nameVariable . '">
                                <img src="images/' . ${$nameVariable}[1] . '.png" alt="' . $lokus . '-Lokus" style="height:300px;">
                            </div>
                        ';
                    }
                }
            }
        }

        echo $content;

    ?>

    <br><br>
    <hr>
    <br><br>
    <table>
        <tr>
            <th>Ebenen</th>
            <th>Lokus</th>
            <th>Stati und Hierarchie der Gene</th>
            <th>Auswirkungen</th>
            <th>Link zu Labogen Erklärung</th>
        </tr>
        <tr>
            <td>1te Äußerste Ebene</td>
            <td>E</td>
            <td>N(E) > e1</td>
            <td>Weiß</td>
            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/e-locus-e1-yellow-lemon-red-cream-apricot/">E Lokus</a></td>
        </tr>
        <tr>
            <td>2te Ebene</td>
            <td>K</td>
            <td>Kb > ky</td>
            <td>Schwarz</td>
            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/k-locus-only-the-allele-kb/">K Lokus</a></td>
        </tr>
        <tr>
            <td>3te Ebene</td>
            <td>A</td>
            <td>DY(Ay) > SY(Ay) > AG(Aw) > BS(at) > BB1-3(at) > a</td>
            <td>Orange, Orange-Sable, Wolfsfarben/Graugewolkt, Black&Tan</td>
            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/a-locus-alleles-ay-aw-at-a/">A Lokus Alt</a><br><a href="https://shop.labogen.com/gentest-bestellung/hund/all/2658/a-lokus-agouti-asip-analyse">A Lokus ASIP Analyse</a></td>
        </tr>
        <tr>
            <td rowspan="4">Zusätzliche/überlagernde Gene</td>
            <td>B</td>
            <td>bd, bc, bs > N</td>
            <td>Färbt Schwarz zu Braun</td>
            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/b-locus-brown-chocolate-livernose-alleles-bd-bc-bs/">B Lokus</a></td>
        </tr>
        <tr>
            <td>D</td>
            <td>d1 > N(B)</td>
            <td>Verwaschungsgen, Macht aus Schwarzem Pigment Silver oder Isabella und Rotes Pigment zu Creme</td>
            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/d-locus-d1-dilution/">D Lokus</a></td>
        </tr>
        <tr>
            <td>I</td>
            <td>I > i</td>
            <td>Farbintensität, I = viel Farbintensität [Rot, Orange, Gelb], i = wenig Farbintensität [Creme, Creme-Weiß, Weiß]</td>
            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/i-locus-phaeomelanin-intensitity/">I Lokus</a></td>
        </tr>
        <tr>
            <td>S</td>
            <td>S > N</td>
            <td>Scheckunsgen, S|S = Starke Scheckung, N|s = kleinere weiße Abzeichen</td>
            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/s-locus-piebald-white-spotting/">S Lokus</a></td>
        </tr>
    </table>

</div>
</body>
</html>
