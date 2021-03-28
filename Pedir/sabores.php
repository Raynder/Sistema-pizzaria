<?php
    require_once "../config.php";
    session_start();
    $asp = '"';

    if(isset($_POST['qtd_sab'])){
        $quantidade = $_POST['qtd_sab'];
        $func = "x".$quantidade."_aux";

        switch($quantidade){
            case 1:
                echo(
                    "<div id='centro' class='centro x3'>
                        <img id='esquerdo' class='bandeja' src='img1x/tudo.png'>

                        <select onchange='x1_mudaFoto1(this.value)' name='nsab1' id='isab1' class='abs entrada-hidden bottom'>
                            <optgroup>
                                <option value=' ' style='display:none' selected></option>
                                <option value='calabresa'>Calabresa</option>
                                <option value='bacon'>Bacon</option>
                                <option value='atum'>Atum</option>
                                <option value='Frango_Catupiri'>Frango Catupiri</option>
                            </optgroup>

                        </select>
                        
                        <select name='nsab2' id='isab2' style='display:none'>
                            <optgroup>
                                <option value=''></option>
                            </optgroup>
                        </select>

                        <select name='nsab3' id='isab3' style='display:none'>
                            <optgroup>
                                <option value=''></option>
                            </optgroup>
                        </select>

                        <figcaption>
                            <p onclick='x1_aux()'>R$<span class='total_a_pagar' id='total_a_pagar'></span>.00</p>
                        </figcaption>


                    </div>"
                );
                echo("<script>$func(1)</script>");
                break;
            case 2:
                echo(
                    "<div id='centro' class='centro x2'>
                    <div class='tee'>
                        <img id='direito' class='bandeja' src='img2x/direito.png'>
                        <img id='esquerdo' class='bandeja' src='img2x/esquerdo.png'>
                    </div>

                    <select onchange='x2_mudaFoto1(this.value)' name='nsab1' id='isab1' class='entrada-hidden direito2x'>
                        <optgroup>
                            <option value=' ' style='display:none' selected></option>
                            <option value='calabresa'>Calabresa</option>
                            <option value='bacon'>Bacon</option>
                            <option value='atum'>Atum</option>
                            <option value='Frango_Catupiri'>Frango Catupiri</option>
                        </optgroup>
                    </select>

                    <select onchange='x2_mudaFoto2(this.value)' name='nsab2' id='isab2' class='entrada-hidden esquerdo2x'>
                        <optgroup>
                            <option value=' ' style='display:none' selected></option>
                            <option value='calabresa'>Calabresa</option>
                            <option value='bacon'>Bacon</option>
                            <option value='atum'>Atum</option>
                            <option value='Frango_Catupiri'>Frango Catupiri</option>
                        </optgroup>

                    </select>
                    
                    <select name='nsab3' id='isab3' style='display:none'>
                        <optgroup>
                            <option value=''></option>
                        </optgroup>

                    </select>

                    <figcaption>
                        <p onclick='x2_aux()'>R$<span class='total_a_pagar' id='total_a_pagar'></span>.00</p>
                    </figcaption>

                
                </div>"
                );
                echo("<script>$func(1)</script>");
                break;
            case 3:
                echo(
                    "<div id='centro' class='centro x3'>
                    <img id='toda_bandeja' class='bandeja' src='../img/tudo.png'>
                        <img id='direito' class='bandeja' src='../img/direito.png'>
                        <img id='esquerdo' class='bandeja' src='../img/esquerdo.png'>
                        <img id='baixo' class='bandeja' src='../img/baixo.png'>

                        <select onchange='x3_mudaFoto3(this.value)' name='nsab1' id='isab1' class='abs entrada-hidden esquerdo'>
                            <optgroup>
                                <option value=' ' style='display:none' selected></option>
                                <option value='calabresa'>Calabresa</option>
                                <option value='bacon'>Bacon</option>
                                <option value='atum'>Atum</option>
                                <option value='Frango_Catupiri'>Frango Catupiri</option>
                            </optgroup>

                        </select>
                        
                        <select onchange='x3_mudaFoto1(this.value)' name='nsab2' id='isab2' class='abs entrada-hidden direito'>
                            <optgroup>
                                <option value=' ' style='display:none' selected></option>
                                <option value='calabresa'>Calabresa</option>
                                <option value='bacon'>Bacon</option>
                                <option value='atum'>Atum</option>
                                <option value='Frango_Catupiri'>Frango Catupiri</option>
                            </optgroup>
                        </select>

                        <select onchange='x3_mudaFoto2(this.value)' name='nsab3' id='isab3' class='abs entrada-hidden bottom'>
                            <optgroup>
                                <option value=' ' style='display:none' selected></option>
                                <option value='calabresa'>Calabresa</option>
                                <option value='bacon'>Bacon</option>
                                <option value='atum'>Atum</option>
                                <option value='Frango_Catupiri'>Frango Catupiri</option>
                            </optgroup>

                        </select>

                        <figcaption>
                            <p onclick='x3_aux()'>R$<span class='total_a_pagar' id='total_a_pagar'></span>.00</p>
                        </figcaption>

                       
                    </div>"
                );
                echo("<script>$func(1)</script>");
                break;
        }
    
    }