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
        <p>E Lokus: <input type="text" name="eLokus1" /> | <input type="text" name="eLokus2" /></p>
        <p>K Lokus: <input type="text" name="kLokus1" /> | <input type="text" name="kLokus2" /></p>
        <p>A Lokus: <input type="text" name="aLokus1" /> | <input type="text" name="aLokus2" /></p>
        <p>B Lokus: <input type="text" name="bLokus1" /> | <input type="text" name="bLokus2" /></p>
        <p>D Lokus: <input type="text" name="dLokus1" /> | <input type="text" name="dLokus2" /></p>
        <p>I Lokus: <input type="text" name="iLokus1" /> | <input type="text" name="iLokus2" /></p>
        <p>S Lokus: <input type="text" name="sLokus1" /> | <input type="text" name="sLokus2" /></p>
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
        $kLokus = 'NN';
        $aLokus = 'NN';
        $bLokus = 'NN';
        $dLokus = 'NN';
        $iLokus = 'NN';
        $sLokus = 'NN';

        if(!empty($formularWerteAufbereitet['E'])){
            $eLokus = implode($formularWerteAufbereitet['E']);
        }
        if(!empty($formularWerteAufbereitet['K'])){
            $kLokus = implode($formularWerteAufbereitet['K']);
        }
        if(!empty($formularWerteAufbereitet['A'])){
            $aLokus = implode($formularWerteAufbereitet['A']);
            if(preg_match('[Ay|Aw|at]', $aLokus)){
                $aLokus = $aLokiMapSimple[$formularWerteAufbereitet['A'][0]][$formularWerteAufbereitet['A'][1]];
            } else {
                $aLokus = $aLokiMapAdvanced[$formularWerteAufbereitet['A'][0]][$formularWerteAufbereitet['A'][1]];
            }
        }
        if(!empty($formularWerteAufbereitet['B'])){
            $bLokus = implode($formularWerteAufbereitet['B']);
        }
        if(!empty($formularWerteAufbereitet['D'])){
            $dLokus = implode($formularWerteAufbereitet['D']);
        }
        if(!empty($formularWerteAufbereitet['I'])){
            $iLokus = implode($formularWerteAufbereitet['I']);
        }
        if(!empty($formularWerteAufbereitet['S'])){
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

    <div class="eLokus">
        <img src="images/EE.png" alt="E-Lokus" style="height:300px;">
    </div>
    <div class="kLokus">
        <img src="images/KBKB.png" alt="K-Lokus" style="height:300px;">
    </div>
    <div class="bLokus">
        <img src="images/Brown.png" alt="B-Lokus" style="height:300px;">
    </div>
    <div class="dLokus">
        <img src="images/Wunni%20Kopf.jpg" alt="D-Lokus" style="height:300px;">
    </div>
    <div class="aLokus">
        <img src="images/<?php print $aLokus[1] ?>.jpg" alt="A-Lokus" style="height:300px;">
    </div>
    <div class="iLokus">
        <img src="images/li.png" alt="I-Lokus" style="height:300px;">
    </div>
    <div class="sLokus">
        <img src="images/SS.png" alt="S-Lokus" style="height:300px;">
    </div>

    <table>
        <tr>
            <th>Lokus</th>
            <th>Stati und Hierarchie der Gene</th>
            <th>Auswirkungen</th>
            <th>Link zu Labogen Erklärung</th>
        </tr>
        <tr>
            <td>E</td>
            <td>E > e > N</td>
            <td>Weiß</td>
            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/e-locus-e1-yellow-lemon-red-cream-apricot/">E Lokus</a></td>
        </tr>
        <tr>
            <td>K</td>
            <td>Kb > ky > N</td>
            <td>Schwarz</td>
            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/k-locus-only-the-allele-kb/">K Lokus</a></td>
        </tr>
        <tr>
            <td>B</td>
            <td>bd, bc, bs > N</td>
            <td>Braun</td>
            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/b-locus-brown-chocolate-livernose-alleles-bd-bc-bs/">B Lokus</a></td>
        </tr>
        <tr>
            <td>A</td>
            <td>DY(Ay) > SY(Ay) > AG(Aw) > BS(at) > BB1-3(at) > a</td>
            <td>Neufarben</td>
            <td><a href="url">A Lokus Alt</a><br><a href="https://shop.labogen.com/gentest-bestellung/hund/all/2658/a-lokus-agouti-asip-analyse">A Lokus ASIP Analyse</a></td>
        </tr>
        <tr>
            <td>D</td>
            <td>d1 > a</td>
            <td>Verwaschungsgen (Macht aus Schwarzem Pigment Silver oder Isabella und Rotes Pigment zu Creme.)</td>
            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/d-locus-d1-dilution/">D Lokus</a></td>
        </tr>
        <tr>
            <td>I</td>
            <td>I > i</td>
            <td>Farbintensität (I = viel Farbintensität [Got, Orange, Gelb], i = wenig Farbintensität [Creme, Creme-Weiß, Weiß])</td>
            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/i-locus-phaeomelanin-intensitity/">I Lokus</a></td>
        </tr>
        <tr>
            <td>S</td>
            <td>S > N</td>
            <td>Scheckungen</td>
            <td><a href="https://laboklin.com/en/products/genetics/coat-colour-coat-structure-coat-length/dog/s-locus-piebald-white-spotting/">S Lokus</a></td>
        </tr>
    </table>

</div>
</body>
</html>
