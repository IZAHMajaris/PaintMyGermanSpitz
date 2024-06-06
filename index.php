<!DOCTYPE html>
<html lang="de">
<head>
    <title>Paint My German Spitz</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.png">
    <link rel="stylesheet" href="styles.css">
    <script>
            document.addEventListener('contextmenu',function(e){e.preventDefault();e.stopPropagation();});
            document.addEventListener('copy',function(e){e.preventDefault();e.stopPropagation();});
            document.addEventListener('cut',function(e){e.preventDefault();e.stopPropagation();});
    </script>
</head>
<body>
<div class="content">
    <?php
        $formularWerte = $_POST;

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
        $selected = "selected";
        $false = "false";

        //selected="selected"

        $formularArray = [
            'eLokus1' => ['none' => '', 'N' => '', 'e1' => ''],
            'eLokus2' => ['none' => '', 'N' => '', 'e1' => ''],
            'kLokus1' => ['none' => '', 'Kb' => '', 'ky' => ''],
            'kLokus2' => ['none' => '', 'Kb' => '', 'ky' => ''],
            'aLokus1' => ['none' => '', 'DY' => '', 'SY' => '', 'AG' => '', 'BS' => '', 'BB' => '', 'a' => ''],
            'aLokus2' => ['none' => '', 'DY' => '', 'SY' => '', 'AG' => '', 'BS' => '', 'BB' => '', 'a' => ''],
            'bLokus1' => ['none' => '', 'N' => '', 'bd' => '', 'bc' => '', 'bs' => ''],
            'bLokus2' => ['none' => '', 'N' => '', 'bd' => '', 'bc' => '', 'bs' => ''],
            'dLokus1' => ['none' => '', 'N' => '', 'd1' => ''],
            'dLokus2' => ['none' => '', 'N' => '', 'd1' => ''],
            'iLokus1' => ['none' => '', 'I' => '', 'i' => ''],
            'iLokus2' => ['none' => '', 'I' => '', 'i' => ''],
            'sLokus1' => ['none' => '', 'N' => '', 'S' => ''],
            'sLokus2' => ['none' => '', 'N' => '', 'S' => ''],
        ];

        foreach($formularWerte as $key => $wert){
            $formularArray[$key][$wert] = 'selected="selected"';
        }

        $formular = '
    
            <div class="farbgenetik_content">
                <form action="index.php" method="post">
                    <p>E Lokus:
                        <select name="eLokus1" id="eLokus1">
                            <option value="none" '.$formularArray['eLokus1']['none'].'>keine Auswahl</option>
                            <option value="N" '.$formularArray['eLokus1']['N'].'>N(E)</option>
                            <option value="e1" '.$formularArray['eLokus1']['e1'].'>e1(e)</option>
                        </select> | <select name="eLokus2" id="eLokus2">
                            <option value="none" '.$formularArray['eLokus2']['none'].'>keine Auswahl</option>
                            <option value="N" '.$formularArray['eLokus2']['N'].'>N(E)</option>
                            <option value="e1" '.$formularArray['eLokus2']['e1'].'>e1(e)</option>
                        </select>
                    </p>
                    <p>K Lokus: <select name="kLokus1" id="kLokus1">
                            <option value="none" '.$formularArray['kLokus1']['none'].'>keine Auswahl</option>
                            <option value="Kb" '.$formularArray['kLokus1']['Kb'].'>Kb</option>
                            <option value="ky" '.$formularArray['kLokus1']['ky'].'>ky</option>
                        </select> | <select name="kLokus2" id="kLokus2">
                            <option value="none" '.$formularArray['kLokus2']['none'].'>keine Auswahl</option>
                            <option value="Kb" '.$formularArray['kLokus2']['Kb'].'>Kb</option>
                            <option value="ky" '.$formularArray['kLokus2']['ky'].'>ky</option>
                        </select>
                    </p>
                    <p>A Lokus: <select name="aLokus1" id="aLokus1">
                            <option value="none" '.$formularArray['aLokus1']['none'].'>keine Auswahl</option>
                            <option value="DY" '.$formularArray['aLokus1']['DY'].'>DY(Ay)</option>
                            <option value="SY" '.$formularArray['aLokus1']['SY'].'>SY(Ay)</option>
                            <option value="AG" '.$formularArray['aLokus1']['AG'].'>AG(Aw)</option>
                            <option value="BS" '.$formularArray['aLokus1']['BS'].'>BS(at)</option>
                            <option value="BB" '.$formularArray['aLokus1']['BB'].'>BB(at)</option>
                            <option value="a" '.$formularArray['aLokus1']['a'].'>a</option>
                        </select> | <select name="aLokus2" id="aLokus2">
                            <option value="none" '.$formularArray['aLokus2']['none'].'>keine Auswahl</option>
                            <option value="DY" '.$formularArray['aLokus2']['DY'].'>DY(Ay)</option>
                            <option value="SY" '.$formularArray['aLokus2']['SY'].'>SY(Ay)</option>
                            <option value="AG" '.$formularArray['aLokus2']['AG'].'>AG(Aw)</option>
                            <option value="BS" '.$formularArray['aLokus2']['BS'].'>BS(at)</option>
                            <option value="BB" '.$formularArray['aLokus2']['BB'].'>BB(at)</option>
                            <option value="a" '.$formularArray['aLokus2']['a'].'>a</option>
                        </select>
                    </p>
                    <p>B Lokus: <select name="bLokus1" id="bLokus1">
                            <option value="none" '.$formularArray['bLokus1']['none'].'>keine Auswahl</option>
                            <option value="N" '.$formularArray['bLokus1']['N'].'>N(B)</option>
                            <option value="bd" '.$formularArray['bLokus1']['bd'].'>bd</option>
                            <option value="bc" '.$formularArray['bLokus1']['bc'].'>bc</option>
                            <option value="bs" '.$formularArray['bLokus1']['bs'].'>bs</option>
                        </select> | <select name="bLokus2" id="bLokus2">
                            <option value="none" '.$formularArray['bLokus2']['none'].'>keine Auswahl</option>
                            <option value="N" '.$formularArray['bLokus2']['N'].'>N(B)</option>
                            <option value="bd" '.$formularArray['bLokus2']['bd'].'>bd</option>
                            <option value="bc" '.$formularArray['bLokus2']['bc'].'>bc</option>
                            <option value="bs" '.$formularArray['bLokus2']['bs'].'>bs</option>
                        </select>
                    </p>
                    <p>D Lokus: <select name="dLokus1" id="dLokus1">
                            <option value="none" '.$formularArray['dLokus1']['none'].'>keine Auswahl</option>
                            <option value="N" '.$formularArray['dLokus1']['N'].'>N(D)</option>
                            <option value="d1" '.$formularArray['dLokus1']['d1'].'>d1</option>
                        </select> | <select name="dLokus2" id="dLokus2">
                            <option value="none" '.$formularArray['dLokus2']['none'].'>keine Auswahl</option>
                            <option value="N" '.$formularArray['dLokus2']['N'].'>N(D)</option>
                            <option value="d1" '.$formularArray['dLokus2']['d1'].'>d1</option>
                        </select>
                    </p>
                    <p>I Lokus: <select name="iLokus1" id="iLokus1">
                            <option value="none" '.$formularArray['iLokus1']['none'].'>keine Auswahl</option>
                            <option value="I" '.$formularArray['iLokus1']['I'].'>I</option>
                            <option value="i" '.$formularArray['iLokus1']['i'].'>i</option>
                        </select> | <select name="iLokus2" id="iLokus2">
                            <option value="none" '.$formularArray['iLokus2']['none'].'>keine Auswahl</option>
                            <option value="I" '.$formularArray['iLokus2']['I'].'>I</option>
                            <option value="i" '.$formularArray['iLokus2']['i'].'>i</option>
                        </select>
                    </p>
                    <p>S Lokus: <select name="sLokus1" id="sLokus1">
                            <option value="none" '.$formularArray['sLokus1']['none'].'>keine Auswahl</option>
                            <option value="N" '.$formularArray['sLokus1']['N'].'>N</option>
                            <option value="S" '.$formularArray['sLokus1']['S'].'>S</option>
                        </select> | <select name="sLokus2" id="sLokus2">
                            <option value="none" '.$formularArray['sLokus2']['none'].'>keine Auswahl</option>
                            <option value="N" '.$formularArray['sLokus2']['N'].'>N</option>
                            <option value="S" '.$formularArray['sLokus2']['S'].'>S</option>
                        </select></p>
                    <input type="submit" value="absenden" />
                </form>
            ';

            echo $formular;

            $aLokiMapAdvanced = [
              'DY' => ['DY' => ['DYDY', 'DYDY'], 'SY' => ['DYSY', 'DYDY'], 'AG' => ['DYAG', 'DYDY'], 'BS' => ['DYBS', 'DYDY'], 'BB' => ['DYBB', 'DYDY'], 'a' => ['DYa', 'DYDY']],
              'SY' => ['DY' => ['DYSY', 'DYDY'], 'SY' => ['SYSY', 'SYSY'], 'AG' => ['SYAG', 'SYSY'], 'BS' => ['SYBS', 'SYSY'], 'BB' => ['SYBB', 'SYSY'], 'a' => ['SYa', 'SYSY']],
              'AG' => ['DY' => ['DYAG', 'DYDY'], 'SY' => ['SYAG', 'SYSY'], 'AG' => ['AGAG', 'AGAG'], 'BS' => ['AGBS', 'AGAG'], 'BB' => ['AGBB', 'AGAG'], 'a' => ['AGa', 'AGAG']],
              'BS' => ['DY' => ['DYBS', 'DYDY'], 'SY' => ['SYBS', 'SYSY'], 'AG' => ['AGBS', 'AGAG'], 'BS' => ['BSBS', 'BSBS'], 'BB' => ['BSBB', 'BSBB'], 'a' => ['BSa', 'BSBB']],
              'BB' => ['DY' => ['DYBB', 'DYDY'], 'SY' => ['SYBB', 'SYSY'], 'AG' => ['AGBB', 'AGAG'], 'BS' => ['BSBB', 'BSBB'], 'BB' => ['BBBB', 'BBBB'], 'a' => ['BBa', 'BBBB']],
              'a'  => ['DY' => ['DYa',  'DYDY'], 'SY' => ['SYa',  'SYSY'], 'AG' => ['AGa',  'AGAG'], 'BS' => ['BSa',  'BSBB'], 'BB' => ['BBa',  'BBBB'], 'a' => ['aa',  'aa']],
            ];
            $rulesKLokus = [
                'Kb' => ['Kb' =>['KbKb', 'KBKB'], 'ky' => ['Kbky', 'KBKB']],
                'ky' => ['Kb' =>['kyKb', 'KBKB'], 'ky' => ['kyky', 'kyky']],
            ];
            $rulesELokus = [
                'e1' =>['e1' =>['e1e1', 'NN'], 'N' => ['e1N', 'NN']],
                'N' =>['e1' =>['Ne1', 'NN'], 'N' =>['NN', 'ee']],
            ];
            $rulesDLokus = [
                'd1' =>['d1' =>['d1d1', 'd1d1'], 'N' =>['d1N', 'NN']],
                'N' =>['d1' =>['Nd1', 'NN'], 'N' =>['NN', 'NN']],
            ];
            $rulesBLokus = [
                'bd' => ['bd' =>['bdbd', 'Brown'], 'bc' =>['bdbc', 'Brown'], 'bs' =>['bdbs', 'Brown'], 'N' =>['bdN', 'NN']],
                'bc' => ['bd' =>['bcbd', 'Brown'], 'bc' =>['bcbc', 'Brown'], 'bs' =>['bcbs', 'Brown'], 'N' =>['bcN', 'NN']],
                'bs' => ['bd' =>['bsbd', 'Brown'], 'bc' =>['bsbc', 'Brown'], 'bs' =>['bsbs', 'Brown'], 'N' =>['bsN', 'NN']],
                'N' => ['bd' =>['Nbd', 'NN'], 'bc' =>['Nbc', 'NN'], 'bs' =>['Nbs', 'NN'], 'N' =>['NN', 'NN']],
            ];
            $rulesILokus = [
                'I' => ['I'=>['II', 'II'], 'i'=>['Ii', 'Ii']],
                'i' => ['I'=>['iI', 'Ii'], 'i' =>['ii', 'ii']],
            ];

            $rulesSLokus = [
                'N' => ['N'=>['NN', 'NN'], 'S'=>['NS', 'NS']],
                'S' => ['N'=>['SN', 'NS'], 'S' =>['SS', 'SS']],
            ];

            $eLokus = [0, 0];
            $kLokus = [0, 0];
            $aLokus = [0, 0];
            $bLokus = [0, 0];
            $dLokus = [0, 0];
            $iLokus = [0, 0];
            $sLokus = [0, 0];

            print_r($formularWerteAufbereitet);
            if(!empty($formularWerteAufbereitet) && ($formularWerteAufbereitet['E'][0] !== 'none' || $formularWerteAufbereitet['E'][1] !== 'none')){
                $eLokus = $rulesELokus[$formularWerteAufbereitet['E'][0]][$formularWerteAufbereitet['E'][1]];
            }
            if(!empty($formularWerteAufbereitet)){
                $kLokus = $rulesKLokus[$formularWerteAufbereitet['K'][0]][$formularWerteAufbereitet['K'][1]];
            }
            if(!empty($formularWerteAufbereitet)){
                $aLokus = $aLokiMapAdvanced[$formularWerteAufbereitet['A'][0]][$formularWerteAufbereitet['A'][1]];
            }
            if(!empty($formularWerteAufbereitet)){
                $bLokus = $rulesBLokus[$formularWerteAufbereitet['B'][0]][$formularWerteAufbereitet['B'][1]];
            }
            if(!empty($formularWerteAufbereitet)){
                $dLokus = $rulesDLokus[$formularWerteAufbereitet['D'][0]][$formularWerteAufbereitet['D'][1]];
            }
            if(!empty($formularWerteAufbereitet)){
                $iLokus = $rulesILokus[$formularWerteAufbereitet['I'][0]][$formularWerteAufbereitet['I'][1]];
            }
            if(!empty($formularWerteAufbereitet)){
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
                                <div class="iLokus iLokusUE">
                                    <img src="images/EE_dunkel.png" alt="I-Lokus" style="height:300px;">
                                </div>
                            ';
                        } else if ($iLokus[1] === 'Ii' || $iLokus[1] === 'iI') {
                            $content .= '
                                <div class="iLokus iLokusUE">
                                    <img src="images/EE_mittel.png" alt="I-Lokus" style="height:300px;">
                                </div>
                            ';
                        }
                        else if($iLokus[1] === 'ii') {
                            $content .= '
                                <div class="iLokus iLokusUE">
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
                                <div class="dLokus dLokusUK">
                                    <img src="images/Blue.png" alt="D-Lokus" style="height:300px;">
                                </div>
                            ';
                        }

                        if ($bLokus[1] === 'Brown') {
                            $content .= '
                                <div class="bLokus bLokusUK">
                                    <img src="images/' . $bLokus[1] . '.png" alt="B-Lokus" style="height:300px;">
                                </div>
                            ';

                            if ($dLokus[1] === 'd1d1') {
                                $content .= '
                                <div class="dLokus dLokusUB dLokusBUK">
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
                                <div class="iLokus iLokusUA">
                                    <img src="images/' . ${$nameVariable}[1] . '_dunkel.png" alt="I-Lokus" style="height:300px;">
                                </div>
                            ';
                        } else if ($iLokus[1] === 'Ii' || $iLokus[1] === 'iI') {
                            $content .= '
                                <div class="iLokus iLokusUA">
                                    <img src="images/' . ${$nameVariable}[1] . '_mittel.png" alt="I-Lokus" style="height:300px;">
                                </div>
                            ';
                        } else if($iLokus[1] === 'ii') {
                            $content .= '
                                <div class="iLokus iLokusUA">
                                    <img src="images/' . ${$nameVariable}[1] . '_hell.png" alt="I-Lokus" style="height:300px;">
                                </div>
                            ';
                        }
                    }

                    if ($lokus === 'S') {
                        if($eLokus[1] === 'ee' ){
                            $content .= '
                                <div class="' . $nameVariable . ' sLokusUE">
                                    <img src="images/ee.png" alt="' . $lokus . '-Lokus" style="height:300px;">
                                </div>
                            ';
                        }

                        $content .= '
                            <div class="' . $nameVariable . '">
                                <img src="images/' . ${$nameVariable}[1] . '.png" alt="' . $lokus . '-Lokus" style="height:300px;">
                            </div>
                        ';

                    }
                }
            }

            echo $content;

        ?>
    </div>
    <br>
    <table>
        <tr>
            <th>Ebenen</th>
            <th>Lokus</th>
            <th>Stati und Hierarchie der Gene</th>
            <th>Auswirkungen</th>
