<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:clar="Claro.SelfCareManagement.Services.Entities.Contracts" xmlns:clar1="http://schemas.datacontract.org/2004/07/Claro.SelfCareManagement.Services.Entities.Messages">
   <soapenv:Header>
      <clar:HeaderAutenticacion>
         <clar1:contraseñaAutenticacion>Mi2018ClaroCo*$Vvosfj1kohp3.$Vbroibcc3co3</clar1:contraseñaAutenticacion>
         <clar1:tipoCanalID><?=isset($Vj51pdqbhifj)?2:1?></clar1:tipoCanalID>
         <clar1:usuarioAutenticacion>Mi$2019.$Vduuglj0unse*$1C$Vk33bzuipr3e$0</clar1:usuarioAutenticacion>
      </clar:HeaderAutenticacion>
   </soapenv:Header>
   <soapenv:Body>
      <clar:AceptarOfertaBeneficioMovilRequest>
         <clar:aplicaBeneficioRetencion><?=(( isset($Vst3ugq4hb0n) && $Vst3ugq4hb0n != NULL ) ? $Vst3ugq4hb0n : "true")?></clar:aplicaBeneficioRetencion>
         <clar:aplicaDatos><?=$V4ccetyxq0kk?></clar:aplicaDatos>
         <clar:aplicaVoz><?=$Vh5afuc0wvrx?></clar:aplicaVoz>
         <clar:codigoContrato><?=$Vbi52g5o1eft?></clar:codigoContrato>
         <clar:listBeneficiosRetencion>
         <?php
            foreach ($Vwxdbc4xdrgm as $Vutaiebycwbq) {
         ?>
            <clar1:BeneficioCuenta>
               <clar1:codigoBeneficio><?=$Vutaiebycwbq["acodigoBeneficio"]?></clar1:codigoBeneficio>
               <clar1:descripcion><?=$Vutaiebycwbq["adescripcion"]?></clar1:descripcion>
               <clar1:fecha><?=$Vutaiebycwbq["afecha"]?></clar1:fecha>
               <clar1:nombre><?=$Vutaiebycwbq["anombre"]?></clar1:nombre>
            </clar1:BeneficioCuenta>
         <?php
            }
         ?>
         </clar:listBeneficiosRetencion>
         <clar:nombreUsuario><?=$Vyvjwikpa2bp?></clar:nombreUsuario>
         <clar:numeroCuenta><?=$V3hbf4so4iko?></clar:numeroCuenta>
         <clar:ofertaBeneficioMovilID><?=$V2nzrzbkdpab?></clar:ofertaBeneficioMovilID>
         <clar:tipoBeneficioID><?=$Vp4djdrb2ias?></clar:tipoBeneficioID>
      </clar:AceptarOfertaBeneficioMovilRequest>
   </soapenv:Body>
</soapenv:Envelope>