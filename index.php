<!DOCTYPE html>
<html lang="de">
<head>
    <title>Paint My German Spitz</title>
</head>

<style>
    input[id=toggleELokus]:checked ~ .eLokus {
        opacity: 0;
        height: 0;
        display: none;
    }
    input[id=toggleKLokus]:checked ~ .kLokus {
        opacity: 0;
        height: 0;
        display: none;
    }
    input[id=toggleALokus]:checked ~ .aLokus {
        opacity: 0;
        height: 0;
        display: none;
    }
    input[id=toggleBLokus]:checked ~ .bLokus {
        opacity: 0;
        height: 0;
        display: none;
    }
    input[id=toggleDLokus]:checked ~ .dLokus {
        opacity: 0;
        height: 0;
        display: none;
    }
    input[id=toggleILokus]:checked ~ .iLokus {
        opacity: 0;
        height: 0;
        display: none;
    }
    input[id=toggleSLokus]:checked ~ .sLokus {
        opacity: 0;
        height: 0;
        display: none;
    }

    img {
        position: absolute;
    }
</style>

<body>
<div>

    <form action="index.php" method="get">
        <p>E Lokus:
            <select name="eLokus1" id="eLokus1">
                <option value="E">E</option>
                <option value="e1">e1</option>
                <option value="N">N</option>
            </select> | <select name="eLokus2" id="eLokus2">
                <option value="E">E</option>
                <option value="e1">e1</option>
                <option value="N">N</option>
            </select>
        </p>
        <p>K Lokus: <select name="kLokus1" id="kLokus1">
                <option value="KB">KB</option>
                <option value="ky">ky</option>
            </select> | <select name="kLokus2" id="kLokus2">
                <option value="KB">KB</option>
                <option value="ky">ky</option>
            </select>
        </p>
        <p>A Lokus: <select name="aLokus1" id="aLokus1">
                <option value="Ay">Ay</option>
                <option value="Aw">Aw</option>
                <option value="at">at</option>
                <option value="a">a</option>
                <option value="DY">DY</option>
                <option value="SY">SY</option>
                <option value="AG">AG</option>
                <option value="BS">BS</option>
                <option value="BB">BB</option>
            </select> | <select name="aLokus2" id="aLokus2">
                <option value="Ay">Ay</option>
                <option value="Aw">Aw</option>
                <option value="at">at</option>
                <option value="a">a</option>
                <option value="DY">DY</option>
                <option value="SY">SY</option>
                <option value="AG">AG</option>
                <option value="BS">BS</option>
                <option value="BB">BB</option>
            </select>
        </p>
        <p>B Lokus: <select name="bLokus1" id="bLokus1">
                <option value="bd">bd</option>
                <option value="bc">bc</option>
                <option value="bs">bs</option>
                <option value="N">N</option>
            </select> | <select name="bLokus2" id="bLokus2">
                <option value="bd">bd</option>
                <option value="bc">bc</option>
                <option value="bs">bs</option>
                <option value="N">N</option>
            </select>
        </p>
        <p>D Lokus: <select name="dLokus1" id="dLokus1">
                <option value="D">D</option>
                <option value="N">N</option>
            </select> | <select name="dLokus2" id="dLokus2">
                <option value="D">D</option>
                <option value="N">N</option>
            </select>
        </p>
        <p>I Lokus: <select name="iLokus1" id="iLokus1">
                <option value="I">I</option>
                <option value="i">i</option>
            </select> | <select name="iLokus2" id="iLokus2">
                <option value="I">I</option>
                <option value="i">i</option>
            </select>
        </p>
        <p>S Lokus: <select name="sLokus1" id="sLokus1">
                <option value="S">S</option>
                <option value="s">s</option>
                <option value="N">N</option>
            </select> | <select name="sLokus2" id="sLokus2">
                <option value="S">S</option>
                <option value="s">s</option>
                <option value="N">N</option>
            </select></p>
        <input type="submit" value="absenden" />
    </form>

    <?php
        $hierarchyMainLoki = ['E', 'K', 'A'];
        $hierarchyALokiAlt = ['Ay', 'Aw', 'at', 'a'];
        $hierarchyALokiNeu = ['DY', 'SY', 'AG', 'BS', 'BB', 'a'];
        $aLokiMapSimple = [
            'Ay' => ['Ay' =>['AyAy', 'AyAy'], 'Aw' =>['AyAw', 'AyAy'], 'at' =>['Ayat', 'AyAy'], 'a' =>['Aya', 'AyAy']],
            'Aw' => ['Ay' =>['AyAw', 'AyAy'], 'Aw' =>['AwAw', 'AwAw'], 'at' =>['Awat', 'AwAw'], 'a' =>['Awa', 'AwAw']],
            'at' => ['Ay' =>['Ayat', 'AyAy'], 'Aw' =>['Awat', 'AwAw'], 'at' =>['atat', 'atat'], 'a' =>['ata', 'ata']],
            'a'  => ['Ay' =>['Aya',  'AyAy'], 'Aw' =>['AyAw', 'AwAw'], 'at' =>['Ata',  'atat'], 'a' =>['aa',  'aa']],
        ];
        $aLokiMapAdvanced = [
          'DY' => ['DY' => ['DYDY', 'DYDY'], 'SY' => ['DYSY', 'DYDY'], 'AG' => ['DYAG', 'DYDY'], 'BS' => ['DYBS', 'DYDY'], 'BB' => ['DYBB', 'DYDY'], 'a' => ['DYa', 'DYDY']],
          'SY' => ['DY' => ['DYSY', 'DYDY'], 'SY' => ['SYSY', 'SYSY'], 'AG' => ['SYAG', 'SYSY'], 'BS' => ['SYBS', 'SYSY'], 'BB' => ['SYBB', 'SYSY'], 'a' => ['SYa', 'SYSY']],
          'AG' => ['DY' => ['DYAG', 'DYDY'], 'SY' => ['SYAG', 'SYSY'], 'AG' => ['AGAG', 'AGAG'], 'BS' => ['AGBS', 'AGAG'], 'BB' => ['AGBB', 'AGAG'], 'a' => ['AGa', 'AGAG']],
          'BS' => ['DY' => ['DYBS', 'DYDY'], 'SY' => ['SYBS', 'SYSY'], 'AG' => ['AGBS', 'AGAG'], 'BS' => ['BSBS', 'BSBS'], 'BB' => ['BSBB', 'BSBB'], 'a' => ['BSa', 'BSBB']],
          'BB' => ['DY' => ['DYBB', 'DYDY'], 'SY' => ['SYBB', 'SYSY'], 'AG' => ['AGBB', 'AGAG'], 'BS' => ['BSBB', 'BSBB'], 'BB' => ['BBBB', 'BBBB'], 'a' => ['BBa', 'BBBB']],
          'a'  => ['DY' => ['DYa',  'DYDY'], 'SY' => ['SYa',  'SYSY'], 'AG' => ['AGa',  'AGAG'], 'BS' => ['BSa',  'BSBB'], 'BB' => ['BBa',  'BBBB'], 'a' => ['aa',  'aa']]
        ];
        $rulesKLokus = ['KB', 'ky'];
        $rulesELokus = ['E', 'N'];
        $rulesDLokus = ['D', 'N'];
        $rulesBLokus = ['bd', 'bc', 'bs'];

        $formularWerte = $_GET;
        $formularWerteAufbereitet = [];
        if(!empty($formularWerte)){
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

        $eLokus = 'NN';
        $kLokus = 'kyky';
        $aLokus = 'NN';
        $bLokus = 'NN';
        $dLokus = 'NN';
        $iLokus = 'II';
        $sLokus = 'NN';

        if($formularWerteAufbereitet['E'][0] !== ''){
            $eLokus = implode($formularWerteAufbereitet['E']);
        }
        if($formularWerteAufbereitet['K'][0] !== ''){
            $kLokus = implode($formularWerteAufbereitet['K']);
        }
        if($formularWerteAufbereitet['A'][0] !== ''){
            $aLokus = implode($formularWerteAufbereitet['A']);
            if(preg_match('[Ay|Aw|at]', $aLokus)){
                $aLokus = $aLokiMapSimple[$formularWerteAufbereitet['A'][0]][$formularWerteAufbereitet['A'][1]];
            } else {
                $aLokus = $aLokiMapAdvanced[$formularWerteAufbereitet['A'][0]][$formularWerteAufbereitet['A'][1]];
            }
        }
        if($formularWerteAufbereitet['B'][0] !== ''){
            $bLokus = implode($formularWerteAufbereitet['B']);
        }
        if($formularWerteAufbereitet['D'][0] !== ''){
            $dLokus = implode($formularWerteAufbereitet['D']);
        }
        if($formularWerteAufbereitet['I'][0] !== ''){
            $iLokus = implode($formularWerteAufbereitet['I']);
        }
        if($formularWerteAufbereitet['S'][0] !== ''){
            $sLokus = implode($formularWerteAufbereitet['S']);
        }

    ?>

    <input type="checkbox" id="toggleELokus">
    <label for="toggleELokus">E-Lokus ein/ausblenden</label>
    <input type="checkbox" id="toggleKLokus">
    <label for="toggleKLokus">K-Lokus ein/ausblenden</label>
    <input type="checkbox" id="toggleBLokus">
    <label for="toggleBLokus">B-Lokus ein/ausblenden</label>
    <input type="checkbox" id="toggleDLokus">
    <label for="toggleDLokus">D-Lokus ein/ausblenden</label>
    <input type="checkbox" id="toggleALokus">
    <label for="toggleALokus">A-Lokus ein/ausblenden</label>
    <input type="checkbox" id="toggleILokus">
    <label for="toggleILokus">I-Lokus ein/ausblenden</label>
    <input type="checkbox" id="toggleSLokus">
    <label for="toggleSLokus">S-Lokus ein/ausblenden</label>

    <?php
        $content = '';

        if($aLokus !== 'NN'){
            $content = '
                <div class="aLokus">
                    <img src="images/'.$aLokus[1].'.png" alt="A-Lokus" style="height:300px;">
                </div>
            ';
        }
        if($kLokus !== 'kyky') {
            $content .= '
                <div class="kLokus">
                    <img src="images/'.$kLokus.'.png" alt="K-Lokus" style="height:300px;">
                </div>
            ';
        }
        if($eLokus !== 'NN') {
            $content .= '
                <div class="eLokus">
                    <img src="images/'.$eLokus.'.png" alt="E-Lokus" style="height:300px;">
                </div>
            ';
        }
        if($bLokus !== 'NN') {
            $content .= '
                <div class="bLokus">
                    <img src="images/'.$bLokus.'.png" alt="B-Lokus" style="height:300px;">
                </div>
            ';
        }
        if($dLokus !== 'NN') {
            $content .=  '
               <div class="dLokus">
                    <img src="images/Brown.png" alt="D-Lokus" style="height:300px;">
               </div>
            ';
        }
        if($iLokus !== 'II') {
            $content .=  '
                <div class="iLokus">
                    <img src="images/'.$iLokus.'.png" alt="I-Lokus" style="height:300px;">
                </div>
            ';
        }
        if($sLokus !== 'NN') {
            $content .=  '
                <div class="sLokus">
                    <img src="images/'.$sLokus.'.png" alt="S-Lokus" style="height:300px;">
                </div>
            ';
        }

        echo $content;

    ?>

<!--    <table>-->
<!--        <tr>-->
<!--            <th>Lokus</th>-->
<!--            <th>Stati und Hierarchie der Gene</th>-->
<!--            <th>Auswirkungen</th>-->
<!--            <th>Link zu Labogen Erklärung</th>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>E</td>-->
<!--            <td>E > e > N</td>-->
<!--            <td>Weiß</td>-->
<!--            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/e-locus-e1-yellow-lemon-red-cream-apricot/">E Lokus</a></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>K</td>-->
<!--            <td>Kb > ky > N</td>-->
<!--            <td>Schwarz</td>-->
<!--            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/k-locus-only-the-allele-kb/">K Lokus</a></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>B</td>-->
<!--            <td>bd, bc, bs > N</td>-->
<!--            <td>Braun</td>-->
<!--            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/b-locus-brown-chocolate-livernose-alleles-bd-bc-bs/">B Lokus</a></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>A</td>-->
<!--            <td>DY(Ay) > SY(Ay) > AG(Aw) > BS(at) > BB1-3(at) > a</td>-->
<!--            <td>Neufarben</td>-->
<!--            <td><a href="url">A Lokus Alt</a><br><a href="https://shop.labogen.com/gentest-bestellung/hund/all/2658/a-lokus-agouti-asip-analyse">A Lokus ASIP Analyse</a></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>D</td>-->
<!--            <td>d1 > a</td>-->
<!--            <td>Verwaschungsgen (Macht aus Schwarzem Pigment Silver oder Isabella und Rotes Pigment zu Creme.)</td>-->
<!--            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/d-locus-d1-dilution/">D Lokus</a></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>I</td>-->
<!--            <td>I > i</td>-->
<!--            <td>Farbintensität (I = viel Farbintensität [Got, Orange, Gelb], i = wenig Farbintensität [Creme, Creme-Weiß, Weiß])</td>-->
<!--            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/i-locus-phaeomelanin-intensitity/">I Lokus</a></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>S</td>-->
<!--            <td>S > N</td>-->
<!--            <td>Scheckungen</td>-->
<!--            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/s-locus-piebald-white-spotting/">S Lokus</a></td>-->
<!--        </tr>-->
<!--    </table>-->

</div>
</body>
</html>