<!--            <th>Link zu Labogen Erklärung</th>-->
        </tr>
        <tr>
            <td>1te Äußerste Ebene</td>
            <td>E</td>
            <td>N(E) > e1</td>
            <td>Weiß</td>
<!--            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/e-locus-e1-yellow-lemon-red-cream-apricot/">E Lokus</a></td>-->
        </tr>
        <tr>
            <td>2te Ebene</td>
            <td>K</td>
            <td>Kb > ky</td>
            <td>Schwarz</td>
<!--            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/k-locus-only-the-allele-kb/">K Lokus</a></td>-->
        </tr>
        <tr>
            <td>3te Ebene</td>
            <td>A</td>
            <td>DY(Ay) > SY(Ay) > AG(Aw) > BS(at) > BB1-3(at) > a</td>
            <td>Orange, Orange-Sable, Wolfsfarben/Graugewolkt, Black&Tan</td>
<!--            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/a-locus-alleles-ay-aw-at-a/">A Lokus Alt</a><br><a href="https://shop.labogen.com/gentest-bestellung/hund/all/2658/a-lokus-agouti-asip-analyse">A Lokus ASIP Analyse</a></td>-->
        </tr>
        <tr>
            <td rowspan="4">Zusätzliche/ überlagernde Gene</td>
            <td>B</td>
            <td>bd, bc, bs > N</td>
            <td>Färbt Schwarz zu Braun</td>
<!--            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/b-locus-brown-chocolate-livernose-alleles-bd-bc-bs/">B Lokus</a></td>-->
        </tr>
        <tr>
            <td>D</td>
            <td>d1 > N(B)</td>
            <td>Verwaschungsgen, Macht aus Schwarzem Pigment Silver oder Isabella und Rotes Pigment zu Creme</td>
<!--            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/d-locus-d1-dilution/">D Lokus</a></td>-->
        </tr>
        <tr>
            <td>I</td>
            <td>I > i</td>
            <td>Farbintensität, I = viel Farbintensität [Rot, Orange, Gelb], i = wenig Farbintensität [Creme, Creme-Weiß, Weiß]</td>
<!--            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/i-locus-phaeomelanin-intensitity/">I Lokus</a></td>-->
        </tr>
        <tr>
            <td>S</td>
            <td>S > N</td>
            <td>Scheckunsgen, S|S = Starke Scheckung, N|s = kleinere weiße Abzeichen</td>
<!--            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/s-locus-piebald-white-spotting/">S Lokus</a></td>-->
        </tr>
    </table>

</div>
<hr>
<br>
<div class="ImpresssumButton"><button onclick="showImpressum()">Impressum</button><button onclick="showDatenschutz()">Datenschutz</button></div>
<script>
    function showImpressum() {
        alert("Content Erstellung & Pflege: M.Sc. Dorit Wittig, Wenzel-Verner-Str. 71, 09120 Chemnitz, info@mittelspitz-chemnitz.de");
    }
    function showDatenschutz() {
        alert("© Copyright 2024 - Dorit Wittig,  Alle Inhalte diese Webseite, insbesondere Texte, Fotografien und Grafiken, sind urheberrechtlich geschützt. Das Urheberrecht liegt, soweit nicht ausdrücklich anders gekennzeichnet, bei Dorit Wittig. Bitte fragen Sie Mich, falls Sie die Inhalte dieses Internetangebotes verwenden möchten.");
    }
</script>
</body>
</html>
